@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || List News
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
                      <strong>News / Your Post </strong>
                  </div>
                   @isset(auth()->guard('admin')->user()->role->permission['permission']['news']['add'])
                  <div class="col-md-6">
                     <a href="{{route('news.create')}}" class="btn btn-danger text-info" style="float: right;">
                     News Create
                    </a>
                
                  </div>
                  @endisset
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered" id="myTable">
                      <thead class="table-dark">
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Feature Image</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($news as $key => $value)
                        <tr>
                          <td>{{$value['id']}}</td>
                          <td>{{$value['title']}}</td>
                          <td>
                              
                            <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['name']}}" width="50" height="50">
                          </td>

                      


                          <td>
                             <form id="status{{ $value['id'] }}"
                              action="{{ route('news.status') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $value['id'] }}" name="news_id">
                              <div id="checkbox{{ $value['id'] }}">
                                <input type="checkbox" {{ $value['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                              </div>
                           </form>
                          </td>

                          <td class="d-flex">
                             @isset(auth()->guard('admin')->user()->role->permission['permission']['news']['edit'])
                             <a  href="{{ route('news.edit', $value['id']) }}" title="Data Change" class="btn btn-warning btn-xs">
                                <i class="fa fa-edit"></i>
                             </a>
                             @endisset
                              @isset(auth()->guard('admin')->user()->role->permission['permission']['news']['delete'])
                              <form action="{{ route('news.destroy', $value['id']) }}" method="post">@csrf
                              @method('DELETE')
                              <input name="_method" type="hidden" value="DELETE">
                              <button  type="submit" title="delete data" class="btn btn-danger btn-xs show_confirm">
                                  <i class="fa fa-trash"></i>
                              </button>
                             </form>  
                             @endisset
                          
                          </td>

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

      @push("scripts")

<!-- category status -->
<script>
    $(document).ready(function() {
        var datas = {!! json_encode($news) !!};
         datas.forEach(test => {
            $("#checkbox" + test["id"]).click(function() {
                document.getElementById("status" + test["id"]).submit();
            });
        });
    });
</script>


@endpush

@endsection