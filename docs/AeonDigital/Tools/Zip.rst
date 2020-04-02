.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


Zip
===


.. php:namespace:: AeonDigital\Tools

.. php:class:: Zip


	.. rst-class:: phpdoc-description
	
		| Coleção de métodos estáticos para uso de arquivos ``Zip``.
		
	

Methods
-------

.. rst-class:: public static

	.. php:method:: public static packTargets( $absoluteSystemPaths, $absoluteSystemPathToFile)
	
		.. rst-class:: phpdoc-description
		
			| Zipa um conjunto de arquivos e diretórios e gera um pacote com os dados no local indicado.
			
		
		
		:Parameters:
			- ‹ string[] › **$absoluteSystemPaths** |br|
			  Coleção de endereços dos arquivos e diretórios que serão zipados.
			- ‹ string › **$absoluteSystemPathToFile** |br|
			  Endereço completo onde o novo arquivo zip será gerado.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static pack( $absoluteSystemPaths, $absoluteSystemPathToFile=null)
	
		.. rst-class:: phpdoc-description
		
			| Zipa um arquivo ou diretório (e todo seu conteúdo) gerando um pacote com os dados
			| encontrados no mesmo local onde estão os dados apontados.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPaths** |br|
			  Endereço completo do arquivo ou diretório que será zipado.
			- ‹ ?string › **$absoluteSystemPathToFile** |br|
			  Quando definido, deve indicar o local de destino do pacote
			  gerado e seu respectivo nome.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static unpack( $absoluteSystemPathToFile, $absoluteSystemPathToDir=null)
	
		.. rst-class:: phpdoc-description
		
			| Deszipa um pacote e adiciona seu conteúdo no local indicado.
			
			| SE o local não existir, cria-o.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToFile** |br|
			  Caminho completo até o arquivo zipado.
			- ‹ ?string › **$absoluteSystemPathToDir** |br|
			  Caminho completo até o diretório onde o pacote será descompactado.
			  Caso não seja definido, criará um diretório no mesmo local onde o
			  arquivo **.zip** se encontra. O novo diretório terá como nome:
			  **dirname_unpacked** e, caso já exista, será adicionado um index.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

.. rst-class:: public static

	.. php:method:: public static unpackTargets( $absoluteSystemPathToFile, $targets)
	
		.. rst-class:: phpdoc-description
		
			| Extrai um ou mais arquivos ou diretórios de dentro de um arquivo zipado e aloca-os
			| em seus respectivos destinos.
			
		
		
		:Parameters:
			- ‹ string › **$absoluteSystemPathToFile** |br|
			  Caminho completo até o arquivo zipado.
			- ‹ array › **$targets** |br|
			  Array de arrays associativos onde:
			  
			  **key** : Deve ser o caminho para o arquivo ou diretório dentro do
			  zip (a partir da raiz do zip).
			  
			  **value** : Deve ser o caminho completo do diretório onde o arquivo
			  ou diretório será extraído.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

