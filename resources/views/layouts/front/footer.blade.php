
<?php 
    use App\Models\Category;
    use App\Models\Setting;
    use App\Models\Page;
    $setting = App\Models\Setting::find(1);
    $categories = Category::where('status',1)->orderBy('order_level', 'desc')->get();
    $footerPage = Page::where('status',1)->get()->toArray(); 
  ?>
<footer id="footer">
    <div class="container">
            <div class="col-md-12">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6">
                       <div class="footer-tittle">
                          <div class="footer-logo">
                              <a href="{{url('/')}}">
                                <img class="logo-ft-width footerLogo" src="{{asset('images/setting/'.$setting['logo'])}}" alt=""></a>
                          </div>
                          <div class="describe">
                             <!--<h6>-->
                             <!--   <li>{{$setting['system_name']}}</li>-->
                             <!--</h6>-->
                             <div class="cr1">  
                                {{$setting['address']}}<br>
                                <strong>ज्ञानेन्द्र यादव</strong>
                                   <br>________
                             </div>
                          </div>
                       </div>
                    </div>

              <div class="col-md-3 col-sm-6">
              <div class="footer-copyright-content">
                <p>
                    <strong>सूचना विभाग दर्ता नं:</strong> {{$setting['reg_no']}}</p>
                  <p>
                    <strong>Editor-in-Chief:</strong> {{$setting['chief_edtor']}}</p>
                    <p><strong>Chairman:</strong> {{$setting['chairman']}}</p>
                    <p><i class="fa fa-phone"></i> {{$setting['contact_number1']}}, {{$setting['contact_number2']}}<br>  &nbsp;<i class="fa fa-envelope"></i> {{$setting['email_1']}} <br>  &nbsp;<i class="fa fa-envelope"></i> {{$setting['email_2']}}
                    </div>
              </div>

               <div class="col-md-2 col-sm-12 about-rato">
                @foreach($footerPage as $pages)
                <p>
                    <a href="{{route('page.details',$pages['slug'])}}">{{$pages['title']}}</a>
                </p>
                @endforeach

                </div>

                <div class="col-md-4">
                    <div class="row">
                        <h2 class="nav-bt-links">लिङ्कहरू

                        </h2>

                        <div class="col-md-4 col-sm-4 nav-bt-link buttonLink">
                            <ul style="list-style-type:none;">
                                @foreach($categories as $key => $value)
                                  @if($key > 0 && $key < 11)
                                 <li><a href="{{ url('news/category/'.$value['id'].'/'.$value['slug']) }}">{{$value['name']}}</a></li>
                                 @endif
                                @endforeach

                            </ul>
                         </div>

                        <div class="col-md-4 col-sm-4 nav-bt-link buttonLink">

                            <ul style="list-style-type:none;">
                                 @foreach($categories as $key => $value)
                                  @if($key > 10 && $key < 21)
                                 <li><a href="{{ url('news/category/'.$value['id'].'/'.$value['slug']) }}">{{$value['name']}}</a></li>
                                 @endif
                                @endforeach

                            </ul>

                            </div>
                            <div class="col-md-4 col-sm-4 nav-bt-link buttonLink">

                            <ul style="list-style-type:none; ">
                                @foreach($categories as $key => $value)
                                  @if($key >20 && $key < 30)
                                 <li><a href="{{ url('news/category/'.$value['id'].'/'.$value['slug']) }}">{{$value['name']}}</a></li>
                                 @endif
                                @endforeach

                            </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div> 
     </div> 
   </footer>

<section class="disclosure-sec">
<div class="container">
<div class="row py-4">
 <div class="col-md-8 offset-md-2 col-sm-12 text-center">
  <p class="copyright-title">
    Copyright ©.<?php echo (date('Y')==2020)?(date('Y')):'2020 - '.date('Y'); ?> {!!$setting['copy_right'] !!}
    <a href="">Terms of Service</a>&nbsp; 
    <a href="">Privacy Policy</a>
  </p>

  <p class="copyright-text">
    {!! $setting['footer_text'] !!}अनुरो
  </p> 

 </div>
 </div>
</div>
</section>