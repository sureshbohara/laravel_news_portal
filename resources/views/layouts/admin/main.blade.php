<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Taraikhabar - Admin Template">
    <meta name="author" content="Taraikhabar">
    <meta name="keyword" content="khabar,news,Taraikhabar,Dashboard">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/icon.png')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('admin/vendors/simplebar/css/simplebar.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/vendors/simplebar.css')}}">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/examples.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap-select.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/@coreui/chartjs/css/coreui-chartjs.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

  </head>
  <body>

  
    @include('layouts.admin.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
       @include('layouts.admin.header')
       @yield('content')
       @include('layouts.admin.footer')
    </div>
    
<!--validation -->
<script src="{{asset('admin/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('js/multiple_select.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="{{asset('jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('jquery-validation/additional-methods.min.js')}}"></script>

<script src="{{asset('summernote/summernote-bs4.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script src="{{asset('admin/vendors/@coreui/coreui/js/coreui.bundle.min.js')}}"></script>
<script src="{{asset('admin/vendors/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('admin/vendors/@coreui/chartjs/js/coreui-chartjs.js')}}"></script>
<script src="{{asset('admin/vendors/@coreui/utils/js/coreui-utils.js')}}"></script>
<!-- sweetalert popup box delete option select-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- data table -->
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<script src="https://use.fontawesome.com/c91ba8772f.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
     $('#myTable').DataTable();
     $('#description').summernote();
     $('#short_description').summernote();
     $('#meta_descriptions').summernote();


 });
</script>


 </body>
  @stack("scripts")
 </html>