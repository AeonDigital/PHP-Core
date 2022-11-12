<?php

declare(strict_types=1);

namespace AeonDigital\DataFormat\Abstracts;

use AeonDigital\Interfaces\DataFormat\iNumberFormat as iNumberFormat;
use AeonDigital\DataFormat\Abstracts\aStringFormat as aStringFormat;






/**
 * Extende a classe abstrata ``aStringFormat`` para prepará-la para ser usada com numerais.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aNumberFormat extends aStringFormat implements iNumberFormat
{




    /**
     * Verifica se o valor passado corresponde ao tipo/formato. esperado.
     *
     * @param       ?string $v
     *              Valor a ser testado.
     *
     * @param       ?array $aux
     *              Dados auxiliares para o processamento.
     *
     * @return      bool
     */
    public static function check(?string $v, ?array $aux = null): bool
    {
        if (self::formatNumber($v) !== null) {
            return true;
        }

        return false;
    }



    /**
     * Formata ``$v`` para que seja retornado uma ``string`` que represente este tipo. Caso
     * não seja possível efetuar a formatação retornará ``null``.
     *
     * @param       mixed $v
     *              Valor a ser formatado.
     *
     * @param       ?array $aux
     *              Dados auxiliares para o processamento.
     *
     * @return      ?string
     */
    public static function format(mixed $v, ?array $aux = null): ?string
    {
        if (\is_int($v) === true || \is_float($v) === true || \is_double($v) === true) {
            $v = (string)$v;
        }

        return self::formatNumber($v, "string");
    }



    /**
     * Sendo ``$v`` uma ``string`` formatada adequadamente para representar este tipo,
     * devolverá seu equivalente em formato de objeto ( ``int``, ``float``, ``DateTime`` ... )
     * ou em caso de ``strings``, removerá completamente qualquer caracter de formatação.
     *
     * Retornará ``null`` caso a ``string`` passada seja considerada inválida.
     *
     * @param       ?string $v
     *              Valor a ser ajustado.
     *
     * @param       ?array $aux
     *              Dados auxiliares para o processamento.
     *
     * @return      mixed
     */
    public static function removeFormat(?string $v, ?array $aux = null): mixed
    {
        return self::formatNumber($v, "number");
    }










    /**
     * Formatará o número passado para que ele corresponda ao padrão definido para a
     * cultura que a classe concreta representa.
     *
     * Retornará ``null`` caso a verificação falhe.
     *
     * @param       ?string $v
     *              Valor a ser testado.
     *
     * @param       string $ret
     *              Tipo de retorno esperado.
     *
     *              Quando ``string`` retornará o valor devidamente pontuado.
     *
     *              Quando ``number`` retornará o valor em seu formato numeral (``int`` | ``float``).
     *
     * @return      null|string|int|float
     */
    protected static function formatNumber(?string $v, string $ret = "string"): null|string|int|float
    {
        if ($v !== null) {
            $dec = static::Decimal;
            $tho = static::Thousand;
            $prec = 0;


            // Remove todos os caracteres que não são válidos para representar
            // um numero.
            $n = \mb_str_preserve_chars($v, "+-0123456789" . $dec . $tho);

            $errPlus = (\mb_strpos($v, "+") !== false && \mb_strpos($v, "+") !== 0);
            $errMinus = (\mb_strpos($v, "-") !== false && \mb_strpos($v, "-") !== 0);
            $errTho = (\mb_strpos($v, $tho) === 0 || \mb_strpos($v, $tho) === \mb_strlen($v) - 1);
            $errDec = (\mb_strpos($v, $dec) === 0 || \mb_strpos($v, $dec) === \mb_strlen($v) - 1);

            $l1 = \mb_strlen($v);
            $l2 = \mb_strlen($n);


            $cleanN = \mb_strlen(\str_replace($tho, "", $n));


            // Apenas SE os sinais de "+" e "-" estão na posição esperada
            // E
            // Apenas SE a string original não possuia caracteres inválidos
            // E
            // SE
            // O total de caracteres válidos estão entre os limites permitidos...
            if (
                $errPlus === false && $errMinus === false && $errTho === false && $errDec === false &&
                $l1 === $l2 && $cleanN >= static::MinLength && $cleanN <= static::MaxLength
            ) {
                $errPonctuaction = false;


                // Verifica uso do pontuador decimal
                $decimalPos = \mb_str_pos_all($n, $dec);

                // Se houver pontuador decimal, só pode haver 1.
                if ($decimalPos !== false && \count($decimalPos) > 1) {
                    $errPonctuaction = true;
                }


                // Não havendo erros até este ponto...
                if ($errPonctuaction === false) {
                    // Separa a parte inteira da parte decimal
                    $parts = \explode($dec, $n);


                    // Se há separador de milhar...
                    // Verifica se há realmente 1 para cada grupo de 3 numerais.
                    if (\mb_strpos($parts[0], $tho) !== false) {
                        $strArr = \array_reverse(\mb_str_split($parts[0] . " "));

                        $nextPos = 4;
                        $last = \count($strArr) - 1;
                        for ($i = 1; $i < $last; $i++) {
                            $c = $strArr[$i];

                            // Se na posição esperada não há um pontuador de milhar...
                            if ($i === $nextPos) {
                                if ($c !== $tho) {
                                    $errPonctuaction = true;
                                } else {
                                    $nextPos += 4;
                                }
                            } else {
                                // Se não há um número na posição esperada...
                                if (\is_numeric($c) === false) {
                                    $errPonctuaction = true;
                                }
                            }
                        }
                    }


                    // Não havendo erros até este ponto
                    // E
                    // havendo uma parte decimal...
                    //
                    // Confere se algum caracter pontuador de
                    // milhar está nesta porção do numero.
                    if ($errPonctuaction === false && \count($parts) === 2) {
                        if (\mb_strpos($parts[1], $tho) !== false) {
                            $errPonctuaction = true;
                        } else {
                            $prec = \mb_strlen($parts[1]);
                        }
                    }
                }


                // Não havendo erros até este ponto...
                if ($errPonctuaction === false) {
                    // Remove a pontuação de milhar
                    $n = \str_replace($tho, "", $n);

                    // Substitui separador decimal pelo "." que é o separador real
                    // para as linguagens de programação
                    $n = \str_replace($dec, ".", $n);


                    // Se o resultado for um valor numérico
                    // retorna o númeral devidamente formatado
                    if (\is_numeric($n) === true) {
                        if ($ret === "string") {
                            return \number_format(($n + 0), $prec, $dec, $tho);
                        } else {
                            return ($n + 0);
                        }
                    }
                }
            }
        }

        return null;
    }










    /**
     * Sendo ``$v`` uma ``string`` válida para o formato correspondente, retorna um valor
     * equivalente a mesma usando as configurações de formatação para armazenamento deste
     * tipo de dado.
     *
     * Retornará ``null`` caso a ``string`` passada seja considerada inválida.
     *
     * @param       ?string $v
     *              Valor a ser ajustado.
     *
     * @return      mixed
     */
    public static function storageFormat(?string $v): mixed
    {
        return self::removeFormat($v);
    }
}
