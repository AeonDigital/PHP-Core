<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tUIntArray as tUIntArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Unsigned Int Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fUIntArray extends tUIntArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
