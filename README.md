
# Sistema de Aluguéis de Filmes - Super 8

Bem-vindo ao **Super 8**! 

Este é um projeto realizado para a matéria de Banco de Dados II, ofertada pelo curso de Tecnologia em Análise e Desenvolvimento de Sistemas, na UDESC CCT. Foi desenvolvido em Laravel, um framework PHP moderno e poderoso.

## Pré-requisitos

Antes de começar, certifique-se de ter o ambiente de desenvolvimento configurado. Você precisará de:

- [XAMPP](https://www.apachefriends.org/pt_br/index.html) (ou similar, para ambiente de desenvolvimento local com PHP e MySQL)
- [Composer](https://getcomposer.org/) (gerenciador de dependências do PHP)

## Instalação

Siga estas etapas para configurar e executar o projeto em sua máquina:

1. Clone este repositório para o seu ambiente local:

    ```bash
    git clone https://github.com/lucasamscc/locadora.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd locadora
    ```

3. Instale as dependências do PHP usando o Composer:

    ```bash
    composer install
    ```

4. Crie um arquivo `.env` na raiz do projeto, baseado no arquivo `.env.example` fornecido. Este arquivo contém as configurações específicas do ambiente, como conexões de banco de dados e chaves de aplicativo.

5. Importe o backup do banco de dados. Você pode fazer isso seguindo as instruções específicas do seu sistema de gerenciamento de banco de dados. Por exemplo, se estiver usando o phpMyAdmin com XAMPP, você pode fazer o seguinte:

    - Inicie o servidor Apache e MySQL do XAMPP.
    - Acesse o phpMyAdmin em `http://localhost/phpmyadmin`.
    - Crie um novo banco de dados com o mesmo nome especificado no arquivo `.env`.
    - Selecione o novo banco de dados e vá para a aba "Importar".
    - Selecione o arquivo de backup SQL fornecido e clique em "Executar".

6. Depois de importar o banco de dados, execute as migrações do Laravel para garantir que o esquema do banco de dados esteja atualizado:

    ```bash
    php artisan migrate
    ```

7. Opcionalmente, você pode preencher o banco de dados com dados iniciais usando:

    ```bash
    php artisan db:seed
    ```

8. Por fim, inicie o servidor de desenvolvimento local:

    ```bash
    php artisan serve
    ```

    Agora, você pode acessar o projeto em `http://localhost:8000` no seu navegador.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
