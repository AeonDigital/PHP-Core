<?php

declare(strict_types=1);

namespace AeonDigital;

use AeonDigital\Interfaces\iRealType as iRealType;
use AeonDigital\BObject as BObject;






/**
 * Permite operações matemáticas com números reais de qualquer precisão decimal.
 *
 * Utiliza a extenção matemática **BC Math**.
 *
 * @package     AeonDigital
 * @author      Rianna Cantarelli <rianna@aeondigital.com.br>
 * @copyright   2020, Rianna Cantarelli
 * @license     MIT
 */
final class RealType extends BObject implements iRealType
{
    use \AeonDigital\Traits\MainCheckArgumentException;




    /**
     * Valor atual do numeral representado.
     *
     * @var     string
     */
    protected string $val = "0";
    /**
     * Parte inteira do numeral representado.
     *
     * @var     string
     */
    protected string $integerPart = "0";
    /**
     * Parte decimal do numeral representado.
     *
     * @var     string
     */
    protected string $decimalPart = "0";
    /**
     * Total de dígitos usados para a representação deste numeral.
     *
     * Trata-se da soma do total de casas antes e após o separador decimal.
     *
     * @var     int
     */
    protected int $totalDigits = 0;
    /**
     * Total de dígitos usados para a representação da parte inteira deste valor.
     *
     * @var     int
     */
    protected int $totalIntegerDigits = 0;
    /**
     * Total de dígitos usados para a representação da parte decimal deste valor.
     *
     * @var     int
     */
    protected int $totalDecimalDigits = 0;





    /**
     * Retorna o valor que esta instância está representando.
     *
     * @return      string
     */
    public function value(): string
    {
        return $this->val;
    }
    /**
     * Retorna apenas a parte inteira do numeral representado por esta instância.
     *
     * @return      string
     */
    public function getIntegerPart(): string
    {
        $parts = \explode(".", $this->val);
        return $parts[0];
    }
    /**
     * Retorna apenas a parte decimal do numeral representado por esta instância.
     *
     * @return      string
     */
    public function getDecimalPart(): string
    {
        $r = "";
        if (\strpos($this->val, ".") !== false) {
            $parts = \explode(".", $this->val);
            $r = $parts[1];
        } else {
            $r = \str_pad("", static::$globalDecimalPlaces, "0", STR_PAD_LEFT);
        }

        return (($r === "") ? "0" : $r);
    }
    /**
     * Retorna o total de dígitos que compõe este numeral somando o total de casas antes e após
     * o separador decimal.
     *
     * @return      int
     */
    public function precision(): int
    {
        return $this->totalDigits;
    }
    /**
     * Retorna o total de digitos que são usados para representar a parte inteira do numeral
     * atual.
     *
     * @return      int
     */
    public function integerPlaces(): int
    {
        return $this->totalIntegerDigits;
    }
    /**
     * Retorna o total de digitos que são usados para representar a parte decimal do numeral
     * atual.
     *
     * @return      int
     */
    public function decimalPlaces(): int
    {
        return $this->totalDecimalDigits;
    }










    /**
     * Valor padrão para a quantidade de casas decimais que devem ser levadas em conta nas
     * operações que exigem o parametro ``$dPlaces``.
     *
     * @var         int
     */
    protected static int $globalDecimalPlaces = 0;




    /**
     * Permite definir um valor padrão para o argumento ``$dPlaces`` usado em vários métodos
     * desta classe.
     *
     * Quando algum método que usa o argumento ``$dPlaces`` for igual a ``null``, o valor aqui
     * definido é que será usado.
     *
     * @param       int $v
     *              Valor padrão a ser usado.
     *
     * @return      void
     */
    public static function defineGlobalDecimalPlaces(int $v): void
    {
        if ($v < 0) {
            $v = 0;
        }
        static::$globalDecimalPlaces = $v;
    }



    /**
     * Retorna o número de casas decimais sendo usadas no momento para fins de cálculos com esta
     * classe.
     *
     * @return      int
     */
    public static function getGlobalDecimalPlaces(): int
    {
        return static::$globalDecimalPlaces;
    }



    /**
     * Retorna a quantidade de casas decimais que devem ser usadas para a operação.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @return      int
     */
    protected function useDecimalPlaces(?int $dPlaces = null): int
    {
        return (($dPlaces === null) ? static::$globalDecimalPlaces : (($dPlaces < 0) ? 0 : $dPlaces));
    }










    /**
     * Forma padrão usada para o arredondamento dos valores.
     *
     * @var         ?string
     */
    protected static ?string $globalRoundType = null;
    /**
     * Indica o nível de **sensibilidade** a partir do qual os valores calculados deverão ser
     * arredondados.
     *
     * @var         ?iRealType
     */
    protected static ?iRealType $globalRoundSensibility = null;
    /**
     * Indica quando, internamente, os arredondamentos NÃO devem ser efetuados para evitar
     * loopings.
     *
     * @var         ?bool
     */
    protected static ?bool $globalRoundDisabled = null;




    /**
     * Define a forma padrão pela qual os valores, quando calculados, serão arredondados.
     *
     * @param       ?string $roundType
     *              Indica o tipo de arredondamento que será feito.
     *              Valores inválidos não incorrerão em erros e nem em nenhuma conversão.
     *
     *              Os valores aceitos são:
     *              ``floor``   :   Arredondará para baixo qualquer valor a partir do
     *                              **digito sensível**.
     *              ``ceil``    :   Arredondará para cima todo valor diferente de zero a partir
     *                              do **digito sensível**.
     *              ``floor-n`` :   Arredondará para baixo todo **digito sensível** que seja
     *                              igual ou menor que ``n`` e para cima todo **digito sensível**
     *                              maior que ``n``.
     *              ``ceil-n``  :   Arredondará para cima todo **digito sensível** que seja igual
     *                              ou maior que ``n`` e para baixo todo **digito sensível** menor
     *                              que ``n``.
     *
     * @param       iRealType $sensibility
     *              A sensibilidade é sempre um valor que indica qual será exatamente o digito que
     *              será sensível ao arredondamento.
     *
     *              Por exemplo: ``0.001`` fará o arredondamento do número a partir do 3º digito após
     *              o ponto decimal enquanto ``10`` fará o arredondamento das casas das dezenas.
     *
     * @return      void
     */
    public static function defineGlobalRoundType(?string $roundType, ?iRealType $sensibility): void
    {
        if (static::isValidRoundType($roundType, $sensibility) === false) {
            static::$globalRoundType = null;
            static::$globalRoundSensibility = null;
            static::$globalRoundDisabled = null;
        } else {
            static::$globalRoundType = \strtolower($roundType);
            static::$globalRoundSensibility = $sensibility;
            static::$globalRoundDisabled = false;
        }
    }
    /**
     * Indica se os valores passados para a configuração do arredondamento de valores são válidos.
     *
     * @param       ?string $roundType
     *              Tipo de arredondamento.
     *
     * @param       ?iRealType $sensibility
     *              Sensibilidade usada para o arredondamento.
     *
     * @return      bool
     *              Retornará ``true`` quando o tipo indicado for válido.
     */
    protected static function isValidRoundType(?string $roundType, ?iRealType $sensibility): bool
    {
        $r = false;
        if ($sensibility !== null && $roundType !== null) {
            $strSen = $sensibility->value();
            if (\preg_replace("/[^" . \preg_quote("01.", "/") . "]/", "", $strSen) === $strSen) {
                $roundType = \strtolower($roundType);
                if (\strpos($roundType, "floor") === 0 || \strpos($roundType, "ceil") === 0) {
                    $parts = \explode("-", $roundType);
                    $r = (\count($parts) === 1 ||
                        (\count($parts) === 2 && \strlen($parts[1]) === 1 && \is_numeric($parts[1]))
                    );
                }
            }
        }
        return $r;
    }
    /**
     * Retorna o tipo de arredondamento definido para os cálculos realizados com esta classe.
     *
     * @return      ?string
     */
    public static function getRoundType(): ?string
    {
        return static::$globalRoundType;
    }
    /**
     * Retorna o nível de sensibilidade usada para os arredondamentos.
     *
     * @return      ?iRealType
     */
    public static function getRoundSensibility(): ?iRealType
    {
        return static::$globalRoundSensibility;
    }









    /**
     * Inicia um novo objeto ``iRealType`` com o valor indicado.
     *
     * @param       int|float|string|iRealType $v
     *              Valor inicial.
     *
     * @throws      \InvalidArgumentException
     *              Lançado se o valor inicial indicado não for aceitável para iniciar o objeto.
     */
    function __construct(int|float|string|iRealType $v = 0)
    {
        if ($v === "") {
            $v = 0;
        }
        $this->mainCheckForInvalidArgumentException(
            "v",
            $v,
            [
                [
                    "validate"          => "closure",
                    "closure"           => function ($argValue) {
                        return RealType::isValidRealType($argValue);
                    },
                    "customErrorMessage" => "Argument must be a valid iRealType."
                ]
            ]
        );


        if (\is_int($v) === true || \is_float($v) === true || \is_string($v) === true) {
            $this->val = (string)$v;
        } else {
            $this->val = $v->value();
        }


        if (\strpos($this->val, ".") !== false) {
            $s = \explode(".", $this->val);
            $this->integerPart = $s[0];
            $this->decimalPart = $s[1];


            if ((float)$this->decimalPart === 0.0) {
                $this->val = $this->integerPart;
                $this->decimalPart = "0";
            }
        } else {
            $this->integerPart = $this->val;
        }

        $i = \strlen($this->integerPart);
        $d = (($this->decimalPart === "0") ? 0 : \strlen($this->decimalPart));
        $this->totalDigits = ($i + $d);
        $this->totalIntegerDigits = $i;
        $this->totalDecimalDigits = $d;
    }





    /**
     * Identifica se o valor passado é um ``iRealType`` válido.
     *
     * @param       mixed $v
     *              Valor a ser testado.
     *
     * @return      bool
     *              Retorna ``true`` se o valor passado for válido.
     */
    static public function isValidRealType(mixed $v): bool
    {
        $r = false;

        if (
            \is_int($v) === true ||
            \is_float($v) === true ||
            (\is_string($v) === true && \is_numeric($v) === true)
        ) {
            $r = true;
        } elseif (\is_object($v) === true) {
            $typeReflection = new \ReflectionClass($v);
            $r = $typeReflection->implementsInterface("AeonDigital\\Interfaces\\iRealType");
        }

        return $r;
    }









    /**
     * Efetua a comparação entre o valor desta instância e o valor indicado.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para comparação.
     *
     * @return      int
     *              Retornará ``0`` quando os dois operandos são iguais.
     *              ``1`` se a instância atual é maior que o valor passado em ``$v``.
     *              ``-1`` se a instância atual é menor que o valor passado em ``$v``.
     */
    protected function compareValues(int|float|string|iRealType $v): int
    {
        $d = new RealType($v);
        $dL = \max($this->decimalPlaces(), $d->decimalPlaces());
        return \bccomp($this->value(), $d->value(), $dL);
    }










    /**
     * Verifica se o valor atual desta instância é igual ao valor passado para comparação.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para comparação.
     *
     * @return      bool
     *              Retorna ``true`` se o valor atual desta instância e o valor passado em ``$v``
     *              forem **IDÊNTICOS**.
     */
    public function isEqualAs(int|float|string|iRealType $v): bool
    {
        return ($this->compareValues($v) === 0);
    }



    /**
     * Verifica se o valor atual desta instância é maior que o valor passado para comparação.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para comparação.
     *
     * @return      bool
     *              Retornará ``true`` se o valor atual desta instância é **MAIOR** que o valor
     *              indicado em ``$v``.
     */
    public function isGreaterThan(int|float|string|iRealType $v): bool
    {
        return ($this->compareValues($v) === 1);
    }



    /**
     * Verifica se o valor atual desta instância é maior ou igual ao valor passado para comparação.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para comparação.
     *
     * @return      bool
     *              Retornará ``true`` se o valor atual desta instância é **MAIOR** ou **IGUAL**
     *              ao o valor indicado em ``$v``.
     */
    public function isGreaterOrEqualAs(int|float|string|iRealType $v): bool
    {
        $r = $this->compareValues($v);
        return ($r === 0 || $r === 1);
    }



    /**
     * Verifica se o valor atual desta instância é menor que o valor passado para comparação.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para comparação.
     *
     * @return      bool
     *              Retornará ``true`` se o valor atual desta instância é **MENOR** que o valor
     *              indicado em ``$v``.
     */
    public function isLessThan(int|float|string|iRealType $v): bool
    {
        return ($this->compareValues($v) === -1);
    }



    /**
     * Verifica se o valor atual desta instância é menor ou igual ao valor passado para comparação.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para comparação.
     *
     * @return      bool
     *              Retornará ``true`` se o valor atual desta instância é **MENOR** ou **IGUAL**
     *              ao o valor indicado em ``$v``.
     */
    public function isLessOrEqualAs(int|float|string|iRealType $v): bool
    {
        $r = $this->compareValues($v);
        return ($r === 0 || $r === -1);
    }










    /**
     * Verifica se o valor atual desta instância é ``zero``.
     *
     * @return      bool
     *              Retornará ``true`` se o valor atual desta instância for ``zero``.
     */
    public function isZero(): bool
    {
        return ($this->compareValues(0) === 0);
    }





    /**
     * Verifica se o valor atual desta instância é um número positivo.
     *
     * @return      bool
     *              Retornará ``true`` se o valor atual desta instância for um número positivo.
     */
    public function isPositive(): bool
    {
        return $this->isGreaterOrEqualAs(0);
    }





    /**
     * Verifica se o valor atual desta instância é um número negativo.
     *
     * @return      bool
     *              Retornará ``true`` se o valor atual desta instância for um número negativo.
     */
    public function isNegative(): bool
    {
        return $this->isLessThan(0);
    }










    /**
     * Retorna uma nova instância ``iRealType`` com o mesmo valor atual desta instância mas com
     * o sinal positivo.
     *
     * @return      iRealType
     */
    public function toPositive(): iRealType
    {
        $v = \str_replace("-", "", $this->val);
        return new RealType($v);
    }





    /**
     * Retorna uma nova instância ``iRealType`` com o mesmo valor atual desta instância mas com
     * o sinal negativo.
     *
     * @return      iRealType
     */
    public function toNegative(): iRealType
    {
        if ($this->isZero() === true) {
            return new RealType(0);
        } else {
            $v = "-" . \str_replace("-", "", $this->val);
            return new RealType($v);
        }
    }





    /**
     * Retorna uma nova instância ``iRealType`` com o mesmo valor atual desta instância mas com
     * o sinal invertido.
     *
     * @return      iRealType
     */
    public function invertSignal(): iRealType
    {
        if ($this->isZero() === true) {
            return new RealType(0);
        } elseif ($this->isPositive() === true) {
            return $this->toNegative();
        } else {
            return $this->toPositive();
        }
    }










    /**
     * Efetua o arredondamento de valores conforme as regras indicadas.
     *
     * @param       iRealType $v
     *              Valor que será arredondado.
     *
     * @param       string $roundType
     *              Indica o tipo de arredondamento que será feito.
     *              Valores inválidos não incorrerão em erros e nem em nenhuma conversão.
     *
     *              Os valores aceitos são:
     *              ``floor``   :   Arredondará para baixo qualquer valor a partir do
     *                              **digito sensível**.
     *              ``ceil``    :   Arredondará para cima todo valor diferente de zero a partir
     *                              do **digito sensível**.
     *              ``floor-n`` :   Arredondará para baixo todo **digito sensível** que seja
     *                              igual ou menor que ``n`` e para cima todo **digito sensível**
     *                              maior que ``n``.
     *              ``ceil-n``  :   Arredondará para cima todo **digito sensível** que seja igual
     *                              ou maior que ``n`` e para baixo todo **digito sensível** menor
     *                              que ``n``.
     *
     *
     * @param       iRealType $sensibility
     *              A sensibilidade é sempre um valor que indica qual será exatamente o digito que
     *              será sensível ao arredondamento.
     *
     *              Por exemplo: ``0.001`` fará o arredondamento do número a partir do 3º digito após
     *              o ponto decimal enquanto ``10`` fará o arredondamento das casas das dezenas.
     *
     * @return      iRealType
     *              Nova instância ``iRealType`` com o resultado do arredondamento indicado.
     */
    public static function roundTo(iRealType $v, string $roundType, iRealType $sensibility): iRealType
    {
        $r = $v;

        if (static::isValidRoundType($roundType, $sensibility) === true) {
            $ip         = \max($v->integerPlaces(), $sensibility->integerPlaces());
            $dp         = \max($v->decimalPlaces(), $sensibility->decimalPlaces());
            $roundType  = \strtolower($roundType);


            if ($roundType === "floor") {
                $strVal = \str_pad($v->getIntegerPart(), $ip, "0", STR_PAD_LEFT);
                if ($dp > 0) {
                    $strVal .= "." . \str_pad($v->getDecimalPart(), $dp, "0", STR_PAD_RIGHT);
                }

                $strSen = \str_pad($sensibility->getIntegerPart(), $ip, "0", STR_PAD_LEFT);
                if ($dp > 0) {
                    $strSen .= "." . \str_pad($sensibility->getDecimalPart(), $dp, "0", STR_PAD_RIGHT);
                }

                $r = "";
                $useNumber = true;
                for ($i = 0; $i < \strlen($strVal); $i++) {
                    if ($strSen[$i] === ".") {
                        $r .= ".";
                    } else {
                        if ($strSen[$i] !== "0") {
                            $useNumber = false;
                        }
                        $r .= (($useNumber === true) ? $strVal[$i] : "0");
                    }
                }
                $r = new RealType($r);
            } else {
                $useSum = 0;

                if ($roundType === "ceil") {
                    $useSum = 9;
                } else {
                    if (\strpos($roundType, "ceil-") !== false || \strpos($roundType, "floor-") !== false) {
                        $roundParts = \explode("-", $roundType);

                        if (\count($roundParts) === 2) {
                            $max = 0;

                            if ($roundParts[0] === "floor") {
                                $max = 9;
                            } elseif ($roundParts[0] === "ceil") {
                                $max = 10;
                            }

                            $useSum = ($max - ((int)$roundParts[1]));
                        }
                    }
                }


                if ($useSum > 0) {
                    $useSen = \str_replace("1", (string)$useSum, $sensibility->value());

                    if ($v->isPositive() === true) {
                        $r = $v->sum($useSen, $dp);
                    } else {
                        $r = $v->sub($useSen, $dp);
                    }

                    $r = static::roundTo($r, "floor", $sensibility);
                }
            }
        }

        return $r;
    }





    /**
     * Efetua todas as operações expostas por esta classe e trata de aplicar arredondamentos
     * quando os parametros globais estiverem especificados para isto.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para o cálculo.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @param       string $operator
     *              Operador que será utilizado.
     *
     * @return      iRealType
     *              Nova instância com o resultado da operação.
     */
    protected function internalCalc(
        int|float|string|iRealType $v,
        ?int $dPlaces = null,
        string $operator
    ): iRealType {
        $r = null;
        $d = new RealType($v);

        if (static::$globalRoundType === null || static::$globalRoundDisabled === true) {
            switch ($operator) {
                case "sum":
                    $r = new RealType(\bcadd($this->value(), $d->value(), $this->useDecimalPlaces($dPlaces)));
                    break;
                case "sub":
                    $r = new RealType(\bcsub($this->value(), $d->value(), $this->useDecimalPlaces($dPlaces)));
                    break;
                case "mul":
                    $r = new RealType(\bcmul($this->value(), $d->value(), $this->useDecimalPlaces($dPlaces)));
                    break;
                case "div":
                    $r = new RealType(\bcdiv($this->value(), $d->value(), $this->useDecimalPlaces($dPlaces)));
                    break;
                case "mod":
                    $mod = \bcmod($this->value(), $d->value());
                    $r = (($mod === null) ? new RealType(0) : new RealType($mod));
                    break;
                case "pow":
                    $r = new RealType(\bcpow($this->value(), $d->value(), $this->useDecimalPlaces($dPlaces)));
                    break;
                case "sqrt":
                    $r = new RealType(\bcsqrt($this->value(), $this->useDecimalPlaces($dPlaces)));
                    break;
            }
        } else {
            $useDp = \max(
                $this->decimalPlaces(),
                $d->decimalPlaces(),
                static::$globalRoundSensibility->decimalPlaces()
            );

            switch ($operator) {
                case "sum":
                    $r = new RealType(\bcadd($this->value(), $d->value(), $useDp));
                    break;
                case "sub":
                    $r = new RealType(\bcsub($this->value(), $d->value(), $useDp));
                    break;
                case "mul":
                    $r = new RealType(\bcmul($this->value(), $d->value(), $useDp));
                    break;
                case "div":
                    $r = new RealType(\bcdiv($this->value(), $d->value(), $useDp));
                    break;
                case "mod":
                    $mod = \bcmod($this->value(), $d->value());
                    $r = (($mod === null) ? new RealType(0) : new RealType($mod));
                    break;
                case "pow":
                    $r = new RealType(\bcpow($this->value(), $d->value(), $useDp));
                    break;
                case "sqrt":
                    $r = new RealType(\bcsqrt($this->value(), $useDp));
                    break;
            }

            static::$globalRoundDisabled = true;
            $r = static::roundTo(
                $r,
                static::$globalRoundType,
                static::$globalRoundSensibility
            )->sum(0, $this->useDecimalPlaces($dPlaces));
            static::$globalRoundDisabled = false;
        }

        return $r;
    }










    /**
     * Efetua uma adição do valor atual desta instância com o valor indicado.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para o cálculo.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @return      iRealType
     *              Nova instância com o resultado desta operação.
     */
    public function sum(
        int|float|string|iRealType $v,
        ?int $dPlaces = null
    ): iRealType {
        return $this->internalCalc($v, $dPlaces, "sum");
    }





    /**
     * Efetua uma subtração do valor atual desta instância com o valor indicado.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para o cálculo.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @return      iRealType
     *              Nova instância com o resultado desta operação.
     */
    public function sub(
        int|float|string|iRealType $v,
        ?int $dPlaces = null
    ): iRealType {
        return $this->internalCalc($v, $dPlaces, "sub");
    }





    /**
     * Efetua uma multiplicação do valor atual desta instância com o valor indicado.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para o cálculo.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @return      iRealType
     *              Nova instância com o resultado desta operação.
     */
    public function mul(
        int|float|string|iRealType $v,
        ?int $dPlaces = null
    ): iRealType {
        return $this->internalCalc($v, $dPlaces, "mul");
    }





    /**
     * Efetua uma divisão do valor atual desta instância com o valor indicado.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para o cálculo.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @return      iRealType
     *              Nova instância com o resultado desta operação.
     */
    public function div(
        int|float|string|iRealType $v,
        ?int $dPlaces = null
    ): iRealType {
        return $this->internalCalc($v, $dPlaces, "div");
    }





    /**
     * Calcula o módulo da divisão do valor atual desta instância pelo valor indicado.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para o cálculo.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @return      iRealType
     *              Nova instância com o resultado desta operação.
     */
    public function mod(
        int|float|string|iRealType $v,
        ?int $dPlaces = null
    ): iRealType {
        return $this->internalCalc($v, $dPlaces, "mod");
    }





    /**
     * Eleva o valor atual desta instância pelo expoente indicado.
     *
     * @param       int|float|string|iRealType $v
     *              Valor usado para o cálculo.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @return      iRealType
     *              Nova instância com o resultado desta operação.
     */
    public function pow(
        int|float|string|iRealType $v,
        ?int $dPlaces = null
    ): iRealType {
        return $this->internalCalc($v, $dPlaces, "pow");
    }





    /**
     * Calcula a raiz quadrada do valor atual desta instância.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @return      iRealType
     *              Raiz quadrada do valor atual desta instância.
     */
    public function sqrt(?int $dPlaces = null): iRealType
    {
        return $this->internalCalc("0", $dPlaces, "sqrt");
    }









    /**
     * Configura a forma como uma instância deve se comportar quando forçada a ser convertida
     * para uma ``string``.
     *
     * @return      string
     */
    public function __toString(): string
    {
        return $this->val;
    }


    /**
     * Permite definir um novo objeto baseado no estado completo passado pelo parametro ``$state``.
     *
     * @param       array $state
     *              Dados que serão adicionados ao novo objeto.
     *
     * @return      iRealType
     *              Nova instância preenchida com os valores do estado indicado em ``$state``.
     */
    public static function __set_state(array $state): iRealType
    {
        $obj = new RealType();

        $obj->val                  = $state["val"];
        $obj->integerPart          = $state["integerPart"];
        $obj->decimalPart          = $state["decimalPart"];
        $obj->totalDigits          = $state["totalDigits"];
        $obj->totalIntegerDigits   = $state["totalIntegerDigits"];
        $obj->totalDecimalDigits   = $state["totalDecimalDigits"];

        return $obj;
    }




    /**
     * Formata o valor atual desta instância usando o pontuador decimal e de milhar indicados.
     *
     * @param       ?int $dPlaces
     *              Total de casas decimais a serem levadas em conta.
     *              Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
     *
     * @param       string $dec
     *              Pontuador decimal a ser usado.
     *
     * @param       string $tho
     *              Pontuador de milhar a ser usado.
     *
     * @return      string
     *              Valor atual desta instância formatado conforme definido.
     */
    public function format(?int $dPlaces = null, string $dec, string $tho): string
    {
        $parts = \explode(".", $this->val);
        $integer = $parts[0];
        $decimal = "";
        $dPlaces = ($dPlaces ?? static::$globalDecimalPlaces);

        if ($dPlaces > 0) {
            if (\count($parts) === 2) {
                $decimal = $parts[1];
                if ($dPlaces > 0) {
                    $decimal = \substr($decimal, 0, $dPlaces);
                }
            }

            if (\strlen($decimal) < $dPlaces) {
                $decimal = \str_pad($decimal, $dPlaces, "0", STR_PAD_RIGHT);
            }
        }

        $revInteger = \strrev($integer);
        $formatestInteger = "";
        for ($i = 0, $k = 1; $i < \strlen($revInteger); $i++, $k++) {
            $formatestInteger .= $revInteger[$i];

            if (($k % 3) === 0 && ($k < \strlen($revInteger))) {
                $formatestInteger .= $tho;
            }
        }
        $formatestInteger = \strrev($formatestInteger);


        if ($dPlaces === 0) {
            return $formatestInteger;
        } else {
            return $formatestInteger . $dec . $decimal;
        }
    }
}
