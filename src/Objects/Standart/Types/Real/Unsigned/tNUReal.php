<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Types\iNUReal as iNUReal;
use AeonDigital\Objects\Standart\Abstracts\aNumericReal as aNumericReal;
use AeonDigital\Objects\Realtype as Realtype;






/**
 * ``Standart Nullable Unsigned Real`` (números reais).
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class tNUReal extends aNumericReal implements iNUReal
{
    protected static Realtype $stdMIN;
    protected static Realtype $stdMAX;
    protected static Realtype $stdNULL;
}
