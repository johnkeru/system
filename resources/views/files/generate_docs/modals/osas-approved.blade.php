@foreach ($docs as $doc)
<form action="{{ route('osas-approved', $doc->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('put') }}
    {{ csrf_field() }}

        <!-- Delete Modal -->
        <div class="modal fade" tabindex="-1" id="osasApproved-{{$doc->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('Approved '.$doc->file_name.' ?')}}</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                   
                    <div class="modal-body">
                        <b>Approver signature</b>
                        <div class="mb-5">
                            <input type="file" class="form-control" name="signature" accept=".png"/> 
                        </div>
                        <p>If you don't have a signature, you can create one using an online signature tool. Please visit <a href="https://signaturely.com/online-signature/draw/" target="_blank">Online-signature</a> to create your signature.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Approved</button>
                    </div>
                </div>
            </div>
        </div>

</form>
@endforeach
