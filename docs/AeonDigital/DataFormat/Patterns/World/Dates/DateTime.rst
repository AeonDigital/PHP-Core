.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


DateTime
========


.. php:namespace:: AeonDigital\DataFormat\Patterns\World\Dates

.. rst-class::  final

.. php:class:: DateTime


	.. rst-class:: phpdoc-description
	
		| Definição do formato ``DateTime``.
		
	
	:Parent:
		:php:class:`AeonDigital\\DataFormat\\Abstracts\\aDateTimeFormat`
	

Constants
---------

.. php:const:: DateMask = &#34;Y-m-d H:i:s&#34;

	.. rst-class:: phpdoc-description
	
		| Máscara da data.
		
	
	:Type: ‹ ?string ›|br|
		  
	


.. php:const:: RegExp = &#34;/^(\\d{4})[\\/\\-.]([0]?[1-9]|[1][012])[\\/\\-.]([0]?[1-9]|[12][0-9]|[3][01])[ ]([01]?\\d|2[0-3]):([0-5]?\\d):([0-5]?\\d)\$/&#34;

	.. rst-class:: phpdoc-description
	
		| Expressão regular para validação.
		
	
	:Type: ‹ ?string ›|br|
		  
	


.. php:const:: MinLength = 19

	.. rst-class:: phpdoc-description
	
		| Quantidade **mínima** de caracteres necessários para expressar o formato.
		
	
	:Type: ‹ int ›|br|
		  
	


.. php:const:: MaxLength = 19

	.. rst-class:: phpdoc-description
	
		| Quantidade **máxima** de caracteres necessários para expressar o formato.
		
	
	:Type: ‹ int ›|br|
		  
	


