<?php

declare(strict_types=1);

namespace AeonDigital\DataFormat\Abstracts;

use AeonDigital\Interfaces\DataFormat\iPasswordFormat as iPasswordFormat;
use AeonDigital\DataFormat\Abstracts\aStringFormat as aStringFormat;






/**
 * Extende a classe abstrata ``aStringFormat`` para prepará-la para ser usada com senhas.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aPasswordFormat extends aStringFormat implements iPasswordFormat
{





    /**
     * Testa a força da string enquanto senha e retorna sua pontuação.
     *
     * **Pontuação**
     * ``+ 10 pontos``  :   Por cada caracter diferente onde ``T != t``
     * ``+ 05 pontos``  :   Se houver ao menos 3 numerais diferentes.
     * ``+ 05 pontos``  :   Se houver ao menos 2 simbolos diferentes ``!@#$+-_=[]{}?``
     * ``+ 10 pontos``  :   Por cada familia de caracteres alem da primeira
     * As famílias de caracteres são: ``Minusculas`` | ``Maiusculas`` | ``Numeros`` | ``Simbolos``
     *
     * @param string $v
     * Valor a ser ajustado.
     *
     * @return int
     */
    public static function checkStrength(string $v): int
    {
        $iR = 0;

        // Resgata coleção de caracteres únicos da senha
        $uCh = $v[0];
        for ($i = 1; $i < \mb_strlen($v); $i++) {
            $cI = $v[$i];
            if (\mb_strpos($uCh, $cI) === false) {
                $uCh .= $cI;
            }
        }

        // Pontua pela quantidade de caracteres únicos
        $iR = (\mb_strlen($uCh) * 10);

        // Verifica familia de caracters usados na senha
        // Pontua por cada conjunto de familia de caracteres alem do 1º
        if (\preg_match("/[a-z]/", $uCh)) {
            $iR += 10;
        }
        if (\preg_match("/[A-Z]/", $uCh)) {
            $iR += 10;
        }
        if (\preg_match("/[0-9]/", $uCh)) {
            $iR += 10;
        }


        $sCh = 0;

        $sChar = static::SpecialChars;
        for ($i = 0; $i < \mb_strlen($sChar); $i++) {
            $c = $sChar[$i];
            if (\mb_strpos($uCh, $c) !== false) {
                $sCh++;
                if ($sCh == 1) {
                    $iR += 10;
                }
            }
        }
        $iR -= 10;

        // Pontua se houver ao menos 3 numerais
        if (\preg_match("/(.*[0-9].*[0-9].*[0-9])/", $uCh)) {
            $iR += 5;
        }

        // Pontua se houver ao menos 2 simbolos
        if ($sCh >= 2) {
            $iR += 5;
        }

        return $iR;
    }



    /**
     * Gera uma senha de forma aleatória baseada nas configurações passadas. O tamanho da
     * senha será o valor informado em ``$cfg[¨MinLength¨]``
     *
     * **Exemplo de parametro $cfg***
     * ```php
     *      $arr = [
     *          // Coleção de caracteres comuns aceitos.
     *          "CommomChars"   => "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
     *
     *          // Coleção de caracteres especiais.
     *          "SpecialChars"  => "!@#$%¨*()-_+=?"
     *
     *          // Número mínimo de caracteres para compor uma senha.
     *          "MinLength"     => 8
     *
     *          // Número máximo de caracteres para compor uma senha.
     *          "MaxLength"     => 128
     *      ];
     * ```
     *
     * @param ?array $cfg
     * Configurações da senha que será gerada. Usará os valores padrões caso
     * este parametro não seja informado.
     *
     * @return string
     */
    public static function generate(?array $cfg = null): string
    {
        if ($cfg === null) {
            $cfg = [
                "CommomChars"   => static::CommomChars,
                "SpecialChars"  => static::SpecialChars,
                "MinLength"     => static::MinLength,
                "MaxLength"     => static::MaxLength
            ];
        }


        $allChars = $cfg["CommomChars"] . $cfg["SpecialChars"];
        $countChar = \mb_strlen($allChars) - 1;
        $password = [];


        for ($i = 0; $i < $cfg["MinLength"]; $i++) {
            $n = \rand(0, $countChar);
            $password[] = $allChars[$n];
        }
        return \implode($password);
    }



    /**
     * Verifica se o valor passado é uma ``string`` que pode ser aceita como ``password`` válida.
     *
     * Caso não passe na validação, retornará um código que identifica o erro ocorrido na
     * variável ``$err``.
     *
     * **Exemplo de parametro $aux***
     * ```php
     *      $arr = [
     *          // Coleção de caracteres comuns aceitos.
     *          "CommomChars"   => "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
     *
     *          // Coleção de caracteres especiais.
     *          "SpecialChars"  => "!@#$%¨*()-_+=?"
     *
     *          // Número mínimo de caracteres para compor uma senha.
     *          "MinLength"     => 8
     *
     *          // Número máximo de caracteres para compor uma senha.
     *          "MaxLength"     => 128
     *      ];
     * ```
     *
     * @param ?string $v
     * Valor a ser testado.
     *
     * @param ?array $aux
     * Array associativo trazendo a configuração para formatação da string.
     *
     * @param ?string $err
     * Código do erro da validação.
     *
     * @return mixed
     */
    public static function checkPassword(?string $v, ?array $aux = null, ?string &$err = null): bool
    {
        $err = null;
        if ($v === null) {
            $err = "error.df.password.invalid.value";
        } else {
            if ($aux === null) {
                $aux = [
                    "CommomChars"   => static::CommomChars,
                    "SpecialChars"  => static::SpecialChars,
                    "MinLength"     => static::MinLength,
                    "MaxLength"     => static::MaxLength
                ];
            }

            $pP = $aux["CommomChars"] . $aux["SpecialChars"];


            $invC = "";
            $b = false;

            $utf8split = \preg_split("//u", $v, -1, PREG_SPLIT_NO_EMPTY);
            for ($i = 0; $i < \count($utf8split); $i++) {
                $c = $utf8split[$i];
                if (\mb_strpos($pP, $c) === false) {
                    $invC .= $c;
                }
            }


            // Se encontrar caracteres inválidos...
            if ($invC !== "") {
                $err = "error.df.password.invalid.chars";
            } else {
                if (\mb_strlen($v) < $aux["MinLength"]) {
                    $err = "error.df.password.too.short";
                } elseif (\mb_strlen($v) > $aux["MaxLength"]) {
                    $err = "error.df.password.too.long";
                }
            }
        }

        return ($err === null);
    }
}
