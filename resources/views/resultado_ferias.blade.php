@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="ferias"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Quanto vou receber?</h1>
            <div class="flex flex-col 2xl:flex-row">
                <div class="resultado">
                    <table class="table" id="tableResults">
                        <thead>
                            <tr>
                                <th class="text-center">Eventos</th>
                                <th class="text-center">Proventos</th>
                                <th class="text-center">Descontos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-info">
                                <td class="text-left">Salário/Férias</td>
                                <td>{{$grossSalary}}</td>
                                <td>-</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">1/3 Férias</td>
                                <td>{{$thirdVacation}}</td>
                                <td>-</td>
                            </tr>
                            @if ($allowanceChoice == 1) 
                                <tr class="tr-info">
                                    <td class="text-left">Abono pecuniário</td>
                                    <td>{{$salaryAllowance}}</td>
                                    <td>-</td>
                                </tr>
                                <tr class="tr-info">
                                    <td class="text-left">1/3 abono pecuniário</td>
                                    <td>{{$thirdAllowance}}</td>
                                    <td>-</td>
                                </tr>
                            @endif
                            @if ($advanceChoice == 1)
                                <tr class="tr-info">
                                    <td class="text-left">Ad. 1ª Parcela 13º</td>
                                    <td>{{$advance}}</td>
                                    <td>-</td>
                                </tr>
                            
                            @endif
                            <tr class="tr-info">
                                <td class="text-left">INSS</td>
                                <td>-</td>
                                <td>{{$inssDiscounts}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">IRRF</td>
                                <td>-</td>
                                <td>{{$irrfDiscounts}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Totais</td>
                                <td>{{$earnings}}</td>
                                <td>{{$totalDiscounts}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Valor líquido a receber</td>
                                <td colspan="2">{{$netEarnings}}</td>
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
                            <h5 class="font-bold">Proventos</h5>
                            <h5 class="italic">É o valor que o trabalhador deve receber caso não ocorresse nenhuma dedução.</h5 class="italic">
                            <x-result>
                                <x-slot  name="title">Salário/Férias: remuneração x dias</x-slot>
                                <p class="text-xs font-sans" >({{$salary}} + {{$overtime}}) x ({{$days}} dia(s) / 30)</p>
                                <x-slot name="rightSide">{{$grossSalary}}</x-slot>
                            </x-result>
                            <x-result>
                                <x-slot  name="title">1/3 Férias </x-slot>
                                <p class="text-xs font-sans" >{{$grossSalary}} / 3</p>
                                <x-slot name="rightSide">{{$thirdVacation}}</x-slot>
                            </x-result>
                            @if ($allowanceChoice == 1) 
                            <x-result>
                                <x-slot  name="title">abono pecuniário: 1/3 da remuneração </x-slot>
                                <p class="text-xs font-sans" >({{$salary}} + {{$overtime}}) / 3</p>
                                <x-slot name="rightSide">{{$salaryAllowance}}</x-slot>
                            </x-result>
                            <x-result>
                                <x-slot  name="title">1/3 do abono pecuniário </x-slot>
                                <p class="text-xs font-sans" > {{$salaryAllowance}} / 3</p>
                                <x-slot name="rightSide">{{$thirdAllowance}}</x-slot>
                            </x-result>

                            @endif
                            @if ($advanceChoice == 1)
                            <x-result>
                                <x-slot  name="title">adiantamento do 13º </x-slot>
                                <p class="text-xs font-sans" > {{$salary}} / 2</p>
                                <x-slot name="rightSide">{{$advance}}</x-slot>
                            </x-result>
                        
                            @endif

                            <x-resultSum>
                                <x-slot name="title">de proventos</x-slot>
                                {{$earnings}}
                            </x-resultSum>
                        </div>
                        <div class="sum">
                            <h5 class="font-bold">Deduções</h5>
                            <h5 class="italic">
                                São diminuições que afetam a remuneração final do trabalhador. <br>
                                O 1/3 das férias também entra na Base de cálculo do INSS e IRRF.
                            </h5 class="italic">
                                <x-result>
                                    <x-slot  name="title">INSS: (Remuneração + 1/3 Férias) x aliq. </x-slot>
                                    <p class="text-xs font-sans" >({{$grossSalary}} + {{$thirdVacation}}) x {{$inssAliquot}}</p>
                                    <x-slot name="rightSide">{{$inssDiscounts}}</x-slot>
                                </x-result>
                                <x-result>
                                    <x-slot  name="title">IRRF</x-slot>
                                    <x-slot name="rightSide">{{$irrfDiscounts}}</x-slot>
                                </x-result>
                                <x-resultSum>
                                    <x-slot name="title">de deduções</x-slot>
                                    {{$totalDiscounts}}
                                </x-resultSum>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
