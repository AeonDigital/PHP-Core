========
redirect
========


.. php:function:: redirect( $url, $httpStatusCode=&#34;HTTP/1.1 302 Found&#34;)
	
		.. rst-class:: phpdoc-description
		
			| Redireciona o ``UA`` para a URL indicada.
			
			| Esta ação interrompe o script imediatamente após o redirecionamento.
			
		
		
		:Parameters:
			- ‹ string › **$url** |br|
			  URL para onde o ``UA`` será redirecionado.
			- ‹ string › **$httpStatusCode** |br|
			  Status ``Http`` que deve ser informado no header.
			  O status padrão **HTTP/1.1 302 Found** indica que o redirecionamento é
			  esperado ou que faz parte do fluxo padrão da aplicação.

		
		:Returns: ‹ void ›|br|