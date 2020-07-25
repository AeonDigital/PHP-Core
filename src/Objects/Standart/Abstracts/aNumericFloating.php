<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Objects\Standart\Abstracts\aNumeric as aNumeric;








/**
 * Extende a classe ``aNumeric`` para atender a interface ``iNumericFloating``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericFloating extends aNumeric
{



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?float
     */
    public function get() : ?float
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      float
     */
    public function getNotNull() : float
    {
        return parent::stdGetNotNull();
    }










    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      float
     */
    public static function nullEquivalent() : float
    {
        return 0.0;
    }
}
