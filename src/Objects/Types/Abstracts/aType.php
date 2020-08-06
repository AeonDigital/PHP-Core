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
     * Valor padrão a ser definido para este tipo de instância caso nenhum
     * valor válido tenha sido explicitamente definido.
     *
     * @var         mixed
     */
    protected $valueDefault = null;
    /**
     * Retorna o menor valor aceitável para esta instância.
     *
     * @var         ?int|float|Realtype|\DateTime $min
     */
    protected $valueMin = null;
    /**
     * Retorna o maior valor aceitável para esta instância.
     *
     * @var         ?int|float|Realtype|\DateTime $max
     */
    protected $valueMax = null;





    /**
     * Namespace completo da classe usada por esta instância.
     *
     * @var         string
     */
    protected string $type = "";
    /**
     * Retorna o namespace completo da classe usada por esta instância.
     *
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
     * Informa quando tratar-se de uma instância que lida com ``arrays`` de valores.
     *
     * @return      bool
     */
    public function isIterable() : bool
    {
        return $this->iterable;
    }





    /**
     * Informa se esta instância aceita ``null`` como válido.
     * Mesmo valor encontrado na constante ``NULLABLE`` do ``Standart`` utilizado.
     *
     * @return      bool
     */
    public function isAllowNull() : bool
    {
        return $this->getStandart()::NULLABLE;
    }
    /**
     * Informa se esta instância é ``readonly``.
     * Mesmo valor encontrado na constante ``READONLY`` do ``Standart`` utilizado.
     *
     * @return      bool
     */
    public function isReadOnly() : bool
    {
        return $this->getStandart()::READONLY;
    }
    /**
     * Informa se esta instância aceita ``""`` como um valor válido.
     * Mesmo valor encontrado na constante ``EMPTY`` do ``Standart`` utilizado.
     *
     * @return      ?bool
     */
    public function isAllowEmpty() : ?bool
    {
        return $this->getStandart()::EMPTY;
    }





    //
    // Implementados em classes intermediárias ou nas concretas
    // function getNullEquivalent();
    // function getDefault();
    // function getMin();
    // function getMax();
    // function get();
    // function getNotNull();
    //





    /**
     * Em tipos ``String`` retorna o maior número de caracteres aceitável para validar
     * o valor. Trata-se do mesmo número indicado em ``self::getMax()``
     *
     * @return      ?int
     */
    public function getLength() : ?int
    {
        $r = null;
        if ($this->getStandart()::TYPE === "String") {
            $r = $this->getStandart()::getMax();
        }
        return $r;
    }




    protected ?array $enumerator = null;
    /**
     * Retorna um ``array`` com a coleção de valores que este campo está apto a assumir.
     * Os valores aqui pré-definidos devem seguir as regras de validade especificadas.
     *
     * @param       bool $onlyValues
     *              Quando ``true``, retorna um ``array`` unidimensional contendo apenas
     *              os valores sem seus respectivos ``labels``.
     *
     * @return      ?array
     */
    public function getEnumerator(bool $onlyValues = false) : ?array
    {
        return static::sttGetEnumerator($this->enumerator, $onlyValues);
    }
    /**
     * Resolução ``static`` para ``self::getEnumerator()``.
     *
     * @param       ?array $enumerator
     * @param       bool $onlyValues
     *
     * @return      ?array
     */
    protected static function sttGetEnumerator(
        ?array $enumerator,
        bool $onlyValues = false
    ) : ? array {
        $arr = $enumerator;
        if ($enumerator !== null && $onlyValues === true) {
            $nArr = [];
            foreach ($arr as $enum) {
                if (\is_array($enum) === true) {
                    $nArr[] = $enum[0];
                }
            }
            $arr = $nArr;
        }
        return $arr;
    }







    /**
     * Indica se esta instância já recebeu algum valor válido de forma explicita.
     *
     * @var         bool
     */
    protected bool $undefined = true;
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
     * Informa se o valor atualmente definido é o mesmo que ``NULL_EQUIVALENT``.
     * Retornará ``false`` caso o valor seja ``null``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     * Se ``isIterable = true`` deve retornar ``false``.
     *
     * @return      bool
     */
    public function isNullEquivalent() : bool
    {
        return static::sttCheckNullEquivalent(
            $this->value, $this->iterable, true,
            static::getStandart()::getNullEquivalent()
        );
    }
    /**
     * Informa se o valor atualmente definido é ``null`` ou se é o mesmo que
     * ``static::getNullEquivalent()``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     * Se ``isIterable = true`` deve retornar sempre ``false``.
     *
     * @return      bool
     */
    public function isNullOrEquivalent() : bool
    {
        return static::sttCheckNullEquivalent(
            $this->value, $this->iterable, false,
            static::getStandart()::getNullEquivalent()
        );
    }
    /**
     * Resolução ``static`` para ``self::isNullEquivalent()`` e ``self::isNullOrEquivalent()``.
     *
     * @param       bool $isIterable
     * @param       bool $strictNull
     * @param       mixed $nullEquivalent
     *
     * @return      bool
     */
    protected static function sttCheckNullEquivalent(
        $value,
        bool $isIterable,
        bool $strictNull,
        $nullEquivalent
    ) : bool {
        if ($isIterable === true) {
            return false;
        }
        else {
            if ($strictNull === true) {
                return ($value === $nullEquivalent);
            }
            else {
                return (($value === null) || ($value === $nullEquivalent));
            }
        }
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
     * para a instância. ``""`` será retornado caso não existam erros.
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

        if ($this->iterable === false) {
            if ($this->isReadOnly() === true && $this->undefined === true) {
                $this->lastSetError = "error.obj.type.readonly";
            }
            else {
                $n = static::getStandart()::parseIfValidate(
                    $v, $this->lastSetError, self::getMin(), self::getMax()
                );
                if ($this->lastSetError === "") {
                    $r = true;
                    $this->value = $n;
                    $this->undefined = false;
                }
            }
        }

        return $r;
    }





    /**
     * Resolução ``static`` para ``self::get()``.
     *
     * @return      mixed
     */
    protected function sttGet()
    {
        return $this->value;
    }
    /**
     * Resolução ``static`` para ``self::getNotNull()``.
     *
     * @return      mixed
     */
    protected function sttGetNotNull()
    {
        return ($this->value ?? static::getStandart()::getNullEquivalent());
    }










    /**
     * Inicia uma nova instância.
     *
     * @param       mixed $value
     *              Valor inicial da instância.
     *              Se for passado ``undefined`` irá iniciar a instância com o valor
     *              definido em ``$valueDefault`` mas caso este não esteja definido
     *              também irá usar ``null`` se este for um valor aceitável.
     *              Caso ``null`` não seja aceitável, usará o valor equivalente encontrado
     *              em ``static::getNullEquivalent()``.
     *              Em último caso tentará definir a instância com o valor de ``self::getMin()``.
     *
     * @param       mixed $valueDefault
     *              Valor padrão a ser definido para este tipo de instância caso nenhum
     *              valor válido tenha sido explicitamente definido.
     *              Se não for definido, ``null`` será usado.
     *
     * @param       int|float|Realtype|\DateTime $valueMin
     *              Menor valor aceitável para esta instância.
     *              Se não for definido usará o valor existente em ``MIN`` da classe
     *              ``Standart`` original.
     *
     * @param       int|float|Realtype|\DateTime $valueMax
     *              Maior valor aceitável para esta instância.
     *              Se não for definido usará o valor existente em ``MAX`` da classe
     *              ``Standart`` original.
     */
    function __construct(
        $value = undefined,
        $valueDefault = null,
        $valueMin = null,
        $valueMax = null
    ) {
        $this->type = (($this->type === "") ? static::getStandart()::TYPE : $this->type);
        $this->valueDefault = $valueDefault;

        if (static::getStandart()::HAS_LIMIT === true) {
            $this->valueMin = $valueMin ?? static::getStandart()::getMin();
            $this->valueMax = $valueMax ?? static::getStandart()::getMax();
        }

        $undefined = ($value === undefined);
        if ($value === undefined || $value === "") {
            if ($valueDefault === null) {
                $value = (($this->isAllowNull() === true) ? null : static::getStandart()::getNullEquivalent());
            }
            else {
                $value = $valueDefault;
            }
        }
        elseif ($value === null) {
            $value = (($this->isAllowNull() === true) ? null : static::getStandart()::getNullEquivalent());
        }


        if ($this->set($value) === false) {
            $this->set($this->getMin());
        }
        if ($this->value === null && $this->isAllowNull() === false && $this->valueDefault !== null) {
            $this->value = $this->valueDefault;
        }
        $this->undefined = $undefined;
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
        if ($this->isIterable() === true) {
            return "";
        }
        else {
            $v = $this->value;
            if (static::getStandart()::TYPE === "Bool") { $v = Tools::toBool($v); }
            return Tools::toString($v);
        }
    }



    /**
     * Retorna uma instância definida com as propriedades indicadas no
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
            ((\key_exists("valueDefault", $cfg) === true)   ? $cfg["valueDefault"]  : null),
            ((\key_exists("valueMin", $cfg) === true)       ? $cfg["valueMin"]      : undefined),
            ((\key_exists("valueMax", $cfg) === true)       ? $cfg["valueMax"]      : undefined),
            ((\key_exists("type", $cfg) === true)           ? $cfg["type"]          : null),
            ((\key_exists("caseSensitive", $cfg) === true)  ? $cfg["caseSensitive"] : true),
        );
    }
}
