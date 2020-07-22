<?php
declare (strict_types=1);

namespace AeonDigital\Objects\ArrayOf\Types;

use AeonDigital\Objects\ArrayOf\Abstracts\ArrayOfObject as ArrayOfObject;








/**
 * Array de ``iterable``.
 *
 * @package     AeonDigital\Objects\ArrayOf
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class arrIterable extends ArrayOfObject
{
    /**
     * Tipo de objeto que este array está apto a receber.
     *
     * @var         string
     */
    const TYPE_OF_ARRAY = "iterable";




    /**
     * Valor equivalente a ``null`` para este array.
     *
     * @var         mixed
     */
    protected static $nullValue = [];
    /**
     * Retorna um valor convencionado para representar ``null``
     * para os objetos deste tipo.
     *
     * @return      iterable
     */
    public static function getNull() : iterable
    {
        return static::$nullValue;
    }



    /**
     * Retorna o objeto no indice especificado.
     *
     * @param       int|string $key
     *              Índice.
     *
     * @return      iterable
     */
    public function get($key) : iterable
    {
        return parent::get($key);
    }
}
