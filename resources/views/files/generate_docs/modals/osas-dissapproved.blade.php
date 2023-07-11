@foreach ($docs as $doc)
<form action="{{ route('osas-dissapproved', $doc->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}

        <!-- Delete Modal -->
        <div class="modal fade" tabindex="-1" id="osasDissaproved-{{$doc->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Reject '.$doc->file_name.' ?')}}</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Input Reason')}}</label>
                            <input type="text" name="notes" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                        </div>
                        <b>Please Confirm</b>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </div>
                </div>
            </div>
        </div>

</form>
@endforeach
