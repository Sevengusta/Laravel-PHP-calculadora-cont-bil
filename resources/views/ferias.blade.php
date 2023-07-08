@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="ferias"> active</x-slot>
        </x-sideBar>

        <div class="template">
            <h1>Cálculo de Férias </h1>
            <h3>O cálculo de férias de um colaborador no regime CLT equivale à soma do salário bruto e 1/3 desse valor,
                menos os descontos de INSS e IRRF.</h3>
            <div class="calculo">
                <form method="GET" class="validator" name="calculo" action="resultado_ferias" >
                    <h4>Preencha os campos abaixo e clique em calcular</h4>
                    <div class="lg:grid lg:grid-cols-2 lg:max-w-[1000px]">

                        <x-inputNumber>
                            <x-slot name="label">salary</x-slot>
                            <x-slot name="title">salário bruto mensal</x-slot>
                            <x-slot name="body">
                                salário registrado na carteira de trabalho. <br> 
                                Remuneração que um trabalhor recebe por mês,sem considerar os descontos oficiais obrigatórios.
                            </x-slot>
                            <x-slot name="name">salary</x-slot>
                            <x-slot name="required">@required(true)</x-slot>
                        </x-inputNumber>
                        
                        <x-inputNumber>
                            <x-slot name="label">overtime</x-slot>
                            <x-slot name="title">Valor médio de horas extras mensais</x-slot>
                            <x-slot name="body">Caso faça horas extras, adicione o valor médio recebido por mês.</x-slot>
                            <x-slot name="name">overtime</x-slot>
                        </x-inputNumber>
    
                        <x-inputDays>
                            <x-slot name="label">days</x-slot>
                            <x-slot name="title">Dias de férias</x-slot>
                            <x-slot name="body">
                                Altere o valor para o número de dias requisitados de férias: <br>
                                Máximo 30 e mínimo zero dias de férias.
                            </x-slot>
                            <x-slot name="name">days</x-slot>
                            <x-slot name="min">1</x-slot>
                            <x-slot name="max">30</x-slot>
                            <x-slot name="required">@required(true)</x-slot>
                        </x-inputDays>
                        <x-dependents></x-dependents>
    
                        <x-select>
                            <x-slot name='title'>vender férias? (abono percuniário)</x-slot>
                            <x-slot name='body'>
                                Com o abono, é possível vender (1/3) de suas férias em acordo com
                                a empresa, recebendo remuneração adicional
                            </x-slot>
                            <x-slot name='name'>salaryAllowance</x-slot>
                            <option value="1">Sim</option>
                            <option value="null">Não</option>
                        </x-select>
                        <x-select>
                            <x-slot name='title'>adiantar a 1ª parcela do 13º? </x-slot>
                            <x-slot name='body'>Solicitou a antecipação da primeira parcela do décimo terceiro por ocasião das férias?</x-slot>
                            <x-slot name='name'>advance</x-slot>
                            <option value="1">Sim</option>
                            <option value="null">Não</option>
                            
                        </x-select>
                    </div>
                    <x-coin></x-coin>
                </form>
            </div>
        </div>
    </section>
@endsection
