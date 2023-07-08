@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="FGTS"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Quanto vou receber?</h1>
            <div class="flex flex-col 2xl:flex-row">
                <div id="resumo">
                    <h1>Se você trabalhar por {{ $months }} meses</h1>
                    <div class="resumoBody">
                        <div class="resumoBodyRight">
                            <div class="resumoPercentual">
                                <h4>E possuir um saldo inicial em FGTS de:</h4><br>
                                <h1 id="resumeResult">{{ $startFGTS }}</h1>
                            </div>
                        </div>
                        <div class="resumoBodyLeft">
                            <h4>O seu Fundo de garantia por tempo de serviço será de:</h4>
                            <h1 id="resumeResult">{{ $mountTotal }}</h1>
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
                                <td class="text-left">Depósito Mensal</td>
                                <td id="grossSalaryValue">{{ $deposit }}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Meses de contribuição</td>
                                <td id="slInssValue">{{ $months }}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Depósito adicional</td>
                                <td id="slInssValue">{{ $mountDeposit }}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Depósito inicial</td>
                                <td id="slInssValue">{{ $mountFGTS }}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Saldo final</td>
                                <td id="slInssValue">{{ $mountTotal }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
