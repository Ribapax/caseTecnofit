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