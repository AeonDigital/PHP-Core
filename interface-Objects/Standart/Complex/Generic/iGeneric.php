<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Complex;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPGeneric as iPGeneric;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNotNullable as iNotNullable;






/**
 * ``Standart Generic``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iGeneric extends iPGeneric, iReadWrite, iNotNullable
{
}
