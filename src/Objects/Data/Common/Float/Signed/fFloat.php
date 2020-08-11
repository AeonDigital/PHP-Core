<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tFloat as tFloat;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Signed Float``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fFloat extends tFloat implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
