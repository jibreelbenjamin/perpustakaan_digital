@php
    $page = 'pinjaman';
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
            Daftar pinjaman buku
          </h1>
          @if (!empty($pinjaman))
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
            <input type="text" id="search-input" class="py-1.5 sm:py-2 ps-10 pe-8 block w-full bg-gray-100 border-transparent rounded-xl sm:text-sm hover:bg-gray-200 focus:bg-white focus:border-amber-500 focus:ring-amber-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-900 dark:focus:ring-neutral-600" placeholder="Cari data pinjaman" autocomplete="off">
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

          <!-- Button -->
          <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-xl bg-gray-100 border border-transparent text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-form-input-pnjmn-modal" data-hs-overlay="#hs-form-input-pnjmn-modal">
            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
            Input
          </button>
          <!-- End Button -->
        </div>
        <!-- End Col -->
      </div>
      <!-- End Header -->

      <!-- Borrowings List Group Card -->
      <div>
        <div class="mb-3">
          <!-- List -->
          <div id="pinjaman-container" class="-mx-3">

            @if (!empty($pinjaman))

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

      @if (!empty($pinjaman))      
        <div class="mt-4">
            <p id="loading" class="my-10 font-medium text-sm text-amber-600 dark:text-amber-500 hidden">
                <svg class="shrink-0 size-5 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="4" cy="12" r="3" fill="currentColor"><animate id="SVGKiXXedfO" attributeName="cy" begin="0;SVGgLulOGrw.end+0.25s" calcMode="spline" dur="0.6s" keySplines=".33,.66,.66,1;.33,0,.66,.33" values="12;6;12"/></circle><circle cx="12" cy="12" r="3" fill="currentColor"><animate attributeName="cy" begin="SVGKiXXedfO.begin+0.1s" calcMode="spline" dur="0.6s" keySplines=".33,.66,.66,1;.33,0,.66,.33" values="12;6;12"/></circle><circle cx="20" cy="12" r="3" fill="currentColor"><animate id="SVGgLulOGrw" attributeName="cy" begin="SVGKiXXedfO.begin+0.2s" calcMode="spline" dur="0.6s" keySplines=".33,.66,.66,1;.33,0,.66,.33" values="12;6;12"/></circle></svg>
            </p>
            <p id="end" class="my-10 text-center font-medium text-sm text-amber-600 dark:text-amber-500 hidden">
                
            </p>
        </div>
    @endif
    </div>
</x-app>

<script>
let offset = 0;
const limit = 15;
const params = new URLSearchParams(window.location.search);
const filterParam = params.get('filter');
let isLoading = false;
let allDataLoaded = false;
let searchQuery = '';
let debounceTimer = null;

if (filterParam) {
    document.getElementById('search-input').value = filterParam;
    searchQuery = document.getElementById('search-input').value;
    loadMoreData();
}

function loadMoreData(reset = false) {
    if (reset) {
        offset = 0;
        allDataLoaded = false;
        document.getElementById('pinjaman-container').innerHTML = '';
        document.getElementById('end').classList.add('hidden');
    }

    if (isLoading || allDataLoaded) return;
    isLoading = true;
    document.getElementById('loading').classList.remove('hidden');

    searchQuery = document.getElementById('search-input').value;
    setTimeout(() => {
        fetch(`{{ route('pinjaman.load') }}?offset=${offset}&limit=${limit}&search=${encodeURIComponent(searchQuery)}`)
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

                const container = document.getElementById('pinjaman-container');
                data.forEach(item => {
                    container.insertAdjacentHTML('beforeend', `
                        <a class="mb-2 p-3 group flex gap-x-4 rounded-2xl hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="{{ env('APP_URL') }}/pinjaman/${item.id_borrowing}/detail">
                            <div class="grow">
                                <div class="flex justify-between items-center gap-x-3">
                                    <div>
                                        <h4 class="font-medium text-gray-800 dark:text-white">
                                            ${item.buku?.title ?? 'Tidak diketahui'}
                                        </h4>
                                        <ul class="flex flex-wrap">
                                            <li class="inline-block relative text-sm text-gray-500 pe-4 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:bg-gray-500 before:rounded-full dark:before:bg-neutral-500 dark:text-neutral-500"">
                                                #${item.id_borrowing}
                                            </li>
                                            <li class="inline-block relative text-sm pe-4 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:bg-gray-500 before:rounded-full dark:before:bg-neutral-500 ${
                                                item.status === 'dipinjam' ? 'text-blue-500' :
                                                item.status === 'hilang' ? 'text-red-500' :
                                                item.status === 'dikembalikan' ? 'text-green-500' : ''
                                            }">
                                                ${item.status.charAt(0).toUpperCase() + item.status.slice(1)}
                                            </li>
                                            <li class="inline-block relative text-sm text-gray-500 pe-4 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:bg-gray-500 before:rounded-full dark:before:bg-neutral-500 dark:text-neutral-500"">
                                                ${item.name}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-end">
                                        <p class="font-sm sm:text-md text-gray-800 dark:text-white">
                                            Dipinjam ${item.borrow_date}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                                            Terakhir diupdate ${new Date(item.created_at).toLocaleDateString('id', { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', hour12: false })}
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
</script>