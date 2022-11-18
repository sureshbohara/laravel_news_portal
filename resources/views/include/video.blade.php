<!--   third section start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="section-tittle mb-30">
                                <a href="#">
                                    <h3 style="color: #ccc;"> तराई-खबर टीभी </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">

                            <div class="weekly-news-active dot-style d-flex dot-style">
                               @foreach($videoSection as $value)
                               @if(!empty($value['video_id']))
                                 <div class="weekly-single">
                                    <div class="weekly-img">
                                     <iframe width="100%" height="300px" src="https://www.youtube.com/embed/{{$value['video_id']}}" title=" {{$value['title']}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="dweekly-caption">
                                        <h4><a href="{{ url('news/'.$value['id']) }}">{{Str::limit($value['title'],60) }}</a></h4>
                                    </div>
                                 </div>
                                @endif
                              @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End third section -->