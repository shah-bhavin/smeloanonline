<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
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
                <a class="nav-link" href="javascript:void(0)">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link apply-button" href="javascript:void(0)">Apply</a>
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
            <p>Unlock the potential of your small or medium enterprise with our hassle-free online SME loans! Enjoy quick approvals, competitive rates, and personalized support, all from the comfort of your home.</p>
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
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">LOAN</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">SUBSIDY</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">BOTH</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active pt-5 pb-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    
                    <div class="col-md-4 home-products-card">
                        
                    </div>
                    
                    

                </div>
            </div>
            <div class="tab-pane fade pt-5 pb-5" id="profile" role="tabpanel" aria-labelledby="profile-tab"> 
            </div>
            <div class="tab-pane fade pt-5 pb-5" id="contact" role="tabpanel" aria-labelledby="contact-tab"> 
            </div>
        </div>
    </div>
</div>   
    

</body>
</html>