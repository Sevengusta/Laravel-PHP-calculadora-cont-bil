@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="FGTS"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Quanto vou receber?</h1>
            <div class="flex flex-col">
                <div id="resumo">
                    <h1>Se você trabalhar por {{ $months }} meses</h1>
                    <div class="resumoBody">
                        <div class="resumoBodyRight">
                            <div class="resumoPercentual ">
                                <h4>E possuir um saldo inicial em FGTS de:</h4>
                            </div>
                            <h1 id="resumeResult">{{ $startFGTS }}</h1>
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
                            @if ($interest === 'on') 
                            <tr class="tr-info">
                                <td class="text-left">Depósito adicional</td>
                                <td id="slInssValue">{{ $mountDeposit }}</td>
                            </tr>
                            @else
                            <tr class="tr-info">
                                <td class="text-left">Depósito sem juros</td>
                                <td id="slInssValue">{{ $mountSalary }}</td>
                            </tr>
                            @endif 
                            @if ($interest === 'on') 
                            <tr class="tr-info">
                                <td class="text-left">FGTS adicional</td>
                                <td id="slInssValue">{{ $mountFGTS }}</td>
                            </tr>
                            @else
                            <tr class="tr-info">
                                <td class="text-left">Saldo inicial</td>
                                <td id="slInssValue">{{ $startFGTS }}</td>
                            </tr>
                            @endif
                            <tr class="tr-info">
                                <td class="text-left">Saldo final</td>
                                <td id="slInssValue">{{ $mountTotal }}</td>
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
                            <h5 class="font-bold">FGTS</h5>
                            <h5 class="italic">Saldo que será adicionado ao Fundo de Garantia ao longo do tempo. </h5 class="italic">
                            <x-result>
                                <x-slot  name="title">Depósito mensal</x-slot>
                                <p class="text-xs font-sans" > {{$salary}} x 8,00% </p>
                                <x-slot name="rightSide">{{$deposit}}</x-slot>
                            </x-result>
                            @if ($interest != 'on')
                            <x-result>
                                <x-slot  name="title">Depósito sem juros:</x-slot>
                                <p class="text-xs font-sans" > {{$deposit}} x {{$months}} mes(es) </p>
                                <x-slot name="rightSide">{{$mountSalary}}</x-slot>
                            </x-result>
                            @else 
                            <x-result>
                                <x-slot  name="title">Dep. Adicional: Mensal + juros (3%/12) </x-slot>
                                <p class="text-xs font-sans" >({{$deposit}} * 1,025)^1 + ... ({{$deposit}} * 1,025)^n meses </p>
                                <x-slot name="rightSide"> {{$mountDeposit}}</x-slot>
                            </x-result>
                                
                            @endif

                            @if ($interest != 'on')
                            <x-result>
                                <x-slot  name="title">Saldo em FGTS inicial</x-slot>
                                <x-slot name="rightSide">{{$startFGTS}}</x-slot>
                            </x-result>
                            @else
                                <x-result>
                                    <x-slot  name="title">FGTS inicial * com juros (3%/12) </x-slot>
                                    <p class="text-xs font-sans" >{{$startFGTS}} * 1,025^ {{$months}} mes(es) </p>
                                    <x-slot name="rightSide"> {{$mountFGTS}}</x-slot>
                                </x-result>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
