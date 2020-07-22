<?php
declare (strict_types=1);

namespace AeonDigital\Objects\ArrayOf\Types;

use AeonDigital\Objects\ArrayOf\Abstracts\ArrayOfObject as ArrayOfObject;








/**
 * Array de ``bool``.
 *
 * @package     AeonDigital\Objects\ArrayOf
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class arrBool extends ArrayOfObject
{
    /**
     * Tipo de objeto que este array está apto a receber.
     *
     * @var         string
     */
    const TYPE_OF_ARRAY = "bool";




    /**
     * Valor equivalente a ``null`` para este array.
     *
     * @var         mixed
     */
    protected static $nullValue = false;
    /**
     * Retorna um valor convencionado para representar ``null``
     * para os objetos deste tipo.
     *
     * @return      bool
     */
    public static function getNull() : bool
    {
        return static::$nullValue;
    }



    /**
     * Insere um novo item chave/valor para o array.
     *
     * @param       mixed $key
     *              O índice a ser definido.
     *
     * @param       bool $val
     *              O novo valor para o índice.
     *
     * @return      bool
     */
    public function set($key, bool $val) : bool
    {
        $r = false;
        if ($this->checkBeforeSet($key, $val) === true) {
            $r = true;
        }
        return $r;
    }
    /**
     * Retorna o objeto no indice especificado.
     *
     * @param       int|string $key
     *              Índice.
     *
     * @return      bool
     */
    public function get($key) : bool
    {
        return parent::get($key);
    }
}
