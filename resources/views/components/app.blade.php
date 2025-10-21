<x-head>
    <header class="lg:hidden flex flex-wrap md:justify-start md:flex-nowrap z-50 bg-white dark:bg-neutral-900">
        <div class="max-w-4xl mx-auto flex justify-between items-center basis-full w-full py-2.5 px-5 md:px-8 2xl:px-5">
        <!-- Logo & Sidebar Toggle -->
        <div class=" flex items-center">
            <div class="lg:hidden">
            <!-- Sidebar Toggle -->
            <button type="button" class="w-7 h-9.5 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-pro-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-pro-sidebar">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 8L21 12L17 16M3 12H13M3 6H13M3 18H13" />
                </svg>
            </button>
            <!-- End Sidebar Toggle -->
            </div>
        </div>
        <!-- End Logo & Sidebar Toggle -->

        <div class=" flex justify-end items-center gap-x-1.5">
            <!-- Dark Mode -->
            <button type="button" class="hs-dark-mode-active:hidden flex hs-dark-mode group size-9.5 justify-center items-center gap-x-2 rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-theme-click-value="dark">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
            </svg>
            </button>
            <button type="button" class="hs-dark-mode-active:flex hidden hs-dark-mode group size-9.5 justify-center items-center gap-x-2 rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-theme-click-value="light">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="4" />
                <path d="M12 2v2" />
                <path d="M12 20v2" />
                <path d="m4.93 4.93 1.41 1.41" />
                <path d="m17.66 17.66 1.41 1.41" />
                <path d="M2 12h2" />
                <path d="M20 12h2" />
                <path d="m6.34 17.66-1.41 1.41" />
                <path d="m19.07 4.93-1.41 1.41" />
            </svg>
            </button>
            <!-- End Dark Mode -->

            <!-- More Dropdown -->
            <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
            <button id="hs-pro-pnnmd" type="button" class="size-9.5 inline-flex justify-center items-center gap-x-2 rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                <img class="shrink-0 size-9.5 rounded-md dark:brightness-400" src="{{ asset('images/pfp.svg') }}" alt="Avatar">
            </button>

            <!-- Account Dropdown -->
            <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-60 transition-[opacity,margin] duration opacity-0 hidden z-20 bg-white rounded-xl shadow-xl dark:bg-neutral-800" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-pnnmd">
                <div class="p-1">
                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-pen-icon lucide-user-pen"><path d="M11.5 15H7a4 4 0 0 0-4 4v2"/><path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><circle cx="10" cy="7" r="4"/></svg>
                    Update profil
                </a>
                <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-key-round-icon lucide-key-round"><path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/></svg>
                    Ubah password
                </a>
                <button class="w-full flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    Keluar
                </button>
                </div>
                <div class="p-1 border-t border-gray-200 dark:border-neutral-700">
                <button type="button" class="flex gap-x-3 py-2 px-3 w-full rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dasadam">
                    <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M8 12h8" />
                    <path d="M12 8v8" />
                    </svg>
                    Input data pinjaman
                </button>
                </div>
            </div>
            <!-- End Account Dropdown -->
            </div>
            <!-- End More Dropdown -->
        </div>
        </div>
    </header>

    <aside id="hs-pro-sidebar" class="hs-overlay [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-65
    hidden
    fixed inset-y-0 start-0 z-60
    bg-gray-50
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
    dark:bg-neutral-800" tabindex="-1" aria-label="Sidebar">
        <div class="flex flex-col h-full max-h-full">
        <!-- Header -->
        <div class="p-5 text-center">
            <div class="flex size-24 rounded-full mx-auto mb-2">
            <img class="object-cover size-full rounded-full dark:brightness-400" src="{{ asset('images/pfp.svg') }}" alt="Avatar">
            </div>

            <p class="lg:hidden font-semibold text-gray-800 dark:text-neutral-200">
            {{ Auth::user()->name }}
            </p>

            <div class="hidden lg:block">
            <!-- More Dropdown -->
            <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                <button id="hs-pro-dnsmd" type="button" class="py-1 px-2 inline-flex justify-center items-center gap-x-1 font-semibold rounded-lg text-gray-800 hover:text-amber-600 focus:outline-hidden focus:text-amber-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-300 dark:hover:text-amber-500 dark:focus:text-amber-500" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                {{ Auth::user()->name }}
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
                </button>

                <!-- Account Dropdown -->
                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-60 transition-[opacity,margin] duration opacity-0 hidden z-20 bg-white rounded-xl shadow-xl dark:bg-neutral-800" role="menu" aria-orientation="vertical" aria-labelledby="hs-pro-pnnmd">
                <div class="p-1">
                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-pen-icon lucide-user-pen"><path d="M11.5 15H7a4 4 0 0 0-4 4v2"/><path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><circle cx="10" cy="7" r="4"/></svg>
                    Update profil
                    </a>
                    <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-key-round-icon lucide-key-round"><path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/></svg>
                    Ubah password
                    </a>
                    <button class="w-full flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    Keluar
                    </button>
                </div>
                <div class="p-1 border-t border-gray-200 dark:border-neutral-700">
                    <button type="button" class="flex gap-x-3 py-2 px-3 w-full rounded-lg text-sm text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-dasadam">
                    <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg>
                    Input data pinjaman
                    </button>
                </div>
                </div>
                <!-- End Account Dropdown -->
            </div>
            <!-- End More Dropdown -->
            </div>

            <p class="text-xs text-gray-500 dark:text-neutral-500">
                {{ '@'.Auth::user()->username }} - {{ Auth::user()->role }}
            </p>
        </div>
        <!-- End Header -->

        <!-- Content -->
        <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
            <!-- Nav -->
            <nav class="hs-accordion-group pt-0 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="p-4 space-y-1 border-y border-gray-200 dark:border-neutral-700">
                <!-- Link -->
                <li>
                <a class="flex py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 bg-gray-200 focus:bg-gray-300 dark:bg-neutral-700 dark:focus:bg-neutral-600" href="../../pro/payment/index.html">
                    <span class="w-5 me-3">
                    <svg class="shrink-0 mt-0.5 size-4 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    </span>
                    Beranda
                </a>
                </li>
                <!-- End Link -->

                <!-- Balances -->
                <li class="hs-accordion " id="balances-accordion">
                <button type="button" class="hs-accordion-toggle hs-accordion-active:bg-gray-200 w-full text-start flex py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:bg-neutral-700 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-600 dark:text-neutral-300 dark:focus:bg-neutral-600" aria-expanded="false" aria-controls="balances-accordion-sub">
                    <span class="w-5 me-3">
                    <svg class="shrink-0 mt-0.5 size-4 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stamp-icon lucide-stamp"><path d="M14 13V8.5C14 7 15 7 15 5a3 3 0 0 0-6 0c0 2 1 2 1 3.5V13"/><path d="M20 15.5a2.5 2.5 0 0 0-2.5-2.5h-11A2.5 2.5 0 0 0 4 15.5V17a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1z"/><path d="M5 22h14"/></svg>
                    </span>
                    Pinjaman

                    <svg class="hs-accordion-active:-rotate-180 shrink-0 mt-1 size-3.5 ms-auto transition" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>

                <div id="balances-accordion-sub" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" role="region" aria-labelledby="balances-accordion" style="display: none;">
                    <ul class="hs-accordion-group ps-8 mt-1 space-y-1 relative before:absolute before:top-0 before:start-5 before:w-0.5 before:h-full before:bg-gray-200 dark:before:bg-neutral-700" data-hs-accordion-always-open>
                    <li>
                        <a class="flex gap-x-4 py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 " href="../../pro/payment/balances.html">
                        Daftar pinjaman
                        </a>
                    </li>
                    <li>
                        <a class="flex gap-x-4 py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 " href="../../pro/payment/balances-empty-content.html">
                        Daftar buku dipinjam
                        </a>
                    </li>
                    <li>
                        <a class="flex gap-x-4 py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 " href="../../pro/payment/balances-open-new.html">
                        Daftar buku hilang
                        </a>
                    </li>
                    <li>
                        <a class="flex gap-x-4 py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 " href="../../pro/payment/balances-open-new.html">
                        Daftar buku dikembalikan
                        </a>
                    </li>
                    <li>
                        <a class="flex gap-x-4 py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 " href="../../pro/payment/balances-open-new.html">
                        Input data pinjaman
                        </a>
                    </li>
                    </ul>
                </div>
                </li>
                <!-- End Balances -->

                <!-- Link -->
                <li>
                <a class="flex py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 " href="../../pro/payment/empty-states.html">
                    <span class="w-5 me-3">
                    <svg class="shrink-0 mt-0.5 size-4 mx-auto"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-library-big-icon lucide-library-big"><rect width="8" height="18" x="3" y="3" rx="1"/><path d="M7 3v18"/><path d="M20.4 18.9c.2.5-.1 1.1-.6 1.3l-1.9.7c-.5.2-1.1-.1-1.3-.6L11.1 5.1c-.2-.5.1-1.1.6-1.3l1.9-.7c.5-.2 1.1.1 1.3.6Z"/></svg>
                    </span>
                    Daftar buku
                </a>
                </li>
                <!-- End Link -->

                <!-- Link -->
                <li>
                <a class="flex py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 " href="../../pro/payment/empty-states.html">
                    <span class="w-5 me-3">
                    <svg class="shrink-0 mt-0.5 size-4 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-blocks-icon lucide-blocks"><path d="M10 22V7a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5a1 1 0 0 0-1-1H2"/><rect x="14" y="2" width="8" height="8" rx="1"/></svg>
                    </span>
                    Daftar kategori buku
                </a>
                </li>
                <!-- End Link -->

                @if (Auth::user()->role == 'admin')                
                <!-- Link -->
                <li>
                <a class="flex py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 " href="../../pro/payment/empty-states.html">
                    <span class="w-5 me-3">
                    <svg class="shrink-0 mt-0.5 size-4 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M16 3.128a4 4 0 0 1 0 7.744"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="9" cy="7" r="4"/></svg>
                    </span>
                    Daftar petugas
                </a>
                </li>
                <!-- End Link -->
                @endif
            </ul>
            
            <ul class="p-4 space-y-1">
                <!-- Link -->
                <li>
                <a class="flex py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:hover:bg-neutral-700 dark:text-neutral-300 dark:focus:bg-neutral-700 " href="../../pro/payment/recipients.html">
                    <span class="w-5 me-3">
                    <svg class="shrink-0 mt-0.5 size-4 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                    </span>
                    Input data pinjaman
                </a>
                </li>
                <!-- End Link -->

                <!-- Link -->
                <li>
                <button class="w-full flex py-2 px-3 text-sm text-gray-800 rounded-lg hover:bg-gray-200 focus:outline-hidden dark:hover:bg-neutral-700 dark:text-neutral-300" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
                    <span class="w-5 me-3">
                    <svg class="shrink-0 mt-0.5 size-4 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out"><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/></svg>
                    </span>
                    Keluar
                </button>
                </li>
                <!-- End Link -->
            </ul>
            </nav>
            <!-- End Nav -->
        </div>
        <!-- End Content -->

        <!-- Footer -->
        <footer class="hidden lg:block py-2 px-5 border-t border-gray-200 dark:border-neutral-700">
            <div class="flex items-center">
            <!-- Logo -->
            <p class="flex-none text-xs inline-block text-gray-800 dark:text-neutral-200">
                © 2025 Jibreel Benjamin.
            </p>
            <!-- End Logo -->

            <div class="ms-auto">
                <!-- Dark Mode -->
                <div>
                <button type="button" class="hs-dark-mode-active:hidden flex hs-dark-mode group size-9.5 justify-center items-center gap-x-2 rounded-full border border-transparent text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-200 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-theme-click-value="dark">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                </button>
                <button type="button" class="hs-dark-mode-active:flex hidden hs-dark-mode group size-9.5 justify-center items-center gap-x-2 rounded-full border border-transparent text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-200 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-theme-click-value="light">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="4" />
                    <path d="M12 2v2" />
                    <path d="M12 20v2" />
                    <path d="m4.93 4.93 1.41 1.41" />
                    <path d="m17.66 17.66 1.41 1.41" />
                    <path d="M2 12h2" />
                    <path d="M20 12h2" />
                    <path d="m6.34 17.66-1.41 1.41" />
                    <path d="m19.07 4.93-1.41 1.41" />
                    </svg>
                </button>
                </div>
                <!-- End Dark Mode -->
            </div>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- Sidebar Close -->
        <div class="lg:hidden absolute top-3 end-3 z-10">
            <button type="button" class="w-6 h-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-gray-50 text-gray-500 hover:bg-gray-50 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-pro-sidebar">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="7 8 3 12 7 16" />
                <line x1="21" x2="11" y1="12" y2="12" />
                <line x1="21" x2="11" y1="6" y2="6" />
                <line x1="21" x2="11" y1="18" y2="18" />
            </svg>
            </button>
        </div>
        <!-- End Sidebar Close -->
        </div>
    </aside>


    <main id="content" class="lg:ps-65">
        {{ $slot }}
    </main>

    <!-- Logout Modal -->
    <div id="hs-scale-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
        <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-7">
                    <div class="flex justify-between items-center  ">
                        <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Keluar?
                        </h3>
                    </div>
                    <div class="pb-3 overflow-y-auto">
                        <p class="mt-1 text-gray-800 dark:text-neutral-400">
                        Yakin keluar dari aplikasi? Anda dapat masuk kembali dihalaman login.
                        </p>
                    </div>
                    <div class="flex justify-end items-center gap-x-2  ">
                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-scale-animation-modal">
                        Kembali
                        </button>
                        <a href="/logout" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                        Keluar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Logout Modal -->

    @if (session('successToast'))
    <x-toast type='normal' status='success'>
    {{ session('successToast') }}
    </x-toast>
    @endif
    <x-toast type='errors-has'></x-toast>
</x-head>
