<?php
declare (strict_types=1);

namespace AeonDigital\Objects\ArrayOf\Types;

use AeonDigital\Objects\ArrayOf\Abstracts\ArrayOfObject as ArrayOfObject;








/**
 * Array de ``DateTime``.
 *
 * @package     AeonDigital\Objects\ArrayOf
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class arrDateTime extends ArrayOfObject
{
    /**
     * Tipo de objeto que este array está apto a receber.
     *
     * @var         string
     */
    const TYPE_OF_ARRAY = "\DateTime";




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
    public static function getNull() : \DateTime
    {
        if (static::$nullValue === null) {
            static::$nullValue = new \DateTime("01/01/0001 00:00:00");
        }
        return static::$nullValue;
    }



    /**
     * Retorna o objeto no indice especificado.
     *
     * @param       int|string $key
     *              Índice.
     *
     * @return      \DateTime
     */
    public function get($key) : \DateTime
    {
        return parent::get($key);
    }
}
