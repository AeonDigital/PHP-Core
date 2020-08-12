<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Commom;

use AeonDigital\Interfaces\Objects\Standart\Commom\iNDateTime as iNDateTime;
use AeonDigital\Objects\Standart\Abstracts\aDateTime as aDateTime;







/**
 * ``Standart Nullable DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class scNDateTime extends aDateTime implements iNDateTime
{
    protected static \DateTime $stdMIN;
    protected static \DateTime $stdMAX;
    protected static \DateTime $stdNULL;
}
