@extends('fronts.layouts.master')

@section('content')
<!-- start slider area -->
<section id="home" class="slider-style-6 height--100 rn-section-gap align-items-center with-particles bg_image--11 bg_image" data-black-overlay="5">
    <div id="particles-js"></div>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="banner-inner text-center">
                    <h1 class="fs--100">{{ $users->name }}</h1>
                    <!-- type headline start-->
                    <span class="cd-headline clip is-full-width">
                        <span>I am a</span>
                    <!-- ROTATING TEXT -->
                    <span class="cd-words-wrapper">
                            <b class="is-visible">Lawyer.</b>
                            <b class="is-hidden">Consulter.</b>
                            <b class="is-hidden">Developer.</b>
                        </span>
                    </span>
                    <!-- type headline end -->
                    <div class="button-area">
                        <a class="rn-btn shadow-none" href="#contacts"><span>CONTACT ME</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- start slider area End -->

<!-- Start Resume Area -->
<div class="rn-resume-area rn-section-gap section-separator" id="resume">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle"></span>
                    <h2 class="title">My Resume</h2>
                </div>
            </div>
        </div>
        <div class="row mt--45">
            <div class="col-lg-12">
                <ul class="rn-nav-list nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="true">education</a>
                    </li>
                </ul>

                <!-- Start Tab Content Wrapper  -->
                <div class="rn-nav-content tab-content" id="myTabContents">

                    <!-- Start Single Tab  -->
                    <div class="tab-pane show active fade single-tab-area" id="education" role="tabpanel" aria-labelledby="education-tab">
                        <div class="personal-experience-inner mt--40">
                            <div class="row">
                                <!-- Start Skill List Area  -->
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="content">
                                        <span class="subtitle">2010 - 2017</span>
                                        <h4 class="maintitle">Education Quality</h4>
                                        <div class="experience-list">

                                            <!-- Start Single List  -->
                                            @foreach ($educations as $edu)
                                            <div class="resume-single-list">
                                                <div class="inner">
                                                    <div class="heading">
                                                        <div class="title">
                                                            <h4>{{ $edu->university }}</h4>
                                                            <span>({{ $edu->year}})</span>
                                                        </div>
                                                        {{-- <div class="date-of-time">
                                                            <span>4.30/5</span>
                                                        </div> --}}
                                                    </div>
                                                    <p class="description">{{ $edu->study }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- End Single List  -->

                                        </div>
                                    </div>
                                </div>
                                <!-- End Skill List Area  -->

                                <!-- Start Skill List Area 2nd  -->
                                <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                    <div class="content">
                                        <span class="subtitle">2016 - current</span>
                                        <h4 class="maintitle">Job Experience</h4>
                                        <div class="experience-list">

                                            <!-- Start Single List  -->
                                            @foreach ($experiences as $exp)
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4>{{ $exp->company }}</h4>
                                                                <span>({{ $exp->since }} - {{ $exp->then }})</span>
                                                            </div>
                                                            {{-- <div class="date-of-time">
                                                                <span>4.70/5</span>
                                                            </div> --}}
                                                        </div>
                                                        <p class="description">{{ $exp->position }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- End Single List  -->

                                        </div>
                                    </div>
                                </div>
                                <!-- End Skill List Area  -->
                            </div>
                        </div>
                    </div>
                    <!-- End Single Tab  -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Resume Area -->
@endsection
