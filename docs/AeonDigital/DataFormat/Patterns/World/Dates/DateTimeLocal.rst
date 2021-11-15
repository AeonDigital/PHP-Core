.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


DateTimeLocal
=============


.. php:namespace:: AeonDigital\DataFormat\Patterns\World\Dates

.. rst-class::  final

.. php:class:: DateTimeLocal


	.. rst-class:: phpdoc-description
	
		| Definição do formato ``DateTimeLocal``.
		
	
	:Parent:
		:php:class:`AeonDigital\\DataFormat\\Abstracts\\aDateTimeFormat`
	

Constants
---------

.. php:const:: DateMask = &#34;Y-m-d\\TH:i:s&#34;

	.. rst-class:: phpdoc-description
	
		| Máscara da data.
		
	
	:Type: ‹ ?string ›|br|
		  
	


.. php:const:: RegExp = &#34;/^(\\d{4})[\\/\\-.]([0]?[1-9]|[1][012])[\\/\\-.]([0]?[1-9]|[12][0-9]|[3][01])[T]([01]?\\d|2[0-3]):([0-5]?\\d):([0-5]?\\d)\$/&#34;

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
		  
	


