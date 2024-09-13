@extends('layouts.frontend')
@section('content')    

    <div class="container pt-5 pb-5">
        <div class="row align-items-center">
            <div class="col-md-6 animate__animated animate__fadeInLeft">
                <h1 class="h1">Get SME Loan Online</h1>
                <p class="text-justify">Unlock the potential of your small or medium enterprise with our hassle-free online SME loans! Enjoy quick approvals, competitive rates, and personalized support, all from the comfort of your home.</p>
                <a name="apply-button" id="" class="btn btn-lg apply-button" href="#" role="button" >Apply Now</a>                
            </div>
            <div class="col-md-6  animate__animated animate__fadeInRight">
                <img src="{{asset('img/home.png')}}" alt="SME Loan Online" class="home-img img-fluid">
            </div>
        </div>
    </div>

    <!-- <div class="container-fluid light-brown-background pt-5 pb-5">
        <div class="container pt-5 pb-5">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab-title active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">SUBSIDY</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab-title" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">LOAN</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link tab-title" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">BOTH</button>
                </li>
            </ul>
        
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active pt-5 pb-5 gx-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container mb-3">
                        <div class="row">
                            @foreach($subsidies as $subsidy)
                                <div class="col-md-4 p-3">
                                    <a href="javascript:void(0)" class="showProductInqueryForm text-reset" data-name="{{ $subsidy->product_name }}"  data-type="{{ $subsidy->product_type }}" data-id="{{ $subsidy->id }}">
                                        <div class="row p-3 m-0 home-product text-center">
                                            <div><i class="fas fa-hand-holding-usd home-products-icon mb-3"></i></div>                                        
                                            <p class="text-center home-product-shortname text-uppercase">{{ $subsidy->product_shortname }}</p>
                                            <p class="text-center home-product-name text-uppercase">{{ $subsidy->product_name }}</p>
                                            <p class="text-justify home-product-desc">{{ @$subsidy->product_desc }}</p>
                                        </div>
                                    </a>                        
                                </div>
                            @endforeach
                        </div>
                    </div>               
                </div>
                <div class="tab-pane fade pt-5 pb-5" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
                    <div class="container mb-3">
                        <div class="row">
                            @foreach($loans as $loan)
                                <div class="col-md-4 p-3">
                                    <a href="javascript:void(0)" class="showProductInqueryForm text-reset" data-name="{{ $loan->product_name }}"  data-type="{{ $loan->product_type }}" data-id="{{ $loan->id }}">
                                        <div class="row p-3 m-0 home-product text-center">
                                            <div><i class="fas fa-piggy-bank home-products-icon mb-3"></i></div>
                                            <p class="text-center home-product-shortname text-uppercase">{{ $loan->product_shortname }}</p>
                                            <p class="text-center home-product-name text-uppercase">{{ $loan->product_name }}</p>
                                            <p class="text-justify home-product-desc">{{ @$loan->product_desc }}</p>
                                        </div>
                                    </a>                        
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade pt-5 pb-5" id="contact" role="tabpanel" aria-labelledby="contact-tab"> 
                </div>
            </div>
        </div>
    </div>    -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5 pb-5">
                    <h5>About Us</h5>
                    <p>Unlock the potential of your small or medium enterprise with our hassle-free online SME loans! Enjoy quick approvals, competitive rates, and personalized support, all from the comfort of your home.</p>
                </div>

                <div class="col-md-4 pt-5 pb-5">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                    <li><a href="#" class="text-uppercase">Home</a></li>
                    <li><a href="#" class="text-uppercase">About Us</a></li>
                    <li><a href="#" class="text-uppercase">Products</a></li>
                    <li><a href="#" class="text-uppercase">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5 pb-5">
                    <h5>Contact Us</h5>
                    <p>
                    E-401, Sumel Business Park-7,<br>
                    Soni ni Chali BRTS,<br>
                    Odhav, Ahmedabad- 382415.<br>
                    <a href="mailto:help@financefactory.co.in">help@financefactory.co.in</a><br>
                    <a href="tel:917574002255">+91 75740 02255</a>
                    </p>
                </div>

                
            </div>
        </div>
    </footer>


<!-- <script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.showProductInqueryForm').click(function () {
            var product_id = $(this).data('id');
            var product_type = $(this).data('type');
            var product_name = $(this).data('name');
            $('#productForm #product_id').val(product_id);
            $('#productForm #product_type').val(product_type);
            $('#productForm').trigger("reset");
            $('#modelHeading').html(product_name);
            $('#ajaxModel').modal('show');
            $(step[0]).find("input[type=text]").focus();
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
            $('.err').html('');
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('save.application') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if($.isEmptyObject(data.error)){
                        $('#applicationForm').trigger("reset");
                        $('#saveBtn').html('Save Changes');
                        $('#ajaxModel').modal('hide');
                    } else{
                        $('#saveBtn').html('Save Changes');
                        printErrorMsg(data.error);
                    }
                },
                error: function (data) {
                    //console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
    });

    function printErrorMsg (msg) {
        $.each( msg, function( key, value ) {
                console.log(key);
                $('.'+key+'_err').text(value);
            });
    }
</script> -->

<div class="modal bottom-modal animate__animated animate__fadeInUp" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="modelHeading"></h4>
                <button type="button" class="btn btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
                </div>
                <div id="qbox-container">
                    <div class="row">
                        <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <form class="needs-validation text-center" id="form-wrapper" method="post" name="form-wrapper" novalidate="">
                                    <div id="steps-container">
                                        
                                        <div class="step" id="step">
                                            <label class="form-label pb-1">Cost of machine with GST???</label> 
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                                <input type="text" class="form-control required" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="validation-error d-none">Please Enter Valid Data</div>
                                        </div>

                                        <div class="step" id="step">                                                                                        
                                            <label class="form-label">Have you used such machine before???</label> 
                                            <div class="d-flex justify-content-evenly">
                                                <div class="form-check">
                                                    <input class="form-check-input required" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label float-start" for="flexRadioDefault1">
                                                        &nbsp;Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input required" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                    <label class="form-check-label float-start" for="flexRadioDefault2">
                                                    &nbsp;No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="step">
                                            <label class="form-label">When will machine be ready for delivery</label> 
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                                <input type="text" class="form-control required" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="validation-error d-none">Please Enter Valid Data</div>
                                        </div>

                                        <div class="step">
                                            <label class="form-label">Your Name</label> 
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                                <input type="text" class="form-control required" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="validation-error d-none">Please Enter Valid Data</div>
                                        </div> 
                                        
                                        <div class="step">
                                            <label class="form-label">Your Mobile Number</label> 
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                                <input type="text" class="form-control required" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="validation-error d-none">Please Enter Valid Data</div>
                                        </div>
                                        
                                        <div id="success">
                                            <div class="mt-5">
                                            <h4>Success! We'll get back to you ASAP!</h4>
                                            <p>Meanwhile, clean your hands often, use soap and water, or an alcohol-based hand rub, maintain a safe distance from anyone who is coughing or sneezing and always wear a mask when physical distancing is not possible.</p>
                                            <a class="back-link" href="">Go back from the beginning ➜</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="q-box__buttons">
                                        <button id="prev-btn" type="button" class="button" style="bottom:0px !important;">Previous</button> 
                                        <button id="next-btn" type="button" class="button">Next</button> 
                                        <button id="submit-btn" type="submit" class="button">Submit</button>
                                    </div>
                                </form>
                            </div>
                        <div class="col-md-4"></div>                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
