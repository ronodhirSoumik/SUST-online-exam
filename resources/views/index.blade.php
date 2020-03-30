
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

                  <nav id="nav-main">
                            <form action="{{ route('auth.logout') }}" method="post">
                                {{ csrf_field() }}
                                <input type="submit" value="Logout" class="btn btn-info">
                            </form>

                             
                              
                    </nav>

                    
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
 <section id="pricing" class="secondary-color text-center scrollto clearfix ">
            <div class="row clearfix">

                <div class="section-heading">
                    <h3>HELLO</h3>
                    <h2 class="section-title">We have the right courses for you</h2>
                </div>

                <!--Pricing Block-->
                @foreach($courses as $course)
                <div class="pricing-block col-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="pricing-block-content">
                        <h3>{{$course->course_code}}</h3>
                        <p class="pricing-sub">COURSE</p>
                        <div class="pricing">
                            <div class="price"><h2 class="section-title">{{$course->course_name}}</h2></div>
                            <p>{{$course->description}}</p>
                        </div>
                           

                        <a href="{{ route('courses.show', [$course->course_name]) }}" class="button">ENTER EXAM</a>
                    </div>
                </div>
                <!--End Pricing Block-->
          @endforeach


            </div>
        </section>
        <!--End of Pricing Tables-->


    </main>
    <footer id="landing-footer" class="clearfix">
        <div class="row clearfix">

            <p id="copyright" class="col-2">Developed by Soumik Sarker, Ali Ahsan Md. Linkon, Md. Mahir Labib<!-- <a href="https://www.shapingrain.com">ShapingRain</a> --></p>

        </div>
    </footer> 


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

         

