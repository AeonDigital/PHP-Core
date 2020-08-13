<?php
declare (strict_types=1);

namespace AeonDigital\Interfaces\Objects;

use AeonDigital\Interfaces\Objects\iType as iType;








/**
 * Expande um ``iType`` para que ele possa ser utilizado
 * como um campo de dados.
 *
 * @package     AeonDigital\Interfaces\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
interface iField extends iType
{





    /**
     * Retorna o nome do campo.
     *
     * @return      string
     */
    function getName() : string;
    /**
     * SET
     * Define o nome do campo.
     * O nome de um campo apenas pode aceitar caracteres ``a-zA-Z0-9_``.
     */



     /**
     * Retorna a descrição de uso/funcionalidade do campo.
     *
     * @return      string
     */
    function getDescription() : string;





    /**
     * Indica quando o campo é um modelo de dados.
     *
     * @return      bool
     */
    function isDataModel() : bool;
    /**
     * Indica quando o campo é um array de modelos de dados.
     *
     * @return      bool
     */
    function isDataModelCollection() : bool;
}
