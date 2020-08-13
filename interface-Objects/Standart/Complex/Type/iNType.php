<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Complex;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPType as iPType;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadWrite as iReadWrite;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart Nullable Type``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iNType extends iPType, iReadWrite, iNullable
{
}
