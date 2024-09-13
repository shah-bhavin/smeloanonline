<nav class="navbar navbar-expand-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)"><img src="{{ asset('img/logo.png') }}" alt="SME Loan Online" class="site-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="{{URL::to('/');}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="javascript:void(0)">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="javascript:void(0)">Products</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    LOAN
                </a>
                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    @foreach($loans as $loan)
                        <li><a class="dropdown-item" href="/loan/{{ str_replace(' ', '-', strtolower($loan->product_name)) }}">{{ $loan->product_name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    SUBSIDY
                </a>
                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    @foreach($subsidies as $subsidy)
                        <li><a class="dropdown-item" href="/subsidy/{{ str_replace(' ', '-', strtolower($subsidy->product_name)) }}">{{ $subsidy->product_name }}</a></li>
                    @endforeach
                </ul>
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

<style>
    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>