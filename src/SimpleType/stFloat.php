<?php
declare (strict_types=1);

namespace AeonDigital\SimpleType;

use AeonDigital\SimpleType\Abstracts\aFloat as aFloat;
use AeonDigital\Tools as Tools;







/**
 * Definições para o tipo ``float`` (float 32 bits).
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stFloat extends aFloat
{





    /**
     * Retorna o menor valor possível para o tipo definido.
     *
     * @return      float
     */
    public static function min() : float
    {
        return (float)-2147483648;
    }


    /**
     * Retorna o maior valor possível para o tipo definido.
     *
     * @return      float
     */
    public static function max() : float
    {
        return (float)2147483647;
    }
}
