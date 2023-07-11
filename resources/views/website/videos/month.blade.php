<x-base-layout>
    <div class="d-flex flex-wrap flex-stack mb-6">
    <h3 class="fw-bolder my-2">Months 
    <div class="d-flex my-2">
        <div class="d-flex align-items-center position-relative me-4">
            <span class="svg-icon svg-icon-3 position-absolute ms-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                </svg>
            </span>
            <input type="text" id="kt_filter_search" class="form-control form-control-white form-control-sm w-150px ps-9" placeholder="Search" />
        </div>
    </div>
    </div>
        <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
            @foreach ($months as $month)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <a href="{{ route('videos.display-video', [$yearId, $month->id]) }}" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <div class="symbol symbol-75px mb-5">
                                    <img src="/assets/media/svg/files/folder-document.svg" alt=""/>
                                </div>
                                <div class="fs-5 fw-bolder mb-2">{{ $month->name }}</div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</x-base-layout>
	