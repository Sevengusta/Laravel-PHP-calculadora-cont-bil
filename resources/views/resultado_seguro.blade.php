@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="IRRF"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Quanto vou receber?</h1>
            <div class="flex flex-col 2xl:flex-row">
                <div id="resumo">
                    <h1>Resultado do seu cálculo</h1>
                    <div class="resumoBody">
                        <div class="resumoBodyLeft">
                            <h4>Por ser a {{$choices}}ª vez que você solicitou o benefício, você receberá:</h4>
                            <h1 id="resumeResult">{{$mountParcels}}</h1>
                        </div>
                        <div class="resumoBodyRight flex flex-col justify-between ">
                            <h4>Isso porque você trabalhou:</h4>
                            <div class="resumoPercentual">
                                <h1 id="resumeResultPerc"> {{$months}} mes(es)</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="resultado">
                    <table class="table" id="tableResults">
                        <thead>
                            <tr>
                                <th class="text-center">Eventos</th>
                                <th class="text-center">Valores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-info">
                                <td class="text-left">Média salarial</td>
                                <td id="grossSalaryValue">{{$average}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Quantidade</td>
                                <td id="slInssValue">{{$countParcels}} Parcelas</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Valor das Parcelas</td>
                                <td id="slInssValue">{{$secureParcels}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Meses trabalhados</td>
                                <td id="slInssValue">{{$months}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Recebimento total</td>
                                <td id="slInssValue">{{$mountParcels}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-center items-center" >
                        <h1 class="m-0" >Detalhes do cálculo </h1>
                        <div class="w-[40px]">
                            <img class="calc w-4/5 mx-3" src="{{ Vite::asset('Resources/images/check.png') }}" alt="">
                            <img class="dontshow w-4/5 mx-3 hide" src="{{ Vite::asset('Resources/images/crossed.png') }}" alt="">
                        </div>
                    </div>
                    <div class="detalhes hide flex-col">
                        <div class="sum">
                            <h5 class="font-bold">Média salarial menor que um salário mínimo </h5>
                            <h5 class="italic font-sans"> o valor das parcelas serão de R$ 1.320,00 (um salário mínimo)</h5 class="italic"> <hr>
                        </div>
                        <div class="sum">
                            <h5 class="font-bold">Média salarial até R$ 1.683,74 </h5>
                            <h5 class="italic font-sans">Multiplica-se salário médio por 0.8 (80%)</h5 class="italic"> <hr>
                        </div>
                        <div class="sum">
                            <h5 class="font-bold">Média salarial de R$ 1.683,74 até R$ 2.806,53 </h5>
                            <h5 class="italic font-sans">O que exceder a R$ 1.683,74 multiplicar por 0,5 (50%) e somar a R$ 1.347,00</h5> <hr>
                        </div>
                        <div class="sum">
                            <h5 class="font-bold">Média salarial acima de R$ 2.806,53 </h5>
                            <h5 class="italic font-sans">O valor da parcela será de R$ 1.909,34</h5> <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
