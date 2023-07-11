@foreach ($docs as $doc)
    <div class="modal fade" tabindex="-1" id="pdf_{{$doc->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('View PDF')}}</h5>
    
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>  
                <div class="modal-body">
                    <iframe src="files/transactions/{{$doc->orgData->orgList->name}}/{{$doc->file}}" frameborder="0" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Approve</button> --}}
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach