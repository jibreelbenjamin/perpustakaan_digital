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

        <div class="mt-8">
            <nav class="flex space-x-1 border-b border-gray-200 dark:border-neutral-700" aria-label="Tabs" role="tablist">
                <button type="button" id="tab-manual" class="hs-tab-active:font-semibold hs-tab-active:border-amber-600 hs-tab-active:text-amber-600 py-2.5 px-3 inline-flex items-center gap-x-2 text-sm whitespace-nowrap text-gray-500 border-b-2 border-transparent hover:text-amber-600 focus:outline-hidden focus:text-amber-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-amber-500 active" role="tab" aria-selected="true" data-hs-tab="#login-manual" aria-controls="login-manual">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    Login Manual
                </button>
                <button type="button" id="tab-demo" class="hs-tab-active:font-semibold hs-tab-active:border-amber-600 hs-tab-active:text-amber-600 py-2.5 px-3 inline-flex items-center gap-x-2 text-sm whitespace-nowrap text-gray-500 border-b-2 border-transparent hover:text-amber-600 focus:outline-hidden focus:text-amber-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-amber-500" role="tab" aria-selected="false" data-hs-tab="#login-demo" aria-controls="login-demo">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Login Demo
                </button>
            </nav>

            {{-- Tab 1: Login Manual --}}
            <div id="login-manual" role="tabpanel" aria-labelledby="tab-manual">
            <div class="mt-6">
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
                    }' class="absolute inset-y-0 end-0 flex items-center z-20 px-5 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-amber-600 dark:text-neutral-600 dark:focus:text-amber-500">
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
                <button id="btn-login" type="submit" onclick="disableAll(this, event)" class="w-full py-2 px-3 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-amber-600 text-white hover:bg-amber-700 focus:outline-hidden focus:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none">Masuk</button>
                </div>

                {{-- <p class="mt-4 text-center">
                    <a href="javascript:;" onclick="document.querySelector('[data-hs-tab=\"#login-demo\"]').click()" class="text-xs text-gray-400 hover:text-amber-600 dark:text-neutral-500 dark:hover:text-amber-400 underline underline-offset-2">Masuk menggunakan akun demo →</a>
                </p> --}}
            </form>
            </div>
            </div>
            </div>

            {{-- Tab 2: Login Demo --}}
            <div id="login-demo" class="hidden" role="tabpanel" aria-labelledby="tab-demo">
            <div class="mt-6 p-4 sm:p-5 bg-white border border-gray-200 rounded-xl shadow-xs dark:bg-neutral-800 dark:border-neutral-700">
                <p class="text-xs text-gray-500 dark:text-neutral-400 mb-3">Gunakan akun demo di bawah untuk mencoba setiap peran.</p>
                <div class="space-y-2">
                    {{-- Admin --}}
                    <div class="flex items-center justify-between py-2 px-3 bg-amber-50 rounded-lg border border-amber-200 dark:bg-amber-900/20 dark:border-amber-800/40">
                        <div class="flex items-center gap-x-2.5">
                            <div class="size-7 flex items-center justify-center rounded-full bg-amber-600/10 dark:bg-amber-500/20">
                                <svg class="shrink-0 size-3.5 text-amber-600 dark:text-amber-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800 dark:text-white">Jibreel Benjamin</p>
                                <p class="text-xs text-gray-400 dark:text-neutral-500">Admin role</p>
                            </div>
                        </div>
                        <button type="button" onclick="submitDemoLogin('admin', this)" class="py-1.5 px-3 inline-flex justify-center items-center gap-x-1.5 text-xs font-medium rounded-lg border border-amber-300 bg-amber-600 text-white hover:bg-amber-700 focus:outline-hidden focus:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none dark:border-amber-700">Masuk</button>
                    </div>
                    {{-- Moderator --}}
                    <div class="flex items-center justify-between py-2 px-3 bg-blue-50 rounded-lg border border-blue-200 dark:bg-blue-900/20 dark:border-blue-800/40">
                        <div class="flex items-center gap-x-2.5">
                            <div class="size-7 flex items-center justify-center rounded-full bg-blue-600/10 dark:bg-blue-500/20">
                                <svg class="shrink-0 size-3.5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800 dark:text-white">Moderator Demo</p>
                                <p class="text-xs text-gray-400 dark:text-neutral-500">Moderator role</p>
                            </div>
                        </div>
                        <button type="button" onclick="submitDemoLogin('moderator', this)" class="py-1.5 px-3 inline-flex justify-center items-center gap-x-1.5 text-xs font-medium rounded-lg border border-blue-300 bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:border-blue-700">Masuk</button>
                    </div>
                    {{-- Staff --}}
                    <div class="flex items-center justify-between py-2 px-3 bg-emerald-50 rounded-lg border border-emerald-200 dark:bg-emerald-900/20 dark:border-emerald-800/40">
                        <div class="flex items-center gap-x-2.5">
                            <div class="size-7 flex items-center justify-center rounded-full bg-emerald-600/10 dark:bg-emerald-500/20">
                                <svg class="shrink-0 size-3.5 text-emerald-600 dark:text-emerald-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800 dark:text-white">Staff Demo</p>
                                <p class="text-xs text-gray-400 dark:text-neutral-500">Staff role</p>
                            </div>
                        </div>
                        <button type="button" onclick="submitDemoLogin('staff', this)" class="py-1.5 px-3 inline-flex justify-center items-center gap-x-1.5 text-xs font-medium rounded-lg border border-emerald-300 bg-emerald-600 text-white hover:bg-emerald-700 focus:outline-hidden focus:bg-emerald-700 disabled:opacity-50 disabled:pointer-events-none dark:border-emerald-700">Masuk</button>
                    </div>
                </div>
                <p class="mt-3 text-xs text-center text-gray-400 dark:text-neutral-500">Klik tombol <span class="text-amber-600 dark:text-amber-400">Masuk</span> untuk login langsung sebagai role tersebut</p>
            </div>
            </div>
        </div>
        {{-- End Tabs --}}
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

<div id="loading-overlay" class="fixed inset-0 z-[999] flex items-center justify-center bg-white/80 dark:bg-neutral-900/80 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="flex flex-col items-center gap-y-4">
        <div class="relative size-14">
            <div class="absolute inset-0 rounded-full border-4 border-amber-200 dark:border-amber-900/40"></div>
            <div class="absolute inset-0 rounded-full border-4 border-transparent border-t-amber-600 animate-spin"></div>
            <div class="absolute inset-2 rounded-full bg-amber-100 dark:bg-amber-900/30 flex items-center justify-center">
                <svg class="size-5 text-amber-600 dark:text-amber-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-earth-lock-icon lucide-earth-lock"><path d="M7 3.34V5a3 3 0 0 0 3 3"/><path d="M11 21.95V18a2 2 0 0 0-2-2 2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"/><path d="M21.54 15H17a2 2 0 0 0-2 2v4.54"/><path d="M12 2a10 10 0 1 0 9.54 13"/><path d="M20 6V4a2 2 0 1 0-4 0v2"/><rect width="8" height="5" x="14" y="6" rx="1"/></svg>
            </div>
        </div>
        <p class="text-sm font-medium text-gray-700 dark:text-neutral-300">Creating session...</p>
        <div class="flex gap-x-1.5">
            <span class="size-1.5 rounded-full bg-amber-600 animate-bounce" style="animation-delay:0ms"></span>
            <span class="size-1.5 rounded-full bg-amber-600 animate-bounce" style="animation-delay:150ms"></span>
            <span class="size-1.5 rounded-full bg-amber-600 animate-bounce" style="animation-delay:300ms"></span>
        </div>
    </div>
</div>

<script>
    var SPINNER = '<svg class="shrink-0 size-4 animate-spin" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>';

    function disableAll(btn, event) {
        event.preventDefault();

        document.querySelectorAll('[role="tab"]').forEach(tab => {
            tab.style.pointerEvents = 'none';
            tab.style.opacity = '0.5';
        });

        const forms = document.querySelectorAll('form[action*="login"]');
        forms.forEach(form => {
            const buttons = form.querySelectorAll('button[type="submit"]');
            buttons.forEach(b => {
                b.disabled = true;
                if (b === btn) {
                    const origWidth = b.offsetWidth;
                    b.innerHTML = SPINNER;
                    b.style.width = origWidth + 'px';
                }
            });
        });
        btn.closest('form').submit();
    }
</script>