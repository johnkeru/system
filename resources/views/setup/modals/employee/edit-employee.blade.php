@foreach ($employees as $employee)
<form action="{{ route('employee-info.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}

        <!--begin::Modal-->
        <div class="modal fade" tabindex="-1" id="update_employee-{{$employee->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Edit Employee Info')}}</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="mb-5">
                            <label for="" class="form-label">Email</label>
                            <input style="background: rgb(227, 227, 227);" type="text" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$employee->email}}" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">First Name</label>
                            <input style="background: rgb(227, 227, 227);" type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$employee->first_name}}" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">Middle Name</label>
                            <input style="background: rgb(227, 227, 227);" type="text" name="middle_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$employee->middle_name}}" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">Last Name</label>
                            <input style="background: rgb(227, 227, 227);" type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$employee->last_name}}" />
                        </div>
                        

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>

</form>
@endforeach
