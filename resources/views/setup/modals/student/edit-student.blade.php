@foreach ($students as $student)
<form action="{{ route('student-info.update', $student->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}

        <!--begin::Modal-->
        <div class="modal fade" tabindex="-1" id="update_student-{{$student->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Edit Student Info')}}</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Email')}}</label>
                            <input type="text" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$student->email}}" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('First Name')}}</label>
                            <input type="text" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$student->first_name}}" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Middle Name')}}</label>
                            <input type="text" name="middle_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$student->middle_name}}" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Last Name')}}</label>
                            <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$student->last_name}}" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Course')}}</label>
                            <input type="text" name="course" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$student->course}}" />
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
