<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Types;

use AeonDigital\Interfaces\Objects\Standart\Types\iUDateTime as iUDateTime;
use AeonDigital\Objects\Standart\Abstracts\aDateTime as aDateTime;







/**
 * ``Standart Unsigned DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class tUDateTime extends aDateTime implements iUDateTime
{
    protected static \DateTime $stdMIN;
    protected static \DateTime $stdMAX;
    protected static \DateTime $stdNULL;
}
