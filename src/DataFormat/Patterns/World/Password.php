<?php

declare(strict_types=1);

namespace AeonDigital\DataFormat\Patterns\World;

use AeonDigital\DataFormat\Abstracts\aPasswordFormat as aPasswordFormat;







/**
 * Definição do formato ``Password``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class Password extends aPasswordFormat
{




    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MinLength = 8;


    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var         int
     */
    const MaxLength = 40;





    /**
     * Verifica se o valor passado corresponde ao tipo/formato. esperado.
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
     * @param       ?string $v
     *              Valor a ser testado.
     *
     * @param       ?array $aux
     *              Array associativo trazendo a configuração para formatação da string.
     *
     * @return      bool
     */
    public static function check(?string $v, ?array $aux = null): bool
    {
        if (static::checkPassword($v, $aux) === true || \mb_strlen($v) === 40) {
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
    public static function format($v, ?array $aux = null): ?string
    {
        if (\is_string($v) === true && static::check($v) === true) {
            if (\mb_strlen($v) === 40) {
                return $v;
            } else {
                return \sha1($v);
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
    public static function removeFormat(?string $v, ?array $aux = null): mixed
    {
        if (\is_string($v) === true) {
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
     * @param       ?string $v
     *              Valor a ser ajustado.
     *
     * @return      mixed
     */
    public static function storageFormat(?string $v): mixed
    {
        return self::format($v);
    }
}
