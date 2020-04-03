========
dir_copy
========


.. php:function:: dir_copy( $absoluteSystemPathToDir_source, $absoluteSystemPathToDir_dest, $permissions=700)
	
		.. rst-class:: phpdoc-description
		
			| Copia todo o conteúdo de um diretório para outro local.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToDir_source** |br|
			  Caminho para o diretório de conteúdo que será copiado.
			- ‹ string › **$absoluteSystemPathToDir_dest** |br|
			  Caminho para o diretório de destino.
			- ‹ int › **$permissions** |br|
			  As permissões que devem ser setadas no novo diretório.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se a cópia do conteúdo ocorrer sem erros.