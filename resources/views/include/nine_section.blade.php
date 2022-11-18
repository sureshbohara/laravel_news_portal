<div class="trending-area fix">
            <div class="container">
                <div class="freelancerunit-title">
                    <h2>
                        <span class="h2">तराई-खबर स्पेसल</span>
                    </h2>
                </div>
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                      @foreach($taraikhabarSection as $value)
                        <div class="col-lg-4 col-sm-12">
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <a href="{{ url('news/'.$value['id']) }}">
                                            <img src="{{url('images/news/medium/',$value['feature_image']) }}"  class="right_post_image">
                                        </a>
                                </div>
                                <div class="trand-right-cap">
                                    <h4><a href="{{ url('news/'.$value['id']) }}">
                                        {{Str::limit($value['title'],70)}}
                                    </a></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach




                    </div>
                </div>
            </div>
        </div>