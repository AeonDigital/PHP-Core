<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iFloat as iFloat;
use AeonDigital\Objects\Standart\Abstracts\aNumericFloating as aNumericFloating;







/**
 * Define um ``Standart`` para o tipo ``float`` (flutuante de 32 bits).
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdFloat extends aNumericFloating implements iFloat
{



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      float
     */
    public static function getMin() : float
    {
        return (float)-2147483648;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      float
     */
    public static function getMax() : float
    {
        return (float)2147483647;
    }
}
