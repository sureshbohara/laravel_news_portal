
<?php 

   use App\Models\Tags;
   $tags = Tags::where('status',1)->orderBy('order_level', 'Desc')->take(8)->get();
  ?>
<!-- slider Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>भर्खरै</strong>
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        @foreach($sliderNews as $value)
                                         <a href="{{ url('news/'.$value['id']) }}">
                                            <li class="news-item">{{ $value['title'] }}</li>
                                        </a>
                                        @endforeach
      
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End -->

   <div class="taglist-container taglist-container--nav " style="padding-top: 10px; padding-bottom: 10px;">
   <div class="container">
      <div class="row row--taglist">
         <ul class="tag-list">
            @foreach($tags as $value)
            <a href="{{ url('news/tags/'.$value['id'].'/'.$value['slug']) }}">
               <li class="tag-list__item">{{$value['title']}}</li>
            </a>
        @endforeach
         </ul>
      </div>
   </div>
</div>


