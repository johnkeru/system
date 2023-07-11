    <!--begin::Modal-->
    <div class="modal fade" tabindex="-1" id="addVideo">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Add Video to Sacred Assembly')}}</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{route('videos.add-video',  [$yearId, $monthId])}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                        <div class="mb-10">
                            <select class="form-select" name="service_id" data-control="select2" data-placeholder="Select an option">
                                @foreach ($services as $service)
                                <option></option>
                                <option value="{{$service->id}}">
                                        {{$service->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-10">
                            <label for="" class="form-label">Input Date</label>
                            <input type="date" class="form-control" name="date" placeholder="Pick a date" id="kt_datepicker_1"/>
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">{{__('Youtube Link')}}</label>
                            <input type="text" name="link" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit"  class="btn btn-primary">{{__('Create')}}</button>
                    </div>
                </form>A
            </div>
        </div>
    </div>
    <!--end::Modal-->
 