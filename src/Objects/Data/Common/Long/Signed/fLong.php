<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tLong as tLong;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Signed Long``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fLong extends tLong implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
