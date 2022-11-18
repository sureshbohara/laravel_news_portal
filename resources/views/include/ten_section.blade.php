<?php 
    use App\Models\Category;
    $mainCategory = Category::where('level', 0)->orderBy('order_level', 'desc')->get();
  ?>
<section id="tfourth-blog" class="py-3">
            <div class="container">
                <div class="freelancerunit-title">
                    <h2>
                        <span class="h2">समाचार वर्गहरु</span>
                    </h2>
                </div>

               <div class="row">
                @foreach($mainCategory as $value)
                <div class="col-lg-1 col-sm-6  small card mb-3" style="margin:4px;">
                    <div class="row g-0">
                        <div class="col-md-12 col-sm-6">
                            @if(!empty($value->getFirstMediaUrl('icon')))
                           <img src="{{ $value->getFirstMediaUrl('icon','icon') }}" class="img-fluid rounded-start img-circle" alt="{{$value['name']}}">
                           @else
                           <img src="{{asset('images/default.jpg')}}" alt="{{$value['name']}}" style="width: 70px;height: 70px;">
                           @endif
                            <h6>
                                <a href="{{ url('news/category/'.$value['id'].'/'.$value['slug']) }}">{{$value['name']}}</a>
                            </h6>
                        </div>
                         
                    </div>
                </div>
                @endforeach



            </div>

            </div>
        </section>