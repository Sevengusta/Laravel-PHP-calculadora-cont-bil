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
                </div>
            </div>
        </div>
    </section>
@endsection
