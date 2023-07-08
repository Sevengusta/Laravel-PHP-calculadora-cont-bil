@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="IRRF"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Cálculo de Imposto de renda Retido na Fonte</h1>
            <div class="flex flex-col 2xl:flex-row">
                <div id="resumo">
                    <h1>Resultado do seu cálculo</h1>
                    <div class="resumoBody">
                        <div class="resumoBodyLeft">
                            <h4>O imposto de renda retido na fonte calculado é de:</h4>
                            <h1 id="resumeResult">{{$irrfDiscounts}}</h1>
                        </div>
                        <div class="resumoBodyRight">
                            <h4>Isso equivale a:</h4><br>
                            <div class="resumoPercentual">
                                <h1 id="resumeResultPerc">{{$resume}}</h1>
                                <div class="resumeText">do seu salário</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden resultado sm:flex">
                    <table class="table" id="tableResults">
                        <thead>
                            <tr>
                                <th class="text-left m-2p" rowspan="2">Evento</th>
                                <th class="text-center" colspan="2">Alíquota</th>
                                <th class="text-center" rowspan="2">Proventos</th>
                                <th class="text-center" rowspan="2">Descontos</th>
                            </tr >
                            <tr>
                                <th class="text-center">Base</th>
                                <th class="text-center">Efetiva</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-info">
                                <td class="text-left">Salário bruto</td>
                                <td>-</td>
                                <td>-</td>
                                <td id="grossSalaryValue">{{$salary}}</td>
                                <td>-</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">Outros</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td id="slOthersValue">{{$othersDiscounts}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">INSS</td>
                                <td id="slInssPercentBase">{{$inssBaseAliquot}}</td>
                                <td id="slInssPercent">{{$inssEffectiveAliquot}}</td>
                                <td>-</td>
                                <td id="slInssValue">{{$inssDiscounts}}</td>
                            </tr>
                            <tr class="tr-info">
                                <td class="text-left">IRRF</td>
                                <td id="slIrrfPercentBase">{{$irrfBaseAliquot}}</td>
                                <td id="slirrfPercent">{{$irrfEffectiveAliquot}}</td>
                                <td>-</td>
                                <td id="slIrrfValue">{{$irrfDiscounts}}</td>
                            </tr>
                            <tr class="tr-total">
                                <td class="sl-tr-total-label" colspan="3">Totais</td>
                                <td id="totalValueGrossSalary">{{$salary}}</td>
                                <td id="totalDiscountsGrossSalary">{{$discountsValue}}</td>
                            </tr>
                            <tr class="tr-footer">
                                <td colspan="3" class="font">Valor salário líquido</td>
                                <td id="totalGrossSalaryLiquid" class="valueNet" colspan="2">{{$netSalary}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
