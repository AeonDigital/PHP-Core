<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\tReal as tReal;
use AeonDigital\Interfaces\Objects\Data\iField as iField;







/**
 * Campo ``Signed Real``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class fReal extends tReal implements iField
{
    use \AeonDigital\Objects\Traits\FieldMethods;
}
