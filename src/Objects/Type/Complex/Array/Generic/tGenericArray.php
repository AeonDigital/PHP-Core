<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Complex;

use AeonDigital\Objects\Types\Complex\tGeneric as tGeneric;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;







/**
 * Tipo ``Generic Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tGenericArray extends tGeneric implements iTypeArray
{
    use \AeonDigital\Objects\Traits\TypeArray;
    use \AeonDigital\Objects\Traits\TypeArrayGenericConstructor;
}
