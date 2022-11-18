<?php

declare(strict_types=1);

namespace AeonDigital\DataFormat\Patterns\Brasil;

use AeonDigital\DataFormat\Abstracts\aStringFormat as aStringFormat;







/**
 * Definição do formato ``CPF``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class CPF extends aStringFormat
{





    /**
     * Expressão regular para validação.
     *
     * @var ?string
     */
    const RegExp = "/^[0-9]{3}[.]?[0-9]{3}[.]?[0-9]{3}[-]?[0-9]{2}$/";


    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var int
     */
    const MinLength = 11;


    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var int
     */
    const MaxLength = 14;





    /**
     * Verifica se o valor passado corresponde ao tipo/formato. esperado.
     *
     * @param ?string $v
     * Valor a ser testado.
     *
     * @param ?array $aux
     * Dados auxiliares para o processamento.
     *
     * @return bool
     */
    public static function check(?string $v, ?array $aux = null): bool
    {
        if ($v !== null && \mb_str_pattern_match($v, self::RegExp) === true) {
            $cpf = \mb_str_preserve_chars($v, "0123456789");

            if (\mb_strlen($cpf) === 11 && \is_numeric($cpf) === true) {
                if (
                    $cpf !== "00000000000" && $cpf !== "11111111111" && $cpf !== "22222222222" &&
                    $cpf !== "33333333333" && $cpf !== "44444444444" && $cpf !== "55555555555" &&
                    $cpf !== "66666666666" && $cpf !== "77777777777" && $cpf !== "88888888888" &&
                    $cpf !== "99999999999"
                ) {
                    // Resgata dígitos especiais
                    $d1 = $cpf[9];
                    $d2 = $cpf[10];
                    $dV1 = null;
                    $dV2 = null;

                    // Descobre primeiro dígito verificador
                    $s = 0;
                    $cnt = 0;
                    for ($i = 10; $i > 1; $i--) {
                        $s += $cpf[$cnt] * ($i);
                        $cnt++;
                    }
                    $dV1 = $s % 11;
                    $dV1 = ($dV1 < 2) ? 0 : 11 - $dV1;


                    // Descobre segundo dígito verificador
                    $s = 0;
                    $cnt = 0;
                    for ($i = 11; $i > 1; $i--) {
                        $s += $cpf[$cnt] * ($i);
                        $cnt++;
                    }

                    $dV2 = $s % 11;
                    $dV2 = ($dV2 < 2) ? 0 : 11 - $dV2;

                    // Verifica se digitos estão corretos
                    if ((int)$d1 === (int)$dV1 && (int)$d2 === (int)$dV2) {
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
     * @param mixed $v
     * Valor a ser formatado.
     *
     * @param ?array $aux
     * Dados auxiliares para o processamento.
     *
     * @return ?string
     */
    public static function format($v, ?array $aux = null): ?string
    {
        if (self::check($v) === true) {
            $v = \mb_str_preserve_chars($v, "0123456789");

            if (\mb_strlen($v) === 11) {
                return \mb_substr($v, 0, 3) . "." . \mb_substr($v, 3, 3) . "." . \mb_substr($v, 6, 3) . "-" . \mb_substr($v, 9, 2);
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
     * @param ?string $v
     * Valor a ser ajustado.
     *
     * @param ?array $aux
     * Dados auxiliares para o processamento.
     *
     * @return mixed
     */
    public static function removeFormat(?string $v, ?array $aux = null): mixed
    {
        if (self::check($v) === true) {
            $v = \mb_str_preserve_chars($v, "0123456789");

            if (\mb_strlen($v) === 11) {
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
     * @param ?string $v
     * Valor a ser ajustado.
     *
     * @return mixed
     */
    public static function storageFormat(?string $v): mixed
    {
        return self::removeFormat($v);
    }
}
