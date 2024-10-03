# Desafio Técnico Tecnofit - Desenvolvedor(a) Pleno PHP
## Descrição

Este repositório contém a solução do desafio técnico para a vaga de Desenvolvedor(a) Pleno PHP na Tecnofit. O projeto foi desenvolvido utilizando PHP 7.4 e MySQL 5.7, e inclui a implementação do código-fonte, documentação, além de instruções detalhadas para instalação e execução.

## Instalação

### Pré-requisitos:
- Docker e Docker Compose instalados em seu ambiente.

### Passos:
1. **Clone o repositório**:
    ```bash
    git clone git@github.com:Ribapax/caseTecnofit.git

2. **Entre no diretório do projeto**:
    ```bash
    cd caseTecnofit

3. **Inicie o ambiente Docker**:
    ```bash
    docker compose up -d

4. **Verifique os containers em execução**:
    ```bash
    docker ps

5. **Acessar o coding challenge**:
   
    Entre no seu navegagor e acesse o link http://localhost:8888/ para mais informações de documentação e os endpoints da API

## Documentação
### Assunções

Com base na primeira etapa da entrevista, algumas decisões foram tomadas:

1. Versão PHP: O projeto foi desenvolvido utilizando PHP 7.4.
2. Versão MySQL: Foi utilizada a versão MySQL 5.7. Devido a um bug relacionado à execução desta versão em sistemas Linux, foi necessário limitar o uso de memória ao subir a instância do MySQL via Docker.
3. Base de Dados: As tabelas fornecidas no desafio técnico foram inseridas em uma database chamada tecnofit.
4. Padronização de Nomes: Para maior consistência, os nomes das variáveis e tabelas foram padronizados em inglês, de acordo com os dados disponibilizados.
5. Critérios de Ranking:
    - Usuários com o mesmo recorde pessoal ocupam a mesma posição no ranking.
    - Em caso de empate, o usuário com o recorde mais antigo aparece primeiro na lista.
    - A posição subsequente é determinada normalmente, ou seja, após um empate em primeiro lugar, o próximo usuário estará em segundo lugar. No código, existe um trecho comentado que pode ser ativado caso seja necessário seguir um critério alternativo, onde o próximo usuário após um empate ocuparia a terceira posição.
6. 

### Endpoints e Funcionalidades

O projeto implementa um endpoint REST que retorna o ranking de um determinado movimento. A documentação completa sobre as rotas, formato de resposta e exemplos pode ser encontrada no arquivo index.html, acessando a rota http://localhost:8888/

### Comentários da separação de arquivos e suas funcionalidades
Com o objetivo de modularizar o código e deixar o trecho responsável pelo ranqueamento o mais preparado possível para produção, separei o código em diferentes arquivos. Optei por não colocá-los dentro de pastas para evitar favorecer uma arquitetura específica, como DDD.

- **.htaccess**: Este arquivo foi necessário para gerenciar as URLs. Decidi que seria melhor apresentar na página inicial do projeto uma documentação e um resumo. Usei os mecanismos de reescrita de rota do Apache para redirecionar todas as requisições ao index.php, permitindo que o arquivo trate as diferentes rotas da aplicação.

- **conection.php**: Fiquei responsável por toda a parte de conexão com o banco de dados e suas opções. Este arquivo facilita qualquer alteração futura no banco.

- **index.css**, **index.html**, **index.js**: Estes arquivos são responsáveis pela página de boas-vindas da aplicação. Aproveitei para demonstrar alguns conhecimentos de frontend e jQuery.

- **index.php**: Este arquivo é o responsável por receber todas as requisições e chamar os recursos necessários para atender tanto o frontend da página inicial quanto a chamada ao endpoint do teste em si. Também contém uma validação simples para lidar com rotas não existentes.

- **movements.php**: Ficou encarregado da lógica de ranqueamento. Nele, coloquei a query criada para o banco de dados, bem como a montagem do JSON com o ranqueamento, seguindo os requisitos do desafio e as suposições descritas acima.

- **router.php**: Este arquivo contém a função auxiliar para o tratamento de rotas com parâmetros dinâmicos.

- **Dockerfile** e **docker-compose.yml**: Contêm as configurações necessárias para o ambiente Docker. Vale ressaltar os limitadores configurados no container do banco de dados para rodar no meu ambiente Linux. Caso ocorra algum erro ao subir o container, recomendo remover o limitador e ajustá-lo conforme o que a máquina aceita. Esses limitadores foram necessários para rodar a imagem do MySQL 5.7 no Arch Linux.
