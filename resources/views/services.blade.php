@push('scripts')
<style>
        #pages .header{
            background: url('{{ asset(Config::get('settings.header_services')) }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-color: #151721;
        }

        #pages .content{
            margin-top: 40px;
        }

        footer{
            margin-top: 90px;
        }
        
        </style>
@endpush

@extends('layouts.master')
@section('content')

<div id="pages">

    <div class="header">
        <h1>{{ Config::get('settings.title_services') }}</h1>
        <h2>{{ Config::get('settings.resumen_services') }}</h2>
    </div>

    <div class="content">


        @foreach ( $services as $service )
        
<article >
    <img src="{{ url( '/uploads/service/'.$service->imagesquare ) }}" alt="imagen">
    <h1>{{ $service->title }}</h1>
    <h2>Problems look mighty small from 150 miles up</h2>
    <a href="" class="link">See more</a>
</article>
  
@endforeach

    </div>
    
</div>

@endsection

@push('scripts-bottom')

@endpush