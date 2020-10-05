@extends("layouts.frontend")


@section("breadcrumb")
  @includeIf("layouts.breadcrumb" , [ "title" => "Application" , "subtitle" => "Application Form" ] )
@endsection

@section("main_content")
      <!-- contact area start -->
      <div class="register-page-area pd-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-10 mb-5 mb-md-0">
                    <form class="contact-form-wrap contact-form-bg" method="post" action="/application">
                    {{ csrf_field() }}
                        <h4>Application Form</h4>
                        @includeIf('layouts.error_template')
                        <div class="rld-single-input">
                            <input type="text" placeholder="Surname" name="surname">
                        </div>
                        <div class="rld-single-input">
                            <input type="text" placeholder="Other Names" name="other_name">
                        </div>
                        <div class="rld-single-input">
                            <input type="text" placeholder="Phone Number" name="phone">
                        </div>
                        <div class="rld-single-select">
                           
                            <select class="select single-select" name="property_type">
                                  <option value=""> Property Type </option>
                                <option value="2 bedroom">2 Bedroom</option>
                                <option value="3 bedroom">3 Bedroom</option>
                            </select>
                        </div>

                        <div class="rld-single-select">
                            
                            <select class="select single-select" name="payment_option">
                                <option value= "">Payment Option </option>
                                <option value="outright">Outright</option>
                                <option value="mortgage">Mortgage</option>
                                <option value="instalment">Instalment</option>
                            </select>
                        </div>

                        <div class="rld-single-select">
                            <select class="select single-select" name="location">
                              <option> Preferred Location </option>
                              <option value="ibadan">Ibadan</option>
                              <option value="ifo ogun state">Ifo Ogun State</option>
                              <option value="waterman ogun state">Waterman Ogun State</option>
                              <option value="iseyin oyo state">Iseyin Oyo State</option>
                          </select>
                        </div>
                        <div class="form-control">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display( ) !!}
                        </div>
                            
                        <div class="btn-wrap">
                            <button class="btn btn-yellow"> APPLY </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area End -->
@endsection