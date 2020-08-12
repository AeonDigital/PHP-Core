<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Field\Commom;

use AeonDigital\Objects\Types\Commom\tNUReal as tNUReal;
use AeonDigital\Interfaces\Objects\iField as iField;







/**
 * Campo ``Nullable Unsigned Real``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fNUReal extends tNUReal implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
    use \AeonDigital\Objects\Traits\FieldCommomConstructor;
}
