<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types\Commom;

use AeonDigital\Objects\Types\Commom\tNString as tNString;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;







/**
 * Tipo ``Nullable Signed String Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tNStringArray extends tNString implements iTypeArray
{
    use \AeonDigital\Objects\Traits\TypeArray;
    use \AeonDigital\Objects\Traits\TypeArrayConstructor;
}
