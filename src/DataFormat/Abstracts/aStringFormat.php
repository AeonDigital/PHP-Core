<?php
declare (strict_types=1);

namespace AeonDigital\DataFormat\Abstracts;

use AeonDigital\Interfaces\DataFormat\iStringFormat as iStringFormat;








/**
 * Classe que implementa os métodos básicos da interface ``iStringFormat``.
 *
 * @package     AeonDigital\DataFormat
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class aStringFormat implements iStringFormat
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
    public static function check(?string $v, ?array $aux = null) : bool
    {
        if ($v === null) {
            return false;
        } else {
            return \mb_str_pattern_match($v, static::RegExp);
        }
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
    abstract static function format($v, ?array $aux = null) : ?string;



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
    abstract static function removeFormat(?string $v, ?array $aux = null);



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
    abstract static function storageFormat(?string $v);
}
