<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart;

use AeonDigital\Objects\Standart\Abstracts\aFloat as aFloat;
use AeonDigital\Objects\Tools as Tools;







/**
 * Define um ``Standart do tipo float`` (flutuante de 32 bits).
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stdFloat extends aFloat
{
    /**
     * Nome deste tipo.
     * Namespace completa para quando tratar-se de uma classe.
     */
    const TYPE = "Float";



    /**
     * Retorna o menor valor possível para este tipo.
     *
     * @return      float
     */
    public static function min() : float
    {
        return (float)-2147483648;
    }



    /**
     * Retorna o maior valor possível para este tipo.
     *
     * @return      float
     */
    public static function max() : float
    {
        return (float)2147483647;
    }
}
