<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;








/**
 * Extende a classe ``aStandart`` para atender tipos numéricos inteiros.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericInteger extends aStandart
{



    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      int
     */
    public static function getNullEquivalent() : int
    {
        return 0;
    }
}
