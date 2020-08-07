<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\SType;

use AeonDigital\Interfaces\Objects\Standart\SType\iDateTime as iDateTime;
use AeonDigital\Objects\Standart\Abstracts\aDateTime as aDateTime;







/**
 * ``Standart DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stDateTime extends aDateTime implements iDateTime
{
    protected static \DateTime $stdMIN;
    protected static \DateTime $stdMAX;
    protected static \DateTime $stdNULL;
}
