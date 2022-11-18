<!--Pradesh News-->
<section id="tabbs">
<div class="container">
<div class="main">

<div id="myBtnContainer">
<button class="btn active" onclick="filterSelection('all')">प्रदेश समाचार</button>
<button class="btn" onclick="filterSelection('tab1')"> प्रदेश १</button>
<button class="btn" onclick="filterSelection('tab2')"> मधेस प्रदेश</button>
<button class="btn" onclick="filterSelection('tab3')"> बागमती</button>
<button class="btn" onclick="filterSelection('tab4')"> गण्डकी</button>
<button class="btn" onclick="filterSelection('tab5')">लुम्बिनी</button>
<button class="btn" onclick="filterSelection('tab6')"> कर्णाली</button>
<button class="btn" onclick="filterSelection('tab7')"> प्सुदुरपश्चिम</button>
</div>

<!-- Portfolio Gallery Grid -->
<div class="row">

@foreach($pardesh1Section as $value)
<div class="column tab1">
    <div class="content">
        <a href="{{ url('news/'.$value['id']) }}">
         <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" style="width:100%">
        <h4>{{Str::limit($value['title'],60)}}</h4>
      </a>
    </div>
</div>
@endforeach


@foreach($pardesh2Section as $value)
<div class="column tab2">
    <div class="content">
        <a href="{{ url('news/'.$value['id']) }}">
         <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" style="width:100%">
        <h4>{{Str::limit($value['title'],60)}}</h4>
    </a>
    </div>
</div>
@endforeach

@foreach($pardesh3Section as $value)
<div class="column tab3">
    <div class="content">
        <a href="{{ url('news/'.$value['id']) }}">
         <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" style="width:100%">
        <h4>{{Str::limit($value['title'],60)}}</h4>
    </a>
    </div>
</div>
@endforeach

@foreach($pardesh4Section as $value)
<div class="column tab4">
    <div class="content">
        <a href="{{ url('news/'.$value['id']) }}">
         <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" style="width:100%">
        <h4>{{Str::limit($value['title'],60)}}</h4>
    </a>
    </div>
</div>
@endforeach

@foreach($pardesh5Section as $value)
<div class="column tab5">
    <div class="content">
        <a href="{{ url('news/'.$value['id']) }}">
         <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" style="width:100%">
        <h4>{{Str::limit($value['title'],60)}}</h4>
    </a>
    </div>
</div>
@endforeach

@foreach($pardesh6Section as $value)
<div class="column tab6">
    <div class="content">
        <a href="{{ url('news/'.$value['id']) }}">
         <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" style="width:100%">
        <h4>{{Str::limit($value['title'],60)}}</h4>
    </a>
    </div>
</div>
@endforeach

@foreach($pardesh7Section as $value)
<div class="column tab7">
    <div class="content">
        <a href="{{ url('news/'.$value['id']) }}">
         <img src="{{url('images/news/small/',$value['feature_image']) }}" alt="{{$value['title']}}" style="width:100%">
        <h4>{{Str::limit($value['title'],60)}}</h4>
    </a>
    </div>
</div>
@endforeach

</div>

<!-- END MAIN -->
</div>
</div>
</section>
<!--end Pradesh News-->