@extends('layout.app')
@section('content')
    <section class="container auto ">
        <x-sideBar>
            <x-slot name="seguro"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Cálculo do seguro desemprego</h1>
            <h3>O Seguro-Desemprego é um dos benefícios da Seguridade Social e tem a finalidade de garantir assistência financeira temporária ao trabalhador dispensado involuntariamente (sem justa causa)</h3>
            <div class="calculo">
                <form method="GET" class="validator" name="calculo" action="resultado_seguro" >
                    <h4>Preencha os campos abaixo e clique em calcular</h4>
                    <div class="lg:grid lg:grid-cols-2 lg:max-w-[1000px]">

                        
                        <x-inputNumber>
                            <x-slot name="label">lastMonth</x-slot>
                            <x-slot name="title">salário do último mês</x-slot>
                            <x-slot name="body">
                                salário registrado na carteira de trabalho. <br> 
                                Remuneração que um trabalhor recebe por mês,sem considerar os descontos oficiais obrigatórios.
                            </x-slot>
                            <x-slot name="name">lastMonth</x-slot>
                            <x-slot name="required">@required(true)</x-slot>
                        </x-inputNumber>

                        <x-inputNumber>
                            <x-slot name="label">penultimateMonth</x-slot>
                            <x-slot name="title">salário do penúltimo mês</x-slot>
                            <x-slot name="body">
                                salário registrado na carteira de trabalho. <br> 
                                Remuneração que um trabalhor recebe por mês,sem considerar os descontos oficiais obrigatórios.
                            </x-slot>
                            <x-slot name="name">penultimateMonth</x-slot>
                        </x-inputNumber>

                        <x-inputNumber>
                            <x-slot name="label">antepenultimateMonth</x-slot>
                            <x-slot name="title">salário do antepenúltimo mês</x-slot>
                            <x-slot name="body">
                                salário registrado na carteira de trabalho. <br> 
                                Remuneração que um trabalhor recebe por mês,sem considerar os descontos oficiais obrigatórios.
                            </x-slot>
                            <x-slot name="name">antepenultimateMonth</x-slot>
                        </x-inputNumber>
                        

                        <x-inputDays>
                            <x-slot name="label">months</x-slot>
                            <x-slot name="title">Quantidade de meses trabalhados</x-slot>
                            <x-slot name="body">Número de meses trabalhados no último emprego</x-slot>
                            <x-slot name="name">months</x-slot>
                            <x-slot name="min">0</x-slot>
                            <x-slot name="required">@required(true)</x-slot>
                        </x-inputDays>
                        <x-select>
                            <x-slot name='title'>Quantas vezes solicitou esse benefício</x-slot>
                            <x-slot name='body'>
                                Quantidade de solicitações do seguro desemprego. <br>
                                Como são distribuídas as parcelas do seguro desemprego? <br>
                                <p class="color">Primeira solicitação </p>
                                <ul class="mx-2" > 
                                    <li>mínimo de 12 meses trabalhados e máximo de 23: 4 parcelas</li>
                                    <li>a partir de 24 meses trabalhados: 5 parcelas</li>
                                </ul>
                                <p class="color">Segunda solicitação </p>
                                <ul class="mx-2">  
                                    <li>mínimo de 9 meses trabalhados e máximo de 11: 3 parcelas</li>
                                    <li>mínimo de 12 meses e máximo de 23: 4 parcelas</li>
                                    <li>a partir de 24 meses trabalhados: 5 parcelas</li>
                                </ul>
                                <p class="color">Terceira solicitação </p>
                                <ul class="mx-2">  
                                    <li>mínimo de 6 meses trabalhados e máximo de 11: 3 parcelas</li>
                                    <li>mínimo de 12 meses e máximo de 23: 4 parcelas</li>
                                    <li>a partir de 24 meses trabalhados: 5 parcelas</li>
                                </ul>
                            </x-slot>
                            <x-slot name='name'>choices</x-slot>
                            <option value="1"> É a primeira vez </option>
                            <option value="2"> É a segunda vez </option>
                            <option value="3"> É a terceira vez </option>
                        </x-select>
                    </div>
                    <x-coin></x-coin>
                </form>
            </div>
        </div>
    </section>
@endsection
