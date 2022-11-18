@extends('layouts.front.main')
 @section('title')
    Taraikhabar || Poll Resutl
 @endsection
@section('content')
 <main> 
   <section id="category">
    <div class="container">
     <div class="card text-center">
        <div class="card-header heading">
            <h2 class="main">
                <p>Poll Result</p>
            </h2>
      </div>
    </div>

    <div class="container py-4">
      <div class="card">
        @foreach($poll_data as $value)
         @if($loop->iteration == 1)
           @continue
         @endif

         @php
           $total_vote = $value->yes_vote+$value->no_vote+$value->no_comment;

            if($value->yes_vote == 0){
              $total_yes_per = 0;
            }else{
              $total_yes_per = ($value->yes_vote*100)/$total_vote;
              $total_yes_per = ceil($total_yes_per);
            }
         
            if($value->no_vote == 0){
             $total_no_per = 0;
             }else{
              $total_no_per = ($value->no_vote*100)/$total_vote;
              $total_no_per = ceil($total_no_per);
            }
          
          
           if($value->no_comment == 0){
            $total_no_cmt_per = 0;
            }else{
            $total_no_cmt_per = ($value->no_comment*100)/$total_vote;
            $total_no_cmt_per = ceil($total_no_cmt_per);
           }

         @endphp
        <div class="card-header">
            <h4>{{$value['question']}}</h4>
            @php
             $ts = strtotime($value->created_at);
             $updated_date = date('d F , Y',$ts)
            @endphp
            <h4>Poll Date : {{ $updated_date }}
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <span style="color: red;"> Total Votes : ({{$total_vote}})</span></h4>
              <table class="table" width="100%">
                <tr>
                    <th width="30%">Yes ({{$value->yes_vote}})</th>
                    <th>
                        <div class="progress">
                           <div class="progress-bar bg-success" style="width:{{$total_yes_per}}%">{{$total_yes_per}}%</div>
                         </div>
                    </th>
                </tr>

                <tr>
                    <th width="30%">No ({{$value->no_vote}})</th>
                    <th>
                        <div class="progress">
                           <div class="progress-bar bg-danger" style="width:{{$total_no_per}}%">{{$total_no_per}}%</div>
                        </div>
                    </th>
                </tr>

                <tr>
                    <th width="30%">No Vote ({{$value->no_comment}})</th>
                    <th>
                        <div class="progress">
                           <div class="progress-bar bg-warning" style="width:{{$total_no_cmt_per}}%">{{$total_no_cmt_per}}%</div>
                        </div>
                    </th>
                </tr>

            </table>
        </div>
       <br>
        @endforeach
      </div>
    </div>


</div>
</section>
</main>

@endsection