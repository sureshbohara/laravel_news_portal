<?php use Pratiksh\Nepalidate\Facades\NepaliDate; ?>
<section id="first">
    <div class="container">
        <div class="border card">
            <div class="full-banner">
                
                @foreach($regularFirst as $value)
                @if(!empty($value->getFirstMediaUrl('image')))
                <a href="{{$value['link']}}" target="_">
                <img src="{{ $value->getFirstMediaUrl('image','main_adv') }}" class="card-img-bottom py-2" alt="{{$value['title']}}">
                </a>
               @endif
              @endforeach
              

            </div>
           

        </div>
        <!--End ads-->
    </div>
</section>

<!--banner News Area-->
@foreach($bannerNews as $value)
<div class="trending-area fix fullarea py-2">
<div class="container">
@if(!empty($value['banner_tags']))
<div class="freelancerunit-title myTags">
<h2>
    <span class="h2">{{$value['banner_tags']}} </span>
</h2>
</div>
@endif


<div class="trending-main">
<!-- Trending Tittle -->
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <!-- Trending Top -->
        <div class="trending-top mb-30">
            
            <div class="trend-top-cap">
                <h2>
                 <a href="{{ url('news/'.$value['id']) }}">
                    {{$value['title']}}
                </a>
               </h2>
            </div>
            
            <div class="top_wd mainTitle">

                <span class="pwriter">
                      <img class="avatar-img" src="{{asset('images/icon.png')}}" alt="Tarai Khabar">
                      {{ $value['created_by'] }}
                </span>
                &nbsp;
                <span class="pdate">
                    <i class="fa fa-clock" aria-hidden="true">&nbsp;</i> 
                   
                       {{ \Carbon\Carbon::parse($value->created_at)->diffForHumans() }}
                  <!-- {{ NepaliDate::create(\Carbon\Carbon::parse($value->created_at))->toFormattedNepaliDate();}} -->
                </span>

            </div>
              @if(!empty($value['video_id']))
               <iframe width="100%" height="400px" src="https://www.youtube.com/embed/{{$value['video_id']}}" title=" {{$value['title']}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              @else
             <a href="{{ url('news/'.$value['id']) }}">
                <div class="trend-top-img">
                    <img src="{{url('images/news/large/',$value['feature_image']) }}" alt="{{$value['title']}}">
                </div>
              </a>
           
            @endif
          
           
            <p class="parao">{!! $value['short_description'] !!}</p>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endforeach
<!--Banner News Area-->

 