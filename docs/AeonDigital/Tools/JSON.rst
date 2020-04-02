.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


JSON
====


.. php:namespace:: AeonDigital\Tools

.. php:class:: JSON


	.. rst-class:: phpdoc-description
	
		| Coleção de métodos estáticos para tratamento de arquivos JSON.
		
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static retrieve( $absoluteSystemPathToFile, $assoc=true)
	
		.. rst-class:: phpdoc-description
		
			| Carrega o conteúdo de um arquivo JSON na memória e retorna um Array Associativo ou
			| um objeto do tipo ``StdClass``. Caso o arquivo alvo não exista será retornado ``null``.
			
			| Apesar do padrão JSON não assumir a possibilidade de haver comentários este método
			| irá remover os mesmos se existirem e carregará o conteúdo normalmente.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToFile** |br|
			  Caminho completo até o arquivo que será carregado.

		
		:Returns: ‹ ?array | \\StdClass ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static indent( $strJSON)
	
		.. rst-class:: phpdoc-description
		
			| Identa adequadamente uma string representante de um objeto JSON.
			
		
		
		:Parameters:
			- ‹ string › **$strJSON** |br|
			  String que será identada.

		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static save( $absoluteSystemPathToFile, $JSON, $options=0)
	
		.. rst-class:: phpdoc-description
		
			| Salva o um objeto JSON (representado por uma ``String``, ``Array Associativo``
			| ou objeto ``StdClass`` no caminho informado).
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToFile** |br|
			  Caminho completo até o arquivo que será salvo.
			- ‹ string | array | \\StdClass › **$JSON** |br|
			  Objeto que será salvo como um arquivo JSON.
			- ‹ int › **$options** |br|
			  [Flags](http://php.net/manual/pt_BR/json.constants.php)
			  para salvar o documento JSON.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

