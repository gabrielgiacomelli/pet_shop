# AUmigos Pet Shop

## Sobre o projeto

Este projeto é um sistema web desenvolvido para gerenciar clientes e seus animais de estimação.

O sistema permite cadastrar, visualizar, editar e excluir clientes e animais.

Cada animal possui um responsável, e um cliente pode possuir vários animais.

## Tecnologias utilizadas

* PHP
* MySQL
* HTML
* XAMPP

## Funcionalidades

### Clientes

* Cadastrar cliente
* Listar clientes
* Editar cliente
* Excluir cliente
* Visualizar dados do cliente

### Animais

* Cadastrar animal
* Listar animais
* Editar animal
* Excluir animal
* Associar um animal a um cliente
* Visualizar o responsável pelo animal

## Banco de dados

O banco de dados possui duas tabelas:

* `cliente`
* `animais`

A tabela `animais` possui uma chave estrangeira chamada `id_cliente`, que relaciona cada animal ao seu responsável.

## Como executar

1. Instale o XAMPP.
2. Coloque a pasta do projeto dentro da pasta `htdocs`.
3. Inicie o Apache e o MySQL.
4. Crie o banco de dados utilizando o arquivo `db.sql`.
5. Acesse o projeto pelo navegador.

Exemplo:

`http://localhost/pet_shop/`

## Desenvolvedor

Gabriel da Costa Giacomelli
