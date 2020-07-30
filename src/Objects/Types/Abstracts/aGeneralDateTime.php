<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Abstracts;

use AeonDigital\Objects\Types\Abstracts\aType as aType;








/**
 * Extende a classe ``aType`` para atender a interface ``iGeneralDateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aGeneralDateTime extends aType
{



    /**
     * Valor padrão a ser definido para este tipo de instância caso nenhum valor válido
     * tenha sido explicitamente definido.
     *
     * @return      ?\DateTime
     */
    public function default() : ?\DateTime
    {
        return $this->valueDefault;
    }
    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public function min() : \DateTime
    {
        return $this->valueMin;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      \DateTime
     */
    public function max() : \DateTime
    {
        return $this->valueMax;
    }





    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?\DateTime
     */
    public function get() : ?\DateTime
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``self::nullEquivalent``.
     *
     * @return      \DateTime
     */
    public function getNotNull() : \DateTime
    {
        return parent::stdGetNotNull();
    }
}
