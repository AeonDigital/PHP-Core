.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


BObject
=======


.. php:namespace:: AeonDigital

.. rst-class::  abstract

.. php:class:: BObject


	.. rst-class:: phpdoc-description
	
		| Classe básica.
		
	

Methods
-------

.. rst-class:: public

	.. php:method:: public __set( $name, $value)
	
		.. rst-class:: phpdoc-description
		
			| Desabilita a função mágica ``__set`` para assegurar a que apenas alterações dentro das
			| regras definidas para a classe sejam possíveis.
			
		
		
	
	

.. rst-class:: public

	.. php:method:: public __get( $name)
	
		.. rst-class:: phpdoc-description
		
			| Desabilita a função mágica ``__sget`` para assegurar a que apenas alterações dentro das
			| regras definidas para a classe sejam possíveis.
			
		
		
	
	

.. rst-class:: public

	.. php:method:: public __unset( $name)
	
		.. rst-class:: phpdoc-description
		
			| Desabilita a função mágica ``__unset``.
			
		
		
	
	

.. rst-class:: public

	.. php:method:: public __toString()
	
		.. rst-class:: phpdoc-description
		
			| Desabilita a função mágica ``__toString``.
			
		
		
	
	

.. rst-class:: public

	.. php:method:: public __invoke( $x)
	
		.. rst-class:: phpdoc-description
		
			| Desabilita a função mágica ``__invoke``.
			
		
		
	
	

.. rst-class:: public static

	.. php:method:: public static __set_state( $assoc_array)
	
		.. rst-class:: phpdoc-description
		
			| Desabilita a função mágica ``__set_state``.
			
		
		
	
	

