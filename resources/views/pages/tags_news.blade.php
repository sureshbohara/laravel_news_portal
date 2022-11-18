<?php 
      use App\Models\Setting;
      $setting = App\Models\Setting::find(1);
 ?>
 
@section('meta')
    <meta name="title" content="{{ $tagsName->title }}">
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection

@extends('layouts.front.main')
 @section('title')
    Taraikhabar || {{ $tagsName->title }}
 @endsection
@section('content')
 <main>
     
   <section id="category">
        <div class="container">
            <div class="card text-center">
                <div class="card-header heading">
                    <h2 class="main">
                        <p>{{$tagsName['title']}}</p>
                    </h2>
                </div>
            </div>
            <div class="row">
               @foreach($posts as $key => $value)
                @if($key == 0)
                <div class="col-lg-12 col-md-12 col-sm-12 categoryPage mb-4">
                    <div class="row py-4">
                       <div class="col-md-6 col-sm-12">
                          <img src="{{url('images/news/medium/',$value['feature_image']) }}" alt="{{$value['title']}}"  class="card-img-top">
                        </div>

                        <div class="col-md-6 col-sm-12">
                           
                            <a href="{{ url('news/'.$value['id']) }}">
                                <h2 class="card-title">{{$value['title']}}</h2>
                            </a>

                            <p class="parao">
                                {!!$value['short_description'] !!}
                            </p>

                            <div class="top_wd">
                              <span class="pwriter">
                                <img class="avatar-img" src="{{asset('images/icon.png')}}" alt="Tarai Khabar">
                                {{ $value['created_by'] }}
                            </span>
                            &nbsp;
                            <span class="pdate">
                                <i class="fa fa-clock" aria-hidden="true">&nbsp;</i> 
                               {{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}
                            </span>&nbsp;
                            </div>

                          </div>
                       
    
                 </div>
                </div>
                @endif
                @endforeach
  
               @foreach($posts as $key => $value)
                @if($key > 0 && $key < 10)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}"  class="card-img-top">
                        <div class="card-body">
                            <a href="{{ url('news/'.$value['id']) }}"><h5 class="card-title">{{Str::limit($value['title'],60)}}</h5></a>

                           <div class="top_wd cateTitle">
                            <span class="pwriter">
                                <img class="avatar-img" src="{{asset('images/icon.png')}}" alt="Tarai Khabar">
                                {{ $value['created_by'] }}
                            </span>
                            &nbsp;
                            <span class="pdate">
                                <i class="fa fa-clock" aria-hidden="true">&nbsp;</i> 
                               {{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}
                            </span>&nbsp;
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $posts->links() }}
                </ul>
            </nav>
        </div>
    </section>
</main>
    
@endsection