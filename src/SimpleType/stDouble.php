<?php

declare(strict_types=1);

namespace AeonDigital\SimpleType;

use AeonDigital\SimpleType\Abstracts\aFloat as aFloat;







/**
 * Definições para o tipo ``double`` (float 64 bits).
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stDouble extends aFloat
{





    /**
     * Retorna o menor valor possível para o tipo definido.
     *
     * @return      float
     */
    public static function min(): float
    {
        return (float)-9223372036854775807;
    }


    /**
     * Retorna o maior valor possível para o tipo definido.
     *
     * @return      float
     */
    public static function max(): float
    {
        return (float)9223372036854775806;
    }
}
