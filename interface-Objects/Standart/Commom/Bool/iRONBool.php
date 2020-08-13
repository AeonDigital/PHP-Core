<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Commom;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPBool as iPBool;
use AeonDigital\Interfaces\Objects\Standart\Flag\iReadOnly as iReadOnly;
use AeonDigital\Interfaces\Objects\Standart\Flag\iNullable as iNullable;






/**
 * ``Standart ReadOnly Nullable Bool``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iRONBool extends iPBool, iReadOnly, iNullable
{
}
