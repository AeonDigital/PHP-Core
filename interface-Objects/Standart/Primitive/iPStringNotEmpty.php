<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPString as iPString;








/**
 * ``Primitive Standart Not Empty String``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPStringNotEmpty extends iPString
{



    /**
     * Indica quando um tipo ``string`` aceitar ``""`` como válido.
     *
     * @var         ?bool
     */
    const EMPTY = false;



    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo ou do número
     * mínimo de caracteres aceitos.
     *
     * @var         ?string
     */
    const MIN = "1";
    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo ou do número
     * máximo de caracteres aceitos.
     *
     * @var         ?string
     */
    const MAX = null;
    /**
     * Representação em ``string`` do valor que o tipo deve considerar equivalente a ``null``.
     *
     * @var         ?string
     */
    const NULL_EQUIVALENT = " ";
}
