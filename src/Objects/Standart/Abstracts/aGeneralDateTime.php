<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;








/**
 * Extende a classe ``aStandart`` para atender tipos ``DateTime``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aGeneralDateTime extends aStandart
{



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
