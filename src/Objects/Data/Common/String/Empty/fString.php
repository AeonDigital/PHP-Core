<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tString as tString;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``String``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fString extends tString implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
