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
     * Valor deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @var         mixed
     */
    protected $valueNullEquivalent = undefined;
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
     * Informa se esta instância é ``nullable``.
     *
     * @var         bool
     */
    protected bool $nullable = false;
    /**
     * Informa se esta instância é ``nullable``.
     *
     * @return      bool
     */
    public function isNullable() : bool
    {
        return $this->nullable;
    }
    /**
     * Informa se esta instância é ``readonly``.
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
     * Informa se o valor atualmente definido é o mesmo que ``nullEquivalent``.
     * Retornará ``false`` caso o valor seja ``null``.
     *
     * @return      bool
     */
    public function isNullEquivalent() : bool
    {
        return ($this->value === $this->valueNullEquivalent);
    }
    /**
     * Informa se o valor atualmente definido é ``null`` ou se é o mesmo que
     * ``nullEquivalent``.
     *
     * @return      bool
     */
    public function isNullOrEquivalent() : bool
    {
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
            $n = static::standart()::parseIfValidate($v, $this->nullable, false, $this->lastSetError);
            if ($this->lastSetError === "") {
                if ($n !== null && $this->validateRange($n) === false) {
                    $this->lastSetError = "error.obj.out.of.range";
                }
                else {
                    $r = true;
                    $this->value = $n;
                    $this->undefined = false;
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
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      mixed
     */
    protected function stdGetNotNull()
    {
        return ($this->value ?? $this->nullEquivalent());
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
        return (static::standart()::HAS_LIMIT_RANGE === false ||
            ($v >= $this->valueMin && $v <= $this->valueMax)
        );
    }










    /**
     * Inicia uma nova instância.
     *
     * @param       mixed $value
     *              Valor inicial da instância.
     *              Se não for definido usará o valor definido como ``self::nullEquivalent()``.
     *              Se ``nullEquivalent`` não for definido mas tratar-se de um tipo
     *              ``nullable`` usará ``null`` como valor inicial caso contrário
     *              usará o valor definido como ``nullEquivalent`` da classe ``Standart``
     *              original.
     *              Se for definido como ``null`` mas não for do tipo ``nullable`` usará
     *              o valor definido em ``nullEquivalent`` aqui definido ou aquele que
     *              existir na classe ``Standart`` original.
     *
     * @param       bool $nullable
     *              Quando ``true`` esta instância aceitará ``null`` como um valor válido.
     *
     * @param       bool $readonly
     *              Quando ``true`` indica que esta instância não poderá ter seu valor
     *              alterado após a inicialização.
     *
     * @param       mixed $valueNullEquivalent
     *              Valor equivalente a ``null`` a ser usado por esta instância.
     *              Se não for definido usará o valor existente em ``nullEquivalent`` da
     *              classe ``Standart`` original.
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
     */
    function __construct(
        $value = undefined,
        bool $nullable = false,
        bool $readonly = false,
        $valueNullEquivalent = undefined,
        $valueMin = undefined,
        $valueMax = undefined
    ) {
        $this->nullable = $nullable;
        $this->valueMin = (
            ($valueMin === undefined) ? static::standart()::min() : $valueMin
        );
        $this->valueMax = (
            ($valueMax === undefined) ? static::standart()::max() : $valueMax
        );
        $this->valueNullEquivalent = (
            ($valueNullEquivalent === undefined) ? static::standart()::nullEquivalent() : $valueNullEquivalent
        );
        $undefined = ($value === undefined);


        if ($value === undefined) {
            if ($valueNullEquivalent === undefined) {
                $value = (($nullable === true) ? null : $this->valueNullEquivalent);
            }
            else {
                $value = $valueNullEquivalent;
            }
        }
        elseif ($value === null && $nullable === false) {
            $value = $this->valueNullEquivalent;
        }


        $this->set($value);
        $this->undefined = $undefined;
        $this->readonly = $readonly;
    }





    /**
     * Converte o valor atualmente definido para uma ``string``.
     *
     * @return      string
     */
    public function toString() : string
    {
        $v = $this->value;
        if (static::standart()::TYPE === "Bool") { $v = Tools::toBool($v); }
        return Tools::toString($v);
    }
}
