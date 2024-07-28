@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row my-5">
        @include('layouts.sidebar')
        <div class="col-md-9">
            @include('layouts.message')  
            
            <div class="card border-0 shadow">
                    <div class="card-header  text-white">
                        Edit Application - {{ $application->enterprise_name }}
                    </div>
                    <form action="{{ route('save.application') }}" method="post" enctype="multipart/form-data">
                        <input value="{{ $application->id }}" type="hidden" name="id" id="id" />    
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Enterprise Name</label>
                                <input value="{{ old('enterprise_name', $application->enterprise_name) }}" type="text" class="form-control @error('enterprise_name') is-invalid @enderror" placeholder="Enterprise Name" name="enterprise_name" id="enterprise_name" />
                                @error('enterprise_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="enterprise_office_address" class="form-label">Enterprise Office Address</label>
                                        <textarea  class="form-control @error('enterprise_office_address') is-invalid @enderror" name="enterprise_office_address" id="enterprise_office_address" />{{ old('enterprise_office_address' , $application->enterprise_office_address )}}</textarea>
                                        @error('enterprise_office_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="enterprise_factory_address" class="form-label">Enterprise Factory Address</label>
                                        <textarea  class="form-control @error('enterprise_factory_address') is-invalid @enderror" name="enterprise_factory_address" id="enterprise_factory_address" />{{ old('enterprise_factory_address', $application->enterprise_factory_address) }}</textarea>
                                        @error('enterprise_office_address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="udaym_reg_no" class="form-label">Udyam Registration No.</label>
                                        <input value="{{ old('udaym_reg_no', $application->udaym_reg_no) }}" type="text" class="form-control @error('udaym_reg_no') is-invalid @enderror" placeholder="Udyam Registration No." name="udaym_reg_no" id="udaym_reg_no" />
                                        @error('udaym_reg_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="udyam_reg_date" class="form-label">Udayam Registration Date</label>
                                        <input value="{{ old('udyam_reg_date', $application->udyam_reg_date) }}" type="date" class="form-control @error('udyam_reg_date') is-invalid @enderror" placeholder="Udayam Registration Date" name="udyam_reg_date" id="udyam_reg_date" />
                                        @error('udyam_reg_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Enterprise PAN</label>
                                        <input value="{{ old('enterprise_pan', $application->enterprise_pan) }}" type="text" class="form-control @error('enterprise_pan') is-invalid @enderror" placeholder="Enterprise PAN" name="enterprise_pan" id="enterprise_pan" />
                                        @error('enterprise_pan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Telephone</label>
                                        <input value="{{ old('telephone', $application->telephone) }}" type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="Telephone" name="telephone" id="telephone" />
                                        @error('telephone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>                            
                            
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Email</label>
                                        <input value="{{ old('email', $application->email) }}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Website</label>
                                        <input value="{{ old('website', $application->website) }}" type="text" class="form-control @error('website') is-invalid @enderror" placeholder="Website" name="website" id="website" />
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="enterprise_constitution" class="form-label @error('enterprise_constitution') is-invalid @enderror">Constitution of Enterprise</label>
                                        <select name="enterprise_constitution" id="enterprise_constitution" class="form-control">
                                            <option value="1" {{($application->enterprise_constitution == 1) ? 'selected' : ''}}>Sole Proprietorship</option>
                                            <option value="2" {{($application->enterprise_constitution == 2) ? 'selected' : ''}}>Private Limited</option>
                                            <option value="3" {{($application->enterprise_constitution == 3) ? 'selected' : ''}}>Public Limited</option>
                                        </select>
                                        @error('enterprise_constitution')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="premises_type" class="form-label @error('premises_type') is-invalid @enderror">Premises Type</label>
                                        <select name="premises_type" id="premises_type" class="form-control">
                                            <option value="1" {{($application->premises_type == 1) ? 'selected' : ''}}>Own</option>
                                            <option value="2" {{($application->premises_type == 2) ? 'selected' : ''}}>Rental</option>
                                        </select>
                                        @error('premises_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="located_in_municipal_area" class="form-label @error('located_in_municipal_area') is-invalid @enderror">Located in Municipal Area</label>
                                        <select name="located_in_municipal_area" id="located_in_municipal_area" class="form-control">
                                            <option value="1" {{($application->located_in_municipal_area == 1) ? 'selected' : ''}}>Yes</option>
                                            <option value="2" {{($application->located_in_municipal_area == 2) ? 'selected' : ''}}>No</option>
                                        </select>
                                        @error('located_in_municipal_area')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="enterprise_category" class="form-label @error('enterprise_category') is-invalid @enderror">Enterprise Category</label>
                                        <select name="enterprise_category" id="enterprise_category" class="form-control">
                                            <option value="1" {{($application->enterprise_category == 1) ? 'selected' : ''}}>New</option>
                                            <option value="2" {{($application->enterprise_category == 2) ? 'selected' : ''}}>Already Working</option>
                                        </select>
                                        @error('enterprise_category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="enterprise_type" class="form-label @error('enterprise_type') is-invalid @enderror">Enterprise Type</label>
                                        <select name="enterprise_type" id="enterprise_type" class="form-control">
                                            <option value="1" {{($application->enterprise_type == 1) ? 'selected' : ''}}>Micro</option>
                                            <option value="2" {{($application->enterprise_type == 2) ? 'selected' : ''}}>Small</option>
                                            <option value="3" {{($application->enterprise_type == 3) ? 'selected' : ''}}>Medium</option>

                                        </select>
                                        @error('enterprise_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="enterprise_activity" class="form-label @error('enterprise_activity') is-invalid @enderror">Enterprise Activity</label>
                                        <select name="enterprise_activity" id="enterprise_activity" class="form-control">
                                            <option value="1" {{($application->enterprise_activity == 1) ? 'selected' : ''}}>Manufacturing</option>
                                            <option value="2" {{($application->enterprise_activity == 2) ? 'selected' : ''}}>Service</option>
                                        </select>
                                        @error('enterprise_activity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <!-- <div class="mb-3">
                                <label for="Image" class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"  name="image" id="image"/>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> -->

                            <div class="mb-3">
                                <label for="author" class="form-label @error('status') is-invalid @enderror">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{($application->status == 1) ? 'selected' : ''}}>Active</option>
                                    <option value="2" {{($application->status == 2) ? 'selected' : ''}}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-2">Create</button>                     
                        </div>
                    </form>
                        
                </div>                
            </div>
        </div>       

    </div>       
</div>
@endsection('content')