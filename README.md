# Cidadao_de_olho
Meu primeiro projeto com framework Laravel

<h4>Ambiente de desenvolvimento web utilizado -> Laragon</h4>

<br>
<h4>Projeto criado com composer via terminal </h4>

```
composer create-project laravel/laravel cidadao_de_olho

```


<p> Composer - ferramenta para gerenciamento de pacotes em PHP, instala automaticamente bibliotecas externas</p>
<p> Das que foram propositalmente usadas: <ul>
  <li> composer </li>
  <li> guzzlehttp </li>
  <li> laravel </li>
</ul></p>

<br>
<h4>Banco de dados -> MySQL</h4>
<p>Criado banco com mesmo nome do projeto (cidadao_de_olho) e collation <i>utf8mb4_unicode_ci</i></p>

<br>
<h4>Para rodar o projeto</h4>
<p>No terminal (dentro da pasta do projeto), rodar os arquivos migration para criar as tabelas no database <i>(php artisan migrate)</i></p>
<p>Abrir o servidor (ainda dentro da pasta) <i></i></p>
<p>Rotas: <ul>
  <li>[localhost:](http://127.0.0.1:8000/deputados) -> preenche o banco de dados e retorna a API criada com as informações que precisamos</li>
  <li>[localhost:](http://127.0.0.1:8000/show) -> usa as informações da nova API para mostrar os resultados para o usuario</li>
</ul></p>

