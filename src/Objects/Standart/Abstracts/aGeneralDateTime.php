<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Objects\Standart\Abstracts\aStandartType as aStandartType;








/**
 * Define um ``Standart`` para tipos de ``DateTime``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aGeneralDateTime extends aStandartType
{



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
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      \DateTime
     */
    public function getNotNull() : \DateTime
    {
        return parent::stdGetNotNull();
    }










    /**
     * Data compatível com o valor ``null`` para fins de comparação
     *
     * @var         \DateTime
     */
    protected static \DateTime $stdNull;
    /**
     * Menor data possível aceita como válida.
     *
     * @var         \DateTime
     */
    protected static \DateTime $stdMin;
    /**
     * Maior data possível aceita como válida.
     *
     * @var         \DateTime
     */
    protected static \DateTime $stdMax;
}
