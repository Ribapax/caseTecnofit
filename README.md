# Desafio Técnico Tecnofit - Desenvolvedor(a) Pleno PHP

## Descrição
Repositório para o desafio técnico da vaga de desenvolvedor(a) pleno em PHP na Tecnofit. Contém a solução proposta para o desafio, incluindo código fonte, documentação e instruções de instalação e execução. Foi desenvolvido utilizando PHP e MySQL

## Instalação
1. **Clone o repositório:**
   ```bash
   git clone git@github.com:Ribapax/caseTecnofit.git
2. **Entre no diretório e inicie o container**
    ```bash
    cd caseTecnofit
    docker compose up -d
3. **Verifique que os containeres foram criados**
    ``bash
    docker ps


## Documentação

Assumi com base na primeira etapa da entrevista que estamos usando o php versão 7.4
Assumi também que a versão do mysql é a 5.7
tive que colocar uma limitação no uso de memória ao subir a instancia mysql do docker, devido a um bug que acontece na imagem 5.7 rodando em sistemas linux
Assumi que as tabelas que foram disponibilizadas no desafio tecnico estão dentro de uma database chamada tecnofit
Assumi também a padronização de variaveis em inglês para melhor coesão com os dados disponiveis
Assumi que duas pessoas com o mesmo recorde pessoal tem a msm posição, mas na listagem a que teve o recorde mais antigo vem por primeiro
Assumi que as em caso de empate a proxima posição recebe o proximo valor da posição, no caso de empate em primeiro lugar o proximo está em segundo, mas deixei comentado no código o trecho pra alteração, caso o primeiro lugar empate entre 2 pessoas, a proxima seria o terceiro lugar

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

Inicie o ambiente Docker:

bash

docker-compose up -d

Verifique os containers em execução:

bash

    docker ps

Documentação
Assunções

Com base na primeira etapa da entrevista, algumas decisões foram tomadas:

    1.Versão PHP: O projeto foi desenvolvido utilizando PHP 7.4.
    2.Versão MySQL: Foi utilizada a versão MySQL 5.7. Devido a um bug relacionado à execução desta versão em sistemas Linux, foi necessário limitar o uso de memória ao subir a instância do MySQL via Docker.
    Base de Dados: As tabelas fornecidas no desafio técnico foram inseridas em uma database chamada tecnofit.
    Padronização de Nomes: Para maior consistência, os nomes das variáveis e tabelas foram padronizados em inglês, de acordo com os dados disponibilizados.
    Critérios de Ranking:
        Usuários com o mesmo recorde pessoal ocupam a mesma posição no ranking.
        Em caso de empate, o usuário com o recorde mais antigo aparece primeiro na lista.
        A posição subsequente é determinada normalmente, ou seja, após um empate em primeiro lugar, o próximo usuário estará em segundo lugar. No código, existe um trecho comentado que pode ser ativado caso seja necessário seguir um critério alternativo, onde o próximo usuário após um empate ocuparia a terceira posição.

Endpoints e Funcionalidades

O projeto implementa um endpoint RESTful que retorna o ranking de um determinado movimento. A documentação completa sobre as rotas, formato de resposta e exemplos pode ser encontrada no arquivo documentacao.html.