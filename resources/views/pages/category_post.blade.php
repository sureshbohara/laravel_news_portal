<?php 
      use App\Models\Setting;
      $setting = App\Models\Setting::find(1);
 ?>
 
@section('meta')
    <meta name="title" content="{{ $categoryName->name }}">
    <meta name="keywords" content="{{ $setting->meta_keywords }}">
    <meta name="description" content="{{ $setting->meta_description }}">
@endsection

@extends('layouts.front.main')
 @section('title')
    Taraikhabar || {{ $categoryName->name }}
 @endsection
@section('content')
 <main>
     
   <section id="category">
        <div class="container">
            <div class="card text-center">
                <div class="card-header heading">
                    <h2 class="main">
                        <p>{{$categoryName['name']}}</p>
                    </h2>
                </div>
            </div>
             @if(count($posts)>0)
              <div class="row newsList">
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
                  <div class="col-lg-4 col-md-6 col-sm-12 addColNews">
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
            @endif
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                     @if(count($posts)>0)
                    <p class="text-center mt-4 mb-5">
                        <button class="load-more btn btn-dark" data-totalResult="{{ App\Models\News::count() }}">Load More</button></p>
                    @endif
                </ul>
            </nav>
        </div>
    </section>
</main>
    

<script type="text/javascript">
    var main_site="{{ url('/') }}";
</script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        $(".load-more").on('click',function(){
            var _totalCurrentResult=$(".addColNews").length;
            // Ajax Reuqest
            $.ajax({
                url:main_site+'/load-more-data',
                type:'get',
                dataType:'json',
                data:{
                    skip:_totalCurrentResult
                },
                beforeSend:function(){
                    $(".load-more").html('Loading...');
                },
                success:function(response){
                    var _html='';
                    var image="{{ asset('images/news/medium/') }}/";
                    $.each(response,function(index,value){
                        _html+='<div class="col-lg-4 col-md-6 col-sm-12 addColNews">';
                            _html+='<div class="card">';
                            _html+='<img src="'+image+value.image+'" class="card-img-top" alt="'+value.title+'" />';
                                _html+='<div class="card-body">';
                                    _html+='<h5 class="card-title">'+value.id+'. '+value.title+'</h5>';
                                _html+='</div>';
                            _html+='</div>';
                        _html+='</div>';
                    });
                    $(".newsList").append(_html);
                    // Change Load More When No Further result
                    var _totalCurrentResult=$(".addColNews").length;
                    var _totalResult=parseInt($(".load-more").attr('data-totalResult'));
                    console.log(_totalCurrentResult);
                    console.log(_totalResult);
                    if(_totalCurrentResult==_totalResult){
                        $(".load-more").remove();
                    }else{
                        $(".load-more").html('Load More');
                    }
                }
            });
        });
    });
</script>
@endsection