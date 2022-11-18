<?php 
 use App\Models\Setting;
 $setting = App\Models\Setting::find(1);
?>
@extends('layouts.front.main')
@section('meta')
    <meta name="title" content="{{ $setting->meta_title }}">
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection

 @section('title')
    Taraikhabar || Home
 @endsection
@section('content')
   <main>
     @include('include.slider_news')
     @include('include.banner_news')
     @include('include.first_section')
     @include('include.second_section')
     @include('include.third_section')
     @include('include.forth_section')
     @include('include.fifth_section')
     @include('include.six_section')
     @include('include.seven_section')  
        <div class="container">
            @foreach($forthFirst as $value)
            @if(!empty($value->getFirstMediaUrl('image')))
            <div class="border card">
                <div class="full-banner">   
                <a href="{{$value['link']}}" target="_">
                    <img src="{{ $value->getFirstMediaUrl('image','main_adv') }}" alt="{{$value['title']}}" width="100%">
                </a>     
                </div>
            </div>
            @endif
            @endforeach
        </div>
       @include('include.interview_section')
       @include('include.eight_section')
       @include('include.nine_section')
       @include('include.ten_section')
    </main> 
@endsection