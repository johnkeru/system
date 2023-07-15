@foreach ($orgLists as $orgList)
<form action="{{ route('list.update', $orgList->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}

        <!--begin::Modal-->
        <div class="modal fade" tabindex="-1" id="update_author-{{$orgList->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Edit Organization')}}</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="mb-5">
                            <label for="" class="form-label">Organization</label>
                            <input style="background: rgb(227, 227, 227);" type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$orgList->name}}" />
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
