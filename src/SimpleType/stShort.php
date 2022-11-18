<?php

declare(strict_types=1);

namespace AeonDigital\SimpleType;

use AeonDigital\SimpleType\Abstracts\aInt as aInt;







/**
 * Definições para o tipo ``short`` (integer 16 bits).
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stShort extends aInt
{





    /**
     * Retorna o menor valor possível para o tipo definido.
     *
     * @return int
     */
    public static function min(): int
    {
        return (int)-32768;
    }


    /**
     * Retorna o maior valor possível para o tipo definido.
     *
     * @return int
     */
    public static function max(): int
    {
        return (int)32767;
    }
}
