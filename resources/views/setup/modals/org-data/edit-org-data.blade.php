@foreach ($orgDatas as $orgData)
<form action="{{ route('org-data.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}

        <!--begin::Modal-->
        <div class="modal fade" tabindex="-1" id="update-org-data-{{$orgData->id}}">
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
                            <label for="floatingSelect">Choose Organization Name</label>
                            <select class="form-select" name="orglist" data-dropdown-parent="#update_org_data-{{$orgData->id}}" aria-label="Floating label select example">
                                <option></option>
                                @foreach ($orgLists as $list)
                                <option value="{{$list->id}}"> 
                                    {{$list->name}} 
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="floatingSelect">Choose Organization President</label>
                            <select class="form-select" name="student" data-dropdown-parent="#update_org_data-{{$orgData->id}}" aria-label="Floating label select example" >
                                <option></option>
                                @foreach ($students as $student)
                                <option value="{{$student->id}}"> 
                                    {{$student->first_name.' '.$student->middle_name.' '.$student->last_name}} 
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="floatingSelect">Choose Organization Adviser</label>
                            <select class="form-select" name="employee" data-dropdown-parent="#update_org_data-{{$orgData->id}}" aria-label="Floating label select example">
                                <option></option>
                                @foreach ($employees as $employee)
                                <option value="{{$employee->id}}"> 
                                    {{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}} 
                                </option>
                                @endforeach
                            </select>
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
