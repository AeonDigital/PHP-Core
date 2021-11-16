<?php
declare (strict_types=1);

namespace AeonDigital\SimpleType;

use AeonDigital\Interfaces\SimpleType\iBool as iBool;
use AeonDigital\SimpleType\Abstracts\aBasic as aBasic;
use AeonDigital\Tools as Tools;






/**
 * Definições para o tipo ``bool``.
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class stBool extends aBasic implements iBool
{




    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    public static function validate($v) : bool
    {
        return (Tools::toBool($v) !== null);
    }



    /**
     * Tenta efetuar a conversão do valor indicado para o tipo ``string``. Caso não
     * seja possível converter o valor, retorna ``null``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @return      ?string
     */
    public static function toString($v) : ?string
    {
        if (static::validate($v) === true) {
            $b = Tools::toBool($v);
            return Tools::toString($b);
        } else {
            return null;
        }
    }



    /**
     * Efetuará a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * Caso não passe retornará um código que identifica o erro ocorrido na variável
     * ``$err``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @param       ?string $err
     *              Código do erro da validação.
     *
     * @return      mixed
     */
    public static function parseIfValidate($v, ?string &$err = null)
    {
        return static::parseTypeIfValidate($v, $err, "bool");
    }
}
