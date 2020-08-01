<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iDouble as iDouble;
use AeonDigital\Objects\Standart\Abstracts\aNumericFloating as aNumericFloating;







/**
 * Define um ``Standart`` para o tipo ``double`` (flutuante de 64 bits).
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdDouble extends aNumericFloating implements iDouble
{



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      float
     */
    public static function getMin() : float
    {
        return (float)-9223372036854775807;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      float
     */
    public static function getMax() : float
    {
        return (float)9223372036854775806;
    }
}
