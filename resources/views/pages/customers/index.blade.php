<x-app-layout>
    <x-slot name="header">{{ __('Customer Information') }}</x-slot>
    <x-slot name="subHeader">{{ __('You can manage your customer and register new customer here.') }}</x-slot>

    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-inner">
                        <span style="float: right">
                            <button class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#registration">
                                <em class="icon ni ni-plus-circle"></em>&ensp;
                                Register New Customer
                            </button>
                        </span>
                        <table class="datatable-init table table-hover">
                            <thead>
                                <tr>
                                    <th width="20">#</th>
                                    <th>Customer Name</th>
                                    <th>Phone Number</th>
                                    <th>Email Address</th>
                                    <th>Complete Address</th>
                                    <th width="100" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($customers as $data)
                                <tr style="cursor: pointer">
                                    <td>1.</td>
                                    <td>{{ $data->cus_last_name }}, {{ $data->cus_first_name }}</td>
                                    <td>{{ $data->cus_phone_number }}</td>
                                    <td>{{ $data->cus_email }}</td>
                                    <td>{{ $data->cus_address }}, {{ $data->cus_city }}, {{ $data->cus_state }}, {{ $data->cus_postal_code }}, {{ $data->cus_country }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-block btn-light bg-white text-dark">
                                            <em class="icon ni ni-edit"></em>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="modal fade" tabindex="-1" role="dialog" id="registration">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body">
                    <h1 class="nk-block-title page-title">
                        Personal Information
                    </h1>
                    <p>You can create new customer to monitor.</p>
                    <hr class="mt-2 mb-2">
                    
                    <form action="" autocomplete="off">
                        @csrf

                        <!-- First Name -->
                         <div class="row mt-2 align-center">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label class="form-label" for="inp_fn">First Name <b
                                            class="text-danger">*</b></label>
                                    <span class="form-note">Specify the First Name here.</span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-info"></em>
                                    </div>
                                    <input type="text" required class="form-control" id="inp_fn" name="inp_fn"
                                        placeholder="Enter (Required) First Name here..." required>
                                </div>
                            </div>
                        </div>

                        <!-- Last Name -->
                         <div class="row mt-2 align-center">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label" for="inp_ln">Last Name <b
                                            class="text-danger">*</b></label>
                                    <span class="form-note">Specify the Last Name here.</span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-info"></em>
                                    </div>
                                    <input type="text" required class="form-control" id="inp_ln" name="inp_ln"
                                        placeholder="Enter (Required) Last Name here..." required>
                                </div>
                            </div>
                        </div>

                        <!-- Gender -->
                         <div class="row mt-2 align-center">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label class="form-label" for="inp_gender">Gender<b
                                            class="text-danger">*</b></label>
                                    <span class="form-note">Specify the Gender here.</span>
                                </div>

                            </div>
                            <div class="col-lg-8">

                                <select class="form-select" required>
                                    <option value="" data-select2-id="3" style="text-transform: uppercase !important;">- SELECT GENDER -</option>
                                        <option value="Male" data-select2-id="16">Male</option>
                                    <option value="Female" data-select2-id="16">Female</option>
                            </select>
			            </div>
			        </div>


                        <!-- Region --> 
                        <div class="row mt-2 align-center">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label class="form-label" for="inp_region">Region <b class="text-danger">*</b></label> 
                                    <span class="form-note">Specify the Region here.</span>
                                </div>

                            </div>
                            <div class="col-lg-8">

                                <select class="form-select" name="inp_region" id="inp_region" onclick="get_province(this.value)">
                                    <option value="" data-select2-id="3" style="text-transform: uppercase !important;">- SELECT REGION -</option>
                                    </select>
                                    
                            </div>
                        </div>


                        <!-- Province --> 
                        <div class="row mt-2 align-center">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label class="form-label" for="inp_province">Province <b class="text-danger">*</b></label> 
                                    <span class="form-note">Specify the Province here.</span>
                                </div>

                            </div>
                            <div class="col-lg-8">

                                <select class="form-select" name="inp_province" id="inp_province">
                                    <option value="" data-select2-id="3" style="text-transform: uppercase !important;">- SELECT PROVINCE -</option>
                                    </select>
                                    
                            </div>
                        </div>


                        <!-- CityMun --> 
                        <div class="row mt-2 align-center">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label class="form-label" for="inp_citymun">City/Municipality <b class="text-danger">*</b></label> 
                                    <span class="form-note">Specify the City/Municipality here.</span>
                                </div>

                            </div>
                            <div class="col-lg-8">

                                <select class="form-select">
                                    <option value="" data-select2-id="3" style="text-transform: uppercase !important;">- SELECT CITY/MUNICIPALITY -</option>
                                    </select>
                                    
                            </div>
                        </div>



                        <!-- Barangay --> 
                        <div class="row mt-2 align-center">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label class="form-label" for="inp_brgy">Barangay <b class="text-danger">*</b></label> 
                                    <span class="form-note">Specify the Barangay here.</span>
                                </div>

                            </div>
                            <div class="col-lg-8">

                                <select class="form-select">
                                    <option value="" data-select2-id="3" style="text-transform: uppercase !important;">- SELECT BARANGAY -</option>
                                    </select>
                                    
                            </div>
                        </div>



                        <!-- Postal Code -->
                         <div class="row mt-2 align-center">
                            <div class="col-lg-4">

                                <div class="form-group">
                                    <label class="form-label" for="inp_pc">Postal Code <b
                                            class="text-danger">*</b></label>
                                    <span class="form-note">Specify the Postal Code here.</span>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-control-wrap">
                                    <div class="form-icon form-icon-right">
                                        <em class="icon ni ni-info"></em>
                                    </div>
                                    <input type="text" required class="form-control" id="inp_pc" name="inp_pc"
                                        placeholder="Enter (Required) Postal Code here..." required>
                                </div>
                            </div>
                        </div>


                        <!-- Submit Button --> 
                         <div class="col-lg-5">
                        </div>
                        <div class="col-1g-7" style="float: right">
                            <hr>
                        </div>

                        <div class="col-lg-5">
                        </div>
                        <div class="col-lg-7 justify-end" style="float: right">
                            <hr>
                            <div class="form-group mt-2 mb-2 justify-end">
                                <button type="reset" class="btn btn-light bg-white mx-3"> 
                                    <em class="icon ni ni-repeat"></em>&nbsp;
                                        Reset
                                </button>
                                <button type="submit" class="btn btn-light bg-white">
                                    <em class="icon ni ni-save"></em>&nbsp;
                                    Submit Record
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>