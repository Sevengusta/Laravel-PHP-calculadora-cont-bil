@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="IRRF"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Cálculo de Imposto de renda Retido na Fonte</h1>
            <h3>O Imposto de Renda Retido na Fonte (IRRF) é uma porcentagem descontada do salário do trabalhador todos os
                meses pela Receita Federal.</h3>
            <div class="calculo">
                <form method="GET" class="validator" name="calculo" action="/resultado_IRRF">
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

                    <x-inputNumber>
                        <x-slot name="label">discounts</x-slot>
                        <x-slot name="title">Descontos sobre a folha</x-slot>
                        <x-slot name="body">
                            Digite todos os descontos relativos a folha. <br>
                            São exemplos de descontos: <br> 
                            <ul class="mx-2">
                                <li>Vale-Transporte,</li>
                                <li>Vale-Refeição,</li>
                                <li>Faltas sem justificativas,</li>
                                <li>Contribuição Sindical etc.</li>
                            </ul>
                            Os descontos do IRRF e do INSS  serão calculados automáticamente
                        </x-slot>

                        <x-slot name="name">discounts</x-slot>
                    </x-inputNumber>
                    <x-dependents>
                        
                    </x-dependents>
                    <x-coin></x-coin>
                </form>
            </div>

    </section>
@endsection
