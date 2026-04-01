<x-app-layout>
    <x-slot name="header">{{__('Manage Customer') }}</x-slot>
    <x-slot name="subHeader">{{__('You can manage your customer and register new customer here.') }}</x-slot>

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
    <div class="modal fade" tabindex="1" role="dialog" id="registration">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body">
                    <h1 class="nk-block-title page-title">
                        Register New Customer
                    </h1>
                    <hr class="mt-2 mb-2">
                    {{-- --}}     
                <form action="{{ route('customer.save') }}" method="POST">

                    @csrf
                    <!-- First Name -->
                    <div class="row mt-2 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="inp_fn">First Name <b
                                class="text-danger">*</b></label>
                            <span class="form-note">Specify the First Name here. </span>
                        </div>
                    </div>            
                    <div class="col-lg-7">
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-info"></em>
                            </div>
                            <input type="text" class="form-control" id="inp_fn" name="inp_fn"
                                placeholder="Enter First Name here..." required>   
                    </div>
                </div>    
            </div>
            <!-- Last Name -->
                    <div class="row mt-2 align-center">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-label" for="inp_ln">Last Name <b
                                class="text-danger">*</b></label>
                            <span class="form-note">Specify the Last Name here. </span>
                        </div>
                    </div>            
                    <div class="col-lg-7">
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right">
                                <em class="icon ni ni-info"></em>
                            </div>
                            <input type="text" class="form-control" id="inp_ln" name="inp_ln"
                                placeholder="Enter Last Name here..." required>   
                    </div>
                </div>    
            </div>
           
            <!-- Submit Button -->
                    <div class="row mt-4">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">    
                            <button type="submit" class="btn btn-primary btn-block">
                                <em class="icon ni ni-save"></em>&nbsp;
                                Submit New Customer
                            </button>
                               
                        </div>
                    </div> 
                </Form>   
            </div>
        </div>           
    </div>
</div>
</x-app-layout>                