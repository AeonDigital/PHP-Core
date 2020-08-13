<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPNumericInteger as iPNumericInteger;








/**
 * ``Primitive Standart Int`` (inteiro de 32 bits).
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPInt extends iPNumericInteger
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa da classe ou interface.
     *
     * @var         string
     */
    const TYPE = "Int";
}
