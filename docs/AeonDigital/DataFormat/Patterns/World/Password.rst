.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


Password
========


.. php:namespace:: AeonDigital\DataFormat\Patterns\World

.. rst-class::  final

.. php:class:: Password


	.. rst-class:: phpdoc-description
	
		| Definição do formato ``Password``.
		
	
	:Parent:
		:php:class:`AeonDigital\\DataFormat\\Abstracts\\aPasswordFormat`
	

Constants
---------

.. php:const:: MinLength = 8

	.. rst-class:: phpdoc-description
	
		| Quantidade **mínima** de caracteres necessários para expressar o formato.
		
	
	:Type: ‹ int ›|br|
		  
	


.. php:const:: MaxLength = 40

	.. rst-class:: phpdoc-description
	
		| Quantidade **máxima** de caracteres necessários para expressar o formato.
		
	
	:Type: ‹ int ›|br|
		  
	


Methods
-------

.. rst-class:: public static

	.. php:method:: public static check( $v, $aux=null)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor passado corresponde ao tipo/formato. esperado.
			
			| **Exemplo de parametro $aux***
			| \`\`\` php
			|      $arr = [
			|          // Coleção de caracteres comuns aceitos.
			|          &#34;CommomChars&#34;   => &#34;abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&#34;,
			| 
			|          // Coleção de caracteres especiais.
			|          &#34;SpecialChars&#34;  => &#34;!@#$%¨*()-_+=?&#34;
			| 
			|          // Número mínimo de caracteres para compor uma senha.
			|          &#34;MinLength&#34;     => 8
			| 
			|          // Número máximo de caracteres para compor uma senha.
			|          &#34;MaxLength&#34;     => 20
			|      ];
			| \`\`\`
			
		
		
		:Parameters:
			- ‹ ?string › **$v** |br|
			  Valor a ser testado.
			- ‹ ?array › **$aux** |br|
			  Array associativo trazendo a configuração para formatação da string.

		
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
			  
		
	
	

