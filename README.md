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

## Documentação

Assumi com base na primeira etapa da entrevista que estamos usando o php versão 7.4
Assumi também que a versão do mysql é a 5.7
tive que colocar uma limitação no uso de memória ao subir a instancia mysql do docker, devido a um bug que acontece na imagem 5.7 rodando em sistemas linux
Assumi que as tabelas que foram disponibilizadas no desafio tecnico estão dentro de uma database chamada tecnofit
Assumi também a padronização de variaveis em inglês para melhor coesão com os dados disponiveis
