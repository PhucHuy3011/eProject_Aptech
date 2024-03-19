@extends('layout/user/index')

@section('content')

<div class="container">
    <section class="hot_news_frame">
        <div class="left_news_frame">
            <a href="" class="main_news_frame">
                <h3 class="tittle">{{$news->name}}
                </h3>
                <div class="time">
                    {{ date_format(date_create($news->date), 'M-d-Y') }}
                </div>
                <div class="main_news_photo">
                    <img src="{{asset('images/'.$news->picture)}}" alt="">
                </div>
                <div class="content">
                    {{$news->description}}
                </div><br>
                <div class="content fs-5">
                    {!! $news->content !!}
                </div>
            </a>
        </div>
        <div class="right_news_frame">
            <div class="khung-1">
                @foreach($breakingNews as $breakingPost)
                <a href="{{url('breakingnews/news/'.$breakingPost->name)}}" class="khung-o-tin">
                    <div class="news_frame">
                        <div class="news_type">{{$breakingPost->countryname}}
                        </div>
                        <div class="tittle">Exclusive: {{$breakingPost->name}}</div>
                        <div class="time"> {{ date_format(date_create($breakingPost->date), 'M-d-Y') }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="category">
        <a href="{{url('/world/American')}}" class="label">
            <span class="tittle">
                <h2>American</h2>
            </span>
            <span class="icon">
                <i class="fa-solid fa-angle-right"></i>
            </span>
        </a>
        <div class="layout_frame">
            @foreach($listWorldNews as $post)
            <a href="{{url('/world/'.$post->countryname.'/'.$post->name)}}" class="news">
                <img src="{{asset('images/'.$post->picture)}}">
                <span class="tittle">{{$post->name}}</span>
                <span class="time">{{ date_format(date_create($post->date), 'M-d-Y') }}</span>
            </a>
            @endforeach
        </div>
        <div class="cach-ngang"></div>
    </section>
    <section class="category">
        <a href="{{url('/category/Bussiness')}}" class="label">
            <span class="tittle">
                <h2>Business</h2>
            </span>
            <span class="icon">
                <i class="fa-solid fa-angle-right"></i>
            </span>
        </a>
        <div class="layout_frame">
            @foreach($listBussinessNews as $post)
            <a href="{{url('/category/Bussiness/'.$post->name)}}" class="news">
                <img src="{{asset('images/'.$post->picture)}}">
                <span class="tittle">{{$post->name}}</span>
                <span class="time">{{ date_format(date_create($post->date), 'M-d-Y') }}</span>
            </a>
            @endforeach
        </div>
        <div class="cach-ngang"></div>
    </section>

</div>
@endsection('content')