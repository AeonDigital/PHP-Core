<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tShort as tShort;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Signed Short``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fShort extends tShort implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
