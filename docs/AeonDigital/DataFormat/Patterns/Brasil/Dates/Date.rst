.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


Date
====


.. php:namespace:: AeonDigital\DataFormat\Patterns\Brasil\Dates

.. rst-class::  final

.. php:class:: Date


	.. rst-class:: phpdoc-description
	
		| Definição do formato ``Date``.
		
	
	:Parent:
		:php:class:`AeonDigital\\DataFormat\\Abstracts\\aDateTimeFormat`
	

Constants
---------

.. php:const:: DateMask = &#34;d-m-Y&#34;

	.. rst-class:: phpdoc-description
	
		| Máscara da data.
		
	
	:Type: ‹ ?string ›|br|
		  
	


.. php:const:: RegExp = &#34;/^([0]?[1-9]|[12][0-9]|[3][01])[\\/\\-.]([0]?[1-9]|[1][012])[\\/\\-.](\\d{4})\$/&#34;

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
		  
	


