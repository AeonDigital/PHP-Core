<?php
declare (strict_types=1);

namespace AeonDigital\DataFormat\Patterns\Brasil;

use AeonDigital\DataFormat\Abstracts\aStringFormat as aStringFormat;








/**
 * Definição do formato ``CNPJ``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class CNPJ extends aStringFormat
{





    /**
     * Expressão regular para validação.
     *
     * @var         ?string
     */
    const RegExp = "/^[0-9]{2}[.]?[0-9]{3}[.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2}$/";


    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MinLength = 14;


    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MaxLength = 18;





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
    public static function check(?string $v, ?array $aux = null) : bool
    {
        if ($v !== null && \mb_str_pattern_match($v, self::RegExp) === true) {
            $cnpj = \mb_str_preserve_chars($v, "0123456789");

            if (\mb_strlen($cnpj) === 14 && \is_numeric($cnpj) === true) {
                // Se não for nenhum dos padrões inválidos de CNPJ...
                if ($cnpj !== "00000000000000" && $cnpj !== "11111111111111" && $cnpj !== "22222222222222" &&
                    $cnpj !== "33333333333333" && $cnpj !== "44444444444444" && $cnpj !== "55555555555555" &&
                    $cnpj !== "66666666666666" && $cnpj !== "77777777777777" && $cnpj !== "88888888888888" &&
                    $cnpj !== "99999999999999") {
                    $a = [];
                    $b = 0;
                    $c = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
                    for ($i = 0; $i < 12; $i++) {
                        $a[$i] = $cnpj[$i];
                        $b += $a[$i] * $c[$i + 1];
                    }

                    $x = $b % 11;
                    $a[12] = ($x < 2) ? 0 : 11 - $x;


                    $b = 0;
                    for ($y = 0; $y < 13; $y++) {
                        $b += ($a[$y] * $c[$y]);
                    }
                    $x = $b % 11;
                    $a[13] = ($x < 2) ? 0 : 11 - $x;

                    if (((int)$cnpj[12] === (int)$a[12]) && ((int)$cnpj[13] === (int)$a[13])) {
                        return true;
                    }
                }
            }
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
    public static function format($v, ?array $aux = null) : ?string
    {
        if (self::check($v) === true) {
            $v = \mb_str_preserve_chars($v, "0123456789");

            if (\mb_strlen($v) === 14) {
                return \mb_substr($v, 0, 2) . "." . \mb_substr($v, 2, 3) . "." . \mb_substr($v, 5, 3) . "/" . \mb_substr($v, 8, 4) . "-" . \mb_substr($v, 12, 2);
            }
        }

        return null;
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
    public static function removeFormat(?string $v, ?array $aux = null)
    {
        if (self::check($v) === true) {
            $v = \mb_str_preserve_chars($v, "0123456789");

            if (\mb_strlen($v) === 14) {
                return $v;
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
    public static function storageFormat(?string $v)
    {
        return self::removeFormat($v);
    }
}
