.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


aFloat
======


.. php:namespace:: AeonDigital\SimpleType\Abstracts

.. rst-class::  abstract

.. php:class:: aFloat


	.. rst-class:: phpdoc-description
	
		| Extende a classe ``aBasic`` dando funções de controle para lidar com números inteiros.
		
	
	:Parent:
		:php:class:`AeonDigital\\SimpleType\\Abstracts\\aBasic`
	
	:Implements:
		:php:interface:`AeonDigital\\Interfaces\\SimpleType\\iFloat` 
	

Methods
-------

.. rst-class:: public abstract static

	.. php:method:: public abstract static min()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o menor valor possível para o tipo definido.
			
		
		
		:Returns: ‹ float ›|br|
			  
		
	
	

.. rst-class:: public abstract static

	.. php:method:: public abstract static max()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o maior valor possível para o tipo definido.
			
		
		
		:Returns: ‹ float ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static validate( $v)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor indicado pode ser convertido e usado como um valor válido
			| dentro das definições deste tipo.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor que será verificado.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static parseIfValidate( $v, &$err=null)
	
		.. rst-class:: phpdoc-description
		
			| Efetuará a conversão do valor indicado para o tipo que esta classe representa
			| apenas se passar na validação.
			
			| Caso não passe retornará um código que identifica o erro ocorrido na variável
			| ``$err``.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor que será convertido.
			- ‹ ?string › **$err** |br|
			  Código do erro da validação.

		
		:Returns: ‹ mixed ›|br|
			  
		
	
	

