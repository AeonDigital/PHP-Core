<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Objects\Types\Abstracts\aType as aType;








/**
 * Extende a classe ``aType`` para atender a interface ``iNumericFloating``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericFloating extends aType
{



    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?float
     */
    public function default() : ?float
    {
        return $this->valueDefault;
    }
    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      float
     */
    public function min() : float
    {
        return $this->valueMin;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      float
     */
    public function max() : float
    {
        return $this->valueMax;
    }





    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?float
     */
    public function get() : ?float
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      float
     */
    public function getNotNull() : float
    {
        return parent::stdGetNotNull();
    }
}
