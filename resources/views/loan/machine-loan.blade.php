@extends('layouts.frontend')
@section('content')    

<div class="progress">
    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
</div>
<div id="qbox-container">
    <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4">
                <form class="needs-validation text-center" id="form-wrapper" method="post" name="form-wrapper" action="saveLoan">
                    <div id="steps-container">
                        @csrf
                        <input type="hidden" value="Machine Loan" name="table">

                        <div class="step" id="step">
                            <label class="form-label pb-1">Cost of machine with GST???</label> 
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                <input type="text" class="form-control required" id="cost_with_gst" name="cost_with_gst"  aria-describedby="basic-addon1" autofocus>
                            </div>
                            <div class="validation-error d-none">Please Enter Valid Data</div>
                        </div>

                        <div class="step" id="step">                                                                                        
                            <label class="form-label">Have you used such machine before???</label> 
                            <div class="d-flex justify-content-evenly">
                                <div class="form-check">
                                    <input class="form-check-input required" type="radio" name="machine_used_before" id="flexRadioDefault1" checked value="1">
                                    <label class="form-check-label float-start" for="flexRadioDefault1">
                                        &nbsp;Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input required" type="radio" name="machine_used_before" id="flexRadioDefault2" value="2">
                                    <label class="form-check-label float-start" for="flexRadioDefault2">
                                    &nbsp;No
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="step" id="step">
                            <label class="form-label">When will machine be ready for delivery</label> 
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                <input type="text" class="form-control required" id="machine_ready_time" name="machine_ready_time" aria-describedby="basic-addon1">
                            </div>
                            <div class="validation-error d-none">Please Enter Valid Data</div>
                        </div>

                        <div class="step" id="step">
                            <label class="form-label">Your Name</label> 
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                <input type="text" class="form-control required"  id="name" name="name" aria-describedby="basic-addon1">
                            </div>
                            <div class="validation-error d-none">Please Enter Valid Data</div>
                        </div> 
                        
                        <div class="step" id="step">
                            <label class="form-label">Your Mobile Number</label> 
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                <input type="text" class="form-control required" id="phone" name="phone" aria-describedby="basic-addon1">
                            </div>
                            <div class="validation-error d-none">Please Enter Valid Data</div>
                        </div>
                        
                        <div id="success">
                            <div class="mt-5">
                            <h4>Record saved / Updated successfully.</h4>
                            <p>Our Executive will call you Shortly.</p>
                            <a class="back-link" href="">Go back from the beginning ➜</a>
                            </div>
                        </div>
                    </div>
                    <div id="q-box__buttons">
                        <button id="prev-btn" type="button" class="button" style="bottom:0px !important;">Previous</button> 
                        <button id="next-btn" type="button" class="button">Next</button> 
                        <button id="submit-btn" type="submit" class="button" value="Submit">Submit</button> 

                    </div>
                </form>
            </div>
        <div class="col-md-4"></div>                                
    </div>
</div>
@endsection('content')