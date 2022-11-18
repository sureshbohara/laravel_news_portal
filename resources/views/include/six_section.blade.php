<section id="tsports-page">
            <div class="container">
                <div class="freelancerunit-title">
                    <h2>
                        <span class="h2">मनोरञ्जन </span>
                       <!--  <a href="#" class="circle-arrow"><span>सबै </span></a> -->
                    </h2>
                </div>
                <div class="row">

                    <div class="group-bunch">
                        <div class="row">
                          @foreach($sixSection as $key=> $value)
                            @if($key == 0)
                            <div class="col-md-6 col-lg-4 col-sm-12 card">
                                <img src="{{url('images/news/medium/',$value['feature_image']) }}" alt="{{$value['title']}}" class="card-img-top">
                                <div class="card-body">
                                    <a href="{{ url('news/'.$value['id']) }}">
                                        <h5 class="card-title">
                                        {{Str::limit($value['title'],65)}}
                                    </h5>
                                    </a>
                                    
                                    <p class="card-text">
                                        {!! Str::limit(strip_tags($value["short_description"]), 120)!!}
                                    </p>
                                </div>
                             </div>
                             @endif
                           @endforeach

                            <div class="col-md-6 col-lg-4 col-sm-12 small">
                               @foreach($sixSection  as $key => $value)
                                 @if($key > 0 && $key < 4)
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4 col-sm-12">
                                            <img src="{{url('images/news/medium/',$value['feature_image']) }}" alt="{{$value['title']}}" class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="card-body">
                                                <a href="{{ url('news/'.$value['id']) }}">
                                                    <h6 class="card-title">{{Str::limit($value['title'],45)}}</h6>
                                                </a>
                                                <p class="card-text">
                                                 {!! Str::limit(strip_tags($value["short_description"]), 100)!!}
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>

                            <div class="col-md-6 col-lg-4 col-sm-12 small">
                                 @foreach($sixSection  as $key => $value)
                                 @if($key > 4 && $key < 8)
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4 col-sm-12">
                                            <img src="{{url('images/news/medium/',$value['feature_image']) }}" alt="{{$value['title']}}" class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="card-body">
                                                <a href="{{ url('news/'.$value['id']) }}">
                                                    <h6 class="card-title">{{Str::limit($value['title'],50)}}</h6>
                                                </a>
                                                <p class="card-text">
                                                 {!! Str::limit(strip_tags($value["short_description"]), 100)!!}
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
         

                            </div>
                        </div>
                    </div>
                </div>
               <div class="border card">
                    <div class="full-banner">
                         @foreach($thirdFirst as $value)
                         @if(!empty($value->getFirstMediaUrl('image')))
                        <a href="{{$value['link']}}" target="_">
                            <img src="{{ $value->getFirstMediaUrl('image','main_adv') }}" alt="{{$value['title']}}" width="100%">
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>