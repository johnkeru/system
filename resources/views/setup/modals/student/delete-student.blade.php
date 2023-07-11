@foreach ($students as $student)
<form action="{{ route('student-info.destroy', $student->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}

        <!-- Delete Modal -->
        <div class="modal fade" tabindex="-1" id="delete_student-{{$student->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Delete '.$student->email.'?')}}</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <b>Please Confirm</b>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>

</form>
@endforeach
