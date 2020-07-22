<?php
declare (strict_types=1);

namespace AeonDigital\Objects;










/**
 * Classe básica.
 *
 * Desabilita "métodos mágicos" por padrão para que sejam utilizados apenas quando
 * explicitamente definidos nas classes concretas.
 *
 * @package     AeonDigital\Objects
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
abstract class BObject
{



    /**
     * Desabilita a função mágica ``__set``.
     *
     * @codeCoverageIgnore
     */
    public function __set($name, $value)
    {
        throw new \RuntimeException("Unable to use \"__set\" method.");
    }
    /**
     * Desabilita a função mágica ``__get``.
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
    public static function __set_state(array $state)
    {
        /*
         * O resultado de um ``var_export`` pode ser usado após usando
         * ``eval('$var = ' . $exported . ';');``. Internamente, o ``eval`` chamará este método
         * e as propriedades passadas serão definidas.
         */
        throw new \RuntimeException("Unable to use \"__set_state\" method.");
    }
}
