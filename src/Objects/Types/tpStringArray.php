<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;
use AeonDigital\Objects\Types\tpString as tpString;







/**
 * Classe concreta para o tipo ``array string``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpStringArray extends tpString implements iTypeArray
{
    use \AeonDigital\Objects\Types\Traits\TypeArray;



    /**
     * Indica quando o tipo de valor aceito é do tipo ``iterable``.
     *
     * @var         bool
     */
    protected bool $iterable = true;
}
