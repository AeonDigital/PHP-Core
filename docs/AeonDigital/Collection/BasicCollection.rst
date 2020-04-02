.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


BasicCollection
===============


.. php:namespace:: AeonDigital\Collection

.. php:class:: BasicCollection


	.. rst-class:: phpdoc-description
	
		| Implementa a interface ``iBasicCollection``.
		
		| Esta classe traz componentes que permitem implementar quaisquer das interfaces do namespace
		| ``AeonDigital\Interfaces\Collection`` no entando APENAS ``iBasicCollection`` está devidamente
		| implementada, restando às classes concretas que herdem esta se especializarem em cada uma
		| destas capacidades.
		| 
		| A partir desta classe as seguintes interfaces podem ser implementadas imediatamente:
		| 
		|  - iProtectedCollection
		|  - iAppendOnlyCollection
		|  - iReadOnlyCollection
		|  - iCaseInsensitiveCollection
		| 
		| Na documentação de cada método ou propriedade desta classe vem especificado de que forma
		| a implementação de uma destas interfaces deve alterar o comportamento do mesmo.
		
	
	:Implements:
		:php:interface:`AeonDigital\\Interfaces\\Collection\\iBasicCollection` 
	

Properties
----------

Methods
-------

.. rst-class:: public

	.. php:method:: public isProtected()
	
		.. rst-class:: phpdoc-description
		
			| Indica se a coleção implementa a interface ``iProtectedCollection``.
			
		
		
		:Returns: ‹ bool ›|br|
			  Quando ``true`` indica que a coleção manterá o estado de todos os seus
			  objetos não permitindo que eles sejam alterados, no entanto os valores uma
			  vez definidos PODEM ser excluídos.
		
	
	

.. rst-class:: public

	.. php:method:: public isAppendOnly()
	
		.. rst-class:: phpdoc-description
		
			| Indica se a coleção implementa a interface ``iAppendOnlyCollection``.
			
		
		
		:Returns: ‹ bool ›|br|
			  Quando ``true`` indica que a coleção pode ser apenas incrementada mas jamais
			  modificada nem reduzida.
		
	
	

.. rst-class:: public

	.. php:method:: public isReadOnly()
	
		.. rst-class:: phpdoc-description
		
			| Indica se a coleção implementa a interface ``iReadOnlyCollection``.
			
		
		
		:Returns: ‹ bool ›|br|
			  Quando ``true`` indica que a coleção não pode ser alterada após ser definida
			  durante a construção da instância.
		
	
	

.. rst-class:: public

	.. php:method:: public isCaseInsensitive()
	
		.. rst-class:: phpdoc-description
		
			| Indica se a coleção implementa a interface ``iCaseInsensitiveCollection``.
			
		
		
		:Returns: ‹ bool ›|br|
			  Quando ``true`` indica que os nomes das chaves de cada entrada de dados será
			  tratado de forma ``case insensitive``, ou seja, ``KeyName = keyname = KEYNAME``.
		
	
	

.. rst-class:: public

	.. php:method:: public isAutoIncrement()
	
		.. rst-class:: phpdoc-description
		
			| Uma instância com a característica ``autoincrement`` deve permitir que seja omitido o nome
			| das chaves no método ``set`` pois este deve ser controlado internamente como se fosse um
			| ``array`` iniciado em zero.
			
			| Ainda assim o tratamento das chaves sempre se dará como se fossem ``strings`` e não
			| numerais inteiros como ocorre em um ``array comum``.
			| 
			| As implementações desta caracteristica devem também controlar os índices quando estes são
			| removidos. A regra geral é que TODOS os itens existentes mantenham como chave o índice
			| correspondente a sua real posição.
			| 
			| \`\`\` php
			|      // Neste caso uma coleção com 10 itens que execute 5 vezes a instrução:
			|      $collection->remove(&#34;0&#34;);
			|      // Ficará, ao final com 5 itens cada qual ocupando uma posição entre 0 e 4.
			| \`\`\`
			
		
		
		:Returns: ‹ bool ›|br|
			  Retorna ``true`` quando a coleção é do tipo ``autoincrement``.
		
	
	

.. rst-class:: public

	.. php:method:: public has( $key)
	
		.. rst-class:: phpdoc-description
		
			| Indica se a chave de nome indicado existe entre os itens da coleção.
			
		
		
		:Parameters:
			- ‹ string › **$key** |br|
			  Nome da chave que será identificada.

		
		:Returns: ‹ bool ›|br|
			  Retorna ``true`` caso a chave indicada existir entre os itens da coleção ou
			  ``false`` se não existir.
		
	
	

.. rst-class:: public

	.. php:method:: public set( $key, $value)
	
		.. rst-class:: phpdoc-description
		
			| Insere um novo item chave/valor para a coleção de dados.
			
			| Se já existe um valor com chave de mesmo nome então, o valor antigo será substituído.
			
		
		
		:Parameters:
			- ‹ string › **$key** |br|
			  Nome da chave.
			  Pode ser usado ``''`` caso a instância seja do tipo ``autoincrement``.
			- ‹ mixed › **$value** |br|
			  Valor que será associado a esta chave.

		
		:Returns: ‹ bool ›|br|
			  Retorna ``true`` quando a insersão/atualização do item foi bem sucedido.
		
	
	

.. rst-class:: public

	.. php:method:: public get( $key)
	
		.. rst-class:: phpdoc-description
		
			| Resgata um valor da coleção a partir do nome da chave indicada.
			
		
		
		:Parameters:
			- ‹ string › **$key** |br|
			  Nome da chave cujo valor deve ser retornado.

		
		:Returns: ‹ ?mixed ›|br|
			  Valor armazenado na ``collection`` que correspondente a chave passada.
			  DEVE retornar ``null`` quando a chave de nome indicado não existir.
		
	
	

.. rst-class:: public

	.. php:method:: public remove( $key)
	
		.. rst-class:: phpdoc-description
		
			| Remove da coleção o item com a chave indicada.
			
		
		
		:Parameters:
			- ‹ string › **$key** |br|
			  Nome da chave do valor que será excluído.

		
		:Returns: ‹ bool ›|br|
			  Retornará ``true`` se a chave foi removida, ou, se, ela não existia dentro
			  da coleção atual e ``false`` caso por algum motivo não seja possível executar
			  este método.
		
	
	

.. rst-class:: public

	.. php:method:: public __construct( $initialValues=[], $autoincrement=false)
	
		.. rst-class:: phpdoc-description
		
			| Inicia uma nova coleção de dados.
			
		
		
		:Parameters:
			- ‹ ?array › **$initialValues** |br|
			  Valores com os quais a instância deve iniciar.
			- ‹ bool › **$autoincrement** |br|
			  Quando ``true`` permite que seja omitido o nome da chave dos valores pois eles
			  serão definidos internamente conforme fosse um ``array`` começando em zero.

		
		:Throws: ‹ \InvalidArgumentException ›|br|
			  Caso algum dos valores iniciais a serem definidos não seja aceito.
		
	
	

.. rst-class:: public

	.. php:method:: public offsetExists( $key)
	
		.. rst-class:: phpdoc-description
		
			| Método que permite a verificação da existência de um valor usando a notação de
			| ``array associativo`` em conjunto com as funções ``isset()`` e ``empty()`` do PHP:
			
			| \`\`\` php
			|      $oCollect = new iBasicCollection();
			|      ...
			|      if (isset($oCollect[&#34;keyName&#34;])) { ... }
			| \`\`\`
			
		
		
		:Parameters:
			- ‹ string › **$key** |br|
			  Chave que será verificada.

		
		:Returns: ‹ bool ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public offsetGet( $key)
	
		.. rst-class:: phpdoc-description
		
			| Método que permite resgatar o valor de um item da coleção da instância usando a
			| notação de ``array associativo``.
			
			| \`\`\` php
			|      $oCollect = new iBasicCollection();
			|      if ($oCollect[&#34;keyName&#34;] == $value) { ... }
			| \`\`\`
			
		
		
		:Parameters:
			- ‹ string › **$key** |br|
			  Nome da chave cujo valor deve ser retornado.

		
		:Returns: ‹ mixed | null ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public offsetSet( $key, $value)
	
		.. rst-class:: phpdoc-description
		
			| Método que permite inserir um novo valor para a coleção de dados da instância usando a
			| notação de um ``array associativo``.
			
			| \`\`\` php
			|      $oCollect = new iBasicCollection();
			|      $oCollect[&#34;keyName&#34;] = $value;
			| \`\`\`
			
		
		
		:Parameters:
			- ‹ string › **$key** |br|
			  Nome da chave.
			- ‹ mixed › **$value** |br|
			  Valor que será associado.

		
		:Returns: ‹ void ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public offsetUnset( $key)
	
		.. rst-class:: phpdoc-description
		
			| Método que permite remover o valor de um item da coleção da instância usando a notação
			| de ``array associativo`` em conjunto com a função ``unset()`` do PHP:
			
			| \`\`\` php
			|      $oCollect = new iBasicCollection();
			|      unset($oCollect[&#34;keyName&#34;]);
			| \`\`\`
			
		
		
		:Parameters:
			- ‹ string › **$key** |br|
			  Nome da chave cujo valor deve ser retornado.

		
		:Returns: ‹ mixed | null ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public count()
	
		.. rst-class:: phpdoc-description
		
			| Método que permite a verificação da quantidade de itens na coleção atual usando a função
			| ``count()`` do PHP.
			
			| \`\`\` php
			|      $oCollect = new iBasicCollection();
			|      ...
			|      if (count($oCollect) > 1) { ... }
			| \`\`\`
			
		
		
		:Returns: ‹ int ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public getIterator()
	
		.. rst-class:: phpdoc-description
		
			| Método que permite a iteração sobre os valores armazenados na coleção de dados da instância
			| usando ``foreach()`` do PHP.
			
			| \`\`\` php
			|      $oCollect = new iBasicCollection();
			|      ...
			|      foreach($oCollect as $key => $value) { ... }
			| \`\`\`
			
		
		
		:Returns: ‹ \\Traversable ›|br|
			  
		
	
	

.. rst-class:: public

	.. php:method:: public __set( $name, $value)
	
		.. rst-class:: phpdoc-description
		
			| Desabilita a função mágica ``__set`` para assegurar a que apenas alterações dentro das
			| regras definidas para a classe sejam possíveis.
			
		
		
	
	

