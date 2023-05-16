@extends('layouts.patient.layout')
@section('title')
<title>{{ $title_meta->department_title }}</title>
@endsection
@section('meta')
<meta name="description" content="{{ $title_meta->department_meta_description }}">
@endsection
@section('patient-content')

    {{--    Whatsapp contact button --}}
    <div class="" style="position: fixed;bottom: 75px;right: 23px;z-index: 2;">
        <a href="#" class="btn btn-success" style="font-size: 24px;border-radius: 50%;"><i class="fab fa-whatsapp"></i></a>
    </div>

<!--Banner Start-->
<div class="banner-area flex" style="background-image:url({{ $banner->department ? url($banner->department) : '' }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-text">
                    <h1>{{ $navigation->department }}</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">{{ $navigation->home }}</a></li>
                        <li><span>{{ $navigation->department }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Banner End-->

<div class="case-study-home-page case-study-area pt_50">
    <div class="container">
        <div class="row">
            @foreach ($departments as $department)
            <div class="col-lg-4 col-md-6 mt_15">
                <div class="case-item">
                    <div class="case-box">
                        <div class="case-image d-flex justify-content-center align-items-center">
                            <img src="{{ $department->thumbnail_image }}" alt="">
                            <div class="overlay"><a href="{{ url('department-details/'.$department->slug) }}" class="btn-case">{{ $websiteLang->where('lang_key','see_details')->first()->custom_lang }}</a>
                            </div>
                        </div>
                        <div class="case-content">
                            <h4><a href="{{ url('department-details/'.$department->slug) }}">{{ $department->name }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <div class="mb-5">
            {{ $departments->links('patient.paginator') }}
        </div>

    </div>
</div>


@endsection
