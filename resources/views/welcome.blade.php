@extends('layout.app')
@section('content')
    <section class="container auto">
        <div class="options">
            <ul>
                <a href="/seguro" ><li>Seguro Desemprego</li></a>
                <a href="/ferias"><li>Férias</li></a>
                <a href="/FGTS"><li>FGTS</li></a>
                <a href="/rescisao"><li>Rescisão</li></a>
                <a href="/IRRF"><li>IRRF</li></a>
                <a href="/INSS"><li>INSS</li></a>
            </ul>
        </div>
        <div class="template">
        <h1>Criado por um contador e programador Laravel</h1>
            <div class="flex">
                <h3 class="flex-1"><strong>1º Calcule o seu tributo</strong></h3>
                <h3 class="flex-1"><strong>2º Receba o seu resultado</strong></h3>

            </div>
        </div>
    </section>
@endsection
