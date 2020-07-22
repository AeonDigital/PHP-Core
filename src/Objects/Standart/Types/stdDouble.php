<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Types;

use AeonDigital\Objects\Standart\Types\Abstracts\aFloat as aFloat;
use AeonDigital\Objects\Tools as Tools;







/**
 * Define um ``Standart\Types do tipo double`` (flutuante de 64 bits).
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdDouble extends aFloat
{



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      float
     */
    public static function min() : float
    {
        return (float)-9223372036854775807;
    }



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      float
     */
    public static function max() : float
    {
        return (float)9223372036854775806;
    }
}
