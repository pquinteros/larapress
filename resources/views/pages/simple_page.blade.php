@push('scripts')
<style>
        #pages .header{
            background: url('{{ asset($page->image) }}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-color: #151721;
        }
        footer{
            margin-top: 25px;
        }
        </style>
@endpush

@extends('layouts.master')
@section('content')

<div id="pages">

    <div class="header">
        <h1>{!! $page->title !!}</h1>
        <h2>{{ $page->resumen }}</h2>
    </div>

    <div class="content">

        {!! $page->content !!}

    </div>
    
</div>

@endsection

@push('scripts-bottom')

@endpush