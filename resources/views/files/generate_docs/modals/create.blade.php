    <!--begin::Modal-->
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Filed Documents')}}</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{route('generate-document.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('File Name')}}</label>
                            <input type="text" name="file_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('File (PDF)')}}</label>
                            <input type="file" class="form-control" name="avatar" accept="application/pdf" /> 
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="createButton" class="btn btn-primary">{{__('Create')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
