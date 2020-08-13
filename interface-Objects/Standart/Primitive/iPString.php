<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects\Standart\Primitive;

use AeonDigital\Interfaces\Objects\iStandart as iStandart;








/**
 * ``Primitive Standart String``.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iPString extends iStandart
{



    /**
     * Nome deste tipo
     * OU
     * Namespace completa da classe ou interface.
     *
     * @var         string
     */
    const TYPE = "String";



    /**
     * Indica quando o tipo é representado por uma classe ou namespace.
     *
     * @var         bool
     */
    const IS_CLASS = false;



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
     * Indica quando trata-se de um tipo que possui um valor mínimo e máximo para limitar
     * seus valores aceitáveis. Em tipos ``string`` indica que há um limite mínimo e um
     * máximo de caracteres esperados para que o tipo seja válido.
     *
     * @var         bool
     */
    const HAS_LIMIT = true;






    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      int
     */
    static function getMin() : int;
    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      int
     */
    static function getMax() : int;
    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      string
     */
    static function getNullEquivalent() : string;
}
