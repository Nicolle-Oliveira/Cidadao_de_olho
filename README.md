# Cidadao_de_olho
Meu primeiro projeto com framework Laravel
<h4>Ambiente de desenvolvimento web utilizado -> Laragon</h4>

<h4>Projeto criado com composer via terminal </h4>

```
composer create-project laravel/laravel cidadao_de_olho
```


<p> Composer - ferramenta para gerenciamento de pacotes em PHP, instala automaticamente bibliotecas externas</p>
<p> Das que foram propositalmente usadas: <ul>
  <li> composer </li>
  <li> laravel </li>
</ul></p>

<br>
<h4>Banco de dados -> MySQL</h4>
<p>Criado banco com mesmo nome do projeto (cidadao_de_olho) e collation <i>utf8mb4_unicode_ci</i></p>

<br>
<h4>Para rodar o projeto</h4>
<p>No terminal (dentro da pasta do projeto), rodar os arquivos migration para criar as tabelas no database 

```
php artisan migrate
```

<p>Rodar também as seeds para popular o banco </p>

```
php artisan db:seed
```

<p>Abrir o servidor </p>

```
php artisan serve
```

<p>Rotas:</p>
        [localhost:](http://127.0.0.1:8000/deputados) ->  usa as informações da nova API para mostrar os resultados para o usuario

