 <!--second section-->
        <section id="first">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="freelancerunit-title">
                            <h2>
                                <span class="h2">मुख्य समाचार</span>
                               <!--  <a href="#" class="circle-arrow"><span>सबै </span></a> -->
                            </h2>
                        </div>
                        <div class="row">
                           @foreach($secondSection as $key =>  $value)
                             @if($key == 0)
                            <div class="col-lg-12 col-sm-12">
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-lg-6 col-sm-12">
                                            <img src="{{url('images/news/medium/',$value['feature_image']) }}" alt="{{$value['title']}}" alt="{{$value['title']}}" width="100%">
                                        </div>
                                        <div class="col-lg-6 col-sm-12 text">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="{{ url('news/'.$value['id']) }}">{{ Str::limit($value['title'],35)}}</a></h5>
                                                <p class="card-text">
                                                     {!! Str::limit(strip_tags($value["short_description"]), 200)!!}
                                                </p>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach

                            <div class="card">
                                <div class="mid-banner">
                                     @foreach($secondFirst as $value)
                                     @if(!empty($value->getFirstMediaUrl('image')))
                                        <a href="{{$value['link']}}" target="_">
                                            <img src="{{ $value->getFirstMediaUrl('image','main_adv') }}" alt="{{$value['title']}}" width="100%">
                                        </a>
                                        @endif
                                        @endforeach
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">

                                  @foreach($secondSection as $key => $value)
                                   @if($key > 0 && $key < 5)
                                    <div class="row g-0">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="card-body simpleText">
                                                <a href="{{ url('news/'.$value['id']) }}">
                                                <h5 class="card-title">
                                                    <i class="fa fa-chevron-circle-right"></i>
                                                    {{$value['title']}}
                                                </h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                  @endif
                                  @endforeach

    
                                
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                @foreach($secondSection as $key => $value)
                                   @if($key > 4 && $key < 9)
                                <div class="row g-0">
                                    <div class="col-md-12">
                                        <div class="card-body simpleText">
                                            <a href="{{ url('news/'.$value['id']) }}">
                                            <h5 class="card-title">
                                                <i class="fa fa-chevron-circle-right"></i>
                                                {{$value['title']}}
                                            </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="row">
                            @foreach($homeSidebar as $value)
                            @if(!empty($value->getFirstMediaUrl('image')))
                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="card">
                                    <a href="{{$value['link']}}" target="_">
                                        <img src="{{ $value->getFirstMediaUrl('image','sidebar_image') }}" alt="{{$value['title']}}" width="100%">
                                    </a>
                                </div>
                            </div>
                            @endif
                            @endforeach

                        </div>
                    </div>
                </div>
                
            </div>
        </section>
<!--End second section-->