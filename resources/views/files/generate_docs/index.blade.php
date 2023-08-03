@php
    use Illuminate\Support\Str;
@endphp

<x-base-layout>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card card-flush">
                <div class="card-header mt-6">
                    @role('student')
                        <div class="card-toolbar">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                            rx="5" fill="black" />
                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                            transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                            fill="black" />
                                    </svg>
                                </span>File a Document</button>
                        </div>
                    @endrole
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-5px">Control Number</th>
                                <th class="min-w-5px">Organization Name</th>
                                <th class="min-w-5px">Filename</th>
                                <th class="min-w-5px">Status</th>
                                <th class="">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($docs as $doc)
                                <tr>
                                    <td>{{ $doc->control_number }}</td>
                                    <td>{{ $doc->orgData->orgList->name }}</td>
                                    <td>{{ $doc->file_name }}</td>
                                    <td
                                        style="color: {{ Str::contains($doc->statusName->name, 'Rejected') ? 'rgb(255, 76, 76)' : (Str::contains($doc->statusName->name, 'Approved') ? 'green' : 'gray') }};">
                                        {{ $doc->statusName->name }}
                                    </td>
                                    <td>
                                        @if ($doc->file == null)
                                        @else
                                            <a title="View PDF" type="button"
                                                class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                data-bs-toggle="modal" data-bs-target="#pdf_{{ $doc->id }}">
                                                <span
                                                    class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/File.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            <rect fill="#000000" x="6" y="11"
                                                                width="9" height="2" rx="1" />
                                                            <rect fill="#000000" x="6" y="15"
                                                                width="5" height="2" rx="1" />
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                            </a>
                                        @endif
                                        @role('student')
                                            @if ($doc->status_id == 1)
                                                {{-- @can('update worship') --}}
                                                <a title="Edit PDF" type="button"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-bs-toggle="modal" data-bs-target="#update_{{ $doc->id }}">
                                                    <span
                                                        class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                                <rect fill="#000000" opacity="0.3" x="5"
                                                                    y="20" width="15" height="2"
                                                                    rx="1" />
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                </a>
                                                {{-- @endcan --}}
                                                {{-- @can('delete worship') --}}
                                                <a title="Delete PDF"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    href="#" data-bs-toggle="modal"
                                                    data-bs-target="#delete_{{ $doc->id }}">
                                                    <span
                                                        class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24"
                                                                    height="24" />
                                                                <path
                                                                    d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z"
                                                                    fill="#000000" fill-rule="nonzero" />
                                                                <path
                                                                    d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                </a>
                                                {{-- @endcan --}}
                                            @endif
                                        @endrole
                                        @role('adviser')
                                            @if ($doc->status_id == '1')
                                                <a title="Approve this PDF"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    href="#" data-bs-toggle="modal"
                                                    data-bs-target="#adviserApproved-{{ $doc->id }}">
                                                    <span
                                                        class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Clipboard-check.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <g fill=none>
                                                                    <rect x="0" y="0" width="24"
                                                                        height="24" />
                                                                    <path
                                                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                        fill="#000000" opacity="0.3" />
                                                                    <path
                                                                        d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z"
                                                                        fill="#000000" />
                                                                    <path
                                                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                        fill="#000000" />
                                                                </g>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                </a>
                                                <a title="Disapprove this PDF"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    href="#" data-bs-toggle="modal"
                                                    data-bs-target="#dissaproved-{{ $doc->id }}">
                                                    <span
                                                        class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Navigation/Close.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                                    fill="#FF0000">
                                                                    <rect x="0" y="7" width="16"
                                                                        height="2" rx="1" />
                                                                    <rect opacity="0.3"
                                                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) "
                                                                        x="0" y="7" width="16"
                                                                        height="2" rx="1" />
                                                                </g>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                </a>
                                            @endif
                                        @endrole
                                        @role('super-admin')
                                            @if ($doc->status_id == '3')
                                                <a title="Approve this PDF"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    href="#" data-bs-toggle="modal"
                                                    data-bs-target="#osasApproved-{{ $doc->id }}">
                                                    <span
                                                        class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Clipboard-check.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <g fill=none>
                                                                    <rect x="0" y="0" width="24"
                                                                        height="24" />
                                                                    <path
                                                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                        fill="#000000" opacity="0.3" />
                                                                    <path
                                                                        d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z"
                                                                        fill="#000000" />
                                                                    <path
                                                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                        fill="#000000" />
                                                                </g>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                </a>
                                                <a title="Disapprove this PDF"
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    href="#" data-bs-toggle="modal"
                                                    data-bs-target="#osasDissaproved-{{ $doc->id }}">
                                                    <span
                                                        class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Navigation/Close.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                                    fill="#FF0000">
                                                                    <rect x="0" y="7" width="16"
                                                                        height="2" rx="1" />
                                                                    <rect opacity="0.3"
                                                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) "
                                                                        x="0" y="7" width="16"
                                                                        height="2" rx="1" />
                                                                </g>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                </a>
                                            @endif
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        @include('files.generate_docs.modals.viewPDF')
        @include('files.generate_docs.modals.create')
        @include('files.generate_docs.modals.edit')
        @include('files.generate_docs.modals.delete')
        @include('files.generate_docs.modals.adviser-approved')
        @include('files.generate_docs.modals.adviser-dissapproved')
        @include('files.generate_docs.modals.osas-approved')
        @include('files.generate_docs.modals.osas-dissapproved')
    @endsection
</x-base-layout>
