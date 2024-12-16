# CRUD de Itens em Estoque - Laravel

Este é o meu primeiro projeto desenvolvido com Laravel e Blade. Trata-se de um CRUD simples para gerenciamento de itens em um estoque. O projeto permite criar, editar e excluir itens. O front-end é construído utilizando Blade e estilizado com Tailwind CSS.

## Funcionalidades

- **Criar**: Permite adicionar novos itens ao estoque.
- **Editar**: Permite editar as informações de itens existentes no estoque.
- **Excluir**: Permite remover itens do estoque.

## Tecnologias Utilizadas

- **Backend**: Laravel (PHP)
- **Frontend**: Blade, Tailwind CSS
- **Banco de Dados**: MySQL

## Instalação

1. Clone este repositório para sua máquina local:

   ```bash
   git clone https://github.com/RCordeiroAlmeida/crud-laravel.git
   ```

2. Acesse o diretório do projeto:

    ```bash
    cd crud-laravel
    ```

3. Instale as dependências do Laravel:

    ```bash
    composer install
    ```

4. Copie o arquivo .env.example para .env:

    ```bash
    cp .env.example .env
    ```

5. Gere a chave de aplicação do Laravel:

    ```bash
    php artisan key:generate
    ```
6. Configure o banco de dados no arquivo .env com as credenciais corretas.

7. Rode as migrações do banco de dados:

    ```bash
    php artisan migrate
    ```

8. (Opcional) Se você desejar popular o banco com dados fictícios, pode rodar o seeder:
    ```bash
    php artisan db:seed
    ```

9. Inicie o servidor do Laravel:
   ```bash
    php artisan serve
    ```

10. Acesse o aplicativo em http://localhost:8000.
   ```bash
    php artisan serve
```
## Estrutura de Diretórios

- **app/Http/Controllers**: Contém os controladores do projeto, incluindo o `ItemController`.
- **resources/views**: Contém as views do Blade, incluindo o formulário de criação/edição de itens.
- **database/migrations**: Contém os arquivos de migração do banco de dados.
- **public/css e public/js**: Contém os arquivos estáticos do projeto, incluindo o Tailwind CSS.

## Contribuições

Este projeto foi feito para aprendizado pessoal e pode ser utilizado como base para projetos futuros. Qualquer contribuição ou sugestão é bem-vinda.

## Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.
