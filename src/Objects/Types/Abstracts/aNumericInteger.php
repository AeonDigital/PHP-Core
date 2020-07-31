<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Objects\Types\Abstracts\aType as aType;








/**
 * Extende a classe ``aType`` para atender a interface ``iNumericInteger``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericInteger extends aType
{



    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?int
     */
    public function default() : ?int
    {
        return $this->valueDefault;
    }
    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      int
     */
    public function min() : int
    {
        return $this->valueMin;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      int
     */
    public function max() : int
    {
        return $this->valueMax;
    }





    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      ?int
     */
    public function get() : ?int
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * Usado apenas em casos onde ``self::isIterable() = false``.
     *
     * @return      int
     */
    public function getNotNull() : int
    {
        return parent::stdGetNotNull();
    }
}
