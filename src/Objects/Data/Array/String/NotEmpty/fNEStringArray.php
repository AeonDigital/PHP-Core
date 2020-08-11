<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tNEStringArray as tNEStringArray;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Not Empty String Array``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fNEStringArray extends tNEStringArray implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
