    <!--begin::Modal-->
    <div class="modal fade" tabindex="-1" id="add_organization">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Organization Data')}}</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{route('list.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Enter Name')}}</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" style="background: rgb(227, 227, 227);" placeholder="" value="" />
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