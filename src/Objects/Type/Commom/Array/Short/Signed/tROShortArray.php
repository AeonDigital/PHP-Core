<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Commom;

use AeonDigital\Objects\Types\Commom\tROShort as tROShort;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;







/**
 * Tipo ``ReadOnly Signed Short Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tROShortArray extends tROShort implements iTypeArray
{
    use \AeonDigital\Objects\Traits\TypeArray;
    use \AeonDigital\Objects\Traits\TypeArrayConstructor;
}
