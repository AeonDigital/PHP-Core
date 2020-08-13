<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;

use AeonDigital\Interfaces\Objects\iField as iField;
use AeonDigital\Interfaces\Objects\iTypeArray as iTypeArray;








/**
 * Expande um ``iTypeArray`` para que ele possa ser utilizado
 * como um ``array`` de tipos ``iField``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iFieldArray extends iField, iTypeArray
{
}
