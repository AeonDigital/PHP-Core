.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


stDateTime
==========


.. php:namespace:: AeonDigital\SimpleType

.. rst-class::  final

.. php:class:: stDateTime


	.. rst-class:: phpdoc-description
	
		| Definições para o tipo ``DateTime``.
		
		| Os valores mínimos e máximos são definidos para estarem dentro de um intervalo que
		| abrange a imensa maior parte das aplicações comerciais.
		
	
	:Parent:
		:php:class:`AeonDigital\\SimpleType\\Abstracts\\aBasic`
	
	:Implements:
		:php:interface:`AeonDigital\\Interfaces\\SimpleType\\iDateTime` 
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static min()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o menor valor possível para este tipo de data. Se for definido ``null``,
			| o limite será dado pelo próprio sistema.
			
		
		
		:Returns: ‹ ?\\DateTime ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static max()
	
		.. rst-class:: phpdoc-description
		
			| Retorna o maior valor possível para este tipo de data. Se for definido ``null``,
			| o limite será dado pelo próprio sistema.
			
		
		
		:Returns: ‹ ?\\DateTime ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static validate( $v)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor indicado pode ser convertido e usado como um valor válido
			| dentro das definições deste tipo.
			
			| É esperado uma string usando o formato **Y-m-d H:i:s**, um inteiro
			| representando um **timestamp** ou um objeto ``DateTime`` dentro dos limites
			| especificados.
			
		
		
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
			  
		
	
	

