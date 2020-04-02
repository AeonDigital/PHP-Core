--------------------
file_convert_to_utf8
--------------------


.. php:function:: file_convert_to_utf8( $absoluteSystemPathToFile)
	
		.. rst-class:: phpdoc-description
		
			| Converte o encode de um arquivo para **UTF-8**.
			
			| O processo consiste em resgatar todo o conteúdo e verificar caracter à caracter convertendo
			| aqueles que não forem unicode e então remontando todo o arquivo.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToFile** |br|
			  Caminho para o arquivo que será convertido.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` caso o documento seja convertido sem falhas.