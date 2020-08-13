<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Flag;










/**
 * Define uma versão ``not empty`` para um tipo ``Standart``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNotEmpty
{



    /**
     * Indica quando trata-se de um valor do tipo ``string``
     * que ACEITA ``""`` como válido.
     *
     * @var         bool
     */
    const EMPTY = false;
}
