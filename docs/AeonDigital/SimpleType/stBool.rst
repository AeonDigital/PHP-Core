.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


stBool
======


.. php:namespace:: AeonDigital\SimpleType

.. rst-class::  final

.. php:class:: stBool


	.. rst-class:: phpdoc-description
	
		| Definições para o tipo ``bool``.
		
	
	:Parent:
		:php:class:`AeonDigital\\SimpleType\\Abstracts\\aBasic`
	
	:Implements:
		:php:interface:`AeonDigital\\Interfaces\\SimpleType\\iBool` 
	

Methods
-------

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

	.. php:method:: public static toString( $v)
	
		.. rst-class:: phpdoc-description
		
			| Tenta efetuar a conversão do valor indicado para o tipo ``string``. Caso não
			| seja possível converter o valor, retorna ``null``.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor que será convertido.

		
		:Returns: ‹ ?string ›|br|
			  
		
	
	

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
			  
		
	
	

