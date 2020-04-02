-------------------
dir_convert_to_utf8
-------------------


.. php:function:: dir_convert_to_utf8( $absoluteSystemPaths, $validExtensions)
	
		.. rst-class:: phpdoc-description
		
			| Converte todos os arquivos alvo para o encode **UTF-8**.
			
			| Se algum diretório for alvo desta ação, todos os seus arquivos filhos (incluindo subdiretórios)
			| serão também convertidos.
			| Ocorrendo qualquer falha durante o processamento das conversões, o processamento parará imediatamente.
			
		
		
		:Parameters:
			- ‹ array › **$absoluteSystemPaths** |br|
			  Caminhos para os recursos que serão convertidos.
			  Podem ser apontados diretórios ou arquivos.
			- ‹ array › **$validExtensions** |br|
			  Coleção de extenções válidas para executar a conversão.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se TODOS os recursos indicados em ``$absoluteSystemPaths``
			  existirem e forem corretamente convertidos.