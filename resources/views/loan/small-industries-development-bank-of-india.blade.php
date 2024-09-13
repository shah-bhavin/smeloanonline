@extends('layouts.frontend')
@section('content')    

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
@endsection('content')