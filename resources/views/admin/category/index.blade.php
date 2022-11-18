@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || List Category
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
                      <strong>Category / List Category</strong>
                  </div>
                   @isset(auth()->guard('admin')->user()->role->permission['permission']['category']['add'])
                  <div class="col-md-6">
                     <a href="{{route('category.create')}}" class="btn btn-danger text-info" style="float: right;">
                     Category Create
                    </a>
                
                  </div>
                  @endisset
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered" id="myTable">
                      <thead class="table-dark">
                        <tr>
                          <!-- <th>Icon</th> -->
                          <th>Category Name</th>
                          <th>Parent Category</th>
                          <th>Order Level</th>
                          <th>Level</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($categories as $key => $value)
                        <tr>
                            <!-- <td><img src="{{ $value->getFirstMediaUrl('icon','thumb') }}" alt="{{$value['name']}}"></td> -->
                          <td>{{$value['name']}}</td>
                          <td>
                            @php
                                $parent = \App\Models\Category::where('id', $value->parent_id)->first();
                            @endphp
                            @if ($parent != null)
                                {{ $parent['name'] }}
                            @else
                                —
                            @endif
                          </td>
                          <td>{{ $value['order_level'] }}</td>
                          <td>{{ $value['level'] }}</td>


                          <td>
                             <form id="status{{ $value['id'] }}"
                              action="{{ route('category.status') }}" method="post">
                              @csrf
                              <input type="hidden" value="{{ $value['id'] }}" name="category_id">
                              <div id="checkbox{{ $value['id'] }}">
                                <input type="checkbox" {{ $value['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
                              </div>
                           </form>
                          </td>

                          <td class="d-flex">
                             @isset(auth()->guard('admin')->user()->role->permission['permission']['category']['edit'])
                             <a  href="{{ route('category.edit', $value['id']) }}" title="Data Change" class="btn btn-warning btn-xs">
                                <i class="fa fa-edit"></i>
                             </a>
                             @endisset

                              <!-- category data delete for category by post delete //count data available -->
                                @php
                                  $countPost = App\Models\NewsCategory::where('category_id',$value->id)->count();
                                @endphp 
                             
                              @isset(auth()->guard('admin')->user()->role->permission['permission']['category']['delete'])
                              @if($countPost>1)
                              <form action="{{ route('category.destroy', $value['id']) }}" method="post">@csrf
                              @method('DELETE')
                              <input name="_method" type="hidden" value="DELETE">
                              <button  type="submit" title="delete data" class="btn btn-danger btn-xs show_confirm">
                                  <i class="fa fa-trash"></i>
                              </button>
                             </form>  
                             @endif

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
        var datas = {!! json_encode($categories) !!};
         datas.forEach(test => {
            $("#checkbox" + test["id"]).click(function() {
                document.getElementById("status" + test["id"]).submit();
            });
        });
    });
</script>


@endpush

@endsection