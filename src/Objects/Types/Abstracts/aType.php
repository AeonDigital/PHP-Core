<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Interfaces\Objects\iType as iType;
use AeonDigital\Objects\Tools as Tools;







/**
 * Classe básica para tipos ``iType`` concretos.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aType implements iType
{



    /**
     * Valor da instância.
     *
     * @var         mixed
     */
    protected $value = null;



    /**
     * Valor padrão para uma instância recém criada e que não recebeu
     * um valor explicitamente definido.
     *
     * @var         mixed
     */
    protected $valueDefault = null;
    /**
     * Menor valor aceitável para um tipo numérico ou comparável.
     *
     * @var         int|float|Realtype|\DateTime $min
     */
    protected $valueMin = null;
    /**
     * Maior valor aceitável para um tipo numérico ou comparável.
     *
     * @var         int|float|Realtype|\DateTime $max
     */
    protected $valueMax = null;
    /**
     * Tamanho máximo que um valor do tipo ``string`` pode possuir
     * em número de caracteres.
     * ``null`` indica que não há limites.
     *
     * @var         ?int
     */
    protected ?int $valueLength = null;





    /**
     * Namespace completa da classe que está sendo implementada nesta instância.
     *
     * @var         string
     */
    protected string $type = "";
    /**
     * Retorna o namespace completo da classe usada por esta instância.
     * Em classes de tipo invariável retornará o mesmo resultado obtido pelo
     * método ``static::standart()``.
     *
     * @return      string
     */
    public function getType() : string
    {
        return $this->type;
    }





    /**
     * Indica quando o tipo de valor aceito é do tipo ``iterable``.
     *
     * @var         bool
     */
    protected bool $iterable = false;
    /**
     * Informa quando o tipo de valor aceito é do tipo ``iterable``.
     *
     * @return      bool
     */
    public function isIterable() : bool
    {
        return $this->iterable;
    }





    /**
     * Retorna o tamanho máximo (em caracteres) que um valor do tipo ``string`` pode ter.
     * O valor ``null`` indica que não existe tal limitação.
     * Esta configuação funciona apenas em casos de tipo ``string``.
     *
     * @return      ?int
     */
    public function length() : ?int
    {
        return $this->valueLength;
    }





    /**
     * Indica se esta instância já recebeu algum valor válido de forma explicita.
     *
     * @var         bool
     */
    protected $undefined = true;
    /**
     * Retornará ``true`` enquanto nenhum valor for definido para
     * esta instância de forma explicita.
     *
     * @return      bool
     */
    public function isUndefined() : bool
    {
        return $this->undefined;
    }
    /**
     * Indica se esta instância aceita ``null`` como válido.
     *
     * @var         bool
     */
    protected bool $allowNull = false;
    /**
     * Informa se esta instância aceita ``null`` como válido.
     *
     * @return      bool
     */
    public function isAllowNull() : bool
    {
        return $this->allowNull;
    }
    /**
     * Indica se esta instância aceita ``""`` como válido.
     *
     * @var         bool
     */
    protected bool $allowEmpty = false;
    /**
     * Informa se esta instância aceita ``""`` como um valor válido.
     * Esta configuação funciona apenas em casos de tipo ``string``.
     *
     * @return      bool
     */
    public function isAllowEmpty() : bool
    {
        return $this->allowEmpty;
    }
    /**
     * Indica se esta instância é ``readonly``.
     *
     * @var         bool
     */
    protected bool $readonly = false;
    /**
     * Informa se esta instância é ``readonly``.
     *
     * Quando ``true``, após a criação da instância nenhum outro valor poderá
     * ser definido para a mesma
     *
     * @return      bool
     */
    public function isReadOnly() : bool
    {
        return $this->readonly;
    }



    /**
     * Informa se o valor atualmente definido é o mesmo que ``static::nullEquivalent()``.
     * Retornará ``false`` caso o valor seja ``null``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     * Se ``isIterable = true`` deve retornar sempre ``false``.
     *
     * @return      bool
     */
    public function isNullEquivalent() : bool
    {
        if ($this->isIterable() === true) { return false; }
        return ($this->value === static::standart()::nullEquivalent());
    }
    /**
     * Informa se o valor atualmente definido é ``null`` ou se é o mesmo que
     * ``static::nullEquivalent()``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     * Se ``isIterable = true`` deve retornar sempre ``false``.
     *
     * @return      bool
     */
    public function isNullOrEquivalent() : bool
    {
        if ($this->isIterable() === true) { return false; }
        return (($this->value === null) || $this->isNullEquivalent() === true);
    }





    /**
     * Armazena o último erro encontrado ao tentar definir um valor para
     * esta instância.
     *
     * @var         string
     */
    protected string $lastSetError = "";
    /**
     * Retorna o último código de erro encontrado ao tentar definir um valor
     * para a instância. ``""`` será retornado caso não tenha havido erros.
     *
     * @return      string
     */
    public function getLastSetError() : string
    {
        return $this->lastSetError;
    }



    /**
     * Define um novo valor para a instância.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @param       mixed $v
     *              Valor a ser atribuido.
     */
    public function set($v) : bool
    {
        $r = false;
        $this->lastSetError = "";

        if ($this->readonly === true) {
            $this->lastSetError = "error.obj.type.readonly";
        }
        else {
            $n = static::standart()::parseIfValidate($v, $this->allowNull, false, $this->lastSetError);
            if ($this->lastSetError === "") {
                if (static::standart()::TYPE === "String" && $n !== null) {
                    if ($n === "") {
                        if ($this->allowEmpty === false) {
                            if ($this->allowNull === true) { $n = null; }
                            else { $this->lastSetError = "error.obj.type.not.allow.empty"; }
                        }
                    }
                    else {
                        if ($this->valueLength !== null && \mb_strlen($n) > $this->valueLength) {
                            $this->lastSetError = "error.obj.max.length.exceeded";
                        }
                    }
                }

                if ($this->lastSetError === "") {
                    if ($this->validateRange($n) === false) {
                        $this->lastSetError = "error.obj.out.of.range";
                    }
                    else {
                        $r = true;
                        $this->value = $n;
                        $this->undefined = false;
                    }
                }
            }
        }

        return $r;
    }
    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      mixed
     */
    protected function stdGet()
    {
        return $this->value;
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      mixed
     */
    protected function stdGetNotNull()
    {
        return ($this->value ?? static::standart()::nullEquivalent());
    }
    /**
     * Verifica se o valor informado está entre o intervalo definido para este tipo.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    protected function validateRange($v) : bool
    {
        return ($v === null || static::standart()::HAS_LIMIT_RANGE === false ||
            ($v >= $this->valueMin && $v <= $this->valueMax)
        );
    }










    /**
     * Inicia uma nova instância.
     *
     * @param       mixed $value
     *              Valor inicial da instância.
     *              Se for passado ``undefined`` irá iniciar a instância com o valor definido
     *              em ``$valueDefault`` mas caso este não esteja definido também irá usar ``null``
     *              se este for um valor aceitável.
     *              Caso ``null`` não seja aceitável, usará o valor equivalente encontrado em
     *              em ``static::nullEquivalent()``.
     *              Em último caso tentará definir a instância com o valor de ``self::min()``.
     *
     * @param       bool $allowNull
     *              Quando ``true`` esta instância aceitará ``null`` como um valor válido.
     *
     * @param       bool $allowEmpty
     *              Quando ``true`` esta instância aceitará ``""`` como um valor válido.
     *              Esta configuação funciona apenas em casos de tipo ``string``.
     *
     * @param       bool $readonly
     *              Quando ``true`` indica que esta instância não poderá ter seu valor
     *              alterado após a inicialização.
     *
     * @param       mixed $valueDefault
     *              Valor padrão a ser definido para este tipo de instância caso nenhum
     *              valor válido tenha sido explicitamente definido.
     *              Se não for definido, ``null`` será usado.
     *
     * @param       int|float|Realtype|\DateTime $valueMin
     *              Indica o menor valor aceitável para um tipo numérico ou comparável.
     *              Se não for definido usará o valor existente em ``min`` da classe
     *              ``Standart`` original.
     *
     * @param       int|float|Realtype|\DateTime $valueMax
     *              Indica o maior valor aceitável para um tipo numérico ou comparável.
     *              Se não for definido usará o valor existente em ``max`` da classe
     *              ``Standart`` original.
     *
     * @param       ?int $valueLength
     *              tamanho máximo (em caracteres) que um valor do tipo ``string``
     *              pode ter.
     */
    function __construct(
        $value = undefined,
        bool $allowNull = false,
        bool $allowEmpty = true,
        bool $readonly = false,
        $valueDefault = null,
        $valueMin = undefined,
        $valueMax = undefined,
        ?int $valueLength = null
    ) {
        $this->type = (($this->type === "") ? static::standart()::TYPE : $this->type);
        $this->allowNull = $allowNull;
        $this->valueDefault = (($valueDefault === undefined) ? null : $valueDefault);

        if (static::standart()::HAS_LIMIT_RANGE === true) {
            $this->valueMin = (($valueMin === undefined || $valueMin === null) ? static::standart()::min() : $valueMin);
            $this->valueMax = (($valueMax === undefined || $valueMax === null) ? static::standart()::max() : $valueMax);
        }
        if (static::standart()::TYPE === "String") {
            $this->allowEmpty = $allowEmpty;
            $this->valueLength = $valueLength;
        }


        $undefined = ($value === undefined);
        if ($value === undefined || $value === "") {
            if ($valueDefault === null) {
                $value = (($allowNull === true) ? null : static::standart()::nullEquivalent());
            }
            else {
                $value = $valueDefault;
            }
        }
        elseif ($value === null) {
            $value = (($allowNull === true) ? null : static::standart()::nullEquivalent());
        }


        if ($this->set($value) === false) {
            $this->set($this->valueMin);
        }
        if ($this->value === null && $this->allowNull === false && $this->valueDefault !== null) {
            $this->value = $this->valueDefault;
        }

        $this->undefined = $undefined;
        $this->readonly = $readonly;
    }





    /**
     * Converte o valor atualmente definido para uma ``string``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     * Se ``isIterable = true`` deve retornar sempre ``""``.
     *
     * @return      string
     */
    public function toString() : string
    {
        if ($this->isIterable() === true) { return ""; }

        $v = $this->value;
        if (static::standart()::TYPE === "Bool") { $v = Tools::toBool($v); }
        return Tools::toString($v);
    }



    /**
     * Retorna uma instância definida com as propriedades definidas no
     * ``array`` de configuração.
     *
     * @param       string $useType
     *              Namespace completa do tipo que deve ser instanciado.
     *
     * @param       array $cfg
     *              Array associativo contendo as configurações para a
     *              definição da instância resultante.
     *
     * @return      iType
     */
    protected static function tpFromArray(string $useType, array $cfg) : iType
    {
        return new $useType(
            ((\key_exists("value", $cfg) === true)          ? $cfg["value"]         : undefined),
            ((\key_exists("allowNull", $cfg) === true)      ? $cfg["allowNull"]     : false),
            ((\key_exists("allowEmpty", $cfg) === true)     ? $cfg["allowEmpty"]    : true),
            ((\key_exists("readonly", $cfg) === true)       ? $cfg["readonly"]      : false),
            ((\key_exists("valueDefault", $cfg) === true)   ? $cfg["valueDefault"]  : null),
            ((\key_exists("valueMin", $cfg) === true)       ? $cfg["valueMin"]      : undefined),
            ((\key_exists("valueMax", $cfg) === true)       ? $cfg["valueMax"]      : undefined),
            ((\key_exists("length", $cfg) === true)         ? $cfg["length"]        : null),
            ((\key_exists("type", $cfg) === true)           ? $cfg["type"]          : null),
            ((\key_exists("caseSensitive", $cfg) === true)  ? $cfg["caseSensitive"] : true),
        );
    }
}
