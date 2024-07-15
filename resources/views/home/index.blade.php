
<x-layout title="Agenda Unidade Básica de Saúde">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <h2 class="conteudo__subtitulo">Seja bem-vindo!</div>
    <h2 class="conteudo__subtitulo">Gerencie a agenda dos médicos e pacientes de maneira fácil e organizada.</div>

    <div class="banner-grupo">
        <img src="{{ asset('img/banner-principal.jpg') }}" alt="Paciente com seu pai e sua médica" class="banner-grupo__img">
        <ul class="banner-grupo__cards">
            
            <li class="banner-grupo__item">
                <i class="banner-grupo__icone fa-solid fa-user-doctor"></i>
                <h3 class="banner-grupo__titulo">Médicos</h3>
            </li>
            <li class="banner-grupo__item">
                <i class="banner-grupo__icone fa-solid fa-hospital-user"></i>
                <h3 class="banner-grupo__titulo">Pacientes</h3>
            </li>
            <li class="banner-grupo__item">
                <i class="banner-grupo__icone fa-solid fa-house-chimney-medical"></i>
                <h3 class="banner-grupo__titulo">Unidades Básicas de Saúde</h3>
            </li>

        </ul>
    </div>
    <div class="detalhe-fundo"></div>

</x-layout>