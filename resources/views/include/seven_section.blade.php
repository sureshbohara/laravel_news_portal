<section id="tsports-page">
<div class="container">
<div class="row">

<div class="col-md-12 col-lg-8 col-sm-12 second">
    <div class="freelancerunit-title">
        <h2>
            <span class="h2">जीवनशैली </span>

        </h2>
    </div>

    <div class="row">
        @foreach($sevenSection as $value)
        <div class="col-sm-12 col-md-6 col-lg-4">
            <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" class="card-img-top">
            <div class="card-body">
                <a href="{{ url('news/'.$value['id']) }}">
                    <h6 class="card-title">{{Str::limit($value['title'],40)}}</h6>
                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>

<div class="col-md-12 col-lg-4 col-sm-12">
    <div class="freelancerunit-title">
        <h2>
            <span class="h2">ट्रेन्डिङ </span>
        </h2>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 small">
         @foreach($popularPost as $key => $value)
           <div class="col-lg-12 col-md-6 col-sm-12">
            <div class="news_loop_txt trendingText">

                <h3>

                    <a href="{{ url('news/'.$value['id']) }}" rel="bookmark">
                        <span class="trending-counter">{{$loop->index+1}}</span>
                        {{ Str::limit($value['title'],55) }}
                    </a>
                </h3>
            </div>
            </div>
        @endforeach


        </div>
    </div>
</div>
</div>
</div>
</section>