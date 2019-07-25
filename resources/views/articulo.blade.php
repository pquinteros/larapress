@push('scripts')

<style>
#article .header{
    background: url('{{ asset($image) }}');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    background-color: #151721;
}

</style>
@endpush

@extends('layouts.master')
@section('content')
<div id="article">
    
    <div class="header">
        <h1>{{ $title }}</h1>
        <h2>{{ $resumen }}</h2>
        <p>Posted by {{ @$user }} on {{ date_format($date,'F j, Y') }}</p>
    </div>

    <div class="content">
        {!! $content !!}
    </div>

</div>

@endsection

@push('scripts-bottom')
@endpush


