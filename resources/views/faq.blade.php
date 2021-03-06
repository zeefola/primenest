@extends("layouts.frontend")

@section("breadcrumb")
  @includeIf("layouts.breadcrumb" , [ "title" => "Help Center" , "subtitle" => "Help Center" ] )
@endsection

@section("main_content")
    <!-- faq area start -->
    <div class="faq-area pd-top-100 pd-bottom-100">
        <div class="container" itemscope itemtype="https://schema.org/FAQPage">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="section-title">
                        <h2 class="title" >Frequently <br>asked questions</h2>
                        <span itemprop="text"  style="display: none">Check out some of the frequently asked questions</span>
                    </div>
                    <div class="accordion" id="accordion" >
                    @foreach($datas as $data)
                        <!-- single accordion -->
                        <div class="single-accordion card" itemprop="mainEntity"  itemscope itemtype="https://schema.org/Question">
                            <div class="card-header" id="heading{{ $loop->iteration}}">
                                <h2 class="mb-0">
                                    <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapseOne"> <span itemprop="name"> {{ $data->question}} </span> </button>
                                </h2>
                            </div>
                            <div id="collapse{{ $loop->iteration }}" class="collapse" aria-labelledby="headingFour" data-parent="#accordion" >
                                <div class="card-body"  itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                    <span itemprop="text">{{ $data->answer }} </span>
                                </div>
                            </div>
                        </div>
                        <!-- single accordion end -->
                    @endforeach
                    </div>

                    
                </div>
                <div class="col-xl-5 col-lg-6 offset-xl-1">
                    <div class="shape-image-list-wrap">
                        <div class="shape-image-list left-top">
                            <img src="/assets/img/faq1.png" alt="frequently asked questions" title="primenest frequently asked questions">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq area End -->
@endsection