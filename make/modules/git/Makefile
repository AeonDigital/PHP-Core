#
# Aeon Digital
# Rianna Cantarelli <rianna@aeondigital.com.br>
#
.SILENT:




#
# Configura suas credenciais para o repositório atual
git-config-local:
	make/makeActions.sh makeExecuteBefore "$@"
	make/modules/git/makeActions.sh gitConfigLocal
	make/makeActions.sh makeExecuteAfter "$@"

#
# Mostra log resumido do git
# Use o parametro 'len' para indicar a quantidade de itens a serem mostrados.
log:
	make/makeActions.sh makeExecuteBefore "$@"
	make/modules/git/makeActions.sh gitShowLog "${MAKECMDGOALS}"
	make/makeActions.sh makeExecuteAfter "$@"





#
# Mostra qual a tag atual do projeto.
tag:
	make/makeActions.sh makeExecuteBefore "$@"
	git describe --abbrev=0 --tags
	make/makeActions.sh makeExecuteAfter "$@"

#
# Redefine a tag atualmente vigente para o commit mais recente
tag-remark:
	make/makeActions.sh makeExecuteBefore "$@"
	make/modules/git/makeActions.sh gitTagManagement "remark"
	make/makeActions.sh makeExecuteAfter "$@"

#
# Atualiza o 'patch' da tag atualmente definida
# para a branch principal 'main'.
tag-update:
	make/makeActions.sh makeExecuteBefore "$@"
	make/modules/git/makeActions.sh gitTagManagement "version" "patch"
	make/makeActions.sh makeExecuteAfter "$@"

#
# Atualiza o 'minor version' da tag atualmente definida
# para a branch principal 'main'.
tag-update-minor:
	make/makeActions.sh makeExecuteBefore "$@"
	make/modules/git/makeActions.sh gitTagManagement "version" "minor"
	make/makeActions.sh makeExecuteAfter "$@"

#
# Atualiza o 'major version' da tag atualmente definida
# para a branch principal 'main'.
tag-update-major:
	make/makeActions.sh makeExecuteBefore "$@"
	make/modules/git/makeActions.sh gitTagManagement "version" "major"
	make/makeActions.sh makeExecuteAfter "$@"

#
# Atualiza a 'stability' da tag atualmente definida
# para a branch principal 'main'.
#
# Use o parametro 'stability' para indicar qual será a nova 'stability'.
# use apenas um dos seguintes valores: 'alpha'; 'beta'; 'cr'; 'r'
tag-stability:
	make/makeActions.sh makeExecuteBefore "$@"
	make/modules/git/makeActions.sh gitTagManagement "stability" "${stability}"
	make/makeActions.sh makeExecuteAfter "$@"





#
# Inicia uma 'branch'.
# Trata-se de uma branch com o objetivo de oferecer uma nova capacidade, melhoria ou
# uma correção do que já existe e que será mesclada com a 'main' assim que finalizar.
#
# A seguinte sequência de operações será feita:
# - Vai para a branch 'main'
# - Efetua um pull da branch 'main'.
# - Inicia uma nova branch com o nome seguindo o seguinte padrão
#	'type'/'datetime' indicados.
#
#
# Use o parametro 'type' para definir a natureza da tarefa que será
# desenvolvida dentro da nova branch.
# Escolha entre os valores:
# - f|feature     	: quando está criando uma funcionalidade que ainda não existe.
# - i|improvement 	: para a melhoria de algo que já existe ou de uma feature já entregue.
# - m|maintenance 	: para alterações cotidianas que não são exatamente uma nova
#                	  funcionalidade ou melhoria. Adequações não funcionais por exemplo.
#
# - b|bugfix      	: para correções de bugs sem urgência de entrega.
# - h|hotfix      	: para correção de bugs em modo de urgência.
#
#
# Use o parametro 'datetime' para definir momento em que a branch foi iniciada.
# A data deve ser descrita seguindo o formato 'YYYY_MM_DD-HH_mm' ("+%Y_%m_%d-%H_%M").
#
#
# Se nada for indicado, o valor padrão será a data e hora do momento em que este comando
# foi utilizado.
#
branch-start:
	make/makeActions.sh makeExecuteBefore "$@"
	make/modules/git/makeActions.sh gitBranchStart "${type}" "${datetime}"
	make/makeActions.sh makeExecuteAfter "$@"



#
# Efetua um commit incremental na branch atual.
#
# A seguinte sequencia de operações será feita:
# - Todos os arquivos marcados como tendo sido alterados serão movidos para 'stage'.
# - Um commit será criado onde a mensagem será a data e hora atual.
# - O push do novo commit será executado.
#
# Use o parametro 'message' para indicar sua própria mensagem do commit.
# prefix emoji      :tada:
# prefix subject
#
# wip : work in progress
#
# feat: A new feature
# fix: A bug fix
# docs: Documentation only changes
# style: Changes that do not affect the meaning of the code (white-space, formatting, missing semi-colons, etc)
# refactor: A code change that neither fixes a bug nor adds a feature
# perf: A code change that improves performance
# test: Adding missing or correcting existing tests
# chore: Changes to the build process or auxiliary tools and libraries such as documentation generation
branch-commit:


branch-discart-changes:

# espremer os commits em 1 só
# basicamente ele pega todos os ultimos X commits, mescla tudo e adiciona em stage... o seu próximo commit
# conterá a soma dos X commits que foram 'espremidos'
# git reset --soft HEAD~3

# a versão '--hard' exclui totalmente os commits retornando até o novo HEAD...
# então só faça isso com muita noção! (sabe quando você usa o VSCode para excluir totalmente todas as alterações?
# é tipo isso, mas com relação aos commits selecionados.)

# git rebase -i HEAD~3
# Entra em modo interativo e permite que você decida o que fazer com cada commit 'no caminho até o head'.
# - veja que abre um editor com as opções a serem usadas... o padrão é 'pick' para usar o commit.
#   mas você pode usar 'squash' que é para 'amassar todos' o commit com o anterior.
#   se for usar 'squash' mantenha o primeiro como 'pick' para ele entrar como 'base' do novo 'rebase'

# git add -i
# liga o modo interativo


#
# git gc
# limpa o 'lixo' de coisas que não estão sendo usadas por terem sido marcadas como apagadas
# mas ainda não foram.

#
# Finaliza a tarefa, efetuando um último commit e após, retornando para a
# branch 'main'.
#
# A seguinte sequencia de operações será feita:
# - Todos os commits da branch serão convertidos em 1 só.
# - Um commit será criado onde a mensagem será a data e hora atual.
# - O push do novo commit será executado.
# - Alterna para a branch 'main'
# - Efetua novo pull da branch 'main'.
#
# Neste momento, esta 'branch' aguardará ser incorporada na 'main'.
#
# Use o parametro 'message' para indicar sua própria mensagem do commit.
branch-finish:

#
# Sai da 'branch' atual e retorna para a branch 'main'.
branch-stop:

#
# Remove a branch do seu computador local.
branch-remove:
