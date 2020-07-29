<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Objects\Standart\Abstracts\aStandart as aStandart;
use AeonDigital\Objects\Realtype as Realtype;







/**
 * Extende a classe ``aStandart`` para atender tipos numéricos reais.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumericReal extends aStandart
{



    /**
     * Data compatível com o valor ``null`` para fins de comparação
     *
     * @var         Realtype
     */
    private static Realtype $stdNull;
    /**
     * Indica qual valor (para este tipo) deve ser considerado equivalente a ``null``
     * para fins de comparação.
     *
     * @return      Realtype
     */
    public static function nullEquivalent() : Realtype
    {
        if (isset(self::$stdNull) === false) {
            self::$stdNull = new Realtype("0");
        }
        return self::$stdNull;
    }





    /**
     * Menor valor possível aceito como válida.
     *
     * @var         Realtype
     */
    protected static Realtype $stdMin;
    /**
     * Maior valor possível aceito como válida.
     *
     * @var         Realtype
     */
    protected static Realtype $stdMax;





    /**
     * Verifica se o valor informado está entre o intervalo definido para este tipo.
     *
     * @param       Realtype $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    protected static function validateRange($v) : bool
    {
        return ($v->isGreaterOrEqualAs(static::min()) === true &&
                $v->isLessOrEqualAs(static::max()) === true);
    }
}