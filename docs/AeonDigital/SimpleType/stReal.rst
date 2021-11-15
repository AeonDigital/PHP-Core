.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


stReal
======


.. php:namespace:: AeonDigital\SimpleType

.. rst-class::  final

.. php:class:: stReal


	.. rst-class:: phpdoc-description
	
		| Definições para o tipo ``real``.
		
	
	:Parent:
		:php:class:`AeonDigital\\SimpleType\\Abstracts\\aBasic`
	
	:Implements:
		:php:interface:`AeonDigital\\Interfaces\\SimpleType\\iReal` 
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static min()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o menor valor possível para o tipo definido. Se for definido ``null``, não
			| haverá limites para a representação numérica a ser utilizada.
			
		
		
		:Returns: ‹ ?string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static max()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o maior valor possível para o tipo definido. Se for definido ``null``, não
			| haverá limites para a representação numérica a ser utilizada.
			
		
		
		:Returns: ‹ ?string ›|br|
			  
		
	
	

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
			  
		
	
	

