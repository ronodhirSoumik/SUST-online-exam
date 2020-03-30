@extends('layouts.app')

@section('content')
<!--Introduction-->
        <section id="about" class="introduction scrollto">

            <div class="row clearfix">

                <div class="col-3">
                    <div class="section-heading">
                        <h3>PROFILE</h3>
                        <h2 class="section-title">{{ $info->name }}</h2>
                        <p class="section-subtitle">Teacher of  {{ $info->department }} department</p>
                    </div>

                </div>

                <div class="col-2-3">

                    <!--Icon Block-->
                    <div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.1s">
                        <!--Icon-->
                        <div class="icon">
                            <i class="fa fa-html5 fa-2x"></i>
                        </div>
                        <!--Icon Block Description-->
                        <div class="icon-block-description">
                            <h4>DEPARTMENT</h4>
                            <p>{{ $info->department }}</p>
                        </div>
                    </div>
                    <!--End of Icon Block-->

                    <!--Icon Block-->
                    <div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.3s">
                        <!--Icon-->
                        <div class="icon">
                            <i class="fa fa-bolt fa-2x"></i>
                        </div>
                        <!--Icon Block Description-->
                        <div class="icon-block-description">
                            <h4>DESIGNATION</h4>
                            <p>{{ $info->designation }}</p>
                        </div>
                    </div>
                    <!--End of Icon Block-->

                    <!--Icon Block-->
                    <div class="col-2 icon-block icon-top wow fadeInUp" data-wow-delay="0.5s">
                        <!--Icon-->
                        <div class="icon">
                            <i class="fa fa-tablet fa-2x"></i>
                        </div>
                        <!--Icon Block Description-->
                        <div class="icon-block-description">
                            <h4>CONTACT</h4>
                            <p>{{\Auth::user()->email}}</p>
                        </div>
                    </div>
                    <!--End of Icon Block-->


                </div>

            </div>


        </section>
@endsection
