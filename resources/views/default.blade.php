<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>

    <nav class="navbar navbar-expand-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)"><img src="{{ asset('img/logo.png') }}" alt="SME Loan Online" class="site-logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="javascript:void(0)">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="javascript:void(0)">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="javascript:void(0)">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="javascript:void(0)">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase apply-button" href="javascript:void(0)">Apply</a>
                </li>
            </ul>
            <!-- <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form> -->
            </div>
        </div>
    </nav>

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

    <div class="container-fluid light-brown-background pt-5 pb-5">
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
    </div>   

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
</body>
</html>

<script type="text/javascript">
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
</script>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="modelHeading"></h4>
                <button type="button" class="btn btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                    <input type="hidden" name="application_id" id="application_id">
                    <input type="hidden" name="product_type" id="product_type">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" id="name" />
                        <span class="text-danger err name_err"></span> 
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input value="{{ old('mobile') }}" type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="Mobile" name="mobile" id="mobile" />
                        <span class="text-danger err mobile_err"></span>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input value="{{ old('city') }}" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" name="city" id="city" />
                        <span class="text-danger err city_err"></span>
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">Loan Time</label>
                        <input value="{{ old('loan_time') }}" type="text" class="form-control @error('loan_time') is-invalid @enderror" placeholder="Loan Time" name="loan_time" id="loan_time" />
                        <span class="text-danger err loan_time_err"></span>
                    </div>

                    <button type="submit" class="button float-end" id="saveBtn" value="create">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>