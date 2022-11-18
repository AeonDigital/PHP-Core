<?php

declare(strict_types=1);

namespace AeonDigital\DataFormat\Patterns\World;

use AeonDigital\DataFormat\Abstracts\aStringFormat as aStringFormat;







/**
 * Definição do formato ``Email``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class Email extends aStringFormat
{





    /**
     * Expressão regular para validação.
     *
     * @var ?string
     */
    const RegExp = "/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,6})+$/";


    /**
     * Quantidade **mínima** de caracteres necessários para expressar o formato.
     *
     * @var int
     */
    const MinLength = 6;


    /**
     * Quantidade **máxima** de caracteres necessários para expressar o formato.
     *
     * @var int
     */
    const MaxLength = 64;





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
        if (\is_string($v) === true && self::check($v) === true) {
            return \mb_strtolower($v);
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
