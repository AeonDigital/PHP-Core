<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Interfaces\Objects\Standart\iBool as iBool;
use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;







/**
 * Define um ``Standart`` para o tipo ``bool``
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdBool extends aStandart implements iBool
{



    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      bool
     */
    public static function nullEquivalent() : bool
    {
        return false;
    }
    /**
     * Retorna o menor valor possível para este tipo.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      null
     */
    public static function min()
    {
        return null;
    }
    /**
     * Retorna o maior valor possível para este tipo.
     * Quando ``null`` indica que não há limites definidos ou que isto não se aplica
     * para o tipo indicado.
     *
     * @return      null
     */
    public static function max()
    {
        return null;
    }
}
