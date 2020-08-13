<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\iStandart as iStandart;








/**
 * ``Primitive Standart Numeric``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPNumeric extends iStandart
{



    /**
     * Indica quando um tipo ``string`` aceitar ``""`` como válido.
     *
     * @var         ?bool
     */
    const EMPTY = null;
    /**
     * Indica quando trata-se de um tipo que possui um valor mínimo e máximo para limitar
     * seus valores aceitáveis. Em tipos ``string`` indica que há um limite mínimo e um
     * máximo de caracteres esperados para que o tipo seja válido.
     *
     * @var         bool
     */
    const HAS_LIMIT = true;
    /**
     * Representação em ``string`` do valor que o tipo deve considerar equivalente a ``null``.
     *
     * @var         ?string
     */
    const NULL_EQUIVALENT = "0";
}
