===========
dir_chmod_r
===========


.. php:function:: dir_chmod_r( $absoluteSystemPathToDir, $permissions)
	
		.. rst-class:: phpdoc-description
		
			| Efetua alteração nas permissões de um diretório e em todos seus itens filhos.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToDir** |br|
			  Diretório que terá suas alterações alteradas.
			- ‹ int › **$permissions** |br|
			  As permissões que serão setadas.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se TODOS os itens alvo tiverem suas permissões alteradas.