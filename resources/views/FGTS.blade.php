@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="FGTS"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Cálculo do Fundo de Garantia do Tempo de Serviço </h1>
            <h3>Para calcular o FGTS preencha as informações na calculadora abaixo e clique em Calcular.</h3>
            <div class="calculo">
                <form method="GET" class="validator" name="calculo" action="resultado_FGTS">
                    <h4>Preencha os campos abaixo e clique em calcular</h4>
                    <div class="lg:grid lg:grid-cols-2 lg:max-w-[1000px]">

                        <x-inputNumber>
                            <x-slot name="label">salary</x-slot>
                            <x-slot name="title">Salário bruto mensal</x-slot>
                            <x-slot name="body">
                                salário registrado na carteira de trabalho. <br> 
                                Remuneração que um trabalhor recebe por mês,sem considerar os descontos oficiais obrigatórios.
                            </x-slot>
                            <x-slot name="name">salary</x-slot>
                            <x-slot name="required">@required(true)</x-slot>
                        </x-inputNumber>
    
                        <x-inputNumber>
                            <x-slot name="label">startFGTS</x-slot>
                            <x-slot name="title">Saldo inicial do FGTS</x-slot>
                            <x-slot name="body">Campo referente ao saldo do FGTS existente em sua conta, antes de inicar o seu trabalho atual</x-slot>
                            <x-slot name="name">startFGTS</x-slot>
                        </x-inputNumber>
    
                        <x-inputMonth>
                            <x-slot name="label">inicialDate</x-slot>
                            <x-slot name="title">Data inicial do contrato de trabalho</x-slot>
                            <x-slot name="body">Mês em que o contrato de trabalho foi celebrado.</x-slot>
                            <x-slot name="type">month</x-slot>
                            <x-slot name="name">inicialDate</x-slot>
                        </x-inputMonth>
    
                        <x-inputMonth>
                            <x-slot name="label">endDate</x-slot>
                            <x-slot name="title">Data final do contrato de trabalho</x-slot>
                            <x-slot name="body">Mês em que o contrato de trabalho foi encerrado.</x-slot>
                            <x-slot name="type">month</x-slot>
                            <x-slot name="name">endDate</x-slot>
                        </x-inputMonth>
    
                        <x-select>
                            <x-slot name='title'>aplicar juros sobre o saldo? </x-slot>
                            <x-slot name='body'>Cálculo com juros aplicados de acordo com a correção da Caixa de 3% ao ano.</x-slot>
                            <x-slot name='name'>interest</x-slot>
                            <option value="on">Sim</option>
                            <option value="null">Não</option>
                        </x-select>

                    </div>    
                    <x-coin></x-coin>
                </form>
            </div>
        </div>
    </section>
@endsection
