<?php
declare (strict_types=1);

namespace AeonDigital\Objects\ArrayOf\Abstracts;










/**
 * Classe abstrata que deve ser implementada para qualquer outra classe ou tipo de
 * dados que se planeja permitir ter um array exclusivos de objetos daquela mesma natureza.
 *
 * @package     AeonDigital\Objects\ArrayOf
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class ArrayOfObject extends \ArrayObject
{



    /**
     * Nas classes concretas deve ser definido uma constante com o nome ``TYPE``
     * que deverá trazer o nome do tipo de dado que aquela classe pretende definir.
     *
     * >>> Trazer a constante para cá.
     * >>> especializar as interfaces em seus sub-tipos como "integer > byte | short | int | long"
     *
     * >>> Criar a constante IS_CLASS
     * >>> Criar a constante HAS_LIMIT_RANGE
     *
     * Em StandartArray gerar métodos que apontem para estes valores estáticos e constantes.
     */



    /**
     * Tipo de objeto que este array está apto a receber.
     * Pode ser usado qualquer um dos tipos scalares:
     * - ``bool``
     * - ``int``
     * - ``float``
     * - ``string``
     * - ``callable``
     * - ``iterable``
     * - ``resource``
     *
     * Ou pode ser definido a namespace completa de uma classe.
     *
     * @var         string
     */
    const TYPE_OF_ARRAY = "";
    /**
     * Nome completo da interface cujos objetos deste array devem fazer parte.
     * Quando definido ``TYPE_OF_ARRAY`` deve ser igual a ""
     *
     * @var         string
     */
    const INTERFACE_OF_ARRAY = "";





    /**
     * Indica se ``null`` é aceito como um valor válido.
     *
     * @var         bool
     */
    protected bool $nullable = false;
    public function isNullable() : bool
    {
        return $this->nullable;
    }
    /**
     * Indica quando as chaves do ``array`` apenas podem ser definidas como
     * valores do tipo ```string``.
     *
     * @var         bool
     */
    const ONLY_STRING_KEYS = false;
    /**
     * Indica quando as chaves do ``array`` são tratadas como sendo ``case-sensitive`` (padrão).
     * Quando ``false`` a chave será sempre convertida para ``lowercase``.
     *
     * Esta opção é válida apenas se ``ONLY_STRING_KEYS`` for ``true.
     *
     * @var         bool
     */
    const CASE_SENSITIVE_KEYS = true;





    /**
     * Valor equivalente a ``null`` para este array.
     *
     * @var         mixed
     */
    protected static $nullValue = null;
    /**
     * Retorna um valor convencionado para representar ``null``
     * para os objetos deste tipo.
     *
     * @return      mixed
     */
    public static function getNull()
    {
        return static::$nullValue;
    }





    /**
     * Indica se a chave de nome indicado existe.
     *
     * @param       int|string $key
     *              Índice.
     *
     * @return      bool
     */
    public function has($key) : bool
    {
        return \key_exists($key, $this);
    }
    /**
     * Retorna o objeto no índice especificado.
     *
     * Em classes onde ``NULLABLE=true`` retornará o valor convencionado como ``null``
     * para situações onde a chave aponte para um valor ``null``.
     *
     * @param       int|string $key
     *              Índice.
     *
     * @return      mixed
     */
    public function get($key)
    {
        $r = $this[$key];

        if (static::NULLABLE === true && $r === null) {
            $r = static::getNull();
        }

        return $r;
    }
    /**
     * Insere um novo item chave/valor para o array.
     *
     * @param       mixed $key
     *              O índice a ser definido.
     *
     * @param       $val
     *              O novo valor para o índice.
     *
     * @return      bool
     */
    public function set($key, $val) : bool
    {
        $r = false;
        if ($this->checkBeforeSet($key, $val) === true) {
            $r = true;
        }
        return $r;
    }










    /**
     * Inicia um novo array especializado.
     *
     * @param       mixed ...$args
     *              Argumentos que iniciarão esta coleção.
     */
    function __construct(...$args) {
        foreach ($args as $i => $arg) {
            if (static::ONLY_STRING_KEYS === true) { $i = (string)$i; }
            $this[$i] = $arg;
        }
    }





    /**
     * Retorna um objeto do mesmo tipo do atual contendo exclusivamente as chaves e
     * respectivos valores nas posições em que os valores não são ``null``.
     *
     * @return      self
     */
    public function subSetNotNull() : self
    {
        $r = $this;

        if (static::NULLABLE === true) {
            $className = \get_class($this);

            $r = new $className();
            foreach ($this as $key => $value) {
                if ($value !== null) {
                    $r[$key] = $value;
                }
            }
        }

        return $r;
    }





    /**
     * Define o valor do índice especificado por $index para $newval
     *
     * @param       mixed $key
     *              O índice a ser definido.
     *
     * @param       mixed $val
     *              O novo valor para o índice.
     *
     * @return      void
     */
    public function offsetSet($key, $val)
    {
        $this->set($key, $val);
    }

    // prosseguir daqui... redefinir arquitetura para permitir escalabilidade
    // erros disparam SEMPRE?
    // é possível configurar isto? a princípio SIM.

    protected function checkBeforeSet($key, $val) : bool
    {
        $isValidType = false;
        $exceptionMessage = "Invalid given object. Expected \"" . static::TYPE_OF_ARRAY . "\" object.";

        if (static::ONLY_STRING_KEYS === true && \is_string($key) === false) {
            $exceptionMessage = "Invalid given key. Expected an non empty \"string\".";
        }
        else {
            if ($val === null) {
                $isValidType = (static::NULLABLE === true);
                $exceptionMessage = "Invalid given object. Not allow \"null\" values.";
            }
            else {
                $isValidType = true;

                switch (static::TYPE_OF_ARRAY) {
                    case "resource":
                        $isValidType = \is_resource($val);
                        break;

                    case "iterable":
                        $isValidType = \is_iterable($val);
                        break;

                    case "callable":
                        $isValidType = \is_callable($val);
                        break;

                    case "float":
                        $isValidType = \is_float($val);
                        break;

                    case "int":
                        $isValidType = \is_int($val);
                        break;

                    case "string":
                        $isValidType = \is_string($val);
                        break;

                    case "bool":
                        $isValidType = \is_bool($val);
                        break;

                    default:
                        if (static::TYPE_OF_ARRAY === "" && static::INTERFACE_OF_ARRAY !== "") {
                            $exceptionMessage = "Invalid given object. Expected object thats implements the interface \"" . static::INTERFACE_OF_ARRAY . "\".";
                            if (\is_object($val) === true) {
                                $rClass = new \ReflectionClass(\get_class($val));
                                $isValidType = ($rClass->implementsInterface(static::INTERFACE_OF_ARRAY) === true);
                            }
                        }
                        else {
                            $isValidType = (\is_object($val) === true && \is_a($val, static::TYPE_OF_ARRAY));
                        }
                        break;
                }

            }
        }


        if ($isValidType === false) {
            throw new \InvalidArgumentException($exceptionMessage);
        }
        else {
            if (static::ONLY_STRING_KEYS === true && static::CASE_SENSITIVE_KEYS === true) {
                $key = \mb_strtolower($key);
            }
            parent::offsetSet($key, $val);
            return $isValidType;
        }
    }
}
