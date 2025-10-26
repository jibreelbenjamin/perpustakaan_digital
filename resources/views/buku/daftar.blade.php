@php
    $page = 'buku';
@endphp
<x-app :page='$page'>
    <div class="max-w-4xl mx-auto py-5 sm:py-10 px-5 md:px-8 2xl:px-5">
      <!-- Button -->
      <div class="mb-5">
        <a class="pe-3 group inline-flex items-center gap-x-2 text-start text-sm text-gray-800 rounded-full hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="{{ route('home') }}">
          <span class="shrink-0 size-9 inline-flex justify-center items-center bg-gray-100 rounded-full group-hover:bg-gray-200 group-focus:bg-gray-200 dark:bg-neutral-800 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m12 19-7-7 7-7" />
              <path d="M19 12H5" />
            </svg>
          </span>
          Kembali ke beranda
        </a>
      </div>
      <!-- End Button -->

      <!-- Header -->
      <div class="mb-3 flex flex-col md:flex-row md:items-center gap-y-2 md:gap-y-0 gap-3">
        <div>
          <h1 class="font-semibold text-lg md:text-xl text-gray-800 dark:text-white">
            Daftar buku
          </h1>
          @if (!empty($buku))
          <p class="text-sm text-gray-500 dark:text-neutral-500">Total <b>{{ number_format($total) }}</b> data tercatat</p>
          @else
          <p class="text-sm text-gray-500 dark:text-neutral-500">Tidak ada data tercatat</p>
          @endif
        </div>
        <!-- End Col -->

        <div class="flex md:justify-end items-center md:grow gap-3">
          <!-- Search Input -->
          <div class="relative sm:w-72">
            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
              <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
              </svg>
            </div>
            <input type="text" id="search-input" class="py-1.5 sm:py-2 ps-10 pe-8 block w-full bg-gray-100 border-transparent rounded-xl sm:text-sm hover:bg-gray-200 focus:bg-white focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-900 dark:focus:ring-neutral-600" placeholder="Cari data buku" autocomplete="off">
            <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1">
              <button type="button" class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-amber-600 focus:outline-hidden focus:text-amber-600 dark:text-neutral-500 dark:hover:text-amber-500 dark:focus:text-amber-500" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10" />
                  <path d="m15 9-6 6" />
                  <path d="m9 9 6 6" />
                </svg>
              </button>
            </div>
          </div>
          <!-- End Search Input -->

          @if (Auth::user()->role != 'staff')              
          <!-- Button -->
          <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-xl bg-gray-100 border border-transparent text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-form-tambah-buku-modal" data-hs-overlay="#hs-form-tambah-buku-modal">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
            Tambah
          </button>
          <!-- End Button -->
          @endif
        </div>
        <!-- End Col -->
      </div>
      <!-- End Header -->

      <!-- Borrowings List Group Card -->
      <div>
        <div class="mb-3">
          <!-- List -->
          <div id="buku-container" class="-mx-3">

            @if (!empty($buku))

            @else
                <div class="p-5 min-h-96 flex flex-col justify-center items-center text-center">
                    <svg class="w-48 mx-auto mb-4" width="178" height="90" viewBox="0 0 178 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="27" y="50.5" width="124" height="39" rx="7.5" fill="currentColor" class="fill-white dark:fill-neutral-800" />
                    <rect x="27" y="50.5" width="124" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-50 dark:stroke-neutral-700/10" />
                    <rect x="34.5" y="58" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />
                    <rect x="66.5" y="61" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />
                    <rect x="66.5" y="73" width="77" height="6" rx="3" fill="currentColor" class="fill-gray-50 dark:fill-neutral-700/30" />
                    <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" fill="currentColor" class="fill-white dark:fill-neutral-800" />
                    <rect x="19.5" y="28.5" width="139" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-100 dark:stroke-neutral-700/30" />
                    <rect x="27" y="36" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />
                    <rect x="59" y="39" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />
                    <rect x="59" y="51" width="92" height="6" rx="3" fill="currentColor" class="fill-gray-100 dark:fill-neutral-700/70" />
                    <g filter="url(#filter1)">
                        <rect x="12" y="6" width="154" height="40" rx="8" fill="currentColor" class="fill-white dark:fill-neutral-800" shape-rendering="crispEdges" />
                        <rect x="12.5" y="6.5" width="153" height="39" rx="7.5" stroke="currentColor" class="stroke-gray-100 dark:stroke-neutral-700/60" shape-rendering="crispEdges" />
                        <rect x="20" y="14" width="24" height="24" rx="4" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700 " />
                        <rect x="52" y="17" width="60" height="6" rx="3" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700" />
                        <rect x="52" y="29" width="106" height="6" rx="3" fill="currentColor" class="fill-gray-200 dark:fill-neutral-700" />
                    </g>
                    <defs>
                        <filter id="filter1" x="0" y="0" width="178" height="64" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                        <feOffset dy="6" />
                        <feGaussianBlur stdDeviation="6" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1187_14810" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1187_14810" result="shape" />
                        </filter>
                    </defs>
                    </svg>

                    <div class="max-w-sm mx-auto">
                    <p class="mt-2 font-medium text-gray-800 dark:text-neutral-200">
                        Data kosong
                    </p>
                    <p class="mb-5 text-sm text-gray-500 dark:text-neutral-500">
                        Tidak ada data yang tercatat disistem.
                    </p>
                    </div>
                </div> 
            @endif

          </div>
          <!-- End List -->
        </div>
      </div>
      <!-- End Borrowings List Group Card -->

        @if (!empty($buku))      
            <div class="mt-4">
                <p id="loading" class="my-10 font-medium text-sm text-amber-600 dark:text-amber-500 hidden">
                    <svg class="shrink-0 size-5 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="4" cy="12" r="3" fill="currentColor"><animate id="SVGKiXXedfO" attributeName="cy" begin="0;SVGgLulOGrw.end+0.25s" calcMode="spline" dur="0.6s" keySplines=".33,.66,.66,1;.33,0,.66,.33" values="12;6;12"/></circle><circle cx="12" cy="12" r="3" fill="currentColor"><animate attributeName="cy" begin="SVGKiXXedfO.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".33,.66,.66,1;.33,0,.66,.33" values="12;6;12"/></circle><circle cx="20" cy="12" r="3" fill="currentColor"><animate id="SVGgLulOGrw" attributeName="cy" begin="SVGKiXXedfO.begin+0.2s" calcMode="spline" dur="0.6s" keySplines=".33,.66,.66,1;.33,0,.66,.33" values="12;6;12"/></circle></svg>
                </p>
                <p id="end" class="my-10 text-center font-medium text-sm text-amber-600 dark:text-amber-500 hidden">
                    
                </p>
            </div>
        @endif
    </div>

    <!-- Form Tambah Buku Modal -->
    <div id="hs-form-tambah-buku-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-form-tambah-buku-modal-label">
        <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-7">
                    <div class="flex justify-between">
                        <h3 id="hs-form-tambah-buku-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Tambah data buku
                        <p class="text-xs font-medium text-gray-500">Menambahkan daftar buku baru ke dalam sistem.</p>
                        </h3>
                    </div>
                    <div class="py-5 overflow-y-auto">
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="title" class="block text-sm mb-2 dark:text-white">Judul buku</label>
                                <div class="relative">
                                <input type="text" id="title" placeholder="Masukan judul buku" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                </div>
                                <p id="title_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label class="block text-sm mb-2 dark:text-white">Kategori</label>
                                <div class="relative">
                                <select id="id_category" data-hs-select='{
                                    "apiUrl": "{{ url('') }}/api/category/select",
                                    "apiQuery": "",
                                    "apiSearchQueryKey": "search",
                                    "apiDataPart": "data",
                                    "apiFieldsMap": {
                                        "id": "id_category",
                                        "val": "id_category",
                                        "title": "name",
                                        "description": "description"
                                    },

                                    "isSelectedOptionOnTop": true,
                                    "hasSearch": true,
                                    "searchPlaceholder": "Cari kategori...",
                                    "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-amber-500 focus:ring-amber-500 before:absolute before:inset-0 before:z-1 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-1.5 sm:py-2 px-3",
                                    "searchWrapperClasses": "bg-white p-2 -mx-1 -mt-1 sticky top-0 dark:bg-neutral-900",
                                    "placeholder": "Pilih kategori...",
                                    "toggleTag": "<button id=\"category\" type=\"button\" aria-expanded=\"false\"><span class=\"\" data-title></span></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:border-amber-500 focus:ring-amber-500 dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400",
                                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div class=\"flex items-center\"><div><div class=\"text-sm font-semibold text-gray-800 dark:text-neutral-200 \" data-title></div><div class=\"text-xs text-gray-500 dark:text-neutral-500 \" data-description></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-amber-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                    }' class="hidden">
                                    <option value="">Choose</option>
                                </select>
                                </div>
                                <p id="category_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="author" class="block text-sm mb-2 dark:text-white">Author</label>
                                <div class="relative">
                                <input type="text" id="author" placeholder="Masukan nama penulis" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                </div>
                                <p id="author_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="publisher" class="block text-sm mb-2 dark:text-white">Publisher (opsional)</label>
                                <div class="relative">
                                <input type="text" id="publisher" placeholder="Masukan penerbit" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                </div>
                                <p id="publisher_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="year" class="block text-sm mb-2 dark:text-white">Tahun (opsional)</label>
                                <div class="relative">
                                <input type="number" id="year" placeholder="Masukan tahun terbit" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                </div>
                                <p id="year_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->
                            <p id="error" class="text-sm text-red-500"></p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center gap-x-2  ">
                        <button id="btn-close" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-form-tambah-buku-modal">
                        Tutup
                        </button>
                        <button id="btn-send" onclick="input()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-amber-600 text-white hover:bg-amber-700 focus:outline-hidden focus:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none">
                        Tambah buku
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Tambah Buku Modal -->
</x-app>

<script>
let offset = 0;
const limit = 15;
let isLoading = false;
let allDataLoaded = false;
let searchQuery = '';
let debounceTimer = null;

function loadMoreData(reset = false) {
    if (reset) {
        offset = 0;
        allDataLoaded = false;
        document.getElementById('buku-container').innerHTML = '';
        document.getElementById('end').classList.add('hidden');
    }

    if (isLoading || allDataLoaded) return;
    isLoading = true;
    document.getElementById('loading').classList.remove('hidden');

    searchQuery = document.getElementById('search-input').value;
    setTimeout(() => {
        fetch(`{{ route('buku.load') }}?offset=${offset}&limit=${limit}&search=${encodeURIComponent(searchQuery)}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('loading').classList.add('hidden');

                if (data.length === 0) {
                    allDataLoaded = true;
                    document.getElementById('end').classList.remove('hidden');
                    document.getElementById('end').textContent = 'Data telah ditampilkan semua'
                    isLoading = false;
                    if (offset === 0) {
                        document.getElementById('end').textContent = 'Data tidak ditemukan';
                        allDataLoaded = false;
                    }
                    return;
                }

                const container = document.getElementById('buku-container');
                data.forEach(item => {
                    container.insertAdjacentHTML('beforeend', `
                        <a class="mb-2 p-3 group flex gap-x-4 rounded-2xl hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="{{ env('APP_URL') }}/buku/${item.id_book}/detail">
                            <div class="grow">
                                <div class="flex justify-between items-center gap-x-3">
                                    <div>
                                        <h4 class="font-medium text-gray-800 dark:text-white">
                                            ${item.title}
                                        </h4>
                                        <ul class="flex flex-wrap">
                                            <li class="inline-block relative text-sm text-gray-500 pe-4 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:bg-gray-500 before:rounded-full dark:before:bg-neutral-500 dark:text-neutral-500"">
                                                #${item.id_book}
                                            </li>
                                            <li class="inline-block relative text-sm text-gray-500 pe-4 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:bg-gray-500 before:rounded-full dark:before:bg-neutral-500 dark:text-neutral-500"">
                                                ${item.year}
                                            </li>
                                            <li class="inline-block relative text-sm text-gray-500 pe-4 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:bg-gray-500 before:rounded-full dark:before:bg-neutral-500 dark:text-neutral-500"">
                                                ${item.author}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-end self-baseline-last">
                                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                                            Ditambahkan pada ${new Date(item.created_at).toLocaleDateString('id', { day: '2-digit', month: '2-digit', year: 'numeric' })}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `);
                });

                offset += data.length;
                isLoading = false;
            })
            .catch(() => {
                document.getElementById('loading').classList.add('hidden');
                isLoading = false;
            });
    }, 1000);
}
loadMoreData()

window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY;
    const windowHeight = window.innerHeight;
    const docHeight = document.documentElement.scrollHeight;

    if (scrollTop + windowHeight >= docHeight - 200) {
        loadMoreData();
    }
});
document.getElementById('search-input').addEventListener('input', (e) => {
    const value = e.target.value.trim();

    clearTimeout(debounceTimer);

    if (value.length >= 1 || value.length === 0) {
        debounceTimer = setTimeout(() => {
            searchQuery = value;
            loadMoreData(true);
        }, 1000);
    }
});

function input(){
    const button = document.getElementById('btn-send')
    const label = document.getElementById('error')
    var title = document.getElementById('title')
    var id_category = document.getElementById('id_category')
    var category = document.getElementById('category')
    var author = document.getElementById('author')
    var publisher = document.getElementById('publisher')
    var year = document.getElementById('year')

    var title_label = document.getElementById('title_label')
    var category_label = document.getElementById('category_label')
    var author_label = document.getElementById('author_label')
    var publisher_label = document.getElementById('publisher_label')
    var year_label = document.getElementById('year_label')

    button.disabled = true
    button.textContent = "Loading..."
    label.textContent = ''

    fetch("{{ route('daftar.buku.add') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            title: title.value,
            id_category: id_category.value,
            author: author.value,
            publisher: publisher.value,
            year: year.value,
        })
    })
    .then(async (response) => {
        await new Promise(resolve => setTimeout(resolve, 500));
        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Gagal mengirim data ke server');
        }

        [title, category, author, publisher, year].forEach(el => {
            el.classList.replace('border-red-500','border-gray-200')
            el.classList.replace('dark:border-red-600','dark:border-neutral-800')
        });
        [title_label, category_label, author_label, publisher_label, year_label].forEach(el => {
            el.classList.add('hidden')
        });

        if (data.status === false) {
            if (data.errors && typeof data.errors === 'object') {
                if(data.errors.title){
                    title.classList.replace('border-gray-200','border-red-500')
                    title.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    title_label.classList.remove('hidden')
                    title_label.querySelector('span').textContent = data.errors.title
                }
                if(data.errors.id_category){
                    category.classList.replace('border-gray-200','border-red-500')
                    category.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    category_label.classList.remove('hidden')
                    category_label.querySelector('span').textContent = data.errors.id_category
                }
                if(data.errors.author){
                    author.classList.replace('border-gray-200','border-red-500')
                    author.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    author_label.classList.remove('hidden')
                    author_label.querySelector('span').textContent = data.errors.author
                }
                if(data.errors.publisher){
                    publisher.classList.replace('border-gray-200','border-red-500')
                    publisher.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    publisher_label.classList.remove('hidden')
                    publisher_label.querySelector('span').textContent = data.errors.publisher
                }
                if(data.errors.year){
                    year.classList.replace('border-gray-200','border-red-500')
                    year.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    year_label.classList.remove('hidden')
                    year_label.querySelector('span').textContent = data.errors.year
                }
            }
        } else {
            await new Promise(resolve => setTimeout(resolve, 500));
            document.getElementById('btn-close').click()
            location.reload();
        }

        button.disabled = false;
        button.textContent = "Tambah buku";
        if(data.errors){
            label_add.textContent = data.message
        }
    })
    .catch(error => {
        console.error('Error:', error);
        button.disabled = false;
        button.textContent = "Tambah buku";
        label.textContent = error.message || 'Terjadi kesalahan koneksi.';
    });
}
</script>