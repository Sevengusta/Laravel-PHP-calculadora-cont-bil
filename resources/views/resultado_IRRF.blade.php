@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="IRRF"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Cálculo de Imposto de renda Retido na Fonte</h1>
            <div class="flex flex-col ">
                <div id="resumo">
                    <h1>Resultado do seu cálculo</h1>
                    <div class="resumoBody">
                        <div class="resumoBodyLeft">
                            <h4>O imposto de renda retido na fonte calculado é de:</h4>
                            <h1 id="resumeResult">{{$irrfDiscounts}}</h1>
                        </div>
                        <div class="resumoBodyRight">
                            <h4>Isso equivale a:</h4>
                            <div class="resumoPercentual">
                                <h1 id="resumeResultPerc">{{$resume}}</h1>
                                <div class="resumeText">do seu salário</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden resultado sm:flex sm:flex-col">
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
                <div class="flex justify-center items-center" >
                    <h1 class="m-0" >Detalhes do cálculo </h1>
                    <div class="w-[40px]">
                        <img class="calc w-4/5 mx-3" src="{{ Vite::asset('Resources/images/check.png') }}" alt="">
                        <img class="dontshow w-4/5 mx-3 hide" src="{{ Vite::asset('Resources/images/crossed.png') }}" alt="">
                    </div>
                </div>
                <div class="detalhes hide flex-col h-fit ">
                    <div class="sum">
                        <h5 class="font-bold">Tabela de alíquotas do INSS</h5>
                        <h5 class="italic">Para calcular o valor devido ao INSS, basta multiplicar o salário pela alíquota base.  </h5 class="italic">
                        <x-result>
                            <x-slot  name="title">Até R$1.320,00 </x-slot>
                            <x-slot name="rightSide">7,50%</x-slot>
                        </x-result>
                        <x-result>
                            <x-slot  name="title">De R$1.320,01 até R$2.571,29 </x-slot>
                            <x-slot name="rightSide">9,00%</x-slot>
                        </x-result>
                        <x-result>
                            <x-slot  name="title">De R$2.571,30 até R$3.856,94  </x-slot>
                            <x-slot name="rightSide">12,00%</x-slot>
                        </x-result>
                        <x-result>
                            <x-slot  name="title">De R$3.856,95 até R$ 7.507,49   </x-slot>
                            <x-slot name="rightSide">14,00%</x-slot>
                        </x-result>
                        <x-result>
                            <x-slot  name="title">Acima de R$ 7.507,49   </x-slot>
                            <x-slot name="rightSide">TETO = R$ 876,97</x-slot>
                        </x-result>
                    </div>
                    <div class="sum">
                        <h5 class="font-bold">Tabela de alíquotas do IRPF (Base de cálculo)</h5>
                        <h5 class="italic">
                            Para calcular o IRPF, basta multiplicar a Base de cálculo pela alíquota devida e retirar a parcela a deduzir. <br>
                            <strong>Base de cálculo</strong> = Salario - descontos do INSS - outros discontos - (quantidade de dependentes x 189,59) 
                        </h5>
                        <x-result>
                            <x-slot  name="title">Até R$2.112,00 </x-slot>
                            <x-slot name="rightSide">ISENTO</x-slot>
                        </x-result>
                        <x-result>
                            <x-slot  name="title">De R$2.112,01 até R$2.862,65 </x-slot>
                            <p class="text-xs font-sans" >BCIRRF - 158,40 </p>
                            <x-slot name="rightSide">7,50%</x-slot>
                        </x-result>
                        <x-result>
                            <x-slot  name="title">De R$2.862,66 até R$3.751,05  </x-slot>
                            <p class="text-xs font-sans" >BCIRRF - 370,40 </p>
                            <x-slot name="rightSide">15,00%</x-slot>
                        </x-result>
                        <x-result>
                            <x-slot  name="title">De R$3.751,06 até R$ 4.664,68   </x-slot>
                            <p class="text-xs font-sans" >BCIRRF - 651,73 </p>
                            <x-slot name="rightSide">22,50%</x-slot>
                        </x-result>
                        <x-result>
                            <x-slot  name="title">Acima de R$ 4.665,68   </x-slot>
                            <p class="text-xs font-sans" >BCIRRF - 884,96 </p>
                            <x-slot name="rightSide">27,50%</x-slot>
                        </x-result>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
