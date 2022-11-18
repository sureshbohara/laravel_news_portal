<!--   third section start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="section-tittle mb-30">
                                <a href="#">
                                    <h3 style="color: #ccc;">अर्थतन्त्र </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">

                            <div class="weekly-news-active dot-style d-flex dot-style">
                               @foreach($thirdSection as $value)
                                <div class="weekly-single">
                                    <div class="weekly-img">
                                        <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" width="100%">
                                    </div>
                                    <div class="dweekly-caption">
                                        <h4><a href="{{ url('news/'.$value['id']) }}">{{Str::limit($value['title'],60) }}</a></h4>
                                    </div>
                                </div>
                              @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End third section -->