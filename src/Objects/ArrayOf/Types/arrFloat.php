<?php
declare (strict_types=1);

namespace AeonDigital\Objects\ArrayOf\Types;

use AeonDigital\Objects\ArrayOf\Abstracts\ArrayOfObject as ArrayOfObject;








/**
 * Array de ``float``.
 *
 * @package     AeonDigital\Objects\ArrayOf
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class arrFloat extends ArrayOfObject
{
    /**
     * Tipo de objeto que este array está apto a receber.
     *
     * @var         string
     */
    const TYPE_OF_ARRAY = "float";




    /**
     * Valor equivalente a ``null`` para este array.
     *
     * @var         mixed
     */
    protected static $nullValue = 0;
    /**
     * Retorna um valor convencionado para representar ``null``
     * para os objetos deste tipo.
     *
     * @return      float
     */
    public static function getNull() : float
    {
        return static::$nullValue;
    }



    /**
     * Retorna o objeto no indice especificado.
     *
     * @param       int|string $key
     *              Índice.
     *
     * @return      float
     */
    public function get($key) : float
    {
        return parent::get($key);
    }
}
