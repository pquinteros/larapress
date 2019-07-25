@push('scripts')

@endpush


@extends('layouts.master')
@section('content')


<div class="slider">
    <hgroup>
        <h1>{!! Config::get('settings.titulo') !!}</h1>
        <h2>{{ Config::get('settings.description') }}</h2>
    </hgroup>
</div>


<div id="articles">

@foreach ($articles as $article)
<article class="postHome">
        @if ($article->imagesquare)
        <a href="{{ url('article') . '/' . $article->slug }}" class="squareimage"><img src="{{ asset('uploads/article/'. $article->imagesquare) }}" alt="imagen"></a>
        @endif
        <div>
            <a href="{{ url('article') . '/' . $article->slug }}"><h1>{{ $article->title }}</h1></a>
            <h2>{{ $article->resumen }}</h2>
            <p>Posted by {{ @$article->user->name }} on {{ date_format($article->date,'F j, Y') }}</p>
        </div>
    </article>

    @if($loop->last)
    @if($articles->hasMorePages() == 1)
    
    <a href="javascript:void(0);"><img src="{{ asset('images/btn-reload.svg') }}" id="btnReload"  class="btnReload" data-url="{{ $articles->nextPageUrl() }}" alt="Reload"></a>

    @endif
    @endif


@endforeach

</div>

@endsection

@push('scripts-bottom')
<script>
$(document).ready(function() {
        // This is my view more button
        $(document).on('click', '#btnReload', function(){
        
        $("<div>").load($(this).data("url") + " #articles", function() {
     
        // I took the content of only the listings from page 2 (or whatever page it happens to be)
        $("#articles").append($(this).find("#articles").html());
      
        });
        
        // I delete the button that was used to view more.
        $(this).parent().remove();
        
        });
    });    
        </script>
@endpush