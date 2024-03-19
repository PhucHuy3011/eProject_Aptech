@extends('/layout/user/index2')

@section('content')
<div class="container">
    <section class="hot_news_frame row mt-3">
        <div class="left_frame col">
            <a href="{{url('/world/'.$latestNews->countryname.'/'.$latestNews->name)}}" class="main_news_frame">
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
                @foreach($worldNews as $worldPost)
                <a href="{{url('/world/'.$worldPost->countryname.'/'.$worldPost->name)}}" class="khung-o-tin">
                    <img src="{{asset('images/'.$worldPost->picture)}}">
                    <div class="news_frame">
                        <div class="news_type">{{$worldPost->countryname}}</div>
                        <div class="tittle">Exclusive: {{$worldPost->name}}</div>
                        <div class="time">{{ date_format(date_create($worldPost->date), 'M-d-Y') }}</div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="khung-1">
                @foreach($breakingNews as $breakingPost)
                <a href="{{url('/breakingnews/news/'.$breakingPost->name)}}" class="khung-o-tin">
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

</div>

@endsection