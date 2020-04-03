.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


Date
====


.. php:namespace:: AeonDigital\DataFormat\Patterns\World\Dates

.. rst-class::  final

.. php:class:: Date


	.. rst-class:: phpdoc-description
	
		| Definição do formato ``Date``.
		
	
	:Parent:
		:php:class:`AeonDigital\\DataFormat\\Abstracts\\aDateTimeFormat`
	

Constants
---------

.. php:const:: DateMask = &#34;Y-m-d&#34;

	.. rst-class:: phpdoc-description
	
		| Máscara da data.
		
	
	:Type: ‹ ?string ›|br|
		  
	


.. php:const:: RegExp = &#34;/^(\\d{4})[\\/\\-.]([0]?[1-9]|[1][012])[\\/\\-.]([0]?[1-9]|[12][0-9]|[3][01])\$/&#34;

	.. rst-class:: phpdoc-description
	
		| Expressão regular para validação.
		
	
	:Type: ‹ ?string ›|br|
		  
	


.. php:const:: MinLength = 10

	.. rst-class:: phpdoc-description
	
		| Quantidade **mínima** de caracteres necessários para expressar o formato.
		
	
	:Type: ‹ int ›|br|
		  
	


.. php:const:: MaxLength = 10

	.. rst-class:: phpdoc-description
	
		| Quantidade **máxima** de caracteres necessários para expressar o formato.
		
	
	:Type: ‹ int ›|br|
		  
	


