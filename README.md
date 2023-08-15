<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Essa aplicação foi desenvolvido durante o video [Construindo aplicação Fullstack do ZERO](https://www.linkedin.com/feed/update/urn:li:activity:7084325121124933632/) utilizando **Laravel**. 

<h2 id="pre-requisites">💻 Requisitos</h2> 

Certifique-se que você possuí o composer instalado globalmente em sua máquina. </br> </br>

Caso não possua, faça o download nesse link: https://getcomposer.org/download/


<h2 id="how-to-use"> 🚀 Instalando o projeto (comandos dentro do git)</h2>

Primeiro você deve clonar o repositório,

```bash
# Clone o repositório
$ git clone https://github.com/Sevengusta/Laravel-PHP-calculadora-contabil

# Acesse a pasta do projeto 
$ cd Laravel-PHP-calculadora-contabil/

# instalação de dependências necessárias (comandos de build)
composer install
npm install

# Entre no VSCode
$ code .
```

<h2 id="how-to-use"> 🚀 configurando o ambiente do projeto (comandos dentro do VSCode)</h2>

Procure a pasta arquivo .env no projeto (caso ele possua o nome de .env.example, renomear para .env)

![Tutorial Laravel](https://github.com/Sevengusta/Laravel-PHP-calculadora-contabil/assets/129140834/9204461b-bcf0-4dfb-b3ee-bf7452c84c9b)


```bash
# abra o terminal de comando de digite os seguintes códigos:
# Gerar Chave de Criptografia
php artisan key:generate

# para iniciar o projeto
npm run dev

# em seguida, abra outro terminal de comando e digite:
php artishan serve

```

</hr>
Abra o seu navegador no caminho: http://127.0.0.1:8000/ . Caso tenha seguido o processo corretamente, você verá o projeto em execução:

![Exemplo do projeto](https://github.com/Sevengusta/Laravel-PHP-calculadora-contabil/assets/129140834/444a531e-6f54-4114-93c4-9bc2ad3a3a3e)


## Funcionalidades disponíveis:
<li>Calculadora de INSS: retorna o percentual do salário bruto que será retido pela empresa para o INSS </li>

![image](https://github.com/Sevengusta/Laravel-PHP-calculadora-contabil/assets/129140834/d80676c9-5936-4728-851e-7eb306aed9fd)

<li>Calculadora de IRPF: retorna o percentual do salário bruto que será retido pela empresa para para o IRPF</li>

![image](https://github.com/Sevengusta/Laravel-PHP-calculadora-contabil/assets/129140834/528dd958-74e8-4ffa-9599-c97b54c6b766)

<li>Calculadora de Seguro desemprego: retorn o valor das parcelas de seguro desemprego devidas, caso você possua o direito ao benefício.</li>

![image](https://github.com/Sevengusta/Laravel-PHP-calculadora-contabil/assets/129140834/e88401d7-a078-4abe-93c3-cb8734d2a6d3)

<li>Calculadora de FGTS : além de realizar o cálculo do FGTS devido, ela retorna a quantia que poderá ser retirada pelo empregado, caso possua direito </li>

![image](https://github.com/Sevengusta/Laravel-PHP-calculadora-contabil/assets/129140834/8f42ec8b-147b-4b5c-bf68-4c4bd9d6bf46)

<li>Calculadora de Férias: retorna a quantidade devida pelo funcionário, ao começar gozar de suas férias </li>
<li>Calculadora de Rescisão trabalhista</li>



