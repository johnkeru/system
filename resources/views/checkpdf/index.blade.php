<x-base-layout>
    <div class="modal-body pt-0 pb-20 px-5 px-xl-25">
        <!--begin::Heading-->
        <div class="mb-13 text-center">
            <h1 class="mb-3">Validate Signed PDF</h1>
            <div class="text-muted fw-bold fs-5">Validate</div>
        </div>

        @if($data['error'])
            <div class="alert alert-danger">{{ $data['error'] }}</div>
        @elseif($data['message'])
            <div class="alert alert-success">{{ $data['message'] }}</div>
        @endif
        <form action="{{ route('readHashOnly') }}" method="POST" enctype="multipart/form-data" style="background: white;">
            @csrf
            <div class="modal-body">
                <div>
                    <label for="" class="form-label">{{__('Insert a signed PDF')}}</label>
                    <input type="file" class="form-control" accept="application/pdf" accept="application/pdf" name='test_pdf'/> 
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" id="createButton" class="btn btn-primary" style="width: 100%">{{__('Validate')}}</button>
            </div>
        </form>
    </div>
</x-base-layout>
