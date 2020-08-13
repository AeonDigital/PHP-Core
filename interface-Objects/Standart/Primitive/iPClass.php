<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\iStandart as iStandart;








/**
 * ``Primitive Standart Class``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPClass extends iStandart
{



    /**
     * Indica quando o tipo é representado por uma classe ou namespace.
     *
     * @var         bool
     */
    const IS_CLASS = true;



    /**
     * Indica quando trata-se de um valor numérico que ACEITA valores negativos.
     *
     * @var         ?bool
     */
    const SIGNED = null;
    /**
     * Indica quando trata-se de um valor numérico que NÃO ACEITA valores negativos.
     *
     * @var         ?bool
     */
    const UNSIGNED = null;
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
    const HAS_LIMIT = false;
    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo ou do número
     * mínimo de caracteres aceitos.
     *
     * @var         ?string
     */
    const MIN = null;
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
    const NULL_EQUIVALENT = null;
}
