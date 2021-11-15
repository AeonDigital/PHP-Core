.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


CNPJ
====


.. php:namespace:: AeonDigital\DataFormat\Patterns\Brasil

.. rst-class::  final

.. php:class:: CNPJ


	.. rst-class:: phpdoc-description
	
		| Definição do formato ``CNPJ``.
		
	
	:Parent:
		:php:class:`AeonDigital\\DataFormat\\Abstracts\\aStringFormat`
	

Constants
---------

.. php:const:: RegExp = &#34;/^[0-9]{2}[.]?[0-9]{3}[.]?[0-9]{3}[\\/]?[0-9]{4}[-]?[0-9]{2}\$/&#34;

	.. rst-class:: phpdoc-description
	
		| Expressão regular para validação.
		
	
	:Type: ‹ ?string ›|br|
		  
	


.. php:const:: MinLength = 14

	.. rst-class:: phpdoc-description
	
		| Quantidade **mínima** de caracteres necessários para expressar o formato.
		
	
	:Type: ‹ int ›|br|
		  
	


.. php:const:: MaxLength = 18

	.. rst-class:: phpdoc-description
	
		| Quantidade **máxima** de caracteres necessários para expressar o formato.
		
	
	:Type: ‹ int ›|br|
		  
	


Methods
-------

.. rst-class:: public static

	.. php:method:: public static check( $v, $aux=null)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor passado corresponde ao tipo/formato. esperado.
			
		
		
		:Parameters:
			- ‹ ?string › **$v** |br|
			  Valor a ser testado.
			- ‹ ?array › **$aux** |br|
			  Dados auxiliares para o processamento.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static format( $v, $aux=null)
	
		.. rst-class:: phpdoc-description
		
			| Formata ``$v`` para que seja retornado uma ``string`` que represente este tipo. Caso
			| não seja possível efetuar a formatação retornará ``null``.
			
		
		
		:Parameters:
			- ‹ mixed › **$v** |br|
			  Valor a ser formatado.
			- ‹ ?array › **$aux** |br|
			  Dados auxiliares para o processamento.

		
		:Returns: ‹ ?string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static removeFormat( $v, $aux=null)
	
		.. rst-class:: phpdoc-description
		
			| Sendo ``$v`` uma ``string`` formatada adequadamente para representar este tipo,
			| devolverá seu equivalente em formato de objeto ( ``int``, ``float``, ``DateTime`` ... )
			| ou em caso de ``strings``, removerá completamente qualquer caracter de formatação.
			
			| Retornará ``null`` caso a ``string`` passada seja considerada inválida.
			
		
		
		:Parameters:
			- ‹ ?string › **$v** |br|
			  Valor a ser ajustado.
			- ‹ ?array › **$aux** |br|
			  Dados auxiliares para o processamento.

		
		:Returns: ‹ mixed ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static storageFormat( $v)
	
		.. rst-class:: phpdoc-description
		
			| Sendo ``$v`` uma ``string`` válida para o formato correspondente, retorna um valor
			| equivalente a mesma usando as configurações de formatação para armazenamento deste
			| tipo de dado.
			
			| Retornará ``null`` caso a ``string`` passada seja considerada inválida.
			
		
		
		:Parameters:
			- ‹ ?string › **$v** |br|
			  Valor a ser ajustado.

		
		:Returns: ‹ mixed ›|br|
			  
		
	
	

