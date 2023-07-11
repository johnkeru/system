@foreach ($docs as $doc)
    <div class="modal fade" tabindex="-1" id="track_{{$doc->id}}">
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
                    <div class="timeline timeline-5">
                        <div class="timeline-items">
                            <!--begin::Item-->
                            <div class="timeline-item">
                                <!--begin::Icon-->
                                <div class="timeline-media bg-light-primary">
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Map/Position.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M19,11 L21,11 C21.5522847,11 22,11.4477153 22,12 C22,12.5522847 21.5522847,13 21,13 L19,13 C18.4477153,13 18,12.5522847 18,12 C18,11.4477153 18.4477153,11 19,11 Z M3,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L3,13 C2.44771525,13 2,12.5522847 2,12 C2,11.4477153 2.44771525,11 3,11 Z M12,2 C12.5522847,2 13,2.44771525 13,3 L13,5 C13,5.55228475 12.5522847,6 12,6 C11.4477153,6 11,5.55228475 11,5 L11,3 C11,2.44771525 11.4477153,2 12,2 Z M12,18 C12.5522847,18 13,18.4477153 13,19 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,19 C11,18.4477153 11.4477153,18 12,18 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="2"/>
                                            <path d="M12,17 C14.7614237,17 17,14.7614237 17,12 C17,9.23857625 14.7614237,7 12,7 C9.23857625,7 7,9.23857625 7,12 C7,14.7614237 9.23857625,17 12,17 Z M12,19 C8.13400675,19 5,15.8659932 5,12 C5,8.13400675 8.13400675,5 12,5 C15.8659932,5 19,8.13400675 19,12 C19,15.8659932 15.8659932,19 12,19 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                </div>
                                <!--end::Icon-->
                    
                                <!--begin::Info-->
                                <div class="timeline-desc timeline-desc-light-primary">
                                    <span class="font-weight-bolder text">
                                        Document Sent by {{$doc->orgData->studentInfo->first_name}} on {{$doc->trackDoc->created_at}}
                                    </span>
                                    <p class="font-weight-normal text-dark-50 pt-1 pb-2">
                                        Document: {{$doc->file_name}}
                                    </p>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                    
                            <!--begin::Item-->
                            @if($doc->trackDoc->adv_approved_by != NULL)
                            <div class="timeline-item">
                                <!--begin::Icon-->
                                <div class="timeline-media bg-light-warning">
                                    <span class="svg-icon svg-icon-warning svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Map/Position.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M19,11 L21,11 C21.5522847,11 22,11.4477153 22,12 C22,12.5522847 21.5522847,13 21,13 L19,13 C18.4477153,13 18,12.5522847 18,12 C18,11.4477153 18.4477153,11 19,11 Z M3,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L3,13 C2.44771525,13 2,12.5522847 2,12 C2,11.4477153 2.44771525,11 3,11 Z M12,2 C12.5522847,2 13,2.44771525 13,3 L13,5 C13,5.55228475 12.5522847,6 12,6 C11.4477153,6 11,5.55228475 11,5 L11,3 C11,2.44771525 11.4477153,2 12,2 Z M12,18 C12.5522847,18 13,18.4477153 13,19 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,19 C11,18.4477153 11.4477153,18 12,18 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="2"/>
                                            <path d="M12,17 C14.7614237,17 17,14.7614237 17,12 C17,9.23857625 14.7614237,7 12,7 C9.23857625,7 7,9.23857625 7,12 C7,14.7614237 9.23857625,17 12,17 Z M12,19 C8.13400675,19 5,15.8659932 5,12 C5,8.13400675 8.13400675,5 12,5 C15.8659932,5 19,8.13400675 19,12 C19,15.8659932 15.8659932,19 12,19 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                </div>
                                <!--end::Icon-->
                    
                                <!--begin::Info-->
                                <div class="timeline-desc timeline-desc-light-warning">
                                    <span class="font-weight-bolder text">
                                        Adviser Approval by {{$doc->orgData->employeeInfo->first_name}} on {{$doc->trackDoc->adv_app_date}}
                                    </span>
                                    <p class="font-weight-normal text-dark-50 pt-1 pb-2">
                                        Status: {{ $doc->trackDoc->adviser_approved == "1" ? "Approved" : "Rejected" }} </br>
                                        Notes: {{ $doc->trackDoc->adv_notes != NULL ? $doc->trackDoc->adv_notes : "" }}
                                    </p>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                                @if($doc->trackDoc->osas_approved_by != NULL)
                                 <!--begin::Item-->
                                <div class="timeline-item">
                                    <!--begin::Icon-->
                                    <div class="timeline-media bg-light-success">
                                        <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Map/Position.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M19,11 L21,11 C21.5522847,11 22,11.4477153 22,12 C22,12.5522847 21.5522847,13 21,13 L19,13 C18.4477153,13 18,12.5522847 18,12 C18,11.4477153 18.4477153,11 19,11 Z M3,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L3,13 C2.44771525,13 2,12.5522847 2,12 C2,11.4477153 2.44771525,11 3,11 Z M12,2 C12.5522847,2 13,2.44771525 13,3 L13,5 C13,5.55228475 12.5522847,6 12,6 C11.4477153,6 11,5.55228475 11,5 L11,3 C11,2.44771525 11.4477153,2 12,2 Z M12,18 C12.5522847,18 13,18.4477153 13,19 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,19 C11,18.4477153 11.4477153,18 12,18 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="2"/>
                                                <path d="M12,17 C14.7614237,17 17,14.7614237 17,12 C17,9.23857625 14.7614237,7 12,7 C9.23857625,7 7,9.23857625 7,12 C7,14.7614237 9.23857625,17 12,17 Z M12,19 C8.13400675,19 5,15.8659932 5,12 C5,8.13400675 8.13400675,5 12,5 C15.8659932,5 19,8.13400675 19,12 C19,15.8659932 15.8659932,19 12,19 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                    <!--end::Icon-->
                        
                                    <!--begin::Info-->
                                    <div class="timeline-desc timeline-desc-light-success">
                                        <span class="font-weight-bolder text">
                                            OSAS Approval by {{$doc->orgData->employeeInfo->first_name}} on {{$doc->trackDoc->osas_app_date}}
                                        </span>
                                        <p class="font-weight-normal text-dark-50 pt-1 pb-2">
                                            Status: {{ $doc->trackDoc->osas_approved == "1" ? "Approved" : "Rejected" }} </br>
                                            Notes: {{ $doc->trackDoc->osas_notes != NULL ? $doc->trackDoc->osas_notes : "" }}
                                        </p>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            <!--end::Item-->
                            @endif
                        @endif
                           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach