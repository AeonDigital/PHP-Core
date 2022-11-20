<?php

declare(strict_types=1);

namespace AeonDigital\DataFormat\Patterns\World;

use AeonDigital\DataFormat\Abstracts\aStringFormat as aStringFormat;







/**
 * Definição do formato ``Color``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class Color extends aStringFormat
{





    /**
     * Expressão regular para validação.
     *
     * @var ?string
     */
    const RegExp = "/^([#]?[0-9A-Fa-f]{6})$/";


    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var int
     */
    const MinLength = 7;


    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var int
     */
    const MaxLength = 7;





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
        if (\is_string($v) === true) {
            if (\mb_strlen($v) === 6 && \mb_strpos($v, "#") === false) {
                $v = "#" . $v;
            }

            if (self::check($v) === true) {
                return \mb_strtoupper($v);
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
        if (\is_string($v) === true && self::check($v) === true) {
            return $v;
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
        return self::format($v);
    }
}
