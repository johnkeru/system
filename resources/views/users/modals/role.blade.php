@foreach ($users as $user)
<form action="{{ route('user.assign_role', $user->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}

        <!--begin::Modal-->
        <div class="modal fade" tabindex="-1" id="assign_role{{$user->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Assign Roles to User')}}</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="mb-5">
                            <label for="" class="form-label">Role to Permissions</label>
                            <select name="role" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                @foreach ($roles as $role)
                                <option></option>
                                <option value="{{$role->name}}">
                                    {{$role->name}}
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


