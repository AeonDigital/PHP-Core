<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Flag;










/**
 * Define uma versão ``read and write`` para um tipo ``Standart``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iReadWrite
{



    /**
     * Indica quando trata-se de um tipo que não pode ter seu valor sobrescrito.
     *
     * @var         bool
     */
    const READONLY = false;
}
