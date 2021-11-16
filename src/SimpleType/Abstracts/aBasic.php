<?php
declare (strict_types=1);

namespace AeonDigital\SimpleType\Abstracts;

use AeonDigital\Interfaces\SimpleType\iBasic as iBasic;
use AeonDigital\Tools as Tools;







/**
 * Classe abstrata que fundamenta a construção de tipos simples.
 *
 * @package     AeonDigital\SimpleType
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aBasic implements iBasic
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
    abstract static function validate($v) : bool;



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
            return Tools::toString($v);
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
    abstract static function parseIfValidate($v, ?string &$err = null);





    /**
     * Efetua a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * Caso não passe na validação, retornará um código que identifica o erro ocorrido na
     * variável ``$err``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @param       ?string $err
     *              Código do erro da validação.
     *
     * @param       string $type
     *              Tipo que deve ser retornado.
     *
     * @return      mixed
     */
    protected static function parseTypeIfValidate($v, ?string &$err = null, string $type)
    {
        $err = null;
        if (static::validate($v) === false || $v === undefined) {
            $err = "error.st.unexpected.type";
        } else {
            switch (\strtolower($type)) {
                case "bool":
                    $v = Tools::toBool($v);
                    break;

                case "string":
                    $v = Tools::toString($v);
                    break;
            }

        }
        return $v;
    }
}
