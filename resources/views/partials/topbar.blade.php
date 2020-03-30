{{--<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('quickadmin.quickadmin_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           @lang('quickadmin.quickadmin_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>





    </nav>
</header>--}}




@inject('request', 'Illuminate\Http\Request')

<div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
    <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
    <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
    <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
    <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
</div>


<header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
    <div id="header" class="nav-collapse">
        <div class="row clearfix">
            <div class="col-1">

                <!--Logo-->
                <div id="logo">

                    <!--Logo that is shown on the banner-->
<!--        CHANGE HERE             <img src="{{url('images/banner-images')}}/banner-image-1.jpg" id="banner-logo" alt="Landing Page"/> -->
                    <!--End of Banner Logo-->

                    <!--The Logo that is shown on the sticky Navigation Bar-->
                    <img src="{{url('images')}}/logo-2.png" id="navigation-logo" alt="Landing Page"/>
                    <!--End of Navigation Logo-->


                </div>
                <!--End of Logo-->

                <aside>

                </aside>

                <!--Main Navigation-->
                <nav id="nav-main">
                    <aside>
                        <!-- sidebar: style can be found in sidebar.less -->
                        <ul>

<!--                             <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                                <a href="{{ route('dashboard') }}">
                                
                                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                                </a>
                            </li> -->

{{--                             @can('user_management_access')
                                    <li class="treeview">
                                        <a href="#">
                                           
                                            <span>@lang('quickadmin.user-management.title')</span>
                                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            @can('role_access')
                                                <li>
                                                    <a href="{{ route('admin.roles.index') }}">
                                                        
                                                        <span>@lang('quickadmin.roles.title')</span>
                                                    </a>
                                                </li>@endcan

                                            @can('user_access')
                                                <li>
                                                    <a href="{{ route('admin.users.index') }}">
                                                      
                                                        <span>@lang('quickadmin.users.title')</span>
                                                    </a>
                                                </li>@endcan

                                        </ul>
                                    </li>@endcan--}}


                                @can('course_access')
                                    <li>
                                        <a href="{{ route('admin.courses.index') }}">
                                        
                                            <span>@lang('quickadmin.courses.title')</span>
                                        </a>
                                    </li>@endcan

                                @can('lesson_access')
                                    <li>
                                        <a href="{{ route('admin.lessons.index') }}">
                                        
                                            <span>@lang('quickadmin.lessons.title')</span>
                                        </a>
                                    </li>@endcan

                                @can('question_access')
                                    <li>
                                        <a href="{{ route('admin.questions.index') }}">
                                         
                                            <span>@lang('quickadmin.questions.title')</span>
                                        </a>
                                    </li>@endcan

                                @can('question_option_access')
                                    <li>
                                        <a href="{{ route('admin.question_options.index') }}">
                                          
                                            <span>@lang('quickadmin.question-options.title')</span>
                                        </a>
                                    </li>@endcan

                                @can('exam_access')
                                    <li>
                                        <a href="{{ route('admin.exams.index') }}">
                                        
                                            <span>@lang('quickadmin.exam.title')</span>
                                        </a>
                                    </li>@endcan

                                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                                    <a href="{{ route('showResult') }}">
                                  
                                        <span class="title">Results</span>
                                    </a>
                                </li>






<!--                                 <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                                    <a href="{{ route('auth.change_password') }}">
                                        <i class="fa fa-key"></i>
                                        <span class="title">@lang('quickadmin.qa_change_password')</span>
                                    </a>
                                </li> -->

                                <li>
                                    <a href="#logout" onclick="$('#logout').submit();">
                                   
                                        <span class="title">@lang('quickadmin.qa_logout')</span>
                                    </a>
                                </li>
                            </ul>
                    </aside>
                </nav>
                <!--End of Main Navigation-->

                <div id="nav-trigger"><span></span></div>
                <nav id="nav-mobile"></nav>

            </div>
        </div>
    </div><!--End of Header-->

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



