<?php 
use App\Models\Setting;
use App\Models\Advertisement;
$setting = App\Models\Setting::find(1);
$cube1Add = Advertisement::where('place','cube')->orderBy('id',"Desc")->where('status',1)->take(1)->get();
$cube2Add = Advertisement::where('place','cube')->skip(1)->orderBy('id',"Desc")->where('status',1)->take(1)->get();
$cube3Add = Advertisement::where('place','cube')->skip(2)->orderBy('id',"Desc")->where('status',1)->take(1)->get();
$cube3Add = Advertisement::where('place','cube')->skip(3)->orderBy('id',"Desc")->where('status',1)->take(1)->get();
$cube4Add = Advertisement::where('place','cube')->skip(4)->orderBy('id',"Desc")->where('status',1)->take(1)->get();
$cube5Add = Advertisement::where('place','cube')->skip(5)->orderBy('id',"Desc")->where('status',1)->take(1)->get();

$govAdd = Advertisement::where('place','government')->orderBy('id',"Desc")->where('status',1)->take(6)->get();

 ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{$setting->system_name}} || @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="{{$setting->meta_title}}">
     @yield('meta')
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/setting/'.$setting['favicon'])}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/ticker-style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/tab.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/mycss.css')}}">
</head>

<body>

    @include('layouts.front.header')
      @yield('content')
    @include('layouts.front.footer')


       <div class="s-intro__scroll" style="opacity: 1;">
        <a href="#" class="smoothscroll" data-toggle="modal" data-target="#exampleModal">
        <span>सूचनाहरु </span>
        </a>
        </div>

      <div class="modal left fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title text-light text-center">सूचनाहरु</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner noticeBoard">
                    @foreach($govAdd as $key => $gov)
                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">

                    <!--<ul class="notice-labels">-->
                    <!--    <li>-->
                    <!--        {{$gov['title']}}-->
                    <!--     </li>-->
                            
                    <!--</ul>-->
                     <a href="{{ $gov->getFirstMediaUrl('image','notice_image') }}" target="_">
                      <img class="d-block w-100" src="{{ $gov->getFirstMediaUrl('image','notice_image') }}">
                    </a>
                    </div>
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
 
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </div>


            </div>
          </div>
        </div>
      </div>
    </div>


     @if($setting->cube_status == 1)
    <section id="animat">
         
          <div class="animation">
            <a id="icon" href="#" onclick="myFunction()">
                <span style="font-size:25px;color: #fe0000;    position: fixed;
                    display: inline-block;
                    width: 32px;
                    height: 32px;
                    background: #eee;
                    color: #111;
                    font-size: 14px;
                    text-align: center;
                    margin-top: -19px;
                    line-height: 33px;
                    z-index: 9999;
                    border: 1px solid #fff;
                    -webkit-border-radius: 100px;
                    -moz-border-radius: 100px;
                    -ms-border-radius: 100px;
                    border-radius: 100px;">&times;</span>
            </a>
            

            <div class="imagesPart" id="myDIV">
            @foreach($cube1Add as $cube)
            <div class="itemSection a">
                <a href="{{$cube['link']}}" target="_">
                <img class="" src="{{ $cube->getFirstMediaUrl('image','cube_adv') }}">
              </a>
            </div>
            @endforeach
            @foreach($cube2Add as $cube)
            <div class="itemSection b">
                <a href="{{$cube['link']}}" target="_">
                <img class="" src="{{ $cube->getFirstMediaUrl('image','cube_adv') }}">
            </a>
            </div>
            @endforeach
            @foreach($cube3Add as $cube)
            <div class="itemSection c">
                <a href="{{$cube['link']}}" target="_">
                <img class="" src="{{ $cube->getFirstMediaUrl('image','cube_adv') }}">
            </a>
            </div>
            @endforeach
            @foreach($cube4Add as $cube)
            <div class="itemSection d">
                <a href="{{$cube['link']}}" target="_">
                <img class="" src="{{ $cube->getFirstMediaUrl('image','cube_adv') }}">
            </a>
            </div>
            @endforeach
            @foreach($cube5Add as $cube)
            <div class="itemSection e">
                <a href="{{$cube['link']}}" target="_">
                <img class="" src="{{ $cube->getFirstMediaUrl('image','cube_adv') }}">
            </a>
            </div>
            @endforeach
            @foreach($cube5Add as $cube)
            <div class="itemSection f">
                <a href="{{$cube['link']}}" target="_">
                <img class="" src="{{ $cube->getFirstMediaUrl('image','cube_adv') }}">
            </a>
            </div>
            @endforeach
          </div>
        </div>
    </section>
     @endif

    <script src="{{asset('front/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('front/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('front/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('front/assets/js/jquery.slicknav.min.js')}}"></script>
    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/assets/js/slick.min.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('front/assets/js/gijgo.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('front/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('front/assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.magnific-popup.js')}}"></script>
    <!-- Breaking New Pluging -->
    <script src="{{asset('front/assets/js/jquery.ticker.js')}}"></script>
    <script src="{{asset('front/assets/js/site.js')}}"></script>
    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('front/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.sticky.js')}}"></script>
    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('front/assets/js/plugins.js')}}"></script>
    <script src="{{asset('front/assets/js/main.js')}}"></script>
    <script src="{{asset('front/assets/js/tab-togle.js')}}"></script>
    <!-- <script src="assets/js/post-tab.js"></script> -->
    <script>
       var carousel = $(".imagesPart"), currdeg  = 0;
            function rotate(e){
              currdeg = currdeg - 10
              carousel.css({
                "-webkit-transform": "rotateY("+currdeg+"deg)",
                "-moz-transform": "rotateY("+currdeg+"deg)",
                "-o-transform": "rotateY("+currdeg+"deg)",
                "transform": "rotateY("+currdeg+"deg)"
              });
            }
            const startCarousel = (e) => window.carouselPause = setInterval(rotate, 1000);
            const stopCarousel = (e) => clearInterval(window.carouselPause);
            carousel.on({
              // pause carousel when mouse is over
              'mouseenter': stopCarousel,
              // resume when mouse is off
              'mouseleave': startCarousel
            });
            startCarousel();
    </script>

    <script>
      $(function() {
       $('#exampleModal').modal('show');
     });
   </script>
   
   <script>
function myFunction() {
  var x = document.getElementById("myDIV");
  var y = document.getElementById("icon");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
    y.style.display = "none";
  }
}
</script>
</body>

</html>