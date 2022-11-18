<?php   
  use App\Models\Counter;
  $totalVisitors = Counter::sum('views');
 ?>

@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Dashboard
 @endsection
@section('content')


<div class="body flex-grow-1 px-3">
<div class="container-lg">
<div class="row py-2">
@if(auth()->guard('admin')->user()->role_id !='4')
<div class="col-sm-6 col-lg-3 mb-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$category}}</div>
      <div>Total Category</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!-- /.col-->
<div class="col-sm-6 col-lg-3 mb-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$news}}</div>
      <div>Total Public Post</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!-- /.col-->
<div class="col-sm-6 col-lg-3 mb-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$draft}}</div>
      <div>Draft Post</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!-- /.col-->
<div class="col-sm-6 col-lg-3 mb-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$publicAdv}} </div>
      <div>Total Advertisement</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!-- /.col-->

<!-- /.col-->
<div class="col-sm-6 col-lg-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$draftAdv}} </div>
      <div>Draft Advertisement</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!-- /.col-->

<!-- /.col-->
<div class="col-sm-6 col-lg-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$poll}} </div>
      <div>Total Poll</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!-- /.col-->

<!-- /.col-->
<div class="col-sm-6 col-lg-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$blogPost}} </div>
      <div>Total Blog Post</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!-- /.col-->

<!-- /.col-->
<div class="col-sm-6 col-lg-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$pages}} </div>
      <div>Total CMS Page</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>
<!-- /.col-->
</div>

    

<div class="card mb-4">
  <div class="row">

   <div class="col-md-6">
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

   <div class="col-md-6">
    <div class="card-body">
     @include('admin.chart.news_type_count')
  </div>

   <div class="card-body">
     @include('admin.chart.tags')
   </div>
  </div>

</div>

<div class="card-footer">
  <div class="row row-cols-1 row-cols-md-5 text-center">
    <div class="col mb-sm-2 mb-0">
      <div class="text-medium-emphasis">User Traffic</div>
      <div class="fw-semibold"> View ({{$totalVisitors}})</div>
      <div class="progress progress-thin mt-2">
        <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>

    <div class="col mb-sm-2 mb-0">
      <div class="text-medium-emphasis">No.of Post In this Month</div>
      <div class="fw-semibold">  ({{$numberOfPostMonth}})</div>
      <div class="progress progress-thin mt-2">
        <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>



  </div>
</div>
</div>
 
@else
<div class="col-sm-6 col-lg-6 mb-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$count}}</div>
      <div>News Post by you</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>

<div class="col-sm-6 col-lg-6 mb-3">
  <div class="card">
    <div class="card-body">
      <div class="fs-4 fw-semibold">{{$count_post}}</div>
      <div>No.of Post In this Month</div>
      <div class="progress progress-thin my-2">
        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="card">
  <div class="card-body">

   <table class="table table-bordered" id="myTable">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Category</th>
          <th>Title</th>
          <th>News Speciality</th>
          <th>Feature Image</th>
        </tr>
      </thead>

      <tbody>
        @foreach($myPost as $key => $value)
        <tr>
          <td>{{$value['id']}}</td>
          <td>{{$value['category']['name']}}</td>
          <td>{{$value['title']}}</td>
          <td>{{ $value['news_type'] }}</td>
          <td>
               @if(!empty($value['feature_image']))
                <img src="{{URL::to('images/news/small/',$value['feature_image'])}}" width="50px;" height="50px;">
                @else
                <img src="{{asset('images/default.jpg')}}" width="50px;" height="50px;">
                @endif
          </td>

        </tr>
        @endforeach
      </tbody>
   </table>

</div>
</div>
</div>

@endif

<!-- /.row-->
</div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 
@endsection