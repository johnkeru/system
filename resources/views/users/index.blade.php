<x-base-layout>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-permissions-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search User" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-50px">Name</th>
                                <th class="min-w-100px">Roles</th>
                                <th class="min-w-100px">Permissions</th>
                                <th class="min-w-50px">Last Login</th>
                                <th class="min-w-100px">Two-Step</th>
                                <th class="min-w-50px">User Created</th>
                                <th class="text-end min-w-250px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                        @foreach ($users as $user)
                            <tr>
                                <td class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        {{-- <img src="storage/{{$user->info->avatar}}" alt=""/> --}}
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="" class="text-gray-800 text-hover-primary mb-1">{{$user->first_name.' '.$user->last_name}}</a>
                                        <span>{{$user->email}}</span>
                                    </div>
                                </td>
                                <td>
                                    @if ($user->roles)
                                    @foreach ($user->roles as $user_role)
                                        <span> 
                                            <form action="{{ route('user.delete_role', [$user->id, $user_role->id]) }}" method="post" enctype="multipart/form-data">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="badge badge-light-danger fs-7 m-1">{{$user_role->name}}</button>
                                            </form>
                                        </span>
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if ($user->permissions)
                                    @foreach ($user->permissions as $user_permission)
                                        <span> 
                                            <form action="{{ route('user.delete_permission', [$user->id, $user_permission->id]) }}" method="post" enctype="multipart/form-data">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="badge badge-light-danger fs-7 m-1">{{$user_permission->name}}</button>
                                            </form>
                                        </span>
                                    @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->last_sign_in ? $user->last_sign_in->diffForHumans() : 'Not Yet Sign In' }}</td>
                                <td>enable</td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y , g:i a')}}</td>
                                <td class="text-end">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#assign_role{{$user->id}}">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    Role
                                </button>
                                <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#assign_{{$user->id}}">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                        </svg>
                                    </span>
                                    Permission
                                </button>
                                    <!--begin::Delete-->
                                    <a class="btn btn-icon btn-active-light-danger w-30px h-30px" data-bs-toggle="modal" data-bs-target="#delete_{{$user->id}}">
                                        <span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
                                                <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </a>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--end::Delete-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                        @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    @include('users.modals.permission')
    @include('users.modals.delete-user')
    @include('users.modals.role')
</x-base-layout>