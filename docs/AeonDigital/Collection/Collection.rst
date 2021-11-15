.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


Collection
==========


.. php:namespace:: AeonDigital\Collection

.. php:class:: Collection


	.. rst-class:: phpdoc-description
	
		| Classe plena para lidar com coleções de dados.
		
		| Implementa ``iCollection`` que expande as funcionalidades de coleções do tipo
		| ``iBasicCollection`` permitindo a manipulação dos valores da coleção em processos
		| de lote.
		
	
	:Parent:
		:php:class:`AeonDigital\\Collection\\BasicCollection`
	
	:Implements:
		:php:interface:`AeonDigital\\Interfaces\\Collection\\iCollection` 
	

Methods
-------

.. rst-class:: public

	.. php:method:: public toArray( $originalKeys=false)
	
		.. rst-class:: phpdoc-description
		
			| Retorna toda a coleção atualmente armazenada em um ``array associativo``
			| ``[ string => mixed ]``.
			
			| Em caso de uma coleção vazia será retornado ``[]``.
			| 
			| Prioriza o retorno das chaves conforme usadas internamente pois considera que se
			| há uma alteração nelas deve-se a alguma importância relacionado a seu formato de uso.
			
		
		
		:Parameters:
			- ‹ ?bool › **$originalKeys** |br|
			  Quando ``true`` irá usar as chaves conforme foram definidas na função ``set``.
			  Se no armazenamento interno elas sofrerem qualquer alteração e for definido
			  ``false`` então elas retornarão seu formato alterado.

		
		:Returns: ‹ array ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public insert( $newValues)
	
		.. rst-class:: phpdoc-description
		
			| Permite inserir multiplos dados de uma única vez na coleção.
			
		
		
		:Parameters:
			- ‹ array › **$newValues** |br|
			  ``array associativo`` contendo os novos valores a serem definidos para a coleção.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` caso TODOS os novos valores sejam adicionados e ``false``
			  caso 1 deles falhe.
		
		:Throws: ‹ \InvalidArgumentException ›|br|
			  DEVE ser lançado caso algum dos valores passados seja ``undefined``.
		
	
	

.. rst-class:: public

	.. php:method:: public clean()
	
		.. rst-class:: phpdoc-description
		
			| Limpa totalmente a coleção de dados eliminando toda informação armazenada no momento.
			
		
		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` caso a exclusão dos dados tenha sido executada com sucesso
			  e ``false`` caso ocorra algum erro em algum dos itens. Neste caso, a coleção
			  ficará pela metade.
		
	
	

.. rst-class:: public

	.. php:method:: public __construct( $initialValues=[], $autoincrement=false)
	
		.. rst-class:: phpdoc-description
		
			| Inicia nova coleção de dados.
			
		
		
		:Parameters:
			- ‹ ?array › **$initialValues** |br|
			  Valores com os quais a instância deve iniciar.
			- ‹ bool › **$autoincrement** |br|
			  Quando ``true`` permite que seja omitido o nome da chave dos valores pois eles
			  serão definidos internamente conforme fosse um array começando em zero.

		
		:Throws: ‹ \InvalidArgumentException ›|br|
			  Caso algum dos valores iniciais a serem definidos não seja aceito.
		
	
	

