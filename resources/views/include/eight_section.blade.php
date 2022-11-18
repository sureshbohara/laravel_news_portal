<!-- six blog section  -->
<section id="tsports-page">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-8 col-sm-12 second">
<div class="freelancerunit-title">
<h2>
    <span class="h2">पर्यटन </span>

</h2>
</div>
<div class="row">
@foreach($eightSection as $key =>  $value)
 @if($key > 0 && $key < 3)
 <div class="col-sm-12 col-md-6 col-lg-6">
     <img src="{{url('images/news/medium/',$value['feature_image']) }}" alt="{{$value['title']}}"  class="card-img-top">
     <div class="card-body">
        <a href="{{ url('news/'.$value['id']) }}">
            <h5 class="card-title">{{Str::limit($value['title'],60)}}</h5>
        </a>
        <p class="card-text">
             {!! Str::limit(strip_tags($value["short_description"]), 120)!!}
        </p>

    </div>
 </div>
 @endif
@endforeach


@foreach($eightSection as $key => $value)
  @if($key > 2 && $key < 6)
<div class="col-sm-12 col-md-6 col-lg-4">
    <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}"  class="card-img-top">
    <div class="card-body">
        <a href="{{ url('news/'.$value['id']) }}">
            <h6 class="card-title">
                {{Str::limit($value['title'],60)}}
            </h6>
        </a>
        
    </div>
</div>
@endif
@endforeach

</div>
</div>
<div class="col-md-12 col-lg-4 col-sm-12">
<div class="freelancerunit-title">
<h2>
    <span class="h2">विचार </span>
    <!-- <a href="#" class="circle-arrow"><span>सबै </span></a> -->
</h2>
</div>
<div class="row">

<div class="col-lg-12 col-sm-12 small">
   @foreach($sidebarSection as $value)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-12 col-sm-12">
                <div class="card bichar">
                  <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}"  class="card-img-top">
                  <div class="card-body">
                    <a href="{{ url('news/'.$value['id']) }}">
                        <h3 class="card-title" style="text-align: center;">
                        {{Str::limit($value['title'],70)}}
                     </h3>
                    </a>
                     <span class="author-name"> {{$value['author_name']}}</span>
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>
</div>
</div>
</div>
</div>
</section>
<!-- six blog section  -->