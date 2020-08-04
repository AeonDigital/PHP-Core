<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Types\iNUDateTime as iNUDateTime;
use AeonDigital\Objects\Standart\Abstracts\aDateTime as aDateTime;







/**
 * ``Standart Nullable Unsigned DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class tNUDateTime extends aDateTime implements iNUDateTime
{
    protected static \DateTime $stdMIN;
    protected static \DateTime $stdMAX;
    protected static \DateTime $stdNULL;
}
