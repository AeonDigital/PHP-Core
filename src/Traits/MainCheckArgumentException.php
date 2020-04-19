<?php
declare (strict_types=1);

namespace AeonDigital\Traits;










/**
 * Coleção de métodos que tem como função prover às classes implementadoras um formato padronizado
 * para verificação de argumentos e mensagens de erro para quando os mesmos forem disparados.
 *
 * @package     AeonDigital\Traits
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
trait MainCheckArgumentException
{




    /**
     * Propriedade encarregada de armazenar a mensagem que deve ser mostrada ao disparar
     * a exception.
     *
     * @var         string
     */
    private string $invalidArgumentExceptionMessage = "";
    /**
     * Mensagem customizada para casos especiais.
     *
     * @var         string
     */
    private string $customInvalidArgumentExceptionMessage = "";
    /**
     * Indica se deve ou não mostrar o valor recebido do argumento no momento
     * em que a validação falhou.
     *
     * @var         bool
     */
    private bool $showArgumentInExceptionMessage = true;
    /**
     * Indica quando deve ou não lançar a exception em caso de falhar na validação.
     *
     * @var         bool
     */
    private bool $throwsExceptionOnValidateFail = true;
    /**
     * Indica o resultado da última validação efetuada.
     *
     * @var         bool
     */
    private bool $lastArgumentValidateResult = true;
    /**
     * Retorna o resultado da última validação efetuada.
     *
     * @return      bool
     */
    protected function getLastArgumentValidateResult() : bool
    {
        return $this->lastArgumentValidateResult;
    }



    /**
     * Efetivamente dispara a exception caso alguma mensagem de erro esteja presente.
     *
     * @param       mixed $argValue
     *              Valor do argumento no momento da falha.
     *
     * @return      void
     *
     * @throws      \InvalidArgumentException
     */
    private function throwInvalidArgumentException($argValue) : void
    {
        $this->lastArgumentValidateResult = true;
        if ($this->invalidArgumentExceptionMessage !== "")
        {
            $this->lastArgumentValidateResult = false;


            if ($this->throwsExceptionOnValidateFail === true) {
                $exceptionMessage = (
                    ($this->customInvalidArgumentExceptionMessage === "") ?
                    $this->invalidArgumentExceptionMessage :
                    $this->customInvalidArgumentExceptionMessage
                );


                if ($this->showArgumentInExceptionMessage === true) {
                    $strArg = "";
                    if ($argValue === null) { $strArg = "``null``"; }
                    elseif ($argValue === 0) { $strArg = "0"; }
                    else {
                        $strArg = \trim(\AeonDigital\Tools::toString($argValue));
                    }
                    if ($strArg !== "") {
                        $exceptionMessage .= " Given: [ " . $strArg . " ]";
                    }
                }
                throw new \InvalidArgumentException($exceptionMessage);
            }
        }
    }





    /**
     * Efetua a verificação do valor do argumento passado conforme as regras descritas
     * no ``array`` de validação.
     *
     * @param       string $argName
     *              Nome do argumento que está sendo testado.
     *
     * @param       mixed $argValue
     *              Valor do argumento.
     *
     * @param       array $validateRules
     *              Regras para as validações.
     *
     *              De forma básica este parametro pode ser um array de strings onde cada um
     *              dos itens passados informa um tipo de validação, ou, cada item passado
     *              é um array associativo que deve ser compatível com a validação que está
     *              sendo exigida.
     *
     *              No caso de usar um array associativo, a única chave obrigatória
     *              é a "validate" que deve conter a própria string que identifica a validação
     *              que deve ser feita.
     *
     *              Quando presente, a chave "conditions" deve ter como valor um array de strings
     *              contendo cada tipo de verificação a ser feito ANTES que as validações relacionadas
     *              iniciem OU pode ser um objeto "closure" com a verificação que precisa ser realizada.
     *
     *              As chaves "executeBeforeConditions", "executeBeforeValidate" e "executeBeforeReturn",
     *              quando presentes, devem  ser objetos "closure" que tem como função efetuar uma ação
     *              sobre o próprio valor que foi passado em ``$argValue``.
     *              "executeBeforeConditions" é executada SEMPRE.
     *              "executeBeforeValidate" apenas é executada se as condições de validação forem corretas.
     *              "executeBeforeReturn" apenas é executada se a validação ocorrer sem erros.
     *
     *              A chave "customErrorMessage" pode ser usada quando, por algum motivo, seja necessário
     *              usar uma mensagem de erro própria.
     *
     *              A chave "showArgumentInMessage" deve indicar (``true|false``) se deve ou não mostrar
     *              o valor atual do argumento que falhou ao ser processado.
     *
     * @param       ?bool $throws
     *              Indica quando é para lançar a exception.
     *
     * @return      mixed
     *              Retornará o próprio ``$argValue`` ou, sua versão modificada por qualquer das
     *              funções especiais indicadas em ``$validateRules``.
     *
     * @throws      \InvalidArgumentException
     *              Quando o argumento falhar em sua verificação irá, necessariamente disparar
     *              esta exception.
     */
    protected function mainCheckForInvalidArgumentException(
        string $argName,
        $argValue,
        array $validateRules,
        ?bool $throws = null
    ) {
        if ($throws !== null) {
            $this->throwsExceptionOnValidateFail = $throws;
        }

        foreach ($validateRules as $rules) {
            $argValue = $this->checkForInvalidArgumentException(
                $argName,
                $argValue,
                $rules
            );
        }

        return $argValue;
    }





    /**
     * Verifica se o argumento recebido está de acordo com as regras de validações
     * especificadas em ``$rules``.
     *
     * @param       string $argName
     *              Nome do argumento que está sendo testado.
     *
     * @param       mixed $argValue
     *              Valor do argumento.
     *
     * @param       string|array $rules
     *              Regras para as validações.
     *
     * @return      mixed
     *              Retornará o próprio ``$argValue`` ou, sua versão modificada por qualquer das
     *              funções especiais indicadas em ``$validateRules``.
     *
     * @throws      \InvalidArgumentException
     *              Quando o argumento falhar em sua verificação irá, necessariamente disparar
     *              esta exception.
     */
    protected function checkForInvalidArgumentException(
        string $argName,
        $argValue,
        $rules
    ) {
        $this->invalidArgumentExceptionMessage = "";
        $this->customInvalidArgumentExceptionMessage = "";
        $this->showArgumentInExceptionMessage = true;

        $executeBeforeConditions    = null;
        $conditions                 = null;
        $executeBeforeValidate      = null;
        $validate                   = null;
        $executeBeforeReturn        = null;

        $meetsConditions            = true;
        $validateOrNull             = false;
        $validateSubArguments       = [
            "argName"   => $argName,
            "argValue"  => $argValue
        ];


        if (\is_string($rules) === true) {
            $validate = $rules;
        }
        else {
            $executeBeforeConditions    = $rules["executeBeforeConditions"] ?? null;
            $conditions                 = $rules["conditions"] ?? null;
            $executeBeforeValidate      = $rules["executeBeforeValidate"] ?? null;
            $validate                   = $rules["validate"];
            $executeBeforeReturn        = $rules["executeBeforeReturn"] ?? null;

            if ($conditions !== null && \is_array($conditions) === false) {
                $conditions = [$conditions];
            }

            $validateSubArguments = \array_merge($validateSubArguments, $rules);
        }

        $validate = \str_replace(" ", "_", \mb_strtolower($validate));
        if (\mb_str_ends_with($validate, "_or_null") === true) {
            $validateOrNull = true;
            $validate = \str_replace("_or_null", "", $validate);
        }



        // Verifica se as condições para que a verificação seja feita estão sendo
        // satisfeitas.
        // Qualquer falha nestas condições irá fazer pular a fase de validação.
        if ($conditions !== null) {
            if ($executeBeforeConditions !== null) {
                $argValue = $executeBeforeConditions($validateSubArguments);
                $validateSubArguments["argValue"] = $argValue;
            }


            foreach ($conditions as $cond) {
                if ($meetsConditions === true) {
                    $cond = \str_replace(" ", "_", \mb_strtolower($cond));
                    if (\is_string($cond) === true) {
                        $fn = "checkArgument_$cond";
                        $meetsConditions = $this->$fn($validateSubArguments);
                    }
                    else {
                        $meetsConditions = $cond($validateSubArguments);
                    }
                }
            }

            $this->invalidArgumentExceptionMessage = "";
        }



        if ($meetsConditions === true) {
            // Apenas efetua a validação
            // SE
            // o tipo de validação NÃO ACEITA ``null``
            // OU SE
            // o tipo de validação ACEITA ``null``,
            // porém, o argumento passado é DIFERENTE DE ``null``
            if ($validateOrNull === false || $validateOrNull === true && $argValue !== null) {
                if ($executeBeforeValidate !== null) {
                    $argValue = $executeBeforeValidate($validateSubArguments);
                    $validateSubArguments["argValue"] = $argValue;
                }

                $fn = "checkArgument_$validate";
                $isOk = $this->$fn($validateSubArguments);


                // Se passou na validação E possui um tratamento ANTES
                // do valor ser retornado... executa-o
                if ($isOk === true && $executeBeforeReturn !== null) {
                    $argValue = $executeBeforeReturn($validateSubArguments);
                }
            }
        }



        if (\is_array($rules) === true && \key_exists("customErrorMessage", $rules) === true) {
            $this->customInvalidArgumentExceptionMessage = $rules["customErrorMessage"];
        }
        if (\is_array($rules) === true && \key_exists("showArgumentInMessage", $rules) === true) {
            $this->showArgumentInExceptionMessage = $rules["showArgumentInMessage"];
        }
        $this->throwInvalidArgumentException($argValue);
        return $argValue;
    }




    /**
     * Dispara uma falha genérica.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_fail(array $rules) : bool
    {
        $argName = $rules["argName"];
        $this->invalidArgumentExceptionMessage = "Invalid value defined for \"$argName\".";
        return false;
    }




    /**
     * Verifica se o argumento passado é diferente de ``null``.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_not_null(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if ($argValue === null) {
            $err = "Invalid value defined for \"$argName\". Expected not null value.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é diferente do tipo string.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_string(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_string($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected string.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é diferente do tipo string.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_string_not_empty(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_string($argValue) === false || $argValue === "") {
            $err = "Invalid value defined for \"$argName\". Expected non empty string.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é uma string compatível com o padrão informado.
     * São esperados os seguintes parâmetros:
     * - "patternPregMatch" :   objeto regex a ser usado para a verificação.
     * - "errorShowPattern" :   versão ``string`` do mesmo regex que será adicionado na
     *                          mensagem de erro caso necessário.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_string_matches_pattern(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];
        $patternPregMatch = $rules["patternPregMatch"];
        $errorShowPattern = $rules["errorShowPattern"];


        if (\is_string($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected string that matches the ``$errorShowPattern`` pattern ";
            $r = false;
        }
        else {
            \preg_match($patternPregMatch, $argValue, $fnd);

            if (\count($fnd) === 0) {
                $err = "Invalid value defined for \"$argName\". Expected string that matches the ``$errorShowPattern`` pattern.";
                $r = false;
            }
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }





    /**
     * Verifica se o argumento passado é um tipo numérico.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_numeric(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_int($argValue) === false && \is_float($argValue) === false && \is_numeric($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected numeric.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um tipo numérico e maior que zero.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_numeric_greather_than_zero(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_int($argValue) === false && \is_float($argValue) === false && \is_numeric($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected numeric greather than zero.";
            $r = false;
        }
        else {
            if (\floatval($argValue) <= 0) {
                $err = "Invalid value defined for \"$argName\". Expected numeric greather than zero.";
                $r = false;
            }
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um tipo numérico e maior ou igual a zero.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_numeric_greather_than_or_equal_to_zero(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_int($argValue) === false && \is_float($argValue) === false && \is_numeric($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected numeric greather than or equal to zero.";
            $r = false;
        }
        else {
            if (\floatval($argValue) < 0) {
                $err = "Invalid value defined for \"$argName\". Expected numeric greather than or equal to zero.";
                $r = false;
            }
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }





    /**
     * Verifica se o argumento passado é um tipo integer.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_integer(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_int($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected integer.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um tipo integer e maior que zero.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_integer_greather_than_zero(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_int($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected integer greather than zero.";
            $r = false;
        }
        else {
            if ($argValue <= 0) {
                $err = "Invalid value defined for \"$argName\". Expected integer greather than zero.";
                $r = false;
            }
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um tipo integer e maior ou igual a zero.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_integer_greather_than_or_equal_to_zero(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_int($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected integer greather than or equal to zero.";
            $r = false;
        }
        else {
            if ($argValue < 0) {
                $err = "Invalid value defined for \"$argName\". Expected integer greather than or equal to zero.";
                $r = false;
            }
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }





    /**
     * Verifica se o argumento passado é um tipo float.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_float(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_float($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected float.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um tipo float e maior que zero.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_float_greather_than_zero(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_float($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected float greather than zero.";
            $r = false;
        }
        else {
            if ($argValue <= 0) {
                $err = "Invalid value defined for \"$argName\". Expected float greather than zero.";
                $r = false;
            }
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um tipo float e maior ou igual a zero.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_float_greather_than_or_equal_to_zero(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_float($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected float greather than or equal to zero.";
            $r = false;
        }
        else {
            if ($argValue < 0) {
                $err = "Invalid value defined for \"$argName\". Expected float greather than or equal to zero.";
                $r = false;
            }
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }





    /**
     * Verifica se o argumento passado é um tipo array.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_array(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_array($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected array.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um tipo array que não esteja vazio.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_array_not_empty(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_array($argValue) === false || $argValue === []) {
            $err = "Invalid value defined for \"$argName\". Expected a non-empty array.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um tipo array associativo.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_array_assoc(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\array_is_assoc($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected array assoc.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um array simples, não associativo.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_not_array_assoc(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_array($argValue) === true && \array_is_assoc($argValue) === true) {
            $err = "Invalid value defined for \"$argName\". Expected simple array (not assoc).";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um array com exatos "x" valores.
     * São esperados os seguintes parâmetros:
     * - "expectedCountValues" :    Quantidade de itens que o array deve ter.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_array_with_x_values(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];
        $expectedCountValues = $rules["expectedCountValues"];


        if (\is_array($argValue) !== true || \count($argValue) !== $expectedCountValues) {
            $err = "Invalid value defined for \"$argName\". Expected an array with exact $expectedCountValues itens.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é um array associativo contendo as chaves definidas.
     * São esperados os seguintes parâmetros:
     * - "requiredKeys" :   Array associativo onde, cada chave expressa o nome de uma chave que
     *                      deve estar presente no argumento principal, e, seus valores, devem ser
     *                      um outro array associativo contendo a validação daquele sub-valor.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_has_array_assoc_required_keys(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];
        $requiredKeys = $rules["requiredKeys"];


        $strKeys = \implode(", ", \array_keys($requiredKeys));



        if (\array_is_assoc($argValue) !== true) {
            $err = "Invalid value defined for \"$argName\". Expected an assoc array with the keys \"$strKeys\".";
        }
        else {
            foreach ($requiredKeys as $key => $subRules) {
                if ($r === true) {
                    if (\key_exists($key, $argValue) === false) {
                        $err = "Invalid value defined for \"$argName\". Expected an assoc array with the keys \"$strKeys\".";
                        $r = false;
                    }
                    else {
                        if (\is_array($subRules) === true) {
                            $this->mainCheckForInvalidArgumentException(
                                $argName . "['$key']",
                                $argValue[$key],
                                $subRules
                            );
                        }
                    }
                }
            }
        }


        $this->showArgumentInExceptionMessage = false;
        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se cada um dos objetos filhos de um array correspondem as definições de validações.
     * São esperados os seguintes parâmetros:
     * - "foreachChild" :   Array associativo que deve ter a coleção de regras como se fosse um único
     *                      objeto ``$rules`` mas que será aplicado a cada item filho de forma individual.
     *                      OU
     *                      Closure que será usada para a validação de cada objeto separadamente.
     *                      neste caso use: function($key, $value) { return bool; }
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_foreach_array_child(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];
        $foreachChild = $rules["foreachChild"];


        if (\is_callable($foreachChild) === true) {
            foreach ($argValue as $key => $value) {
                if ($r === true) {
                    $r = $foreachChild($key, $value);
                }
            }
        }
        else {
            foreach ($foreachChild as $childRule) {
                foreach ($argValue as $key => $value) {
                    if ($r === true) {
                        $this->checkForInvalidArgumentException(
                            $argName . "['$key']", $value, $childRule
                        );
                    }
                }
            }
        }


        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }




    /**
     * Verifica se o argumento passado é igual a um dos valores permitidos.
     * São esperados os seguintes parâmetros:
     * - "allowedValues"    : Array simples indicando quais os valores são válidos.
     * - "caseInsensitive"  : Se ``true`` fará a comparação de forma 'case-insensitive'.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_allowed_value(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];
        $allowedValues = $rules["allowedValues"];
        $caseInsensitive = ((isset($rules["caseInsensitive"]) === true) ? $rules["caseInsensitive"] : false);


        if ($caseInsensitive === true) {
            if (\array_in_ci($argValue, $allowedValues) === false) {
                $err = "Invalid value defined for \"$argName\". Expected [ " . \implode(", ", $allowedValues) . " ].";
                $r = false;
            }
        }
        else {
            if (\in_array($argValue, $allowedValues) === false) {
                $err = "Invalid value defined for \"$argName\". Expected [ " . \implode(", ", $allowedValues) . " ].";
                $r = false;
            }
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }





    /**
     * Utiliza uma closure para validar o valor do argumento.
     * São esperados os seguintes parâmetros:
     * - "closure"    : function($arg) { return bool; }
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_closure(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];
        $closure = $rules["closure"];


        if ($closure($argValue) === false) {
            $err = "Invalid value defined for \"$argName\".";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é ``callable``.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_callable(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_callable($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected callable.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é o nome de uma classe que existe.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_class_exists(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\class_exists($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". The given class name does not exists.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado é o nome de uma classe que implementa a interface
     * definida em "interface".
     * São esperados os seguintes parâmetros:
     * - "interface"    : Namespace da interface que será testada
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_class_implements_interface(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];
        $interface = $rules["interface"];

        if (\class_exists($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected Namespace of class thats implements the interface $interface.";
            $r = false;
        }
        else {
            $typeReflection = new \ReflectionClass($argValue);
            if ($typeReflection->implementsInterface($interface) === false) {
                $err = "Invalid value defined for \"$argName\". Expected Namespace of class thats implements the interface $interface.";
                $r = false;
            }
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }





    /**
     * Verifica se o argumento passado é do tipo "resource".
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_resource(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = $rules["argValue"];


        if (\is_resource($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Expected resource type.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado corresponde ao caminho para um
     * diretório ou arquivo existente.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_resource_exists(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = \to_system_path($rules["argValue"]);


        if (\is_dir($argValue) === false && \is_file($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Resource does not exists.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado corresponde ao caminho para um
     * diretório existente.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_dir_exists(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = \to_system_path($rules["argValue"]);


        if (\is_dir($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". Directory does not exists.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
    /**
     * Verifica se o argumento passado corresponde ao caminho para um
     * file existente.
     *
     * @param       array $rules
     *              Regras para as validações.
     *
     * @return      bool
     */
    protected function checkArgument_is_file_exists(array $rules) : bool
    {
        $r = true;
        $err = "";
        $argName = $rules["argName"];
        $argValue = \to_system_path($rules["argValue"]);


        if (\is_file($argValue) === false) {
            $err = "Invalid value defined for \"$argName\". File does not exists.";
            $r = false;
        }

        $this->invalidArgumentExceptionMessage = $err;
        return $r;
    }
}
