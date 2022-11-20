<?php

declare(strict_types=1);

namespace AeonDigital\DataFormat\Patterns\Brasil;

use AeonDigital\DataFormat\Abstracts\aStringFormat as aStringFormat;







/**
 * Definição do formato ``Phone``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class Phone extends aStringFormat
{





    /**
     * Expressão regular para validação.
     *
     * @var ?string
     */
    const RegExp = "/([\(]?[\d]{2}[\)]?[ ]?)([\d]{1}(\.|-| )?[\d]{1}(\.|-| )?[\d]{1}(\.|-| )??[\d]{1}(\.|-| )?[\d]{1}(\.|-| )?[\d]{1}(\.|-| )?[\d]{1})(((\.|-| )?[\d]{1}$)|((\.|-| )?[\d]{1}(\.|-| )?[\d]{1}$))/";


    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var int
     */
    const MinLength = 10;


    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var int
     */
    const MaxLength = 16;





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
        if ($v === null) {
            return false;
        } else {
            // Apenas se passar na validação do formato em sí
            if (\mb_str_pattern_match($v, static::RegExp) === true) {
                // Remove todos os caracteres de pontuação, ficando apenas com
                // os dígitos
                $v = \mb_str_preserve_chars($v, "0123456789");
                $l = \mb_strlen($v);

                // Ficando a string entre os limites de quantidade de caracteres
                // a string é aceita.
                if ($l >= 10 && $l <= 11) {
                    return true;
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
    public static function format(mixed $v, ?array $aux = null): ?string
    {
        if (self::check($v) === true) {
            $v = \mb_str_preserve_chars($v, "1234567890");

            if (\mb_strlen($v) === 10) {
                return "(" . \mb_substr($v, 0, 2) . ") " . \mb_substr($v, 2, 4) . "." . \mb_substr($v, 6, 4);
            } elseif (\mb_strlen($v) === 11) {
                return "(" . \mb_substr($v, 0, 2) . ") " . \mb_substr($v, 2, 5) . "." . \mb_substr($v, 7, 4);
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
            return \mb_str_preserve_chars($v, "1234567890");
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
