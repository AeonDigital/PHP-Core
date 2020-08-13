<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Flag;










/**
 * Define uma versão ``unsigned`` para um tipo ``Standart``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iUnsigned
{



    /**
     * Indica quando trata-se de um valor numérico que ACEITA valores negativos.
     *
     * @var         bool
     */
    const SIGNED = false;
    /**
     * Indica quando trata-se de um valor numérico que NÃO ACEITA valores negativos.
     *
     * @var         bool
     */
    const UNSIGNED = true;
}
