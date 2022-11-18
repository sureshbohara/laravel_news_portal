<!-- End Ads Section  -->

        <section id="press">
            <div class="container">
                <div class="freelancerunit-title">
                    <h2>
                        <span class="h2">खेलकुद </span>
                    </h2>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="row">
                           @foreach($fifthSection  as $key => $value)
                            @if($key >= 0 && $key <= 3)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" style="width: 355px;height: 280px;">
                                    <div class="card-body">
                                        <a href="{{ url('news/'.$value['id']) }}">
                                            <h2 class="card-title">
                                                {{Str::limit($value['title'],60)}}
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="row">
                            @foreach($fifthSection  as $key => $value)
                             @if($key >= 3 && $key <= 10)
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="news_loop_txt">
                                    <h2 class="sbhd">
                                        <a href="{{ url('news/'.$value['id']) }}" rel="bookmark">  {{Str::limit($value['title'],60)}}</a></h2>
                                </div>
                            </div>
                            @endif
                            @endforeach

  

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Section  -->