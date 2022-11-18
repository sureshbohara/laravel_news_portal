
<?php 
   use App\Utility\CategoryUtility;
   use App\Models\Category;
   use App\Models\Setting;
   use App\Models\Advertisement;
   use Pratiksh\Nepalidate\Facades\NepaliDate;
   use Carbon\Carbon;
    $categories = Category::where('level', 0)->where('status',1)->orderBy('order_level', 'asc')->take(15)->get();
    $nepaliDate = NepaliDate::create(\Carbon\Carbon::now())->toFormattedNepaliDate();

    $setting = App\Models\Setting::find(1);

    $logoSidebar = Advertisement::where('place','logo_side')->orderBy('id',"desc")->where('status',1)->take(1)->get();
  ?>
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">

                <div class="header-top red-bg d-none d-md-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li>
                                            <img src="{{asset('front/assets/img/icon/header_icon1.png')}}" alt=""><span
                                                id="nepali_full_date_2"></span> | <span id="real_clock_2">
                                                    {{$nepaliDate}}
                                            </span></li>

                                          
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">

                                          <li>
                                                <a href="{{route('poll.result')}}">
                                                    <i class="fas fa-bell" aria-hidden="true"></i>
                                                     Online Poll
                                                 </a>
                                            </li>

                                            <li>
                                                <a href="#" target="_blank">
                                                   <i class="fab fa-bell" aria-hidden="true"></i>
                                                    चुनाव २०७९
                                                </a>
                                            </li>
                                        <li><a href="{{$setting['facebook']}}" target="_"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="{{$setting['twitter']}}" target="_"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{$setting['instagram']}}" target="_"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="{{$setting['youtube']}}" target="_"><i class="fab fa-youtube"></i></a></li>
    
                                        
                                    </ul>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="logo">
                                    <a href="{{url('/')}}">
                                        <img class="logo-lg-width" src="{{$setting->getFirstMediaUrl('logo','full') }}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8">
                                <section id="ads">
                                    <div class="container">
                                        <div class="row">
                                            <div class="second banner">
                                                @foreach($logoSidebar as $value)
                                                @if(!empty($value->getFirstMediaUrl('image')))
                                                <a href="{{$value['link']}}" target="_">
                                                    <img src="{{ $value->getFirstMediaUrl('image','logo_side_image') }}">
                                                </a>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="{{url('/')}}">
                                        <img class="logo-sm-width" src="{{$setting->getFirstMediaUrl('logo','full') }}">
                                  </a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            @foreach ($categories as $key => $category)
                                             @if($key == 0)
                                            <li>
                                                <a href="{{url('/')}}">
                                                    <span aria-hidden="true" class="fa fa-home"
                                                        style="padding-right: 6px;"></span>
                                                    <!--{{$category['name']}}-->
                                                </a>
                                            </li>
                                             @endif
                                            @endforeach
                                             

                                            @foreach($categories as $key => $category)
                                              @if($key > 0 && $key < 15)

                                              <li>
                                                <a href="{{ url('news/category/'.$category['id'].'/'.$category['slug']) }}"> {{$category['name']}} </a>

                                                @if ($category->childrenCategories->count() > 0)
                                                 <ul class="submenu">
                                                   @foreach($category->childrenCategories as $childCategory)
                                                    <li>
                                                      <a href="{{ url('news/category/'.$childCategory['id'].'/'.$childCategory['slug']) }}">
                                                       @include('categories.home_child_category', ['child_category' => $childCategory]) 
                                                      </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                               
                                            </li>
                                             @endif
                                            @endforeach

                                             

                                            <li class="tarai-khabar-login">
                                                <a href="{{route('user.login')}}">
                                                    <i class="far fa-user"></i>
                                                </a>
                                            </li>
                                 
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>




