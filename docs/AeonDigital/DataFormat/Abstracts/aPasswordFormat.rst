.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


aPasswordFormat
===============


.. php:namespace:: AeonDigital\DataFormat\Abstracts

.. rst-class::  abstract

.. php:class:: aPasswordFormat


	.. rst-class:: phpdoc-description
	
		| Extende a classe abstrata ``aStringFormat`` para prepará-la para ser usada com senhas.
		
	
	:Parent:
		:php:class:`AeonDigital\\DataFormat\\Abstracts\\aStringFormat`
	
	:Implements:
		:php:interface:`AeonDigital\\Interfaces\\DataFormat\\iPasswordFormat` 
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static checkStrength( $v)
	
		.. rst-class:: phpdoc-description
		
			| Testa a força da string enquanto senha e retorna sua pontuação.
			
			| **Pontuação**
			| ``+ 10 pontos``  :   Por cada caracter diferente onde ``T != t``
			| ``+ 05 pontos``  :   Se houver ao menos 3 numerais diferentes.
			| ``+ 05 pontos``  :   Se houver ao menos 2 simbolos diferentes ``!@#$+-_=[]}?``
			| ``+ 10 pontos``  :   Por cada familia de caracteres alem da primeira
			| As famílias de caracteres são: ``Minusculas`` | ``Maiusculas`` | ``Numeros`` | ``Simbolos``
			
		
		
		:Parameters:
			- ‹ string › **$v** |br|
			  Valor a ser ajustado.

		
		:Returns: ‹ int ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static generate( $cfg=null)
	
		.. rst-class:: phpdoc-description
		
			| Gera uma senha de forma aleatória baseada nas configurações passadas. O tamanho da
			| senha será o valor informado em ``$cfg[¨MinLength¨]``
			
			| **Exemplo de parametro $cfg***
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
			- ‹ ?array › **$cfg** |br|
			  Configurações da senha que será gerada. Usará os valores padrões caso
			  este parametro não seja informado.

		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static checkPassword( $v, $aux=null, &$err=null)
	
		.. rst-class:: phpdoc-description
		
			| Verifica se o valor passado é uma ``string`` que pode ser aceita como ``password`` válida.
			
			| Caso não passe na validação, retornará um código que identifica o erro ocorrido na
			| variável ``$err``.
			| 
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
			- ‹ ?string › **$err** |br|
			  Código do erro da validação.

		
		:Returns: ‹ mixed ›|br|
			  
		
	
	

