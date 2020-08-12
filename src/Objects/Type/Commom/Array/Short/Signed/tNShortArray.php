<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Commom;

use AeonDigital\Objects\Types\Commom\tNShort as tNShort;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;







/**
 * Tipo ``Nullable Signed Short Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tNShortArray extends tNShort implements iTypeArray
{
    use \AeonDigital\Objects\Traits\TypeArray;
    use \AeonDigital\Objects\Traits\TypeArrayConstructor;
}
