<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Objects\Standart\Abstracts\aInt as aInt;
use AeonDigital\Objects\Tools as Tools;







/**
 * Define um ``Standart do tipo byte`` (inteiro de 8 bits).
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdByte extends aInt
{
    /**
     * Nome deste tipo.
     * Namespace completa para quando tratar-se de uma classe.
     */
    const TYPE = "Byte";



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      int
     */
    public static function min() : int
    {
        return (int)-128;
    }



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      int
     */
    public static function max() : int
    {
        return (int)127;
    }
}
