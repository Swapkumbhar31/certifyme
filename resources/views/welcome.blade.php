<!DOCTYPE html>
<html>
<head>
    <title>CertifyMe : Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/mystyle.css">
    <link href="{{ asset('css/yamm.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <style media="screen">
        .navbar{
            background-color: transparent;
            padding-top: 30px;
        }

        .navbar-default .navbar-nav > li > a{
            color: white;
        }
        @media (max-width: 768px) {
            .navbar{
                padding-top: 0px;
            }
            .navbar-default .navbar-nav > li > a{
                color: inherit;
            }
        }
    </style>
</head>
<body>
    <div id="app">
    </div>
        @include('inc.navbar')
    <div class="banner">
        <h1 class="text-left">World's Best certification provider</h1>
        <form method="get" action="/search">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-theme" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span>
            </div>
        </form>
        <p class="text-left">PMP® certification | Scrum master | AWS | Digital marketing | Data science | Big data | CEH | DevOps</p>
    </div>
    <hr>
    <div class = "container text-center section-1">
        <span class="title">Welcome to CertifyMe</span>
        <span class="sub-title">All your Education / Training Needs</span>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">PROFESSIONAL CERTIFICATION TRAINING DELIVERED AT YOUR PACE AND PLACE
                    <br>
                More than 11,000+ professionals across countries from the world's leading Fortune 500 companies, have used our learning and development methodology to achieve their objectives.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="text-left">Featured Courses</h1>
        <div class="row">
        @foreach($featurecourses as $f)
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class=card-2>
                    <div class="image">
                        @if(file_exists('images/courses/'.$f->image_url))
                          {{ Html::image('images/courses/'.$f->image_url, str_slug($f->name), array('class' => 'img-responsive')) }}
                        @else
                          {{ Html::image('images/No_image.png', str_slug($f->name), array('class' => 'img-responsive')) }}
                        @endif
                        <div class="days">{{$f->duration}} Days</div>
                        <div class="cover"><a href="/course/{{str_slug($f->name)}}/{{$f->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="content">
                    @foreach($courses_cat as $c)
                        @if($f->type == $c->id)
                            <a href="/course/browse/{{str_slug($c->name)}}/{{$c->id}}" class="btn btn-default">{{$c->name}}</a>
                        @endif
                    @endforeach
                    <br>
                    <h3>{{$f->name}}</h3>
                    @for($x =0 ; $x < $f->rating; $x++)
                        <i class="fa fa-star" aria-hidden="true"></i>
                    @endfor

                    <p  class="text-right price">
                            {{$f->prices,2}}
                            {!! Form::open(['url' => 'course/addcart'])!!}
                            {{Form::hidden('id',$f->id)}}
                            {{Form::submit('Enroll',['class'=>'btn btn-danger btn-block navbar-btn'])}}
                            {!!Form::close()!!}
                    </p>
                </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <br><br>
    <div class="container-fluid text-center section-7">
        <div class="row">
            <div class="col-lg-6 col-sm-12 image-one">
                <div class="content">
                    <p class="date">MARCH 15, 2017</p>
                    <p class="lines">Get news course photography to start beautiful images</p>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 image-two">
                <div class="content">
                    <p class="date">MARCH 15, 2017</p>
                    <p class="lines">Get news course photography to start beautiful images</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 count">
                <i class="fa fa-user" aria-hidden="true"></i>
                <h2><span class="timer1">0</span><!-- 11000 -->+</h2>
                <p>Happy Students</p>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 count">
                <i class="fa fa-list" aria-hidden="true"></i>
                <h2><span class="timer2">0</span><!-- 1000 -->+</h2>
                <p>programs</p>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 count">
                <i class="fa fa-black-tie" aria-hidden="true"></i>
                <h2><span class="timer3">0</span><!-- 500 -->+</h2>
                <p>instructor</p>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-6 count">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                <h2><span class="timer4">0</span><!-- 200 -->+</h2>
                <p>corporates</p>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <h1 class="text-center">Why Choose Us</h1>
        <p class="text-center">Simple Reasons</p>
        <div class="section-2">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                <div class="row">
                    <div class="col-xs-3" >
                        <div class="center">
                            <img src="images/icon/icon (2).png" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <h3>Over 20 Years of Experience</h3>
                        <p>In 2000 our centre became an academic department within the school of languages.</p>
                    </div>
                </div>
                    <div class="row">
                    <div class="col-xs-3" >
                        <div class="center">
                            <img src="images/icon/icon (3).png" class="img-responsive">
                        </div>
                    </div>
                        <div class="col-xs-9">
                            <h3>Exclusive Learning Materials</h3>
                            <p>Our learning materials include text with multimedia on all areas of the curriculum.</p>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xs-3" >
                        <div class="center">
                            <img src="images/icon/icon (21).png" class="img-responsive">
                        </div>
                    </div>
                        <div class="col-xs-9">
                            <h3>Career Upgrade</h3>
                            <p>Learning a new language is a fascinating thing that can lead to great opportunities.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 hidden-sm hidden-xs">
                    <img class="img-responsive" src="images/whychooseus.png">
                </div>
                <div class="col-md-4 col-sm-6 text-right">
                <div class="row">
                    <div class="col-xs-9">
                        <h3>Certification</h3>
                        <p>At the end of course you will get the certificate and valuable skills and experience.</p>
                    </div>
                    <div class="col-xs-3" >
                        <div class="center">
                            <img src="images/icon/icon (13).png" class="img-responsive">
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-xs-9">
                            <h3>Friendly Learning Environment</h3>
                            <p>Our method based on learning a language in a friendly and open atmosphere.</p>
                        </div>
                        <div class="col-xs-3" >
                            <div class="center">
                                <img src="images/icon/icon (31).png" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9">
                            <h3>Professional Teachers</h3>
                            <p>Our team consist of high-quality and certified teachers with big experience.s</p>
                        </div>
                        <div class="col-xs-3" >
                            <div class="center">
                                <img src="images/icon/icon (27).png" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container-fluid section-4 text-center">
        <h2>Our Process</h2>
        <p>Lorem ipsum dolor sit amet, consectetur.</p>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="image">
                    <span>1</span>
                    <img class="center-block img-responsive img-circle" src="http://via.placeholder.com/200x200"/>
                </div>
                <div class="content">
                    <p class="title">Concept</p>
                    <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur eleifend dui eu rutrum. Vestibulum leo leo, facilisis vel risus non, eleifend dapibus dui.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="image">
                    <span>2</span>
                    <img class="center-block img-responsive img-circle" src="http://via.placeholder.com/200x200"/>
                </div>
                <div class="content">
                    <p class="title">Concept</p>
                    <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur eleifend dui eu rutrum. Vestibulum leo leo, facilisis vel risus non, eleifend dapibus dui.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="image">
                    <span>3</span>
                    <img class="center-block img-responsive img-circle" src="http://via.placeholder.com/200x200"/>
                </div>
                <div class="content">
                    <p class="title">Concept</p>
                    <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur eleifend dui eu rutrum. Vestibulum leo leo, facilisis vel risus non, eleifend dapibus dui.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="image">
                    <span>4</span>
                    <img class="center-block img-responsive img-circle" src="http://via.placeholder.com/200x200"/>
                </div>
                <div class="content">
                    <p class="title">Concept</p>
                    <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed consectetur eleifend dui eu rutrum. Vestibulum leo leo, facilisis vel risus non, eleifend dapibus dui.</p>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <div class="container-fluid section-5 text-center">
        <div class="row cover">
        <p class="title">our facilities</p>
            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 content">
                <span class="lnr lnr-film-play"></span>
                <p class="description">High-Definition<br>Video Conferencing</p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 content">
                <span class="lnr lnr-camera-video"></span>
                <p class="description">Projection<br>Facilities</p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 content">
                <span class="lnr lnr-music-note"></span>
                <p class="description">Surround-Sound<br>Audio & Video</p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 content">
                <span class="lnr lnr-mic"></span>
                <p class="description">Lighting Control<br>Projectors & Mikes</p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 content">
                <span class="lnr lnr-flag"></span>
                <p class="description">High Speed<br>Wi-Fi Connectivity</p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 content">
                <span class="lnr lnr-phone-handset"></span>
                <p class="description">Conference Calling</p>
            </div>
        </div>
    </div>
    <br><br>

    <div class="section-6">
        <div class="content">
            <h2>CertifyMe Core Features </h2>
            <h3>Take a look at our core features and you will love it!</h3>
            <p>We always help your Start-up Businesses.<br>
                We provide 24x7 Full support.<br>
                Cost effective services provider.<br>
                We care for our clients and work with them with a friendly nature.<br>
                We help our client in each and every stage.<br>
                It's complete quality service to the client.<br>
            </p>
        </div>
    </div>


    <br><br>
    <div class="section-3">
        <div class="container-fluid">
            <div class="row">
                <div class="div">
                    <div class="content-right">
                        <p>
                            <span>Certify Alumni Work at</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--
    <br><br>
    <div class="container-fluid">

        <div class="customer-logos">
            <div class="slide"><img src="{{ asset('images/icon/icon (22).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (23).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (24).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (26).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (30).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (17).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (2).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (11).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (6).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (7).png') }}"></div>
            <div class="slide"><img src="{{ asset('images/icon/icon (18).png') }}"></div>
        </div>
    </div> -->
    <br><br>
    @include('inc.footer')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/intlTelInput.js') }}"></script>

    <script src="//cdn.rawgit.com/tonystar/bootstrap-hover-tabs/master/bootstrap-hover-tabs.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> -->
    <script type="text/javascript" src="/js/myjs.js"></script>
</body>
</html>
