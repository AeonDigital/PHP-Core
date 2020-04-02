.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


MinifyCSS
=========


.. php:namespace:: AeonDigital\Tools

.. php:class:: MinifyCSS


	.. rst-class:: phpdoc-description
	
		| Coleção de métodos estáticos para minificar arquivos CSS.
		
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static minifyCode( $cssCode)
	
		.. rst-class:: phpdoc-description
		
			| Minifica o código CSS informado.
			
		
		
		:Parameters:
			- ‹ string › **$cssCode** |br|
			  Código CSS que será minificado.

		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static minifyFile( $absoluteSystemPathToFile)
	
		.. rst-class:: phpdoc-description
		
			| Minifica o conteúdo de um arquivo CSS.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToFile** |br|
			  Endereço local do arquivo que será minificado.

		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static minifyFiles( $absoluteSystemPathToFiles)
	
		.. rst-class:: phpdoc-description
		
			| Minifica uma coleção de arquivos CSS.
			
		
		
		:Parameters:
			- ‹ string[] › **$absoluteSystemPathToFiles** |br|
			  Endereço local dos arquivos que serão minificados.

		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static createMinifyFile( $absoluteSystemPathToFiles, $absoluteSystemPathToMinifiedFile)
	
		.. rst-class:: phpdoc-description
		
			| Minifica uma coleção de arquivos CSS em um único arquivo.
			
		
		
		:Parameters:
			- ‹ string[] › **$absoluteSystemPathToFiles** |br|
			  Endereço local dos arquivos que serão minificados.
			- ‹ string › **$absoluteSystemPathToMinifiedFile** |br|
			  Endereço completo onde o arquivo minificado será armazenado.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

