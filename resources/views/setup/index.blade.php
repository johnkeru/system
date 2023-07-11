<x-base-layout>
<!--begin::Modal body-->
<div class="modal-body pt-0 pb-20 px-5 px-xl-25">
    <!--begin::Heading-->
    <div class="mb-13 text-center">
        <h1 class="mb-3">REFERENCES</h1>
        <div class="text-muted fw-bold fs-5">Setup Organization List</div>
    </div>
	
    <!--end::Heading-->
    <!--begin::Plans-->
    <div class="d-flex flex-column">
        <!--begin::Row-->
        <div class="row">
            <!--begin::Col-->
            <div class="col-lg-2 mb-2 mb-lg-0">
                <!--begin::Tabs-->
                <div class="nav flex-column">
					<!--begin::Tab link-->
					<div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack text-start p-3 mb-3" data-bs-toggle="tab" data-bs-target="#author">
						<!--end::Description-->
						<div class="d-flex align-items-center me-2">
							<!--begin::Info-->
							<div class="flex-grow-1">
								<h4 class="d-flex align-items-center fs-4 fw-bolder flex-wrap">Name of Organization</h4>
							</div>
							<!--end::Info-->
						</div>
						<!--end::Description-->
					</div>
					<!--end::Tab link-->
                    <!--begin::Tab link-->
                    <div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack p-3 mb-3" data-bs-toggle="tab" data-bs-target="#year">
                        <!--end::Description-->
                        <div class="d-flex align-items-center me-2">
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <h4 class="d-flex align-items-center fs-4 fw-bolder flex-wrap">Student Info</h4>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Tab link-->
					<!--begin::Tab link-->
					<div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack p-3 mb-3" data-bs-toggle="tab" data-bs-target="#writer">
						<!--end::Description-->
						<div class="d-flex align-items-center me-2">
							<!--begin::Info-->
							<div class="flex-grow-1">
								<h4 class="d-flex align-items-center fs-4 fw-bolder flex-wrap">Employee Info</h4>
							</div>
							<!--end::Info-->
						</div>
						<!--end::Description-->
					</div>
					<!--end::Tab link-->
					<!--begin::Tab link-->
					<div class="nav-link btn btn-outline btn-outline-dashed btn-color-dark btn-active btn-active-primary d-flex flex-stack p-3 mb-3" data-bs-toggle="tab" data-bs-target="#orgdata">
						<!--end::Description-->
							<div class="d-flex align-items-center me-2">
								<!--begin::Info-->
								<div class="flex-grow-1">
									<h4 class="d-flex align-items-center fs-4 fw-bolder flex-wrap">Organization Data</h4>
								</div>
												<!--end::Info-->
							</div>
						<!--end::Description-->
					</div>
					<!--end::Tab link-->
                    <!--begin::Tab link-->
                </div>
                <!--end::Tabs-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-lg-10">
                <!--begin::Tab content-->
                <div class="tab-content rounded bg-light">
					      <!--begin::Tab Pane-->
						  <div class="tab-pane fade show active" id="author"> <!-- author -->
							<div class="post d-flex flex-column-fluid" id="kt_post">
								<!--begin::Container--> 
								<div id="kt_content_container" class="container-xxl">
									<!--begin::Card-->
									<div class="card card-flush">
										<!--begin::Card header-->
										<div class="card-header mt-6">
											<!--begin::Card toolbar-->
											<div class="card-toolbar">
												<!--begin::Button-->
												<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_organization">
												<!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
												<span class="svg-icon svg-icon-3">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
														<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
														<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->Add Organization</button>
												<!--end::Button-->
											</div>
											<!--end::Card toolbar-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-0">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
												<!--begin::Table head-->
												<thead>
													<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
														<th class="min-w-250px">Name</th>
														<th class=""></th>
														<th class="min-w-100px">Actions</th>
														<th class=""></th>
													</tr>
												</thead>
												<tbody class="fw-bold text-gray-600">
												@foreach ($orgLists as $orgList)
													<tr>
														<td>{{$orgList->name}}</td>
														<td></td>
														<td>
															<a type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="modal" data-bs-target="#update_author-{{$orgList->id}}">
																<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																		<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																	</g>
																</svg><!--end::Svg Icon--></span>
															</a>
															<a class="btn btn-icon btn-active-light-primary w-30px h-30px" href="#" data-bs-toggle="modal" data-bs-target="#delete_author-{{$orgList->id}}">
																<span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
																		<path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
																	</g>
																</svg><!--end::Svg Icon--></span>
															</a>
														</td> 
														<td></td>
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
									<!--begin::Modals-->
									<!--end::Modals-->
								</div>
								<!--end::Container-->
							</div>
						</div>
						<!--end::Tab Pane-->
                    <!--begin::Tab Pane-->
					<div class="tab-pane fade" id="year"> <!-- year -->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container--> 
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Card-->
								<div class="card card-flush">
									<!--begin::Card header-->
									<div class="card-header mt-6">
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Button-->
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_year">
											<!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
											<span class="svg-icon svg-icon-3">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
													<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
													<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->Add Student Info</button>
											<!--end::Button-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="ref_year_table">
											<!--begin::Table head-->
											<thead>
												<tr class="text-start text-gray-500 fw-bolder fs-7 text-uppercase gs-0">
													<th class="min-w-10px">Email</th>
													<th class="min-w-10px">Name</th>
													<th class="min-w-10px">Course</th>
													<th class="min-w-10px">Organization</th>
													<th class="">Actions</th>
												</tr>
											</thead>
											<tbody class="fw-bold text-gray-600">
											@foreach ($students as $student)
												<tr>
													<td>{{$student->email}}</td>
													<td>{{$student->first_name.' '.$student->middle_name.' '.$student->last_name}}</td>
													<td>{{$student->course}}</td>
													<td>{{$student->organization}}</td>
													<td>
														<a type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="modal" data-bs-target="#update_student-{{$student->id}}">
															<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																	<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																</g>
															</svg><!--end::Svg Icon--></span>
														</a>
														<a class="btn btn-icon btn-active-light-primary w-30px h-30px" href="#" data-bs-toggle="modal" data-bs-target="#delete_student-{{$student->id}}">
															<span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
																	<path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
																</g>
															</svg><!--end::Svg Icon--></span>
														</a>
														<a type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="modal" data-bs-target="#update_password-student-{{$student->id}}">
															<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Lock-overturning.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
																	<path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000"/>
																</g>
															</svg><!--end::Svg Icon--></span>
														</a>
													</td>
													<td></td>
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
								<!--begin::Modals-->
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
                    </div>
                    <!--end::Tab Pane-->
					<!--begin::Tab Pane-->
					<div class="tab-pane fade" id="writer"> <!-- writer -->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container--> 
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Card-->
								<div class="card card-flush">
									<!--begin::Card header-->
									<div class="card-header mt-6">
									
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Button-->
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_employee">
											<!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
											<span class="svg-icon svg-icon-3">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
													<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
													<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->Add Employee Info</button>
											<!--end::Button-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="ref_writer_table">
											<!--begin::Table head-->
											<thead>
												<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
													<th class="min-w-5px">Email</th>
													<th class="min-w-5px">Name</th>
													<th class="">Actions</th>
												</tr>
											</thead>
											<tbody class="fw-bold text-gray-600">
											@foreach ($employees as $employee)
												<tr></tr>
													<td>{{$employee->email}}</td>
													<td>{{$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name}}</td>
													<td>
														<a type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="modal" data-bs-target="#update_employee-{{$employee->id}}">
															<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																	<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																</g>
															</svg><!--end::Svg Icon--></span>
														</a>
														<a class="btn btn-icon btn-active-light-primary w-30px h-30px" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee-{{$employee->id}}">
															<span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
																	<path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
																</g>
															</svg><!--end::Svg Icon--></span>
														</a>
														<a type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="modal" data-bs-target="#update_employee_password-{{$employee->id}}">
															<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Code/Lock-overturning.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
																	<path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000"/>
																</g>
															</svg><!--end::Svg Icon--></span>
														</a>
													</td>
													<td></td>
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
								<!--begin::Modals-->
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
					</div>
					<!--end::Tab Pane-->
					<!--begin::Tab Pane-->
					<div class="tab-pane fade" id="orgdata"> <!-- orgdata -->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container--> 
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Card-->
								<div class="card card-flush">
									<!--begin::Card header-->
									<div class="card-header mt-6">
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Button-->
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_org_data">
											<!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
											<span class="svg-icon svg-icon-3">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
													<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
													<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
												</svg>
											</span>
											<!--end::Svg Icon-->Add Organization Data</button>
											<!--end::Button-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="ref_orgdata_table">
											<!--begin::Table head-->
											<thead>
												<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
													<th class="min-w-5px">Organization Name</th>
													<th class="min-w-5px">Organization President</th>
													<th class="min-w-5px">Organization Adviser</th>
													<th class="">Actions</th>
												</tr>
											</thead>
											<tbody class="fw-bold text-gray-600">
											@foreach ($orgDatas as $orgData)
												<tr></tr>
													<td>{{$orgData->orgList->name}}</td>
													<td>{{$orgData->studentInfo->first_name.' '.$orgData->studentInfo->middle_name.' '.$orgData->studentInfo->last_name}}</td>
													<td>{{$orgData->employeeInfo->first_name.' '.$orgData->employeeInfo->middle_name.' '.$orgData->employeeInfo->last_name}}</td>
													<td>
														<a type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="modal" data-bs-target="#update-org-data-{{$orgData->id}}">
															<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																	<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																</g>
															</svg><!--end::Svg Icon--></span>
														</a>
														<a class="btn btn-icon btn-active-light-primary w-30px h-30px" href="#" data-bs-toggle="modal" data-bs-target="#delete_employee-{{$employee->id}}">
															<span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
																	<path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
																</g>
															</svg><!--end::Svg Icon--></span>
														</a>
													</td>
													<td></td>
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
								<!--begin::Modals-->
								<!--end::Modals-->
							</div>
							<!--end::Container-->
						</div>
					</div>
					<!--end::Tab Pane-->
                </div>
                <!--end::Tab content-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Plans-->
</div>
<!--end::Modal body-->

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
@include('setup.modals.organization.add-organization')
@include('setup.modals.organization.edit-organization')
@include('setup.modals.organization.delete-organization')
@include('setup.modals.employee.add-employee')
@include('setup.modals.employee.edit-employee')
@include('setup.modals.employee.delete-employee')
@include('setup.modals.employee.update-password-employee')
@include('setup.modals.student.add-student')
@include('setup.modals.student.edit-student')
@include('setup.modals.student.delete-student')
@include('setup.modals.student.update-password')
@include('setup.modals.org-data.add-org-data')
@include('setup.modals.org-data.edit-org-data')
@include('setup.modals.org-data.delete-org-data')
</x-base-layout>