<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Standart\Abstracts;

use AeonDigital\Interfaces\Objects\iStandartType as iStandartType;
use AeonDigital\Objects\Tools as Tools;







/**
 * Classe abstrata básica para a criação de classes concretas
 * do tipo ``Standart``.
 *
 * @package     AeonDigital\Objects\Standart
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aStandartType implements iStandartType
{



    /**
     * Valor da instância.
     *
     * @var         mixed
     */
    protected $value = null;





    /**
     * Informa se esta instância é ``nullable``.
     *
     * @var         bool
     */
    protected bool $nullable = false;
    /**
     * Informa se esta instância é ``nullable``.
     *
     * @return      bool
     */
    public function isNullable() : bool
    {
        return $this->nullable;
    }



    /**
     * Informa se esta instância é ``readonly``.
     *
     * @var         bool
     */
    protected bool $readonly = false;
    /**
     * Informa se esta instância é ``readonly``.
     *
     * Quando ``true``, após a criação da instância nenhum outro valor poderá
     * ser definido para a mesma
     *
     * @return      bool
     */
    public function isReadOnly() : bool
    {
        return $this->readonly;
    }



    /**
     * Informa se esta instância está ``undefined``.
     *
     * @var         bool
     */
    protected bool $undefined = true;
    /**
     * Informa se esta instância está ``undefined``.
     * Significa que ela nunca recebeu um valor de forma explicita.
     *
     * @return      bool
     */
    public function isUndefined() : bool
    {
        return $this->undefined;
    }



    /**
     * Define um novo valor para a instância.
     *
     * @param       mixed $v
     *              Valor a ser atribuido.
     *
     * @param       bool $throws
     *              Indica se deve criar uma exception caso o valor seja inválido.
     *
     * @param       ?string $err
     *              Informa o tipo de erro que impediu que o valor fosse atribuido.
     *
     * @return      bool
     *              Retornará ``true`` caso o valor tenha sido aceito e ``false``
     *              caso contrário.
     */
    public function set($v, bool $throws = true, ?string &$err = null) : bool
    {
        $r = false;

        if ($this->readonly === true) {
            $err = "error.std.type.readonly";
        }
        else {
            $n = static::parseIfValidate($v, $this->nullable, false, $err);
            if ($err !== null) {
                if ($throws === true) {
                    $nullable = (($this->nullable === true) ? "?" : "");
                    $className = \str_replace("AeonDigital\\Objects\\Standart\\", "", \get_class($this));
                    $class = $nullable . $className;
                    throw new \InvalidArgumentException("Invalid given value to instance of \"$class\"");
                }
            }
            else {
                $r = true;
                $this->value = $n;
                $this->undefined = false;
            }
        }

        return $r;
    }



    /**
     * Retorna o valor atualmente definido para a instância atual.
     *
     * @return      mixed
     */
    protected function stdGet()
    {
        return $this->value;
    }
    /**
     * Retorna o valor atualmente definido para a instância atual mas caso o
     * valor seja ``null``, retornará o valor definido em ``static::nullEquivalent()``.
     *
     * @return      mixed
     */
    protected function stdGetNotNull()
    {
        return ($this->value ?? static::nullEquivalent());
    }




    /**
     * Inicia uma nova instância.
     *
     * O valor inicial é sempre aquele definido em ``static::nullEquivalent()``.
     *
     * @param       mixed $v
     *              Valor inicial.
     *              Se o valor atribuido for inválido, será mantido como
     *              ``static::nullEquivalent()`` exceto se a instância for definida como
     *              ``nullable``. Neste caso será usado o valor inicial ``null``.
     *
     * @param       bool $nullable
     *              Quando ``true`` esta instância aceitará ``null`` como um valor válido.
     *
     * @param       bool $readonly
     *              Quando ``true`` indica que esta instância não poderá ter seu valor
     *              alterado após a inicialização.
     *
     * @param       bool $throws
     *              Indica se deve criar uma exception caso o valor seja inválido.
     *
     * @param       ?string $err
     *              Informa o tipo de erro que impediu que o valor fosse atribuido.
     */
    function __construct(
        $v = undefined,
        bool $nullable = false,
        bool $readonly = false,
        bool $throws = true,
        ?string &$err = null
    ) {
        $this->value = static::nullEquivalent();

        $this->nullable = $nullable;
        if ($v !== undefined && $this->set($v, $throws, $err) === false && $nullable === true) {
            $this->value = null;
        }

        $this->readonly = $readonly;
    }










    /**
     * Tenta efetuar a conversão do valor indicado para o tipo ``string``.
     * Caso não seja possível converter o valor, retorna ``null``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @return      ?string
     */
    public static function toString($v) : ?string
    {
        if (static::validate($v) === true) {
            if (static::TYPE === "Bool") { $v = Tools::toBool($v); }
            return Tools::toString($v);
        }
        return null;
    }




    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * A não ser que seja explicitado o contrário, o valor ``null`` não será aceito.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @param       bool $nullable
     *              Quando ``true`` indica que o valor ``null`` é válido para este tipo.
     *
     * @return      bool
     */
    public static function validate($v, bool $nullable = false) : bool
    {
        if ($v === null && $nullable === true) {
            return true;
        }
        else {
            $n = static::stdTryParseForThisType($v);
            if ($n === null) {
                return false;
            }
            else {
                return ((static::HAS_LIMIT_RANGE === false) ? true : static::validateRange($n));
            }
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
     * @param       bool $nullable
     *              Quando ``true`` indica que o valor ``null`` é válido para este tipo
     *              e não será convertido.
     *
     * @param       bool $nullEquivalent
     *              Quando ``true``, converterá ``null`` para o valor existente em
     *              ``static::nullEquivalent()``. Se ``$nullable`` for definido esta opção
     *              será ignorada.
     *
     * @param       ?string $err
     *              Código do erro da validação.
     *
     * @return      mixed
     */
    public static function parseIfValidate(
        $v,
        bool $nullable = false,
        bool $nullEquivalent = false,
        ?string &$err = null
    ) {
        $err = null;

        if ($v === null) {
            if ($nullable === false) {
                if ($nullEquivalent === true) {
                    $v = static::nullEquivalent();
                }
                else {
                    $err = "error.std.type.not.nullable";
                }
            }
        }
        else {
            $n = static::stdTryParseForThisType($v);
            if ($n === null) {
                $err = "error.std.type.unexpected";
            } else {
                if (static::validateRange($n) === false) {
                    $err = "error.std.value.out.of.range";
                }
                else {
                    $v = $n;
                }
            }
        }

        return $v;
    }










    /**
     * Verifica se o valor informado está entre o intervalo definido para este tipo.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    protected static function validateRange($v) : bool
    {
        return (static::HAS_LIMIT_RANGE === false || ($v >= static::min() && $v <= static::max()));
    }
    /**
     * Retorna o nome do método a ser usado para efetuar a tentativa de conversão
     * de um dado em outro tipo.
     *
     * O método informado deve existir em ``AeonDigital\Objects\Tools``
     *
     * @return      string
     */
    protected static function stdGetToolsTryParserForThisType() : string
    {
        $r = "";

        switch(static::TYPE) {
            case "Bool":
                $r = "toBool";
                break;

            case "Byte":
            case "Short":
            case "Int":
            case "Long":
                $r = "toInt";
                break;

            case "Float":
            case "Double":
                $r = "toFloat";
                break;

            case "DateTime":
                $r = "toDateTime";
                break;

            case "AeonDigital\Objects\Realtype":
                $r = "toRealtype";
                break;

            case "String":
                $r = "toString";
                break;
        }

        return $r;
    }
    /**
     * Tenta converter o tipo do valor passado para o tipo atual desta classe.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $v
     *              valor que será convertido.
     *
     * @return      ?bool
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    protected static function stdTryParseForThisType($v)
    {
        $toType = static::stdGetToolsTryParserForThisType();
        return Tools::$toType($v);
    }
}
