<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iDouble as iDouble;
use AeonDigital\Objects\Types\Abstracts\aNumericFloating as aNumericFloating;
use AeonDigital\Objects\Standart\stdDouble as stdDouble;






/**
 * Classe concreta para o tipo ``double`` (flutuante de 64 bits).
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpDouble extends aNumericFloating implements iDouble
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function standart() : string
    {
        return stdDouble::class;
    }
}
