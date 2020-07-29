<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Types;

use AeonDigital\Interfaces\Objects\Types\iDateTime as iDateTime;
use AeonDigital\Objects\Types\Abstracts\aGeneralDateTime as aGeneralDateTime;
use AeonDigital\Objects\Standart\stdDateTime as stdDateTime;






/**
 * Classe concreta para o tipo ``DateTime``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class tpDateTime extends aGeneralDateTime implements iDateTime
{



    /**
     * Retorna o namespace completo da classe ``Standart`` que
     * define esta instância.
     *
     * @return      string
     */
    public static function standart() : string
    {
        return stdDateTime::class;
    }
}
