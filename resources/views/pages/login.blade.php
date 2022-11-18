<?php 
   use App\Models\Setting;
   use App\Models\Comment;
   $setting = App\Models\Setting::find(1);
   $userCommentPost = Comment::userCommentPost();
  ?>
@extends('layouts.front.main')
@section('meta')
<meta name="title" content="{{ $setting->meta_title }}">
<meta name="keywords" content="{{ $setting->meta_keywords }}">
<meta name="description" content="{{ $setting->meta_description }}">
@endsection
@section('title')
Taraikhabar || Login
@endsection
@section('content')

<section id="category">
   <div class="container">
      <div class="card text-center">
         <div class="card-header heading">
            <h2 class="main">
               @if(!empty(Auth::check()))
               <p>User Dashboard</p>
               @else
                <p>User Loign</p>
               @endif
            </h2>
         </div>
      </div>
      @if(!empty(Auth::check()))
      <div class="row">
        <div class="col-md-2 mb-3 bg-info py-4">
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('signout')}}">Logout</a>
            </li>
          </ul>  
        </div>
          <div class="col-md-10">
           <div class="tab-content" id="myTabContent">

             <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Post</th>
                    <th>Comment</th>
                    <th>Action</th>
                  </tr>
                </thead>

                 <tbody>
                   @foreach($userCommentPost as $post)
                   <tr>
                     <td>{{$post['id']}}</td>
                     <td>{{$post['news']['title']}}</td>
                     <td>{{$post['comment_body']}}</td>
                     <td>
                       <a href="{{route('comment.delete',$post['id'])}}">
                         <span style="color:red">Delete</span>
                       </a>
                     </td>
                   </tr>
                   @endforeach
                 </tbody>
              </table>
            </div>

             <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <h2>Profile</h2>
              <form action="">
                 

                <div class="form-group col-md-4">
                  <label for="">Email</label>
                  <input type="email" name="email" class="form-control" readonly>
                </div>

                <div class="form-group col-md-4">
                  <label for="">Full Name</label>
                  <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group col-md-4">
                <button type="submit" class="btn btn-info">Update</button>
                </div>

              </form>
            </div>

          </div>
        </div>
        <!-- /.col-md-8 -->
      </div>
  
      @else
      <div class="row single">

         <div class="col-md-6"> 
          <h2>Login</h2>
              <form action="{{route('user.login')}}" method="post" class="was-validated">@csrf
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>

                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
         </div>

          <div class="col-md-6">
            <h2>Register</h2>
              <form action="{{route('user.register')}}" method="post" class="was-validated">@csrf
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                  </div>

                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                  </div>

                  <button type="submit" class="btn btn-primary">Register</button>
                </form>
         </div>

      </div>
      @endif
   </div>
</section>

@endsection