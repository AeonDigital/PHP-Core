<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tURealArray as tURealArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Unsigned Real Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fURealArray extends tURealArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
