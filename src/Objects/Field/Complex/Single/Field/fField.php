<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Field\Complex;

use AeonDigital\Objects\Types\Complex\tField as tField;
use AeonDigital\Interfaces\Objects\iField as iField;







/**
 * Campo ``Field``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fField extends tField implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldCommomConstructor;
}
