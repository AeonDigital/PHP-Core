.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


MinifyJS
========


.. php:namespace:: AeonDigital\Tools

.. php:class:: MinifyJS


	.. rst-class:: phpdoc-description
	
		| Coleção de métodos estáticos para minificar arquivos JS.
		
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static minifyCode( $jsCode)
	
		.. rst-class:: phpdoc-description
		
			| Minifica o código JS informado.
			
		
		
		:Parameters:
			- ‹ string › **$jsCode** |br|
			  Código JS que será minificado.

		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static minifyFile( $absoluteSystemPathToFile)
	
		.. rst-class:: phpdoc-description
		
			| Minifica o conteúdo de um arquivo JS.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToFile** |br|
			  Endereço local do arquivo que será minificado.

		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static minifyFiles( $absoluteSystemPathToFiles)
	
		.. rst-class:: phpdoc-description
		
			| Minifica uma coleção de arquivos JS.
			
		
		
		:Parameters:
			- ‹ string[] › **$absoluteSystemPathToFiles** |br|
			  Endereço local dos arquivos que serão minificados.

		
		:Returns: ‹ string ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static createMinifyFile( $absoluteSystemPathToFiles, $absoluteSystemPathToMinifiedFile)
	
		.. rst-class:: phpdoc-description
		
			| Minifica uma coleção de arquivos JS em um único arquivo.
			
		
		
		:Parameters:
			- ‹ string[] › **$absoluteSystemPathToFiles** |br|
			  Endereço local dos arquivos que serão minificados.
			- ‹ string › **$absoluteSystemPathToMinifiedFile** |br|
			  Endereço completo onde o arquivo minificado será armazenado.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

