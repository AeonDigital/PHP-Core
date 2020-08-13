<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\iStandart as iStandart;
use AeonDigital\Interfaces\Objects\Standart\Flag\iUnsigned as iUnsigned;







/**
 * ``Primitive Standart DateTime``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPDateTime extends iStandart, iUnsigned
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa para quando tratar-se de uma classe ou interface.
     *
     * @var         string
     */
    const TYPE = "DateTime";



    /**
     * Indica quando o tipo é representado por uma classe ou namespace.
     *
     * @var         bool
     */
    const IS_CLASS = true;



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
    const NULL_EQUIVALENT = "0000-01-01 00:00:00";
    /**
     * Representação em ``string`` do valor mínimo aceitável para este tipo.
     *
     * @var         string
     */
    const MIN = "0000-01-01 00:00:00";
    /**
     * Representação em ``string`` do valor máximo aceitável para este tipo.
     *
     * @var         string
     */
    const MAX = "9999-12-31 23:59:59";








    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      \DateTime
     */
    static function getNullEquivalent() : \DateTime;



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      \DateTime
     */
    static function getMin() : \DateTime;



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      \DateTime
     */
    static function getMax() : \DateTime;
}
