interfaces
// 54f7b4992f5a9311fc8f62aeec2ffc4fc27e90c2 | primeira alteração deste refactory
// 54dd48dcf15997c41a52e1030e24822a077d8ff8 | última alteração antes do refactory


Depois de avançar bastante com o desenvolvimento de uma nova formatação de tipos básicos
o tempo apertou demais e foi preciso "dar um passo atraz".

Até finalizar o cepeuc e demais projetos da DNA previstos para este ano nada do que foi produzido
aqui deverá chegar a produção pois ainda demanda maturação.

É preciso revisar a questão do uso de interfaces com constantes para dai gerar as diferentes
classes que preveem os diversos tipos de dados.
Talvez, criar apenas 1 constante (array) contendo todos os valores definidos para cada tipo que
se planeja representar seja uma abordagem mais correta visto que o custo em memória não é tão
grande e facilitará bastante o desenvolvimento posterior.
Os construtores das classes de tipos irão se tornar mais verbosos mas dará para criar apenas
1 classe concreta capaz de resolver tudo.
Como forma de tentar resolver o problema dos construtores verbosos, talvez criar uma factory que
tenha 1 método de retorno para cada tipo que se planeja tornar mais fácil de construir.

Ex: $obj = typeFactory::NNEString([$value], ...);
    internamente chamaria algo como :
    new MainType($readOnly, $iAllowNull, $isAllowEmpty, "String", [$value], ...)

Algumas coisas irão se perder, por exemplo, a capacidade de ter a CERTEZA de que um tipo "DateTime"
devolva realmente um objeto deste tipo. Isto não é um problema sério. Mas as IDEs, por não saberem
com o que estão lidando também não devolverão um autocomplete adequado.

Apesar deste tipo de perda, acho que o ganho com o uso mais conciso de uma única classe geral
ao invés de dezenas de classes especializadas facilita muito o entendimento e manutenção futura
também.




O que ainda não foi feito:
// Seguir daqui:
// Criar um ``standart`` para iDataModel
// seguir com ``iType`` e ``iField``
// Quando um modelo de dados exigir que um ``iField`` referencie-se a um modelo de dados
// usar a classe ``FieldDataModel`` ou ``FieldDataModelArray`` para casos de coleções.
// Ver forma de validar o nome do modelo de dados ao inserir um valor deste tipo em um
// destes campos.
