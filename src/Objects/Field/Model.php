<?php
declare (strict_types=1);

namespace AeonDigital\Objects\Data;

use AeonDigital\Objects\Types\Commom\tROType as tROType;
use AeonDigital\Interfaces\Objects\iModel as iModel;







/**
 * Modelo de dados ``iModel``.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
class Model extends tROType implements iModel
{
    // Fazer agir como um modelo de tipos simples primeiro.
    // Depois, criar um tipo ``iType`` que use ``iModel``
    //      Especializar em um tipo ``array``
    // Criar outros 2 tipos sendo 1 ``iModel`` e outro ``iModelArray``
}
