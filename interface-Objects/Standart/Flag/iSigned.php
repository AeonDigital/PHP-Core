<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Flag;










/**
 * Define uma versão ``signed`` para um tipo ``Standart``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iSigned
{



    /**
     * Indica quando trata-se de um valor numérico que ACEITA valores negativos.
     *
     * @var         bool
     */
    const SIGNED = true;
    /**
     * Indica quando trata-se de um valor numérico que NÃO ACEITA valores negativos.
     *
     * @var         bool
     */
    const UNSIGNED = false;
}
