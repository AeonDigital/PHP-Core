<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tNDateTimeArray as tNDateTimeArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Nullable DateTime Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fNDateTimeArray extends tNDateTimeArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
