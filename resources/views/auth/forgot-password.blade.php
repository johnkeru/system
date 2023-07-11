<x-auth-layout>
    <!--begin::Forgot Password Form-->
    <form method="POST" action="{{ theme()->getPageUrl('password.email') }}" class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
    @csrf

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Forgot Password ?') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('Please proceed to OSAS office to renew your password') }}
            </div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
    </form>
    <!--end::Forgot Password Form-->

</x-auth-layout>
