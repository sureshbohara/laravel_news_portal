 <!--First Section Area-->
        <div class="trending-area fix">
            <div class="container">
                <div class="freelancerunit-title">
                    <h2>
                        <span class="h2">राजनीति </span>
                    </h2>
                </div>
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-8 col-sm-12">
                            <!-- Trending Top -->

                            @foreach($firstSection as $key => $value)
                              @if($key == 0)
                               <div class="trending-top mb-30">
                                <div class="trend-top-cap">
                                  <h2><a href="{{ url('news/'.$value['id']) }}">{{$value['title']}}</a></h2>
                                </div>
                                  <div class="top_wd mainTitle">
                                    <span class="pwriter">

                                          <img class="avatar-img" src="{{asset('images/icon.png')}}" alt="Tarai Khabar">

                                        {{ $value['created_by'] }}
                                    </span>

                                </div>
                                <a href="{{ url('news/'.$value['id']) }}">
                                    <div class="trend-top-img">
                                        <img src="{{url('images/news/medium/',$value['feature_image']) }}" alt="{{$value['title']}}">
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                   @foreach($firstSection as $key => $value)
                                   @if($key > 0 && $key < 4)
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img">
                                                <a href="{{ url('news/'.$value['id']) }}">
                                                    <img src="{{url('images/news/medium/',$value['feature_image']) }}" alt="{{$value['title']}}" width="270" height="175">
                                                </a>
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <h4><a href="{{ url('news/'.$value['id']) }}">{{ Str::limit($value['title'],50)}}</a>
                                                </h4>
                                                <div class="top_wd subTitle">
                                                
    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
         
                                </div>
                            </div>
                        </div>
                        <!-- Riht content -->
                         <div class="col-lg-4">
                             @foreach($firstSection as $key => $value)
                              @if($key > 3 && $key < 12)
                              <div class="trand-right-single d-flex">
                                <div class="trand-right-img" style="width: 275px;height: auto;">
                                          <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}"  style="width: 100%;height: auto;">
                                    
                                </div>
                                <div class="trand-right-cap">
                                    <h4><a href="{{ url('news/'.$value['id']) }}">{{ Str::limit($value['title'],70)}}</a></h4>

                                </div>
                            </div>
                            @endif
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--First Section Area-->