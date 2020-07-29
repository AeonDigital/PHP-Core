<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iFloat as iFloat;
use AeonDigital\Objects\Types\Abstracts\aNumericFloating as aNumericFloating;
use AeonDigital\Objects\Standart\stdFloat as stdFloat;






/**
 * Classe concreta para o tipo ``float`` (flutuante de 32 bits).
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpFloat extends aNumericFloating implements iFloat
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function standart() : string
    {
        return stdFloat::class;
    }
}
