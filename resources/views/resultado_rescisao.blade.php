@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="rescisao"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Quanto vou receber?</h1>
            <div class="flex flex-col 2xl:flex-row">
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
                                <td class="text-left">Verbas Rescisórias</td>
                                <td id="grossSalaryValue">{{$sum}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Descontos</td>
                                <td id="slInssValue"> {{$sumDeductions}} </td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Total FGTS</td>
                                <td id="slInssValue">{{$sumFGTS}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Total</td>
                                <td id="slInssValue">{{$sumSubs}}</td>
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
                            <h5 class="font-bold">verbas rescisórias</h5>
                            <h5 class="italic">As verbas rescisórias são valores que o trabalhador tem direito a receber quando seu contrato de trabalho chega ao fim.</h5 class="italic">
                            <x-result>
                                <x-slot name="title">Saldo de salário</x-slot>
                                <p class="text-xs" >{{$dayNumber}} dia(s)</p>
                                <x-slot name="rightSide">{{$salaryMonth}}</x-slot>
                            </x-result>
                            <x-result>
                                <x-slot name="title">Férias proporcionais</x-slot>
                                <p class="text-xs" >{{$monthsWorked}} mes(es)</p>
                                <x-slot name="rightSide">{{$vacation}}</x-slot>
                            </x-result>
                            @if ($expiredVacation === 'on')
                            <x-result>
                                <x-slot name="title">Férias Vencidas</x-slot>
                                <x-slot name="rightSide">{{$expiredSalary}}</x-slot>
                            </x-result>
                            @endif
                                

                            <x-result>
                                <x-slot name="title">1/3 das Férias</x-slot>
                                <x-slot name="rightSide">{{$thirdVacation}}</x-slot>
                            </x-result>
                            <x-result>
                                <x-slot name="title">13º proporcional</x-slot>
                                <p class="text-xs" >{{$endDayOne}} a {{$end}} </p>
                                <x-slot name="rightSide">{{$thirteenth}}</x-slot>
                            </x-result>
                            @if ($advance === '2')
                                <x-result>
                                    <x-slot name="title">Aviso prévio</x-slot>
                                    <p class="text-xs" > {{$daysOfAdvance}} dias  </p>
                                    <x-slot name="rightSide"> {{$advanceAid}} </x-slot>
                                </x-result>
                            @endif
                            <x-resultSum>{{$sum}}</x-resultSum>
                        </div>
                        <div class="sum">
                            <h5 class="font-bold">Deduções</h5>
                            <h5 class="italic">Descontos feitos pela empresa. Outros tipos de descontos podem ser feitos pela empresa que não são considerados nessa demonstração de calculo.</h5 class="italic">
                            <x-result>
                                <x-slot name="title">INSS</x-slot>
                                <p class="text-xs" >{{$salaryMonth}} x {{$inssEffetiveAliquot}}</p>
                                <x-slot name="rightSide">{{$inssDiscounts}}</x-slot>
                            </x-result>
                            <x-result>
                                <x-slot name="title">INSS 13º</x-slot>
                                <p class="text-xs" >{{$thirteenth}} x {{$inssVacationEffetiveAliquot}}</p>
                                <x-slot name="rightSide">{{$inssVacationDiscounts}}</x-slot>
                            </x-result>
                            <x-result>
                                <x-slot name="title">IRRF</x-slot>
                                <p class="text-xs" >{{$salaryMonth}} x {{$irrfEffetiveAliquot}}</p>
                                <x-slot name="rightSide">{{$irrfDiscounts}}</x-slot>
                            </x-result>
                            <x-resultSum>{{$sumDeductions}}</x-resultSum>
                        </div>
                        <div class="sum">
                            <h5 class="font-bold">FGTS</h5>
                            <x-result>
                                <x-slot name="title">Depositado</x-slot>
                                <p class="text-xs" >{{$monthsfgts}} mes(es)</p>
                                <x-slot name="rightSide">{{$fgtsDeposit}}</x-slot>
                            </x-result>
                            <x-result>
                                <x-slot name="title">Saldo de salário</x-slot>
                                <x-slot name="rightSide">{{$fgtsSalaryMonth}}</x-slot>
                            </x-result>
                            <x-result>
                                <x-slot name="title">13º proporcional</x-slot>
                                <x-slot name="rightSide">{{$thirteenthFGTS}}</x-slot>
                            </x-result>
                            @if ($reason === '1' || $reason === '4')
                            <x-result>
                                <x-slot name="title">Multa {{$percentage}}</x-slot>
                                <x-slot name="rightSide">{{$fine}}</x-slot>
                            </x-result>
                            @endif
                            <x-resultSum>
                                <x-slot name="title">para saque</x-slot>
                                {{$sumFGTS}}
                            </x-resultSum>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
