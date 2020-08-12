<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Commom;

use AeonDigital\Interfaces\Objects\Standart\Commom\iRONDateTime as iRONDateTime;
use AeonDigital\Objects\Standart\Abstracts\aDateTime as aDateTime;







/**
 * ``Standart ReadOnly Nullable DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class scRONDateTime extends aDateTime implements iRONDateTime
{
    protected static \DateTime $stdMIN;
    protected static \DateTime $stdMAX;
    protected static \DateTime $stdNULL;
}