<x-head>
 <div class="flex min-h-full">
    <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
        <div>
            <h2 class="mt-8 text-2xl/9 font-bold tracking-tight text-gray-800 dark:text-white">Masuk ke akun Anda</h2>
            <p class="mt-2 text-sm/6 text-gray-400">
            Selamat datang kembali di <b>Perpustakaan digital!</b>
            </p>
        </div>

        <div class="mt-10">
            <div>
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                <label for="username" class="block text-sm/6 font-medium text-gray-800 dark:text-gray-100">Username</label>
                <div class="mt-2">
                    <input type="text" name="username" value="{{ old('username') }}" class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Masukan username" autocomplete="off">
                </div>
                </div>

                <div>
                <label for="password" class="block text-sm/6 font-medium text-gray-800 dark:text-gray-100">Password</label>
                <div class="relative mt-2">
                    <input id="hs-toggle-password" type="password" name="password" class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Masukan password">
                    <button type="button" data-hs-toggle-password='{
                        "target": "#hs-toggle-password"
                    }' class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-amber-600 dark:text-neutral-600 dark:focus:text-amber-500">
                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                        <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                        <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                        <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"></line>
                        <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                        <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                    </svg>
                    </button>
                </div>
                </div>

                <div class="flex items-center justify-between">
                <div class="flex gap-3">
                    <input id="remember-me" type="checkbox" name="remember" class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-amber-600 focus:ring-amber-500 checked:border-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800" id="hs-default-checkbox">
                    <label for="remember-me" class="text-sm text-gray-500 dark:text-neutral-400">Ingat informasi login</label>
                </div>

                {{-- <div class="text-sm/6">
                    <a href="#" class="font-semibold text-amber-600 hover:text-amber-700">Forgot password?</a>
                </div> --}}
                </div>

                <div>
                <button type="submit" onclick="login()" class="w-full py-2 px-3 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-amber-600 text-white hover:bg-amber-700 focus:outline-hidden focus:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none">Masuk</button>
                </div>
            </form>
            </div>

            <div class="mt-10">
            <div class="relative">
                <div aria-hidden="true" class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-700"></div>
                </div>
                <div class="relative flex justify-center text-sm/6 font-medium">
                <span class="bg-white px-6 text-gray-800 dark:bg-neutral-900 dark:text-gray-300">Atau lanjutkan dengan</span>
                </div>
            </div>

            <div class="mt-6">
                <a href="#" class="flex w-full items-center justify-center gap-3 rounded-md bg-gray-500/10 px-3 py-2 text-sm font-semibold text-gray-800 inset-ring inset-ring-white/5 hover:bg-gray-500/20 focus-visible:inset-ring-transparent dark:bg-white/10 dark:text-white dark:hover:bg-white/20">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="h-5 w-5">
                    <path d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z" fill="#EA4335" />
                    <path d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z" fill="#4285F4" />
                    <path d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z" fill="#FBBC05" />
                    <path d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.2654 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z" fill="#34A853" />
                </svg>
                <span class="text-sm/6 font-semibold text-gray-800 dark:text-white">Google</span>
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="relative hidden w-0 flex-1 lg:block">
        <img src="https://images.pexels.com/photos/2041540/pexels-photo-2041540.jpeg" alt="Banner" class="absolute inset-0 size-full object-cover" />
    </div>
</div>
</x-head>

@if (session('successToast'))
<x-toast type='normal' status='success'>
{{ session('successToast') }}
</x-toast>
@endif
<x-toast type='errors-has'></x-toast>

<script>
    function login(){
        document.querySelector('form').submit()
        const button = event.target;
        button.disabled = true
        button.innerHTML = '<svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="4" cy="12" r="3" fill="currentColor"><animate id="SVGKiXXedfO" attributeName="cy" begin="0;SVGgLulOGrw.end+0.25s" calcMode="spline" dur="0.6s" keySplines=".33,.66,.66,1;.33,0,.66,.33" values="12;6;12"/></circle><circle cx="12" cy="12" r="3" fill="currentColor"><animate attributeName="cy" begin="SVGKiXXedfO.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".33,.66,.66,1;.33,0,.66,.33" values="12;6;12"/></circle><circle cx="20" cy="12" r="3" fill="currentColor"><animate id="SVGgLulOGrw" attributeName="cy" begin="SVGKiXXedfO.begin+0.2s" calcMode="spline" dur="0.6s" keySplines=".33,.66,.66,1;.33,0,.66,.33" values="12;6;12"/></circle></svg>'
    }
</script>