@extends('layouts.frontmaster')
@section('content')
    <section class="directory-slide-carousel ads">
    <!--Start Background Slider-->
    <div class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <!--Start Slide Item-->
            
                @foreach(App\Slider::all() as $slider)
                    @if($slider->id==App\Slider::all()->first()->id)
                        <div class="item active" style="background-image: url({{asset("assets/images/slider/$slider->image")}});">
                            <div class="slide-carousel-overlay"></div>
                        </div>
                    @else
                        <div class="item" style="background-image: url({{asset("assets/images/slider/$slider->image")}})">
                            <div class="slide-carousel-overlay"></div>
                        </div>
                    @endif
                @endforeach
           
            
            <!--End Slide Item-->
        </div>
    </div>
    <!--End Background Slider-->

    <!--Start Directory Search Form-->
    <div class="carousel-search-form">
        <!--Start Directory Search Content-->
        <div class="carousel-search-form-content">
            @php $t = App\SliderText::all()->first() @endphp
            <h2 class="text-center text-bold animated rotateIn">{{$t->text_1}}</h2>
            <h3 class="text-center animated rotateIn">{{$t->text_2}}</h3>
        </div>
        <!--End Directory Search Content-->

        <!--Start Search Filter-->
        <div class="row">
                <div class="col-md-4 col-md-offset-4 input-box-size">
                    <form action="{{route('recharge.request')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control input-lg input-number-box" id="phone" name="cell_number" type="text">
                                <input type="hidden" id="country_dial_code" name="country_dial_code">
                                <button type="submit" class="btn btn-success recharege-request-button" id="submit-recharege-request"> View Price   <i class="fa fa-check-square"></i> </button>
                            </div>
                     
                    </form>
             
            </div>
        </div>
        <!--End Search Filter-->
    </div>
    <!--End Directory Search Form-->
</section>
<!--End Search Directory Section-->

<!--Start Ads Category Section-->
<section class="ads-category">
    <!--Start container-->
    <div class="container">
        <!--Start Section Title-->
        <div class="section-title">
            <h2 class="text-center text-bold">Mobile <span>Operator</span></h2>
            <p class="text-center">Supported operators in <span isolate="" id="operator_contry"></span></p>
        </div>
        <!--End Section Title-->

        <!--Start Category Item Row-->
        <div class="row">
            <!--Start Category Item Col-->
            <!--Start Rechare Section-->
            <div class="divider-div">
                <div class="container">
                    <div class="operator-list-country ">
                        <div id="operatorlist" notranslate="">
                            <div class="main-content">
                                <div class="category-item-container" id="operator_list">
                                </div>
                            </div>
                        </div>
                        <div class="missing-operator">
                            <h4>Missing an operator?</h4>
                            <p>Sign up to request an operator and we'll notify you when they get added!</p>
                            <a class="btn btn-danger btn-sm notify-me" href="{{route('contact.us')}}" target="_blank" style="font-weight:bold; text-decoration:none;color:#fff;cursor:pointer;">Request operator support</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Rechare Section-->
            <!--End Category Item Col-->
        </div>
        <!--End Category Item Row-->
    </div>
    <!--End container-->
</section>
<!--End Ads Category Section-->

<!--Start Featured Ads Section-->
<section class="ads-featured">
    <!--Start container-->
    <div class="container">
        <!--Start Section Title-->
        <div class="section-title">
            <h2 class="text-center text-bold"><span>Recharge</span> Step</h2>
            <p class="text-center">How to recharge from our site to use <i class="fa fa-btc"></i> bitcoin currency</p>
        </div>
        <!--End Section Title-->

        <!--Start Featured Item Row-->
        <div class="row">
            <!--Start Featured Item Col-->
            @php $i=1 @endphp
            @foreach (App\RechargeStep::orderBy('order','asc')->whereStatus(0)->get() as $step)
                <div class="col-md-3 col-sm-6">
                    <!--Start Featured Item-->
                    <div class="feat-ads-item">
                        <div class="feat-ads-img">
                            <div class="feat-ads-rating">
                                <span> <h4> 
                                        Step {{$i++}}</span></h4>
                            </div>

                            <div style="font-size: 30pt; margin-bottom: 10px" class="midle-icon">
                                <i class="fa fa-{{$step->icon}} how-to-use-icon"></i>
                            </div>

                        </div>

                        <div class="feat-ads-cont text-center">
                            <h3><a href="" style="text-decoration: none; cursor: default;">{{$step->name}}</a></h3>
                            <p></i> {!!$step->content!!}</p>
                        </div>
                    </div>
                    <!--End Featured Item-->
                </div>
             @endforeach
         <!--End Featured Item Col-->
        </div>
   
    <!--End Featured Item Row-->
    </div>
    <!--End container-->
</section>
<!--Start Latest News Section-->
<section class="ads latest-news">
    <!--Start container-->
    <div class="container">
        <!--Start Section Title-->
        <div class="section-title">
            <h2 class="text-center text-bold">Frequently <span>asked questions </span></h2>
            <p class="text-center">Select media for your query</p>
        </div>
        <!--End Section Title-->

        <!--Start Latest News Row-->
        <div class="row">
            <!--Start News Item Col-->
            <div class="col-md-6">
                <div class="faq-vedio">
                    <h4 class="text-center">Video instructions</h4>
                    <iframe width="520" height="255" src="{{$general_settings->vedio_link}}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="faq-question">
                    <h3 class="text-center">Questions & Answer</h3>
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        @foreach(App\Faq::whereStatus(0)->get() as $faq)
                            <div class="panel">
                                <div class="panel-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                            <i class="fa fa-plus"></i>  {{ $faq->title }}
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapse{{$faq->id}}" class="collapse" role="tabpane{{$faq->id}}" aria-labelledby="heading{{$faq->id}}">
                                    <div class="card-block">
                                        {{ $faq->description }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--End News Item Col-->
        </div>
        <!--End Latest News Row-->
    </div>
    <!--End container-->
</section>
<!--End Latest News Section-->
    @include('recharge.script')
@endsection