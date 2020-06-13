.. rst-class:: phpdoctorst

.. role:: php(code)

	:language: php


Tools
=====


.. php:namespace:: AeonDigital

.. php:class:: Tools


	.. rst-class:: phpdoc-description

		| Coleção de métodos estáticos para diversos fins.



Methods
-------

.. rst-class:: public static

	.. php:method:: public static getScalarType( $o)

		.. rst-class:: phpdoc-description

			| Retorna o tipo ``scalar`` do objeto passado.

			| Se não for um objeto do tipo ``scalar`` retornará ``null`` .



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ ?string ›|br|





.. rst-class:: public static

	.. php:method:: public static isScalarType( $o, $type)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado corresponde ao tipo esperado.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.

			- ‹ string › **$type** |br|
			  Nome do tipo a ser testado.
			  Esperado um dos seguintes: null | bool | int | float | string | array


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isScalar( $o)

		.. rst-class:: phpdoc-description

			| Identifica se o objeto passado é um tipo ``scalar``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isNull( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado é do tipo ``null``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isBool( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado é do tipo ``bool``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isNumeric( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado é do tipo ``int`` ou ``float`` ou ainda se trata-se
			| de uma ``string`` numérica.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isInt( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado é do tipo ``int``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isFloat( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado é do tipo ``float``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isString( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado é do tipo ``string``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isArray( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado é do tipo ``array``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isArrayAssoc( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado um ``array`` associativo.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isDateTime( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado é do tipo ``DateTime``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static isRealtype( $o)

		.. rst-class:: phpdoc-description

			| Verifica se o objeto passado é do tipo ``Realtype``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será verificado.


		:Returns: ‹ bool ›|br|





.. rst-class:: public static

	.. php:method:: public static toBool( $o)

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para ``bool``.

			| Apenas valores realmente compatíveis serão convertidos.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será convertido.


		:Returns: ‹ ?bool ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.




.. rst-class:: public static

	.. php:method:: public static toNumeric( $o)

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para ``number`` (seja ``int``, ``float`` ou ``double``).

			| Apenas valores realmente compatíveis serão convertidos.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será convertido.


		:Returns: ‹ ?int | ?float ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.




.. rst-class:: public static

	.. php:method:: public static toInt( $o)

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para ``int``.

			| Apenas valores realmente compatíveis serão convertidos.
			|
			| Números com ponto flutuante serão arredondados pela função ``intval``.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será convertido.


		:Returns: ‹ ?int ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.




.. rst-class:: public static

	.. php:method:: public static toFloat( $o)

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para ``float``.

			| Apenas valores realmente compatíveis serão convertidos.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será convertido.


		:Returns: ‹ ?float ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.




.. rst-class:: public static

	.. php:method:: public static toString( $o)

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para ``string``.

			| Apenas valores realmente compatíveis serão convertidos.
			|
			| Números de ponto flutuante serão convertidos e mantidos com no máximo 15 digitos
			| ao todo (parte inteira + parte decimal).
			| A parte decimal ficará com : (15 - (número de digitos da parte inteira)) casas.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será convertido.


		:Returns: ‹ ?string ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.




.. rst-class:: public static

	.. php:method:: public static toArray( $o)

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para ``array``.

			| Apenas valores realmente compatíveis serão convertidos.



		:Returns: ‹ ?float ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.




.. rst-class:: public static

	.. php:method:: public static toArrayStr( $o, $force=false)

		.. rst-class:: phpdoc-description

			| Converte todos os valores do ``array`` passado para ``string`` e retorna um novo ``array``
			| contendo todos os valores convertidos. A conversão ocorre apenas entre valores escalares.

			| Se ao menos 1 dos valores originais não for passível de ser convertido, então o
			| processamento falhará e ``null`` será retornado.



		:Parameters:
			- ‹ ?array › **$o** |br|
			  Coleção de valores originais.

			- ‹ bool › **$force** |br|
			  Indica se deve forçar a conversão de tipos não escalares.
			  Neste caso será verificado se o objeto possui implementado o método mágico
			  ``__toString`` e, caso positivo, irá utilizá-lo, senão, irá retornar o nome
			  completo da classe a qual este objeto pertence.


		:Returns: ‹ ?array ›|br|





.. rst-class:: public static

	.. php:method:: public static toDateTime( $o, $format="Y-m-d H:i:s")

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para ``DateTime``.

			| Apenas valores realmente compatíveis serão convertidos.
			|
			| O formato padrão é o **Y-m-d H:i:s**.
			|
			| Se no objeto original não houver o valor ``time`` e em ``$format`` também
			| não existir definições para horários (H | i | s) esta conversão assumirá
			| o valor zero para cada uma destas posições.



		:Parameters:
			- ‹ string | int › **$o** |br|
			  Objeto que será convertido.
			  Para ser efetivamente processado, é esperado uma ``string`` ou
			  um ``int``, correspondente a um **timestamp**.

			- ‹ string › **$format** |br|
			  Se o valor original for uma ``string``, este parametro deve indicar qual
			  formato que a data se encontra.
			  Padrão é **Y-m-d H:i:s**


		:Returns: ‹ ?\\DateTime ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.




.. rst-class:: public static

	.. php:method:: public static toDateTimeString( $o, $inputFormat="Y-m-d H:i:s", $outputFormat="Y-m-d H:i:s")

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para uma ``DateTime string`` compatível com o
			| formato de saida escolhido.

			| Apenas valores realmente compatíveis serão convertidos.



		:Parameters:
			- ‹ string | int | \\DateTime › **$o** |br|
			  Objeto que será convertido.
			  Para ser efetivamente processado, é esperado um ``DateTime``, uma ``string`` ou
			  um ``int``, correspondente a um **timestamp**.

			- ‹ string › **$inputFormat** |br|
			  Se o valor original for uma ``string``, este parametro deve indicar qual
			  formato que a data se encontra.
			  Padrão é **Y-m-d H:i:s**.

			- ‹ string › **$outputFormat** |br|
			  Formato ``DateTime string`` em que o valor deve ser retornado.
			  Padrão é **Y-m-d H:i:s**.


		:Returns: ‹ ?string ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.




.. rst-class:: public static

	.. php:method:: public static toRealtype( $o)

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para ``Realtype``.

			| Apenas valores realmente compatíveis serão convertidos.



		:Parameters:
			- ‹ mixed › **$o** |br|
			  Objeto que será convertido.


		:Returns: ‹ ?\\AeonDigital\\Realtype ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.




.. rst-class:: public static

	.. php:method:: public static toJSON( $o)

		.. rst-class:: phpdoc-description

			| Tenta converter o tipo do valor passado para uma ``string json``.

			| Apenas valores realmente compatíveis serão convertidos.



		:Returns: ‹ ?string ›|br|
			  Retornará ``null`` caso não seja possível efetuar a conversão.
