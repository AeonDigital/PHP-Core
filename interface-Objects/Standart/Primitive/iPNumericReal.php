<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\Standart\Primitive\iPNumeric as iPNumeric;
use AeonDigital\Objects\Realtype as Realtype;







/**
 * ``Primitive Standart Numeric Real``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPNumericReal extends iPNumeric
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa para quando tratar-se de uma classe ou interface.
     *
     * @var         string
     */
    const TYPE = "AeonDigital\Objects\Realtype";



    /**
     * Indica quando o tipo é representado por uma classe ou namespace.
     *
     * @var         bool
     */
    const IS_CLASS = true;





    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      Realtype
     */
    static function getMin() : Realtype;
    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      Realtype
     */
    static function getMax() : Realtype;
    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      Realtype
     */
    static function getNullEquivalent() : Realtype;
}
