@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Reporter
 @endsection
@section('content')


   <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-12">
              <div class="card mb-4">

                <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                      <strong>Reporter / List Reporter</strong>
                  </div>
    
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered">
                      <thead class="table-dark">
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile No.</th>
                          <th>Address</th>
                          <th>Joining Date</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($reporter as $value)
                        <tr>
                          <td>{{$value['id']}}</td>
                          <td>{{$value['name']}}</td>
                          <td>{{$value['email']}}</td>
                          <td>{{$value['mobile']}}</td>
                          <td>{{$value['address']}}</td>
                          <td>{{$value['join_date']}}</td>

                        </tr>
                        @endforeach
                      </tbody>
                   </table>

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

@endsection