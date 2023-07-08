@extends('layout.app')
@section('content')
    <section class="container auto">
        <x-sideBar>
            <x-slot name="rescisao"> active</x-slot>
        </x-sideBar>
        <div class="template">
            <h1>Cálculo de Rescisão</h1>
            <h3>Precisa calcular a rescisão do seu contrato de trabalho, mas não sabe como fazer? Eu posso te ajudar.</h3>
            <div class="calculo">
                <form method="GET" class="validator" name="calculo" action="resultado_rescisao">
                    <h4>Preencha os campos abaixo e clique em calcular</h4>
                    <div class="lg:grid lg:grid-cols-2 lg:max-w-[1000px]">
                        <x-inputNumber>
                            <x-slot name="label">salary</x-slot>
                            <x-slot name="title">Salário bruto mensal</x-slot>
                            <x-slot name="body">
                                salário registrado na carteira de trabalho. <br> 
                                Remuneração que um trabalhor recebe por mês,sem considerar os descontos oficiais obrigatórios.
                            </x-slot>
                            <x-slot name="name">salary</x-slot>
                            <x-slot name="required">@required(true)</x-slot>
                        </x-inputNumber>
                        <x-select>
                            <x-slot name='title'>Modalidade de aviso prévio</x-slot>
                            <x-slot name='body'> 
                                É a comunicação por escrito do rompimento do contrato pelo emprgador. <br>
                                Depois dessa comunicação, o empregado pode trabalhar o tempo previsto pós aviso (trabalhado) ou ser dispensado (não trabalhado)
                            </x-slot>
                            <x-slot name='name'>advance</x-slot>
                            <option value="1">Trabalhado</option>
                            <option value="2">Indenizado pelo empregador</option>
                            <option value="3">Não cumprido pelo empregado</option>
                            <option value="4">Dispensado</option>
                        </x-select>

                        <x-inputMonth>
                            <x-slot name="label">admissionDate</x-slot>
                            <x-slot name="title">Data de admissão</x-slot>
                            <x-slot name="body">Dia de início das atividades do trabalhador na empresa</x-slot>
                            <x-slot name="type">date</x-slot>
                            <x-slot name="name">admissionDate</x-slot>
                        </x-inputMonth>

                        <x-select>
                            <x-slot name='title'>Motivo do aviso</x-slot>
                            <x-slot name='body'>
                                O FGTS só estará disponível para o saque nas seguintes situações: <br>
                                <ul>
                                    <li>Caso o motivo se ja por dispensa sem justa causa + multa de 40% sobre o total depositado </li>
                                    <li>Caso o motivo seja por demissão de comum acordo: 
                                        multa de 40% sobre o total depositado </li>

                                </ul>
                            </x-slot>
                            <x-slot name='name'>reason</x-slot>
                            <option value="1">Dispensa sem justa causa</option>
                            <option value="2">Dispensa com justa causa</option>
                            <option value="3">Pedido de demissão</option>
                            <option value="4">Demissão de comum acordo</option>
                            <option value="5">Encerramento de contrato de experiência no prazo</option>
                            <option value="6">Encerramento de contrato de experiência antes do prazo</option>
                            <option value="7">Aposentadoria do empregado</option>
                            <option value="8">Falecimento do empregado</option>
                        </x-select>

                        <x-inputMonth>
                            <x-slot name="label">endDate</x-slot>
                            <x-slot name="title">Data de afastamento</x-slot>
                            <x-slot name="body">Dia de encerramento das atividades do trabalhador na empresa.</x-slot>
                            <x-slot name="type">date</x-slot>
                            <x-slot name="name">endDate</x-slot>
                        </x-inputMonth>
                        
                        
                        <x-select>
                            <x-slot name='title'>Possui Férias vencidas</x-slot>
                            <x-slot name='body'>Caso a opção seja marcada, será considerado o equivalente a 30 dias de férias</x-slot>
                            <x-slot name='name'> expiredVacation </x-slot>
                            <option value="on">Sim</option>
                            <option value="off">Não</option>
                        </x-select>
                        <x-dependents></x-dependents>
                        <x-coin></x-coin>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
