<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data\Field;

use AeonDigital\Objects\Types\tBool as tBool;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Bool``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fBool extends tBool implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldCommomConstructor;
}
