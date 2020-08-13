<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPReal as iPReal;
use AeonDigital\Interfaces\Objects\Standart\Flag\iSigned as iSigned;







/**
 * ``Primitive Standart Signed Real`` (números reais).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPRealSigned extends iPReal, iSigned
{



    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     *
     * @var         string
     */
    const MIN = "-999999999999999999999999999999999999";
    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     *
     * @var         string
     */
    const MAX = "999999999999999999999999999999999999";
}
