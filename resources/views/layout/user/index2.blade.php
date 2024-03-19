<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="header_top "></div>
    <header class="container-fluid">
        <div class="row">
            <div class="logo col-sm-1 mt-1">
                <a href="{{url('/index')}}"><img src="{{asset('images/logo.png')}}" alt="ảnh logo"></a>
            </div>
            <nav class="col-md-6">
                <ul class="mt-3">
                    <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="{{url('/world')}}" role="" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="tittle">World</div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($countries as $country)
                                <li><a class="dropdown-item" href="{{url('/world/'.$country->name)}}">
                                        <div class="tittle">{{$country->name}}</div>
                                    </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @foreach($categories as $category)
                    <li>
                        <a href="{{url('/category/'.$category->name)}}">
                            <div class="tittle">{{$category->name}}</div>
                        </a>
                    </li>
                    @endforeach
                    <li>
                        <a href="{{url('/breakingnews')}}">
                            <div class="tittle">Breakingviews</div>
                        </a>
                    </li>

                </ul>
            </nav>
            <div class="right_frame col-md-4">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{url('/profile')}}" class="my_view">
                            <div class="tittle mt-3">
                                Profile
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <form method="get" action="{{url('/search')}}">
                            <div class="input-group mb-2 mt-2">
                                <input type="text" class="form-control" placeholder="Search" name="keyword" aria-label="Search" aria-describedby="basic-addon2">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        nameuser:
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
        <section class="category container">
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
        <section class="category container">
            <a href="{{url('/category/Business')}}" class="label">
                <span class="tittle">
                    <h2>Business</h2>
                </span>
                <span class="icon">
                    <i class="fa-solid fa-angle-right"></i>
                </span>
            </a>
            <div class="layout_frame">
                @foreach($listBusinessNews as $post)
                <a href="{{url('/category/Business/'.$post->name)}}" class="news">
                    <img src="{{asset('images/'.$post->picture)}}">
                    <span class="tittle">{{$post->name}}</span>
                    <span class="time">{{ date_format(date_create($post->date), 'M-d-Y') }}</span>
                </a>
                @endforeach
            </div>
            <div class="cach-ngang"></div>
        </section>
        <section class="comment container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Feedback</h3>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6">
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                            <a class="input-group-text" id="addon-wrapping">
                                <span><i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                        <br>
                        <div class="accordion" id="accordionExample">
                            @foreach($feedbacks as $key => $feedback)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$key}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                        {{$feedback->email}}
                                    </button>
                                </h2>
                                <div id="collapse{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{$feedback->content}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{ $feedbacks->links() }}
                    </div>

                    <div class="col-md-3">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="container-fluid mt-3 row">
        <div class="left_frame col-md">
            <div class="frame_footer">
                <span class="label">
                    <a href="{{url('/')}}">Home</a>
                </span>
            </div>
            <div class="frame_footer">
                @foreach($countries as $country)
                <span class="label">
                    <a href="{{url('/world/'.$country->name)}}">{{$country->name}}</a>
                </span>
                @endforeach
            </div>
            <div class="frame_footer">
                @foreach($categories as $category)
                <span class="label">
                    <a href="{{url('/category/'.$category->name)}}">{{$category->name}}</a>
                </span>
                @endforeach
            </div>
        </div>
        <div class="right_frame col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading"><b>Contact Us</b></h4>
                        <hr>
                        <h5><b>Address</b></h5>
                        <p class="mb-0">35/6 Đường D5, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh </p>
                        <hr>
                        <h5><b>Phone</b></h5>
                        <p class="mb-0">1800 1779 </p>
                        <hr>
                        <h5><b>Time</b></h5>
                        <p class="mb-0">Mon - Sat: 7:30 - 22:00</p>
                        <p class="mb-0">Sun: Close</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244.9412965499331!2d106.71396444137396!3d10.806659638172174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529ed00409f09%3A0x11f7708a5c77d777!2zQXB0ZWNoIENvbXB1dGVyIEVkdWNhdGlvbiAtIEjhu4cgVGjhu5FuZyDEkMOgbyB04bqhbyBM4bqtcCBUcsOsbmggVmnDqm4gUXXhu5FjIHThur8gQXB0ZWNo!5e0!3m2!1svi!2s!4v1710752000985!5m2!1svi!2s" width="300" height="380" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>