<?php
declare (strict_types=1);

namespace AeonDigital;

use AeonDigital\Tools as Tools;








/**
 * Classe básica.
 *
 * @package     AeonDigital
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class BObject
{



    /**
     * Desabilita a função mágica ``__set`` para assegurar a que apenas alterações dentro das
     * regras definidas para a classe sejam possíveis.
     *
     * @codeCoverageIgnore
     */
    public function __set($name, $value)
    {
        throw new \RuntimeException("Unable to use \"__set\" method.");
    }
    /**
     * Desabilita a função mágica ``__sget`` para assegurar a que apenas alterações dentro das
     * regras definidas para a classe sejam possíveis.
     *
     * @codeCoverageIgnore
     */
    public function __get($name)
    {
        throw new \RuntimeException("Unable to use \"__get\" method.");
    }
    /**
     * Desabilita a função mágica ``__isset``.
     *
     * @codeCoverageIgnore
     */
    public function __isset($name)
    {
        throw new \RuntimeException("Unable to use \"__isset\" method.");
    }
    /**
     * Desabilita a função mágica ``__unset``.
     *
     * @codeCoverageIgnore
     */
    public function __unset($name)
    {
        throw new \RuntimeException("Unable to use \"__unset\" method.");
    }


    /**
     * Desabilita a função mágica ``__toString``.
     *
     * @codeCoverageIgnore
     */
    public function __toString()
    {
        throw new \RuntimeException("Unable to use \"__toString\" method.");
    }


    /**
     * Desabilita a função mágica ``__invoke``.
     *
     * @codeCoverageIgnore
     */
    public function __invoke($x)
    {
        throw new \RuntimeException("Unable to use \"__invoke\" method.");
    }


    /**
     * Desabilita a função mágica ``__set_state``.
     *
     * @codeCoverageIgnore
     */
    public static function __set_state($assoc_array)
    {
        throw new \RuntimeException("Unable to use \"__set_state\" method.");
    }


    /**
     * Desabilita a função mágica ``__clone ``.
     *
     * @codeCoverageIgnore
     */
    public function __clone()
    {
        throw new \RuntimeException("Unable to use \"__clone \" method.");
    }
}
