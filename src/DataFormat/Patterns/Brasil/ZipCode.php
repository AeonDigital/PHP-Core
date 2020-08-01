<?php
declare (strict_types=1);

namespace AeonDigital\DataFormat\Patterns\Brasil;

use AeonDigital\DataFormat\Abstracts\aStringFormat as aStringFormat;








/**
 * Definição do formato ``ZipCode``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class ZipCode extends aStringFormat
{





    /**
     * Expressão regular para validação.
     *
     * @var         ?string
     */
    const RegExp = "/(^[0-9]{8}$)|(^[0-9]{5}[-]?[0-9]{3}$)|(^[0-9]{2}[.]?[0-9]{3}[-]?[0-9]{3}$)/";


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
    const MaxLength = 10;





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
            $s = \mb_str_preserve_chars($v, "0123456789");

            if (\mb_strlen($s) === 8) {
                return \mb_substr($s, 0, 2) . "." . \mb_substr($s, 2, 3) . "-" . \mb_substr($s, 5, 3);
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
            $s = \mb_str_preserve_chars($v, "0123456789");

            if (\mb_strlen($s) === 8) {
                return $s;
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
