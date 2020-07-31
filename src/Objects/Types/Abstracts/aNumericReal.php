<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Objects\Types\Abstracts\aType as aType;
use AeonDigital\Objects\Realtype as Realtype;







/**
 * Extende a classe ``aType`` para atender a interface ``iNumericReal``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericReal extends aType
{



    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?Realtype
     */
    public function default() : ?Realtype
    {
        return $this->valueDefault;
    }
    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      Realtype
     */
    public function min() : Realtype
    {
        return $this->valueMin;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      Realtype
     */
    public function max() : Realtype
    {
        return $this->valueMax;
    }





    /**
     * Informa se o valor atualmente definido é ``null`` ou se é o mesmo que
     * ``static::nullEquivalent()``.
     *
     * @return      bool
     */
    public function isNullEquivalent() : bool
    {
        return ($this->value !== null && $this->value->value() === static::standart()::nullEquivalent()->value());
    }




    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      ?Realtype
     */
    public function get() : ?Realtype
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      Realtype
     */
    public function getNotNull() : Realtype
    {
        return parent::stdGetNotNull();
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
        return ($v === null ||
            ($v->isGreaterOrEqualAs($this->valueMin) === true &&
            $v->isLessOrEqualAs($this->valueMax) === true)
        );
    }
}
