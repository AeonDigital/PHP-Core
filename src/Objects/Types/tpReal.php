<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iReal as iReal;
use AeonDigital\Objects\Types\Abstracts\aNumericReal as aNumericReal;
use AeonDigital\Objects\Standart\stdReal as stdReal;






/**
 * Classe concreta para o tipo ``Realtype``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpReal extends aNumericReal implements iReal
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function standart() : string
    {
        return stdReal::class;
    }
}
