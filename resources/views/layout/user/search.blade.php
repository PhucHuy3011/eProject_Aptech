@extends('layout/user/index')

@section('content')

<div class="container">
    <section class="hot_news_frame row mt-3">
        <h2>Search results for “{{$keyword}}”</h2>
        @foreach($listNews as $post)
        <div class="row">
            <a href="{{url('/world/'.$post->countryname.'/'.$post->name)}}" class="card">
                <div class="row">
                    <div class="col-md-5 card-img-left">
                        <img src="{{asset('images/'.$post->picture)}}" width="100%">
                    </div>
                    <div class="col-md-7 card-body">
                        <div class="card-tittle">{{$post->countryname}}</div>
                        <div class="card-tittle">{{$post->name}}</div>
                        <div class="card-text">
                            {{ date_format(date_create($post->date), 'M-d-Y') }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </section>
</div>
@endsection('content')