<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Types\iUReal as iUReal;
use AeonDigital\Objects\Standart\Abstracts\aNumericReal as aNumericReal;
use AeonDigital\Objects\Realtype as Realtype;






/**
 * ``Standart Unsigned Real`` (números reais).
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class tUReal extends aNumericReal implements iUReal
{
    protected static Realtype $stdMIN;
    protected static Realtype $stdMAX;
    protected static Realtype $stdNULL;
}
