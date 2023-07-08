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
                                <td>{{$salary}}</td>
                                <td>-</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">1/3 Férias</td>
                                <td>{{$thirdVacation}}</td>
                                <td>-</td>
                            </tr>
                            @if ($salaryAllowance != 0) 
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
                            @if ($advance != 0)
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
                </div>
            </div>
        </div>
    </section>
@endsection
