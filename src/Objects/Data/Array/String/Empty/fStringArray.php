<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tStringArray as tStringArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``String Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fStringArray extends tStringArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
