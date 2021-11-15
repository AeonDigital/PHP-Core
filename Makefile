#
# Aeon Digital
# Rianna Cantarelli <rianna@aeondigital.com.br>
#





#
# Variáveis de controle
CONTAINER_NAME="apache-php-7.4"





#
# Inicia o projeto
up:
	docker-compose up -d
	docker exec -it ${CONTAINER_NAME} composer install

#
# Encerra o projeto
down:
	docker-compose down --remove-orphans

#
# Entra no bash principal do projeto
bash:
	docker exec -it ${CONTAINER_NAME} /bin/bash

#
# Instala as dependências do projeto
# usando o 'php composer'
composer-install:
	docker exec -it ${CONTAINER_NAME} composer install

#
# Atualiza as dependências do projeto
# usando o 'php composer'
composer-update:
	docker exec -it ${CONTAINER_NAME} composer update





#
# Executa a bateria de testes
test:
	docker exec -it ${CONTAINER_NAME} vendor/bin/phpunit --configuration "tests/phpunit.xml" --colors=always --verbose --debug

#
# Executa os testes de apenas 1 classe de testes.
# Use o parametro 'file' para indicar qual arquivo contém a respectiva classe.
# O nome do arquivo e da classe de testes devem ser idênticos.
#
# > make test-file file="path/to/tgtFile.php"
test-file:
	docker exec -it ${CONTAINER_NAME} vendor/bin/phpunit "tests/src/${file}" --colors=always --verbose --debug

#
# Executa os testes de apenas 1 método em 1 classe de testes.
# Use o parametro 'file' para indicar qual arquivo contém a respectiva classe.
# Use o parametro 'method' para indicar qual método da classe de testes deve ser executado
#
# > make test-method file="path/to/tgtFile.php" method="tgtMethodName"
test-method:
	docker exec -it ${CONTAINER_NAME} vendor/bin/phpunit --filter "${method}" "tests/src/${file}" --colors=always --verbose --debug





#
# Executa a verificação total de cobertura dos testes unitários
test-cover:
	docker exec -it ${CONTAINER_NAME} vendor/bin/phpunit --configuration "tests/phpunit.xml" --colors=always --coverage-text

#
# Executa a cobertura dos testes unitários em apenas 1 classe de testes.
# Use o parametro 'file' para indicar qual arquivo contém a respectiva classe.
# O nome do arquivo e da classe de testes devem ser idênticos.
#
# > make test-cover-html file="path/to/tgtFile.php"
test-cover-file:
	docker exec -it ${CONTAINER_NAME} vendor/bin/phpunit "tests/src/${file}" --whitelist="tests/src/${file}" --colors=always --coverage-text 





#
# Executa a verificação total de cobertura dos testes unitários
# e exporta o resultado em formato HTML
test-cover-html:
	docker exec -it ${CONTAINER_NAME} vendor/bin/phpunit --configuration "tests/phpunit.xml" --colors=always --coverage-html "tests/cover"

#
# Executa a cobertura dos testes unitários em apenas 1 classe de testes
# e exporta o resultado em formato HTML
# Use o parametro 'file' para indicar qual arquivo contém a respectiva classe.
# O nome do arquivo e da classe de testes devem ser idênticos.
#
# > make test-cover-file-html file="path/to/tgtFile.php"
test-cover-file-html:
	docker exec -it ${CONTAINER_NAME} vendor/bin/phpunit "tests/src/${file}" --whitelist="tests/src/${file}" --coverage-html "tests/cover-file"
