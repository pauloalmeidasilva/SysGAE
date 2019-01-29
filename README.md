# Sistema de Gerenciamento Administrativo Escolar - SysGAE

## Indice
- [Descrição](#Descriçao)
- [Característica](#Característica)
- [Restrições](#Restrições)
- [Procedimentos de instalação](#Procedimentos-de-instalação)
- [Bugs encontrados](#Bugs-encontrados)

## Descrição
Projeto final para conclusão do curso Tecnologia em análise e Desenvolvimento de Sistemas.
Este projeto consiste num gerenciador escolar, dando a possibilidade ao usuário de domínio em realizar matrículas, transferências, relatórios de cunho administrativo e pedagógico, bem como agilizar na emissão da documentação escolar discente.


## Característica

### Linguagens utilizadas
* HTML 5;
* Javascript;
* PHP;
* MySQL.

### Padrão utilizado
* MVC


## Restrições
Este sistema será desenvolvido exclusivamente para Desktop, não dando enfoque para dispositivos móveis

## Procedimentos de instalação
Após clonar ou fazer o download zip siga os seguintes passos para deixar esse projeto em funcionamento:

* Atualize o composer que está no diretório "/src/";
* Crie o banco de dados utilizando o arquivo sysgae2.sql que está no diretório "/app/Projeto/Banco de Dados/".


## Bugs encontrados

### Login
Variável da senha perde o valor e não compara com a senha que retornou do banco de dados.

### CRUD Cargo
Preciso clicar 2 vezes em cada link da pagina para ela funcionar.
Método deletar não apaga o registro quando solicitado.