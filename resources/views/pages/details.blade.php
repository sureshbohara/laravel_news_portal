<?php 
   use App\Models\Setting;
   $setting = App\Models\Setting::find(1);
 ?>
@extends('layouts.front.main')
@section('meta')
    <meta property="og:title" content="{{ $postDetails->title }}">
    <meta name="keywords" content="{{ $postDetails->tags }}">
    <meta name="description" content="{{ $postDetails->short_description }}">
    <meta property="og:image" content="{{url('images/news/medium/',$postDetails['feature_image']) }}">
@endsection
 @section('title')
    Taraikhabar || {{ $postDetails->title }}
 @endsection
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

 <main>
     <section class="post-page-area">
      <div class="container">
         <!--Ads-->
          @foreach($afterFirst as $value)
          @if(!empty($value->getFirstMediaUrl('image')))
         <div class="border card">
             <div class="full-banner">   
                  <a href="{{$value['link']}}" target="_">
                      <img src="{{ $value->getFirstMediaUrl('image','main_adv') }}" alt="{{$value['title']}}" width="100%">
                  </a>
             </div>
         </div>
         @endif
         @endforeach
        <!--End ads-->
        <!--single page-->
        <div class="main-title py-4">
            <div class="content">
              <h2 class="title">
                  {{$postDetails['title']}}
              </h2>
              <h3 class="sub-title"> {!!$postDetails['short_description']!!}</h3>
              <div class="date_share"> 
                  <div class="top_wd">
                <span class="pwriter">
                      <img class="avatar-img" src="{{asset('images/icon.png')}}" alt="Tarai Khabar">
                      {{ $postDetails['created_by'] }}
                </span>
                &nbsp;
                <span class="pdate">
                    <i class="fa fa-clock" aria-hidden="true">&nbsp;</i> 
                   {{ \Carbon\Carbon::parse($postDetails->created_at)->diffForHumans() }}
                </span>&nbsp;
        
                </div>

              
                  <div class="socail_icons">
                    <small class="py-2 commentBtn">
                     <span class="comment-count btn-sm btn-outline-info">{{ count($postDetails->comments) }} Comment</span>
                     <span title="Likes" id="saveLikeDislike" data-type="like" data-post="{{ $postDetails->id}}" class="btn-sm btn-outline-info">
                        Like
                        <span class="like-count">{{ $postDetails->likes() }}</span>
                    </span>

                    <span title="Dislikes" id="saveLikeDislike" data-type="dislike" data-type="dislike" data-post="{{ $postDetails->id}}" class="btn-sm btn-outline-danger">
                        Dislike
                        <span class="dislike-count">{{ $postDetails->dislikes() }}</span>
                    </span>

                  </small>

                      <div class="sharethis-inline-share-buttons"></div>
                  </div>

               </div>
            </div>
            <div class="row">
               <div class="col-lg-8 col-md-12">
                  <div class="card">

                     @if(!empty($postDetails['video_id']))
                      <iframe width="100%" height="400px" src="https://www.youtube.com/embed/{{$postDetails['video_id']}}" title="{{$postDetails['title']}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     @else
                     <img src="{{url('images/news/large/',$postDetails['feature_image']) }}" alt="{{$postDetails['title']}}" class="card-img-top">
                     @endif

                     <div class="card-body">
                        <p class="card-text">
                            {!!$postDetails['description']!!}
                        </p>
                     </div>

          
                     <!--Ads-->
                     @foreach($beforeFirst as $value)
                     @if(!empty($value->getFirstMediaUrl('image')))
                     <div class="border card">
                         <div class="full-banner">
                           <a href="{{$value['link']}}" target="_">
                               <img src="{{ $value->getFirstMediaUrl('image','main_adv') }}" alt="{{$value['title']}}" width="100%">
                           </a>
                         </div>
                     </div>
                     @endif
                     @endforeach
                     <!--End ads-->
                     <!--Socail Plugins-->
                     <div class="comments">

                        <h2 class="card-header">प्रतिक्रिया
                        
                        </h2>

                        <form action="{{url('comment')}}" method="post">@csrf
                             <input type="hidden" name="post_id" value="{{$postDetails['id']}}">
                             <div class="form-group">
                                 <textarea name="comment_body" class="form-control" required></textarea>
                             </div>
                            <div class="form-group">
                             <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                        @foreach($usercomment as $comment)
                        <div class="media border p-3 mb-2">
                          <img src="https://www.w3schools.com/bootstrap4/img_avatar3.png" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                          <div class="media-body">

                             @php
                                 $ts = strtotime($comment['created_at']);
                                 $updated_date = date('d F , Y',$ts)
                                @endphp
                            <h4>{{$comment['users']['name']}} 
                                <small>
                                <i>Comment on : {{ $updated_date }}</i>
                              </small>
                            </h4>
                            <p>{{$comment['comment_body']}}</p>
                          </div>
                        </div>
                      
                       @endforeach
                     </div>
                      

                     <section id="relatedpost" class="py-4">
                        <div class="card text-center">
                           <div class="card-header heading">
                              <h2 class="main">
                                    <p>सम्बन्धित</p>
                              </h2>
                           </div>
                        </div>
                        <div class="row">
                        @foreach($data['find'] as $i=>$related)
                         @if($related->newsId->status == 1  &&  $i<= 5)
                         <div class="col-lg-4 col-md-6 col-sm-12">
                           <div class="card">
                                 <img src="{{url('images/news/medium/',$related->newsId['feature_image']) }}" alt="{{$related->newsId['title']}}"  class="card-img-top">
                                 <div class="card-body">
                                    <a href="{{ url('news/'.$related->newsId['id']) }}"><h6 class="card-title">{{$related->newsId->title}}</h6></a>
                                 </div>
                           </div>
                        </div>
                        @endif
                        @endforeach
   
                        </div>
                     </section>
                  </div> 
               </div>
               <div class="col-lg-4 col-md-12">
                     <div class="details">
                     <h2>
                        <span class="h2 text-white">ट्रेन्डिङ </span>
                     </h2>
                    </div>                 
                     <div tabindex="0" role="tabpanel" id="nils-tab" aria-labelledby="nils">
                       <p>
                        <div class="row">

                           <div class="col-lg-12 small">
                            @foreach($popularPost as $value)
                              <div class="card mb-3">
                                 <div class="row g-0">
                                    <div class="col-md-12">
                                          <div class="card-body">
                                             <a href="{{ url('news/'.$value['id']) }}">
                                                <h3>({{$loop->index+1}}) {{$value['title']}}</h3>
                                            </a>
                                          </div>
                                          
                                    </div>
                                 </div>
                              </div>
                           @endforeach
                          
            

                           </div>
                        </div>
                       </p>
                     </div>


                      <div class="details">
                     <h2>
                        <span class="h2 text-white">तपाई को भोट ? </span>
                     </h2>
                    </div>                 
                     <div tabindex="0" role="tabpanel" id="nils-tab" aria-labelledby="nils">
                       <p>
                        <div class="row">
                           
                           <div class="col-lg-12 small">
                             
                               <div class="card mb-3">
                                 <div class="card-header">
                                     <h4>{{$pollData['question']}}</h4>
                                 </div>
                                 @php
                                   
                                   $total_vote = $pollData->yes_vote+$pollData->no_vote+$pollData->no_comment;

                                    if($pollData->yes_vote == 0){
                                      $total_yes_per = 0;
                                    }else{
                                      $total_yes_per = ($pollData->yes_vote*100)/$total_vote;
                                      $total_yes_per = ceil($total_yes_per);
                                    }
                                 
                                    if($pollData->no_vote == 0){
                                     $total_no_per = 0;
                                     }else{
                                      $total_no_per = ($pollData->no_vote*100)/$total_vote;
                                      $total_no_per = ceil($total_no_per);
                                    }
                                  
                                  
                                   if($pollData->no_comment == 0){
                                    $total_no_cmt_per = 0;
                                    }else{
                                    $total_no_cmt_per = ($pollData->no_comment*100)/$total_vote;
                                    $total_no_cmt_per = ceil($total_no_cmt_per);
                                   }
                                  @endphp

                                  <div class="card-body">
                                    @if(session()->get('current_poll_id') == $pollData->id)
                                    <table class="table" style="width: 100%;">
                                        <tr>
                                            <th width="40%">Yes ({{$pollData['yes_vote']}})</th>
                                             <th>
                                                <div class="progress">
                                                   <div class="progress-bar bg-success" style="width:{{$total_yes_per}}%">{{$total_yes_per}}%</div>
                                                 </div>
                                             </th>
                                        </tr>

                                        <tr>
                                            <th width="40%">No ({{$pollData['no_vote']}})</th>
                                             <th>
                                                  <div class="progress">
                                                  <div class="progress-bar bg-danger" style="width:{{$total_no_per}}%">{{$total_no_per}}%</div>
                                                 </div>
                                             </th>
                                        </tr>

                                        <tr>
                                            <th width="40%">No Vote ({{$pollData['no_comment']}})</th>
                                             <th>
                                                  <div class="progress">
                                                  <div class="progress-bar bg-warning" style="width:{{$total_no_cmt_per}}%">{{$total_no_cmt_per}}%</div>
                                                 </div>
                                             </th>
                                        </tr>

                                    </table>
                                    @endif

                                    @if(session()->get('current_poll_id') != $pollData->id)
                                    <form action="{{route('poll.submit')}}" method="post">@csrf
                                        <input type="hidden" name="id" value="{{$pollData->id}}">
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="vote" id="poll_id1" value="Yes">
                                       <label class="form-check-label">
                                        <h6>Yes</h6>
                                      </label>
                                    </div>

                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="vote" id="poll_id2" value="No">
                                       <label class="form-check-label">
                                        <h6>No</h6>
                                      </label>
                                    </div>

                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" name="vote" id="poll_id3" value="No Vote">
                                       <label class="form-check-label">
                                        <h6>No Vote</h6>
                                      </label>
                                    </div>

                                    <div class="btn-group">
                                     <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                      <a href="{{route('poll.result')}}" class="btn btn-info btn-sm">Old Result</a>
                                    </div>
                                 </form>
                                 @endif
                              </div>
                            

                           </div>
                        </div>
                       </p>
                     </div>
                   
  
                     
                  
                  <!--Ads-->
                  <div class="row">
                     @foreach($detailsPageSidebar as $value)
                     @if(!empty($value->getFirstMediaUrl('image')))
                     <div class="col-lg-12 col-md-4">
                        <!--1 Ads-->
                        <div class="border card">
                           <div class="full-banner">
                              <a href="{{$value['link']}}" target="_">
                               <img src="{{ $value->getFirstMediaUrl('image','sidebar_image') }}" alt="{{$value['title']}}" width="100%">
                           </a>
                           </div>
                        </div>
                        <!--End ads-->
                     </div>
                     @endif
                     @endforeach
     
                  </div>
                  

               </div>
            </div>
        </div>
        <!--end single page-->
      </div>
   </section>
</main>

<script>
    // Save Like Or Dislike
$(document).on('click','#saveLikeDislike',function(){
    var _post=$(this).data('post');
    var _type=$(this).data('type');
    var vm=$(this);
    // Run Ajax
    $.ajax({
        url:"{{ url('save-likedislike') }}",
        type:"post",
        dataType:'json',
        data:{
            post:_post,
            type:_type,
            _token:"{{ csrf_token() }}"
        },
        beforeSend:function(){
            vm.addClass('disabled');
        },
        success:function(res){
            if(res.bool==true){
                vm.removeClass('disabled').addClass('active');
                vm.removeAttr('id');
                var _prevCount=$("."+_type+"-count").text();
                _prevCount++;
                $("."+_type+"-count").text(_prevCount);
            }
        }   
    });
});
// End
</script>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=631cb3aba6e54600124688a4&product=inline-share-buttons" async="async"></script>
@endsection