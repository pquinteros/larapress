<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Larapress</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="A Blog Theme with Laravel">
<meta name="keywords" content="blog, laravel, theme">
<meta name="csrf-token" content="{{ csrf_token() }}">
@laravelPWA
<meta name="Robots" content="all">
<link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
@stack('scripts')

<!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<![endif]-->
</head>
<body>
<div id="wrap-navigation">
    <nav id="navigation">
        <ul id="menu">
            <li class="left"><a href="{{ url('/') }}"><img src="{{ url(Config::get('settings.logo')) }}" alt="logo"></a></li>
            @if ($menu_items->count())
            @foreach ($menu_items as $k => $menu_item)
                @if (($menu_item->page_id && is_object($menu_item->page)) || !$menu_item->page_id)
                  @if ($menu_item->children->count())
        @foreach ($menu_item->children as $i => $child)
                    <li class="navitem dropdown {{ ($k==0)?' fistitem':'' }} {{ ($child->url() == Request::url())?'active':'' }}">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $menu_item->name }} <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        @foreach ($menu_item->children as $i => $child)
                          <li class=""><a href="{{ $child->url() }}">{{ $child->name }}</a>
                          </li>
                        @endforeach
                      </ul>
                    </li>
        @endforeach
                  @else
                    <li class="navitem {{ ($k==0)?' fistitem':'' }} {{ ($menu_item->url() == Request::url())?' active':'' }}">
                        <a href="{{ $menu_item->url() }}">{{ $menu_item->name }}</a>
                    </li>
                  @endif
                @endif
            @endforeach
        @endif
        </ul>

 
    
<a id="menuButton" href="#">
  <div></div>
  <div></div>
  <div></div>
</a>

    </nav>

    <nav id="navigation-fix">
      <ul id="menu">
          <li class="left"><a href="{{ url('/') }}"><img src="{{ url(Config::get('settings.logo')) }}" alt="logo"></a></li>
          @if ($menu_items->count())
          @foreach ($menu_items as $k => $menu_item)
              @if (($menu_item->page_id && is_object($menu_item->page)) || !$menu_item->page_id)
                @if ($menu_item->children->count())
      @foreach ($menu_item->children as $i => $child)
                  <li class="navitem dropdown {{ ($k==0)?' fistitem':'' }} {{ ($child->url() == Request::url())?'active':'' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $menu_item->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      @foreach ($menu_item->children as $i => $child)
                        <li class=""><a href="{{ $child->url() }}">{{ $child->name }}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
      @endforeach
                @else
                  <li class="navitem {{ ($k==0)?' fistitem':'' }} {{ ($menu_item->url() == Request::url())?' active':'' }}">
                      <a href="{{ $menu_item->url() }}">{{ $menu_item->name }}</a>
                  </li>
                @endif
              @endif
          @endforeach
      @endif
      </ul>
  </nav>


<nav id="navigation-mobile" class="mostrarMenuOff">
  <ul id="menu-mobile">
    @if ($menu_items->count())
    @foreach ($menu_items as $k => $menu_item)
        @if (($menu_item->page_id && is_object($menu_item->page)) || !$menu_item->page_id)
          @if ($menu_item->children->count())
@foreach ($menu_item->children as $i => $child)
            <li class="navitem dropdown {{ ($k==0)?' fistitem':'' }} {{ ($child->url() == Request::url())?'active':'' }}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $menu_item->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                @foreach ($menu_item->children as $i => $child)
                  <li class=""><a href="{{ $child->url() }}">{{ $child->name }}</a>
                  </li>
                @endforeach
              </ul>
            </li>
@endforeach
          @else
            <li class="navitem {{ ($k==0)?' fistitem':'' }} {{ ($menu_item->url() == Request::url())?' active':'' }}">
                <a href="{{ $menu_item->url() }}">{{ $menu_item->name }}</a>
            </li>
          @endif
        @endif
    @endforeach
@endif
</ul>
</nav>
</div>

<main id="main" role="main">
@yield('content')
</main>

<footer>
    <div>
        <div>
            <img src="{{ asset('images/twitter.svg') }}" alt="imagen">
            <img src="{{ asset('images/facebook.svg') }}" alt="imagen">
            <img src="{{ asset('images/github.svg') }}" alt="imagen">
        </div>
        <p>{!! Config::get('settings.text_footer') !!}</p>
    </div>
</footer>

</body>
</html>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts-bottom')