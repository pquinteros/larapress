@push('scripts')
<style>
        #pages .header{
            background: url('{{ asset(Config::get('settings.header_contact')) }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-color: #151721;
        }
        footer{
            margin-top: 70px;
        }
        </style>
@endpush

@extends('layouts.master')
@section('content')

<div id="pages">

    <div class="header">
        <h1>{{ Config::get('settings.title_contact') }}</h1>
        <h2>{{ Config::get('settings.resumen_contact') }}</h2>
    </div>

    <div class="content">

        <form id="formcontacto" method="post" action="">
            <input type="text" name="Nombre" id="nombre" placeholder="Nombre">
            <input type="email" name="Email" id="email" placeholder="Email">
            <input type="text" name="Telefono" id="telefono" placeholder="Telefono">
            <input type="text" name="Asunto" id="asunto" placeholder="Asunto">
            {{ csrf_field() }}
            <textarea name="Mensaje" id="mensaje"> </textarea>
            <input type="submit" value="ENVIAR">
        </form>

    </div>
    
</div>

@endsection

@push('scripts-bottom')

@endpush