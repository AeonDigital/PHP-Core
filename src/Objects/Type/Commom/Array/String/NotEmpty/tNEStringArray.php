<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Commom;

use AeonDigital\Objects\Types\Commom\tNEString as tNEString;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;







/**
 * Tipo ``Not Empty String Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tNEStringArray extends tNEString implements iTypeArray
{
    use \AeonDigital\Objects\Traits\TypeArray;
    use \AeonDigital\Objects\Traits\TypeArrayConstructor;
}
