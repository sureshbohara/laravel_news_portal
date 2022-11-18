@extends('layouts.front.main')

@section('meta')
    <meta property="og:title" content="{{ $pageDetails->title }}">
    <meta name="keywords" content="{!! $pageDetails->short_description !!}">
    <meta name="description" content="{!! $pageDetails->description !!}">
@endsection

@section('title')
Home || {{$pageDetails['title']}}
@endsection
@section('content')

 <section id="category">
        <div class="container">
            <div class="card text-center">
                <div class="card-header heading">
                    <h2 class="main">
                        <p>{{$pageDetails['title']}}</p>
                    </h2>
                </div>
            </div>
            <div class="row single">
                <div class="card">
                    <div class="card-body">
                       <p class="card-text">
                         {!!$pageDetails['short_description'] !!}
                       </p>

                       <p class="card-text">
                         {!!$pageDetails['description'] !!}
                       </p>
                    </div>
                 </div> 
            </div>
        </div>
    </section>
@endsection