<?php
declare (strict_types=1);

namespace AeonDigital\SimpleType;

use AeonDigital\SimpleType\Abstracts\aInt as aInt;
use AeonDigital\Tools as Tools;







/**
 * Definições para o tipo ``int`` (integer 32 bits).
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stInt extends aInt
{





    /**
     * Retorna o menor valor possível para o tipo definido.
     *
     * @return      int
     */
    public static function min() : int
    {
        return (int)-2147483648;
    }


    /**
     * Retorna o maior valor possível para o tipo definido.
     *
     * @return      int
     */
    public static function max() : int
    {
        return (int)2147483647;
    }
}
