<x-base-layout>
    <div class="card card-flush mt-6 mb-10 mt-xl-9">
        <iframe src="https://www.youtube.com/embed/{{$latestVid->link}}" frameborder="0" width="100%" height="400px"></iframe>
    </div>
    <div class="card-toolbar mb-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVideo">
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
            </svg>
        </span>Add Video</button>
    </div>
    <div class="row g-6 g-xl-9">
        <div class="col-lg-6">
            <div class="card card-flush h-lg-100">
                <div class="card-header mt-6">
                    <div class="card-title flex-column">
                        <div class="card-header">
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">Sacred Assembly</h3>
                            </div>
                        </div>
                            <div class="row g-6 g-xl-9 mb-6 mb-xl-10">
                                @foreach ($sacredDatas as $sacredData) 
                                <div class="col-md-4 col-lg-6 col-l-4">
                                    <div class="card h-100">
                                        <div class="card-body d-flex justify-content-center text-center flex-column p-4">
                                            <!--begin::Name-->
                                            <form action="{{ route('videos.destroy', $sacredData->id) }}" method="post" enctype="multipart/form-data">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="symbol symbol-60px mb-5">
                                                    <iframe src="https://www.youtube.com/embed/{{$sacredData->link}}" allow="fullscreen;" frameborder="0" width="100%" height="150px"></iframe>
                                                </div>
                                                <button type="submit" class="badge badge-light-danger fs-7 m-1">{{ \Carbon\Carbon::parse($sacredData->date)->format('d M Y')}}</button>
                                            </form>
                                            {{-- <div class="fs-7 fw-bold text-gray-400">3 days ago</div> --}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Harps and Bowls-->
        <div class="col-lg-6">
            <div class="card card-flush h-lg-100">
                <div class="card-header mt-6">
                    <div class="card-title flex-column">
                        <div class="card-header">
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">Harps and Bowls</h3>
                            </div>
                        </div>
                            <div class="row g-6 g-xl-9 mb-6 mb-xl-10">
                                @foreach ($harpsDatas as $harpsData)
                                <div class="col-md-4 col-lg-6 col-l-4">
                                    <div class="card h-100">
                                        <div class="card-body d-flex justify-content-center text-center flex-column p-4">
                                            <form action="{{ route('videos.destroy', $harpsData->id) }}" method="post" enctype="multipart/form-data">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="symbol symbol-60px mb-5">
                                                    <iframe src="https://www.youtube.com/embed/{{$harpsData->link}}" allow="fullscreen;" frameborder="0" width="100%" height="150px"></iframe>
                                                </div>
                                                <button type="submit" class="badge badge-light-danger fs-7 m-1">{{ \Carbon\Carbon::parse($harpsData->date)->format('d M Y')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-flush h-lg-100">
                <div class="card-header mt-6">
                    <div class="card-title flex-column">
                        <div class="card-header">
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">One Thing</h3>
                            </div>
                        </div>
                            <div class="row g-6 g-xl-9 mb-6 mb-xl-10">
                                @foreach ($oneDatas as $oneData)
                                <div class="col-md-4 col-lg-6 col-l-4">
                                    <div class="card h-100">
                                        <div class="card-body d-flex justify-content-center text-center flex-column p-4">
                                            <form action="{{ route('videos.destroy', $oneData->id) }}" method="post" enctype="multipart/form-data">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="symbol symbol-60px mb-5">
                                                    <iframe src="https://www.youtube.com/embed/{{$oneData->link}}" allow="fullscreen;" frameborder="0" width="100%" height="150px"></iframe>
                                                </div>
                                                <button type="submit" class="badge badge-light-danger fs-7 m-1">{{ \Carbon\Carbon::parse($oneData->date)->format('d M Y')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Equipping -->
        <div class="col-lg-6">
            <div class="card card-flush h-lg-100">
                <div class="card-header mt-6">
                    <div class="card-title flex-column">
                        <div class="card-header">
                            <div class="card-title flex-column">
                                <h3 class="fw-bolder mb-1">Family Equipping</h3>
                            </div>
                        </div>
                            <div class="row g-6 g-xl-9 mb-6 mb-xl-10">
                                @foreach ($equippingDatas as $equippingData)
                                    <div class="col-md-4 col-lg-6 col-l-4">
                                    <div class="card h-100">
                                        <div class="card-body d-flex justify-content-center text-center flex-column p-4">
                                            <form action="{{ route('videos.destroy', $equippingData->id) }}" method="post" enctype="multipart/form-data">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="symbol symbol-60px mb-5">
                                                    <iframe src="https://www.youtube.com/embed/{{$equippingData->link}}" allow="fullscreen;" frameborder="0" width="100%" height="150px"></iframe>
                                                </div>
                                                <button type="submit" class="badge badge-light-danger fs-7 m-1">{{ \Carbon\Carbon::parse($equippingData->date)->format('d M Y')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
@include('website.videos.modals.create')
@endsection
</x-base-layout>