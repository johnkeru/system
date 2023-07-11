    <!--begin::Modal-->
    <div class="modal fade" tabindex="-1" id="add_org_data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Ogranization Details')}}</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{route('org-data.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="mb-5">
                            <label for="floatingSelect">Choose Organization Name</label>
                            <select class="form-select" name="orglist" aria-label="Floating label select example">
                                <option></option>
                                @foreach ($orgLists as $list)
                                <option value="{{$list->id}}"> {{$list->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="floatingSelect">Choose Organization President</label>
                            <select class="form-select" name="student" aria-label="Floating label select example">
                                <option></option>
                                @foreach ($students as $student)
                                <option value="{{$student->id}}"> {{$student->first_name.' '.$student->middle_name.' '.$student->last_name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="floatingSelect">Choose Organization Adviser</label>
                            <select class="form-select" name="employee" aria-label="Floating label select example">
                                <option></option>
                                @foreach ($employees as $employee)
                                <option value="{{$employee->id}}"> {{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}} </option>
                                @endforeach
                            </select>
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