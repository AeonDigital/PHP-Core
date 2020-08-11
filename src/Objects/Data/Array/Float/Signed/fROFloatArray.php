<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tROFloatArray as tROFloatArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``ReadOnly Signed Float Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fROFloatArray extends tROFloatArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
