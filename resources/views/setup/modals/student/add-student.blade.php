    <!--begin::Modal-->
    <div class="modal fade" tabindex="-1" id="add_year">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Students Data')}}</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{route('student-info.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Email')}}</label>
                            <input type="text" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('First Name')}}</label>
                            <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Middle Name')}}</label>
                            <input type="text" name="middle_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Last Name')}}</label>
                            <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Course')}}</label>
                            <input type="text" name="course" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Password')}}</label>
                            <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit"  class="btn btn-primary">{{__('Create')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal-->