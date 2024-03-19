@extends('layout/user/index')

@section('content')
<div class="container">
    <section class="bar_body_top">
        <div class="category_frame">
            <ul>
                @foreach($countries as $country)
                <li><a href="{{url('/world/'.$country->name)}}">{{$country->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </section>
    <section class="hot_news_frame">
        <div class="left_frame">
            <a href="{{url('/breakingnews/news/'.$latestNews->name)}}" class="main_news_frame">
                <h3 class="tittle">{{$latestNews->name}}
                </h3>
                <div class="time">
                    {{ date_format(date_create($latestNews->date), 'M-d-Y') }}
                </div>
                <div class="main_news_photo">
                    <img src="{{asset('images/'.$latestNews->picture)}}">
                </div>
                <div class="content">
                    {{$latestNews->description}}
                </div><br>
                <div class="content">
                    {{$latestNews->title}}
                </div>
            </a>
        </div>
        <div class="right_frame col">
            <div class="khung-1">
                @foreach($breakingNews as $worldPost)
                <a href="{{url('/breakingnews/news/'.$worldPost->name)}}" class="khung-o-tin">
                    <div class="row">
                        <div class="news_frame col">
                            <div class="news_type">Breaking News</div>
                            <div class="tittle">Exclusive: {{$worldPost->name}}</div>
                            <div class="time">{{ date_format(date_create($worldPost->date), 'M-d-Y') }}</div>
                        </div>
                        <div class="col-md-5">
                            <img src="{{asset('images/'.$worldPost->picture)}}">
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="right_frame">
            <div class="row">
                @foreach($breakingNews as $Post)
                <div class="col-md-4 mb-4">
                    <a href="{{url('/breakingnews/news/'.$Post->name)}}" class="khung-o-tin">
                        <img src="{{asset('images/'.$Post->picture)}}" class="img-fluid">
                        <div class="news_frame">
                            <div class="news_type">{{$Post->countryname}}</div>
                            <div class="tittle">Exclusive: {{$Post->name}}</div>
                            <div class="time">{{ date_format(date_create($Post->date), 'M-d-Y') }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{ $breakingNews ->links() }}
</div>

@endsection('content')