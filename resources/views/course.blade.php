

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>SUST ONLINE EXAM</title>

    <!--Meta Keywords and Description-->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ url('images') }}/favicon.ico" title="Favicon"/>

    <!-- Main CSS Files -->
    <link rel="stylesheet" href="{{ url('css') }}/homeCourse.css">

    <!-- Namari Color CSS -->
    <link rel="stylesheet" href="{{ url('css') }}/namari-color.css">

    <!--Icon Fonts - Font Awesome Icons-->
    <link rel="stylesheet" href="{{ url('css') }}/font-awesome.min.css">

    <!-- Animate CSS-->
    <link href="{{ url('css') }}/animate.css" rel="stylesheet" type="text/css">   

     <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


    <!--Google Webfonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
    <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
    <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
    <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
    <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</div>


<div id="wrapper">
	   <header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
        <div id="header" class="nav-collapse">
            <div class="row clearfix">
                <div class="col-1">

                    
                    <div id="nav-trigger"><span></span></div>
                    <nav id="nav-mobile"></nav>

                </div>
            </div>
        </div>
        <!--End of Header-->

        <!--Banner Content-->
        <div id="banner-content" class="row clearfix">

            <div class="col-38">

                <div class="section-heading">
                    <h1>SUST </br>ONLINE EXAM</h1>
                    <h2>A platform for both teacher and student to take or attend exam from anywhere</h2>
                </div>

            </div>

        </div><!--End of Row-->
    </header>


    <!--Main Content Area-->
    <main id="content">

        <!--Pricing Tables-->
        <section class="text-center scrollto clearfix ">
            <div class="row clearfix">


                <!--Pricing Block-->
                <div class="pricing-block featured wow fadeInUp" data-wow-delay="0.6s">
                    <div class="pricing-block-content">
                        <h3>COURSE</h3>
                        <p class="pricing-sub">{{$course->course_name}}</p>
                        <div class="pricing">
                            <div class="price">{{$course->course_name}}</div>
                            <p>{{$course->description}}</p>
                        </div>
                        <ul>

                         @foreach($course->lessons as $lesson)<li>
                         {{ $loop->iteration }}. <a href="{{ route('lessons.show',[$lesson->title])  }}" > {{$lesson->title}}</a>
                          </br>
                            {{ $lesson->description }}</li>
                              @endforeach

                        </ul>

                    </div>
                </div>
                <!--End Pricing Block-->
            </div>
        </section>
        <!--End of Pricing Tables-->

    </main>


</div>

<!-- Include JavaScript resources -->
<script src="{{ url('js') }}/jquery.1.8.3.min.js"></script>
<script src="{{ url('js') }}/wow.min.js"></script>
<script src="{{ url('js') }}/featherlight.min.js"></script>
<script src="{{ url('js') }}/featherlight.gallery.min.js"></script>
<script src="{{ url('js') }}/jquery.enllax.min.js"></script>
<script src="{{ url('js') }}/jquery.scrollUp.min.js"></script>
<script src="{{ url('js') }}/jquery.easing.min.js"></script>
<script src="{{ url('js') }}/jquery.stickyNavbar.min.js"></script>
<script src="{{ url('js') }}/jquery.waypoints.min.js"></script>
<script src="{{ url('js') }}/images-loaded.min.js"></script>
<script src="{{ url('js') }}/lightbox.min.js"></script>


</body>
</html>
