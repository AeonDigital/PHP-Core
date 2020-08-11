<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tIntArray as tIntArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Signed Int Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fIntArray extends tIntArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
