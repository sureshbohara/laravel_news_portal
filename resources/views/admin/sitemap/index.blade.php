@extends('layouts.admin.main')
 @section('title')
   Taraikhabar || Sitemap
 @endsection
@section('content')


   <div class="body flex-grow-1 py-4">
        <div class="container-lg">

          <div class="row">

            <div class="col-6">
              <div class="card mb-4">

                <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                      <strong>Sitemap / List</strong>
                  </div>
                  </div>
                 </div>
                

                <div class="card-body">

                   <table class="table table-bordered">
                      <thead class="table-dark">
                        <tr>
                          
                          <th>File Name</th>
                          <th>URL</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($sitemaps as $value)
                        <tr>
                          
                          <td>{{$value['filename']}}</td>
                          <td>{{$value['sitemap_url']}}</td>

          

                          <td class="d-flex">


                            <form class="d-inline-block" action="{{route('download.sitemap', $value['id'])}}" method="post">
                               @csrf
                               <input type="hidden" name="filename" value="{{$value['filename']}}">
                               <button type="submit" class="btn btn-info btn-sm" title="download data">
                                  <i class="fa fa-cloud-download" aria-hidden="true"></i>
                              </button>
                             </form>
        
                            
                              <form action="{{ route('sitemap.destroy', $value['id']) }}" method="post">@csrf
                              @method('DELETE')
                              <input name="_method" type="hidden" value="DELETE">
                              <button  type="submit" title="delete data" class="btn btn-danger btn-xs show_confirm">
                                  <i class="fa fa-trash"></i>
                              </button>
                             </form> 
                             
                          
                          </td>

                        </tr>


                        @endforeach
                      </tbody>
                   </table>

                </div>
              </div>
            </div>

               <div class="col-6">
                <div class="card mb-4">
                  <div class="card-header">
                   <div class="row">
                    <div class="col-md-6">
                        <strong>Sitemap / Create Sitemap</strong>
                     </div>
                   </div>
                  </div>
                

                 <div class="card-body">
                   <div class="example">
                     <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active">

                        <form action="{{route('sitemap.store')}}" method="post" id="createSitemap" enctype="multipart/form-data">
                          @csrf
                      
                        <div class="row">

                          <input type="hidden" name="filename">
                         <div class="mb-3 col-md-12">
                          <label class="form-label">Sitemap url</label>
                          <input type="text" name="sitemap_url" id="sitemap_url" class="form-control" placeholder="/about-us">
                        </div>


                        

                         <div class="col-12">
                          <button class="btn btn-primary" type="submit">Create Sitemaps</button>
                        </div>
                        </div>
                      </form>
  
                      </div>
                     </div>
                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>

@endsection