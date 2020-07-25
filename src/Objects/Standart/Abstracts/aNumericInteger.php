<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Objects\Standart\Abstracts\aNumeric as aNumeric;








/**
 * Extende a classe ``aNumeric`` para atender a interface ``iNumericInteger``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericInteger extends aNumeric
{



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      ?int
     */
    public function get() : ?int
    {
        return parent::stdGet();
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      int
     */
    public function getNotNull() : int
    {
        return parent::stdGetNotNull();
    }










    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      int
     */
    public static function nullEquivalent() : int
    {
        return 0;
    }
}
