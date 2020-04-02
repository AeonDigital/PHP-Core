.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


Realtype
========


.. php:namespace:: AeonDigital

.. php:class:: Realtype


	.. rst-class:: phpdoc-description
	
		| Permite operações matemáticas com números reais de qualquer precisão decimal.
		
		| Utiliza a extenção matemática **BC Math**.
		
	

Properties
----------

Methods
-------

.. rst-class:: public

	.. php:method:: public value()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o valor que esta instância está representando.
			
		
		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public getIntegerPart()
	
		.. rst-class:: phpdoc-description
		
			| Retorna apenas a parte inteira do numeral representado por esta instância.
			
		
		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public getDecimalPart()
	
		.. rst-class:: phpdoc-description
		
			| Retorna apenas a parte decimal do numeral representado por esta instância.
			
		
		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public precision()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o total de dígitos que compõe este numeral somando o total de casas antes e após
			| o separador decimal.
			
		
		
		:Returns: ‹ int ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public integerPlaces()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o total de digitos que são usados para representar a parte inteira do numeral
			| atual.
			
		
		
		:Returns: ‹ int ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public decimalPlaces()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o total de digitos que são usados para representar a parte decimal do numeral
			| atual.
			
		
		
		:Returns: ‹ int ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static defineGlobalDecimalPlaces( $v)
	
		.. rst-class:: phpdoc-description
		
			| Permite definir um valor padrão para o argumento ``$dPlaces`` usado em vários métodos
			| desta classe.
			
			| Quando algum método que usa o argumento ``$dPlaces`` for igual a ``null``, o valor aqui
			| definido é que será usado.
			
		
		
		:Parameters:
			- ‹ int › **$v** |br|
			  Valor padrão a ser usado.

		
		:Returns: ‹ void ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static getGlobalDecimalPlaces()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o número de casas decimais sendo usadas no momento para fins de cálculos com esta
			| classe.
			
		
		
		:Returns: ‹ int ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static defineGlobalRoundType( $roundType, $sensibility)
	
		.. rst-class:: phpdoc-description
		
			| Define a forma padrão pela qual os valores, quando calculados, serão arredondados.
			
		
		
		:Parameters:
			- ‹ string › **$roundType** |br|
			  Indica o tipo de arredondamento que será feito.
			  Valores inválidos não incorrerão em erros e nem em nenhuma conversão.
			  
			  Os valores aceitos são:
			  ``floor``   :   Arredondará para baixo qualquer valor a partir do
			                  **digito sensível**.
			  ``ceil``    :   Arredondará para cima todo valor diferente de zero a partir
			                  do **digito sensível**.
			  ``floor-n`` :   Arredondará para baixo todo **digito sensível** que seja
			                  igual ou menor que ``n`` e para cima todo **digito sensível**
			                  maior que ``n``.
			  ``ceil-n``  :   Arredondará para cima todo **digito sensível** que seja igual
			                  ou maior que ``n`` e para baixo todo **digito sensível** menor
			                  que ``n``.
			- ‹ AeonDigital\\Realtype › **$sensibility** |br|
			  A sensibilidade é sempre um valor que indica qual será exatamente o digito que
			  será sensível ao arredondamento.
			  
			  Por exemplo: ``0.001`` fará o arredondamento do número a partir do 3º digito após
			  o ponto decimal enquanto ``10`` fará o arredondamento das casas das dezenas.

		
		:Returns: ‹ void ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static getRoundType()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o tipo de arredondamento definido para os cálculos realizados com esta classe.
			
		
		
		:Returns: ‹ ?string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static getRoundSensibility()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o nível de sensibilidade usada para os arredondamentos.
			
		
		
		:Returns: ‹ ?string ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public __construct( $v=0)
	
		.. rst-class:: phpdoc-description
		
			| Inicia um novo objeto ``Realtype`` com o valor indicado.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma string numérica.

		
		:Throws: ‹ \InvalidArgumentException ›|br|
			  Lançado se o valor inicial indicado não for aceitável para iniciar o objeto.
		
	
	

.. rst-class:: public static

	.. php:method:: public static isValistRealtype( $v)
	
		.. rst-class:: phpdoc-description
		
			| Identifica se o valor passado é um ``Realtype`` válido.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma string numérica.

		
		:Returns: ‹ bool ›|br|
			  Retorna ``true`` se o valor passado for válido.
		
	
	

.. rst-class:: public

	.. php:method:: public isEqualAs( $v)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor atual desta instância é igual ao valor passado para comparação.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para comparação.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.

		
		:Returns: ‹ bool ›|br|
			  Retorna ``true`` se o valor atual desta instância e o valor passado em ``$v``
			  forem **IDÊNTICOS**.
		
	
	

.. rst-class:: public

	.. php:method:: public isGreaterThan( $v)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor atual desta instância é maior que o valor passado para comparação.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para comparação.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se o valor atual desta instância é **MAIOR** que o valor
			  indicado em ``$v``.
		
	
	

.. rst-class:: public

	.. php:method:: public isGreaterOrEqualAs( $v)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor atual desta instância é maior ou igual ao valor passado para comparação.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para comparação.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se o valor atual desta instância é **MAIOR** ou **IGUAL**
			  ao o valor indicado em ``$v``.
		
	
	

.. rst-class:: public

	.. php:method:: public isLessThan( $v)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor atual desta instância é menor que o valor passado para comparação.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para comparação.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se o valor atual desta instância é **MENOR** que o valor
			  indicado em ``$v``.
		
	
	

.. rst-class:: public

	.. php:method:: public isLessOrEqualAs( $v)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor atual desta instância é menor ou igual ao valor passado para comparação.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para comparação.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se o valor atual desta instância é **MENOR** ou **IGUAL**
			  ao o valor indicado em ``$v``.
		
	
	

.. rst-class:: public

	.. php:method:: public isZero()
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor atual desta instância é ``zero``.
			
		
		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se o valor atual desta instância for ``zero``.
		
	
	

.. rst-class:: public

	.. php:method:: public isPositive()
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor atual desta instância é um número positivo.
			
		
		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se o valor atual desta instância for um número positivo.
		
	
	

.. rst-class:: public

	.. php:method:: public isNegative()
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor atual desta instância é um número negativo.
			
		
		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se o valor atual desta instância for um número negativo.
		
	
	

.. rst-class:: public

	.. php:method:: public toPositive()
	
		.. rst-class:: phpdoc-description
		
			| Retorna uma nova instância ``Realtype`` com o mesmo valor atual desta instância mas com
			| o sinal positivo.
			
		
		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public toNegative()
	
		.. rst-class:: phpdoc-description
		
			| Retorna uma nova instância ``Realtype`` com o mesmo valor atual desta instância mas com
			| o sinal negativo.
			
		
		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public invertSignal()
	
		.. rst-class:: phpdoc-description
		
			| Retorna uma nova instância ``Realtype`` com o mesmo valor atual desta instância mas com
			| o sinal invertido.
			
		
		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static roundTo( $v, $roundType, $sensibility)
	
		.. rst-class:: phpdoc-description
		
			| Efetua o arredondamento de valores conforme as regras indicadas.
			
		
		
		:Parameters:
			- ‹ AeonDigital\\Realtype › **$v** |br|
			  Valor que será arredondado.
			- ‹ string › **$roundType** |br|
			  Indica o tipo de arredondamento que será feito.
			  Valores inválidos não incorrerão em erros e nem em nenhuma conversão.
			  
			  Os valores aceitos são:
			  ``floor``   :   Arredondará para baixo qualquer valor a partir do
			                  **digito sensível**.
			  ``ceil``    :   Arredondará para cima todo valor diferente de zero a partir
			                  do **digito sensível**.
			  ``floor-n`` :   Arredondará para baixo todo **digito sensível** que seja
			                  igual ou menor que ``n`` e para cima todo **digito sensível**
			                  maior que ``n``.
			  ``ceil-n``  :   Arredondará para cima todo **digito sensível** que seja igual
			                  ou maior que ``n`` e para baixo todo **digito sensível** menor
			                  que ``n``.
			- ‹ AeonDigital\\Realtype › **$sensibility** |br|
			  A sensibilidade é sempre um valor que indica qual será exatamente o digito que
			  será sensível ao arredondamento.
			  
			  Por exemplo: ``0.001`` fará o arredondamento do número a partir do 3º digito após
			  o ponto decimal enquanto ``10`` fará o arredondamento das casas das dezenas.

		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  Nova instância ``Realtype`` com o resultado do arredondamento indicado.
		
	
	

.. rst-class:: public

	.. php:method:: public sum( $v, $dPlaces=null)
	
		.. rst-class:: phpdoc-description
		
			| Efetua uma adição do valor atual desta instância com o valor indicado.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para o cálculo.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.
			- ‹ ?int › **$dPlaces** |br|
			  Total de casas decimais a serem levadas em conta.
			  Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.

		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  Nova instância com o resultado desta operação.
		
	
	

.. rst-class:: public

	.. php:method:: public sub( $v, $dPlaces=null)
	
		.. rst-class:: phpdoc-description
		
			| Efetua uma subtração do valor atual desta instância com o valor indicado.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para o cálculo.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.
			- ‹ ?int › **$dPlaces** |br|
			  Total de casas decimais a serem levadas em conta.
			  Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.

		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  Nova instância com o resultado desta operação.
		
	
	

.. rst-class:: public

	.. php:method:: public mul( $v, $dPlaces=null)
	
		.. rst-class:: phpdoc-description
		
			| Efetua uma multiplicação do valor atual desta instância com o valor indicado.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para o cálculo.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.
			- ‹ ?int › **$dPlaces** |br|
			  Total de casas decimais a serem levadas em conta.
			  Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.

		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  Nova instância com o resultado desta operação.
		
	
	

.. rst-class:: public

	.. php:method:: public div( $v, $dPlaces=null)
	
		.. rst-class:: phpdoc-description
		
			| Efetua uma divisão do valor atual desta instância com o valor indicado.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para o cálculo.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.
			- ‹ ?int › **$dPlaces** |br|
			  Total de casas decimais a serem levadas em conta.
			  Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.

		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  Nova instância com o resultado desta operação.
		
	
	

.. rst-class:: public

	.. php:method:: public mod( $v, $dPlaces=null)
	
		.. rst-class:: phpdoc-description
		
			| Calcula o módulo da divisão do valor atual desta instância pelo valor indicado.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para o cálculo.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.
			- ‹ ?int › **$dPlaces** |br|
			  Total de casas decimais a serem levadas em conta.
			  Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.

		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  Nova instância com o resultado desta operação.
		
	
	

.. rst-class:: public

	.. php:method:: public pow( $v, $dPlaces=null)
	
		.. rst-class:: phpdoc-description
		
			| Eleva o valor atual desta instância pelo expoente indicado.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor usado para o cálculo.
			  É esperado valores ``Realtype``, ``int``, ``float`` ou uma ``string``
			  numérica.
			- ‹ ?int › **$dPlaces** |br|
			  Total de casas decimais a serem levadas em conta.
			  Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.

		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  Nova instância com o resultado desta operação.
		
	
	

.. rst-class:: public

	.. php:method:: public sqrt( $dPlaces=null)
	
		.. rst-class:: phpdoc-description
		
			| Calcula a raiz quadrada do valor atual desta instância.
			
		
		
		:Parameters:
			- ‹ ?int › **$dPlaces** |br|
			  Total de casas decimais a serem levadas em conta.
			  Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.

		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  Raiz quadrada do valor atual desta instância.
		
	
	

.. rst-class:: public

	.. php:method:: public __toString()
	
		.. rst-class:: phpdoc-description
		
			| Configura a forma como uma instância deve se comportar quando forçada a ser convertida
			| para uma ``string``.
			
		
		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static __set_state( $state)
	
		.. rst-class:: phpdoc-description
		
			| Permite definir um novo objeto baseado no estado completo passado pelo parametro ``$state``.
			
		
		
		:Parameters:
			- ‹ array › **$state** |br|
			  Dados que serão adicionados ao novo objeto.

		
		:Returns: ‹ \\AeonDigital\\Realtype ›|br|
			  Nova instância preenchida com os valores do estado indicado em ``$state``.
		
	
	

.. rst-class:: public

	.. php:method:: public format( $dPlaces=null, $dec, $tho)
	
		.. rst-class:: phpdoc-description
		
			| Formata o valor atual desta instância usando o pontuador decimal e de milhar indicados.
			
		
		
		:Parameters:
			- ‹ ?int › **$dPlaces** |br|
			  Total de casas decimais a serem levadas em conta.
			  Se ``null`` for passado, usará o padrão definido em ``static::$globalDecimalPlaces``.
			- ‹ string › **$dec** |br|
			  Pontuador decimal a ser usado.
			- ‹ string › **$tho** |br|
			  Pontuador de milhar a ser usado.

		
		:Returns: ‹ string ›|br|
			  Valor atual desta instância formatado conforme definido.
		
	
	

