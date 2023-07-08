@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="INSS"> active</x-slot>
        </x-sideBar>
        <div class="template h-[500px]">
            <h1>Cálculo do desconto do INSS</h1>
            <h3>As alíquotas de desconto do INSS em 2023 vão de 7,5% a 14%, dependendo da faixa salarial. </h3>
            <div class="calculo">
                <form method="GET" class="validator" name="calculo" action="resultado_INSS">
                    <h4>Preencha os campos abaixo e clique em calcular</h4>
                    <x-inputNumber>
                        <x-slot name="label">salary</x-slot>
                        <x-slot name="title">Salário bruto mensal (antes dos descontos)</x-slot>
                        <x-slot name="body">
                            salário registrado na carteira de trabalho. <br> 
                            Remuneração que um trabalhor recebe por mês,sem considerar os descontos oficiais obrigatórios.
                        </x-slot>
                        <x-slot name="name">salary</x-slot>
                        <x-slot name="required">@required(true)</x-slot>
                    </x-inputNumber>

                    <x-coin></x-coin>
            </div>
            </form>
        </div>
        </div>
    </section>
@endsection
