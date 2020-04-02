.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


TypeList
========


.. php:namespace:: AeonDigital\Collection

.. php:class:: TypeList


	.. rst-class:: phpdoc-description
	
		| Permite a criação de uma collection especializada em um tipo de dados definido ao
		| instanciar a classe.
		
	
	:Parent:
		:php:class:`AeonDigital\\Collection\\Collection`
	
	:Implements:
		:php:interface:`AeonDigital\\Interfaces\\Collection\\iTypeList` 
	

Properties
----------

Methods
-------

.. rst-class:: public

	.. php:method:: public isNullable()
	
		.. rst-class:: phpdoc-description
		
			| Indica se a coleção aceita valores ``null`` para seus pares de chave/valor.
			
		
		
		:Returns: ‹ bool ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public getType()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o tipo de dado que é aceito para o valor dos itens da coleção.
			
			| Se nenhum tipo for definido, o valor padrão é ``mixed``.
			| 
			| Um sinal de interrogação ``?`` no início do nome do tipo indica que além de
			| objetos daquele próprio tipo, é aceito também ``null`` como um valor válido de ser
			| armazenado na coleção.
			
		
		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public __construct( $type=&#34;&#34;, $initialValues=[], $autoincrement=false)
	
		.. rst-class:: phpdoc-description
		
			| Inicia nova lista de dados.
			
		
		
		:Parameters:
			- ‹ string › **$type** |br|
			  Tipo de dados que devem ser aceitos para cada item da lista. Os tipos
			  de classes e interfaces, quando usados devem vir com seus nomes completos,
			  ou seja ``namespace + classname``.
			- ‹ ?array › **$initialValues** |br|
			  Valores com os quais a instância deve iniciar.
			- ‹ bool › **$autoincrement** |br|
			  Quando ``true`` permite que seja omitido o nome da chave dos valores pois
			  eles serão definidos internamente conforme fosse um array começando em zero.

		
		:Throws: ‹ \InvalidArgumentException ›|br|
			  Caso algum dos valores iniciais a serem definidos não seja aceito.
		
	
	

