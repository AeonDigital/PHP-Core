<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Flag;










/**
 * Define uma versão ``not nullable`` para um tipo ``Standart``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNotNullable
{



    /**
     * Indica quando este tipo aceita ``null`` como válido.
     *
     * @var         bool
     */
    const NULLABLE = false;
}
