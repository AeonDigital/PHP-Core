<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;










/**
 * Definição de um tipo ``Standart`` de dado.
 *
 * As classes concretas representarão tipos de dados especializados e/ou normatizam os
 * tipos padrões do PHP.
 *
 * Seus membros, TODOS ESTÁTICOS, trazem as regras que definem cada tipo planeja mapear,
 * descrever e limitar.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iStandart
{
    /**
     * Na interface que implementa um tipo específico é NECESSÁRIO que as constantes
     * relatadas abaixo sejam definidas.
     *
     * CONSTANTES
     *
     * string TYPE
     * Refere-se ao tipo de dado que está sendo definido ou ao namespace completo
     * da classe ou interface que se planeja especializar como um tipo.
     *
     * bool IS_CLASS
     * Deve indicar se as classes concretas que implementam aquela definição estão
     * referindo-se a uma classe.
     *
     * bool NULLABLE
     * Indica quando o tipo aceita ``null`` como válido.
     *
     * bool READONLY
     * Quando ``true`` indica que classes concretas devem proteger o valor definido em
     * seu construtor ou na primeira vez que a mesma for definida e, a partir de então,
     * não permitir que o mesmo seja alterado posteriormente.
     *
     * ?bool SIGNED
     * Usado apenas para tipos Int, Float, Real e DateTime.
     * Quando ``true`` indica que trata-se de um valor numérico que ACEITA valores
     * negativos.
     *
     * ?bool UNSIGNED
     * Usado apenas para tipos Int, Float, Real e DateTime.
     * Quando ``true`` indica que trata-se de um valor numérico que NÃO ACEITA valores
     * negativos.
     *
     *
     * ?bool EMPTY
     * Usado para quando ``TYPE`` for ``String``.
     * Indica se classes concretas podem aceitar valores vazios (``""``) como válidos.
     *
     *
     * bool HAS_LIMIT
     * Usado apenas para tipos Int, Float, Real, DateTime e String.
     * Indica quando trata-se de um tipo que possui um valor mínimo e máximo para limitar
     * seus valores aceitáveis. Em tipos ``string`` indica que há um limite mínimo e um
     * máximo de caracteres esperados para que o tipo seja válido.
     *
     * ?string MIN
     * Usado apenas para tipos Int, Float, Real, DateTime e String.
     * Representação em ``string`` do valor mínimo aceitável para este tipo ou do número
     * mínimo de caracteres aceitos.
     *
     * ?string MAX
     * Usado apenas para tipos Int, Float, Real, DateTime e String.
     * Representação em ``string`` do valor máximo aceitável para este tipo ou do número
     * máximo de caracteres aceitos.
     *
     * ?string NULL_EQUIVALENT
     * Representação em ``string`` do valor que o tipo deve considerar equivalente a ``null``.
     */





    /**
     * Tenta efetuar a conversão do valor indicado para o tipo ``string``.
     * Caso não seja possível converter o valor, retorna ``null``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @return      ?string
     */
    static function toString($v) : ?string;



    /**
     * Verifica se o valor indicado pode ser convertido e usado como um valor válido
     * dentro das definições deste tipo.
     *
     * @param       mixed $v
     *              Valor que será verificado.
     *
     * @return      bool
     */
    static function validate($v) : bool;





    /**
     * Efetuará a conversão do valor indicado para o tipo que esta classe representa
     * apenas se passar na validação.
     *
     * Caso não passe retornará um código que identifica o erro ocorrido na variável
     * ``$err``.
     *
     * @param       mixed $v
     *              Valor que será convertido.
     *
     * @param       string $err
     *              Código do erro da validação.
     *
     * @return      mixed
     */
    public static function parseIfValidate(
        $v,
        string &$err = ""
    );





    /**
     * Retorna o valor indicado em ``MIN`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      mixed
     */
    static function getMin();
    /**
     * Retorna o valor indicado em ``MAX`` convertido para
     * o tipo nativo.
     *
     * Quando ``null`` indica que não é aplicavel a este tipo.
     *
     * @return      mixed
     */
    static function getMax();
    /**
     * Retorna o valor indicado em ``NULL_EQUIVALENT`` convertido para
     * o tipo nativo.
     *
     * @return      mixed
     */
    static function getNullEquivalent();
}
