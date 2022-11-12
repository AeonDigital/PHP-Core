<?php

declare(strict_types=1);

namespace AeonDigital;

use AeonDigital\Realtype as Realtype;








/**
 * Coleção de métodos estáticos para diversos fins.
 *
 * @package     AeonDigital
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class Tools
{






    /**
     * Retorna o tipo ``scalar`` do objeto passado.
     * Se não for um objeto do tipo ``scalar`` retornará ``null`` .
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      ?string
     */
    public static function getScalarType(mixed $o): ?string
    {
        $r = null;

        if ($o === null) {
            $r = "null";
        } elseif (\is_bool($o) === true) {
            $r = "bool";
        } elseif (\is_int($o) === true) {
            $r = "int";
        } elseif (\is_float($o) === true) {
            $r = "float";
        } elseif (\is_string($o) === true) {
            $r = "string";
        } elseif (\is_array($o) === true) {
            $r = "array";
        }

        return $r;
    }
    /**
     * Verifica se o objeto passado corresponde ao tipo esperado.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @param       string $type
     *              Nome do tipo a ser testado.
     *              Esperado um dos seguintes: null | bool | int | float | string | array
     *
     * @return      bool
     */
    public static function isScalarType(mixed $o, string $type): bool
    {
        return (self::getScalarType($o) === \mb_strtolower($type));
    }
    /**
     * Identifica se o objeto passado é um tipo ``scalar``.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isScalar(mixed $o): bool
    {
        return (self::getScalarType($o) !== null);
    }





    /**
     * Verifica se o objeto passado é do tipo ``null``.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isNull(mixed $o): bool
    {
        return ($o === null);
    }
    /**
     * Verifica se o objeto passado é do tipo ``bool``.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isBool(mixed $o): bool
    {
        return (\is_bool($o) === true);
    }
    /**
     * Verifica se o objeto passado é do tipo ``int`` ou ``float`` ou ainda se trata-se
     * de uma ``string`` numérica.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isNumeric(mixed $o): bool
    {
        return ((\is_int($o) === true) || (\is_float($o) === true) || (\is_numeric($o) === true));
    }
    /**
     * Verifica se o objeto passado é do tipo ``int``.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isInt(mixed $o): bool
    {
        return (\is_int($o) === true);
    }
    /**
     * Verifica se o objeto passado é do tipo ``float``.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isFloat(mixed $o): bool
    {
        return (\is_float($o) === true);
    }
    /**
     * Verifica se o objeto passado é do tipo ``string``.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isString(mixed $o): bool
    {
        return (\is_string($o) === true);
    }
    /**
     * Verifica se o objeto passado é do tipo ``array``.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isArray(mixed $o): bool
    {
        return (\is_array($o) === true);
    }
    /**
     * Verifica se o objeto passado um ``array`` associativo.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isArrayAssoc(mixed $o): bool
    {
        return (\array_is_assoc($o) === true);
    }
    /**
     * Verifica se o objeto passado é do tipo ``DateTime``.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isDateTime(mixed $o): bool
    {
        return (\is_a($o, "\DateTime") === true);
    }
    /**
     * Verifica se o objeto passado é do tipo ``Realtype``.
     *
     * @param       mixed $o
     *              Objeto que será verificado.
     *
     * @return      bool
     */
    public static function isRealtype(mixed $o): bool
    {
        return (\is_a($o, "AeonDigital\\Realtype") === true);
    }










    /**
     * Tenta converter o tipo do valor passado para ``bool``.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *
     * @example     Exemplos de conversão:
     *                  True = true; yes; 1; on.
     *                  False = false; no; 0; off
     *
     * @return      ?bool
     *              Retornará o valor booleano correspondente ao originalmente passado.
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    public static function toBool(mixed $o): ?bool
    {
        if (\is_bool($o) === true) {
            return $o;
        } else {
            if (\is_int($o) === true || \is_float($o) === true) {
                return ($o === 0) ? false : true;
            } elseif (\is_string($o) === true) {
                switch (\mb_strtolower($o)) {
                    case "true":
                    case "yes":
                    case "1":
                    case "on":
                        return true;
                        break;

                    case "false":
                    case "no":
                    case "0":
                    case "off":
                        return false;
                        break;

                    default:
                        return null;

                        break;
                }
            } else {
                return null;
            }
        }
    }
    /**
     * Tenta converter o tipo do valor passado para ``number`` (seja ``int`` ou ``float``).
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *
     * @return      null|int|float
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    public static function toNumeric(mixed $o): null|int|float
    {
        if (\is_int($o) === true || \is_float($o) === true) {
            return $o;
        } else {
            if (\is_bool($o) === true) {
                return (int)$o;
            } elseif (\is_numeric($o) === true && $o !== "") {
                return ($o + 0);
            }

            return null;
        }
    }
    /**
     * Tenta converter o tipo do valor passado para ``int``.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * Números com ponto flutuante serão arredondados pela função ``intval``.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *
     * @return      ?int
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    public static function toInt(mixed $o): ?int
    {
        if (\is_int($o) === true || \is_float($o) === true) {
            return \intval($o);
        } else {
            if (\is_bool($o) === true) {
                return ($o) ? 1 : 0;
            } elseif (\is_numeric($o) === true && $o !== "") {
                return \intval($o + 0);
            }

            return null;
        }
    }
    /**
     * Tenta converter o tipo do valor passado para ``float``.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *
     * @return      ?float
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    public static function toFloat(mixed $o): ?float
    {
        $o = self::toNumeric($o);

        if (\is_numeric($o) === true) {
            return \floatval($o);
        }

        return $o;
    }
    /**
     * Tenta converter o tipo do valor passado para ``string``.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * Números de ponto flutuante serão convertidos e mantidos com no máximo 15 digitos
     * ao todo (parte inteira + parte decimal).
     * A parte decimal ficará com : (15 - (número de digitos da parte inteira)) casas.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *
     * @return      ?string
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    public static function toString(mixed $o): ?string
    {
        if ($o === null) {
            return "";
        } elseif (\is_bool($o) === true) {
            return (($o === true) ? "1" : "0");
        } elseif (\is_int($o) === true) {
            return (string)$o;
        } elseif (\is_float($o) === true) {
            $int = \numeric_integer_part($o);
            $dec = 0.0;

            $tDec = (15 - \strlen((string)$int));
            if ($tDec > 0) {
                $dec = \numeric_decimal_part($o, $tDec);
            }

            if ($dec === 0.0) {
                return ((string)$int);
            } else {
                $dec = \str_replace("0.", "", (string)$dec);
                return ((string)($int . "." . $dec));
            }
        } elseif (\is_a($o, "AeonDigital\\Realtype") === true) {
            return $o->value();
        } elseif (\is_a($o, "\DateTime") === true) {
            return $o->format("Y-m-d H:i:s");
        } elseif (\is_string($o) === true && $o !== undefined) {
            return (string)$o;
        } elseif (\is_array($o) === true) {
            return \implode(" ", $o);
        } else {
            return null;
        }
    }
    /**
     * Tenta converter o tipo do valor passado para ``array``.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *
     * @return      ?array
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    public static function toArray(mixed $o): ?array
    {
        $r = null;

        if (self::isScalar($o) === true) {
            $r = (self::isArray($o) === true) ? $o : [$o];
        }

        return $r;
    }
    /**
     * Converte todos os valores do ``array`` passado para ``string`` e retorna um novo ``array``
     * contendo todos os valores convertidos. A conversão ocorre apenas entre valores escalares.
     *
     * Se ao menos 1 dos valores originais não for passível de ser convertido, então o
     * processamento falhará e ``null`` será retornado.
     *
     * @param       ?array $o
     *              Coleção de valores originais.
     *
     * @param       bool $force
     *              Indica se deve forçar a conversão de tipos não escalares.
     *              Neste caso será verificado se o objeto possui implementado o método mágico
     *              ``__toString`` e, caso positivo, irá utilizá-lo, senão, irá retornar o nome
     *              completo da classe a qual este objeto pertence.
     *
     * @return      ?array
     */
    public static function toArrayStr(?array $o, bool $force = false): ?array
    {
        $arr = null;

        if ($o !== null) {
            $arr = [];
            foreach ($o as $val) {
                if (self::isScalar($val) === true) {
                    $arr[] = self::toString($val);
                } elseif (\is_a($val, "\DateTime") === true) {
                    $arr[] = $val->format("Y-m-d H:i:s");
                } else {
                    if ($force === false) {
                        $arr = null;
                        break;
                    } else {
                        if ($val === null) {
                            $arr[] = "";
                        } elseif (\method_exists($val, "__toString") === true) {
                            $arr[] = (string)$val;
                        } else {
                            $arr[] = \get_class($val);
                        }
                    }
                }
            }
        }

        return $arr;
    }
    /**
     * Tenta converter o tipo do valor passado para ``DateTime``.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *              Para ser efetivamente processado, é esperado uma ``string`` ou
     *              um ``int``, correspondente a um **timestamp**.
     *
     * @param       string $format
     *              Se o valor original for uma ``string``, este parametro deve indicar qual
     *              formato que a data se encontra.
     *              Padrão é **Y-m-d H:i:s**
     *
     * @return      ?\DateTime
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     *
     *              Se passada uma string de data sem a parte ``time``, e, em ``$format`` também
     *              não existir definições para horários (H | i | s) a conversão assumirá
     *              o valor zero para cada uma destas posições.
     */
    public static function toDateTime(
        mixed $o,
        string $format = "Y-m-d H:i:s"
    ): ?\DateTime {
        $oR = null;

        if ($o !== undefined && $o !== "") {
            if ((\is_string($o) === true &&
                    \is_numeric($o) === true
                ) ||
                \is_float($o) === true
            ) {
                $o = (int)$o;
                $oR = new \DateTime();
                $oR->setTimestamp($o);
            } elseif (\is_string($o) === true) {
                $o = \str_replace("/", "-", $o);
                $format = \str_replace("/", "-", $format);


                // Infere partes faltantes de datas cujo formatos são padrões
                $l = \strlen($o);
                if ($format === "Y-m-d H:i:s" && $l < 19) {
                    switch ($l) {
                        case 4:
                            $o .= "-01-01 00:00:00";
                            break;
                        case 7:
                            $o .= "-01 00:00:00";
                            break;
                        case 10:
                            $o .= " 00:00:00";
                            break;
                        case 13:
                            $o .= ":00:00";
                            break;
                        case 16:
                            $o .= ":00";
                            break;
                    }
                } elseif ($format === "H:i:s" && $l < 8) {
                    switch ($l) {
                        case 2:
                            $o .= ":00:00";
                            break;
                        case 5:
                            $o .= ":00";
                            break;
                    }
                }


                $oR = \DateTime::createFromFormat($format, $o);
                if ($oR === false) {
                    $oR = null;
                } else {
                    // Um objeto "DateTime" criado com o método "createFromFormat" preenche cada
                    // componente da data com a informação do dia e hora atual.
                    // Abaixo, todos os componentes não expressamente definidos em ``$format``
                    // serão ``zerados`` conforme a data base 2000-01-01 00:00:00
                    $oR->setDate(
                        ((\strpos($format, "Y") === false &&
                            \strpos($format, "y") === false) ? 2000 : (int)$oR->format("Y")),
                        ((\strpos($format, "m") === false) ? 1 : (int)$oR->format("m")),
                        ((\strpos($format, "d") === false) ? 1 : (int)$oR->format("d"))
                    );
                    $oR->setTime(
                        ((\strpos($format, "H") === false &&
                            \strpos($format, "h") === false) ? 0 : (int)$oR->format("H")),
                        ((\strpos($format, "i") === false) ? 0 : (int)$oR->format("i")),
                        ((\strpos($format, "s") === false) ? 0 : (int)$oR->format("s"))
                    );
                }
            } elseif (\is_a($o, "\DateTime") === true) {
                $oR = $o;
            }
        }

        return $oR;
    }
    /**
     * Tenta converter o tipo do valor passado para uma ``DateTime string`` compatível com o
     * formato de saida escolhido.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *              Para ser efetivamente processado, é esperado um ``DateTime``, uma ``string`` ou
     *              um ``int``, correspondente a um **timestamp**.
     *
     * @param       string $inputFormat
     *              Se o valor original for uma ``string``, este parametro deve indicar qual
     *              formato que a data se encontra.
     *              Padrão é **Y-m-d H:i:s**.
     *
     * @param       string $outputFormat
     *              Formato ``DateTime string`` em que o valor deve ser retornado.
     *              Padrão é **Y-m-d H:i:s**.
     *
     * @return      ?string
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    public static function toDateTimeString(
        mixed $o,
        string $inputFormat = "Y-m-d H:i:s",
        string $outputFormat = "Y-m-d H:i:s"
    ): ?string {
        $oR = self::toDateTime($o, $inputFormat);
        if ($oR !== null) {
            $oR = $oR->format($outputFormat);
        }
        return $oR;
    }
    /**
     * Tenta converter o tipo do valor passado para ``Realtype``.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *
     * @return      ?Realtype
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    public static function toRealtype(mixed $o): ?Realtype
    {
        if (Realtype::isValidRealtype($o) === true) {
            return new Realtype($o);
        } else {
            return null;
        }
    }





    /**
     * Tenta converter o tipo do valor passado para uma ``string json``.
     * Apenas valores realmente compatíveis serão convertidos.
     *
     * @param       mixed $o
     *              Objeto que será convertido.
     *
     * @return      ?string
     *              Retornará ``null`` caso não seja possível efetuar a conversão.
     */
    public static function toJSON(mixed $o): ?string
    {
        $r = null;

        if ($o === null) {
            $r = "null";
        } elseif (\is_a($o, "\DateTime") === true) {
            $r = \json_encode($o->format("Y-m-d H:i:s"));
        } elseif (\is_a($o, "AeonDigital\\Realtype") === true) {
            $r = \json_encode((string)$o);
        } elseif (
            \is_bool($o) === true ||
            \is_int($o) === true ||
            \is_float($o) === true ||
            \is_string($o) === true ||
            \is_array($o) === true
        ) {
            $r = \json_encode($o);
        }

        return $r;
    }
}
