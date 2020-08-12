<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Commom;

use AeonDigital\Interfaces\Objects\Standart\Commom\iRODateTime as iRODateTime;
use AeonDigital\Objects\Standart\Abstracts\aDateTime as aDateTime;







/**
 * ``Standart ReadOnly DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class scRODateTime extends aDateTime implements iRODateTime
{
    protected static \DateTime $stdMIN;
    protected static \DateTime $stdMAX;
    protected static \DateTime $stdNULL;
}
