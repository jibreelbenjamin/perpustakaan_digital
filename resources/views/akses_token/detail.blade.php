@php
    $page = 'akses_token';
@endphp
<x-app :page='$page'>
    <div class="max-w-4xl mx-auto py-5 sm:py-10 px-5 md:px-8 2xl:px-5">
      <!-- Button -->
      <div class="mb-5">
        <a class="pe-3 group inline-flex items-center gap-x-2 text-start text-sm text-gray-800 rounded-full hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="{{ route('daftar.akses_token') }}">
          <span class="shrink-0 size-9 inline-flex justify-center items-center bg-gray-100 rounded-full group-hover:bg-gray-200 group-focus:bg-gray-200 dark:bg-neutral-800 dark:group-hover:bg-neutral-700 dark:group-focus:bg-neutral-700">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m12 19-7-7 7-7" />
              <path d="M19 12H5" />
            </svg>
          </span>
          Kembali ke daftar
        </a>
      </div>
      <!-- End Button -->

      @if (empty($akses_token))
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
                Data tidak ditemukan
            </p>
            <p class="mb-5 text-sm text-gray-500 dark:text-neutral-500">
                Tidak ada informasi yang tercatat disistem.
            </p>
            </div>
        </div> 
      @else
        <!-- Header -->
        <div class="mb-3 flex flex-wrap justify-between items-center gap-3">
            <div class="group flex items-center gap-x-2">
            <h1 class="font-semibold text-lg md:text-xl text-gray-800 dark:text-white">
                <span id="hs-pro-pytdcid">#{{ $akses_token['token_id'] }}</span>
                <p class="text-sm font-medium text-gray-500 dark:text-neutral-500">Rincian data akses token</p>
            </h1>
            </div>

            @if ($akses_token['status'] == 'aktif')
            <!-- Button Group -->
            <div class="flex flex-wrap gap-3">              
                <!-- Button -->
                <button class="py-1.5 px-2.5 sm:py-2 sm:px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-xl border border-gray-200 bg-white text-red-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-red-500 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-confirm-modal" data-hs-overlay="#hs-scale-confirm-modal">
                    Cabut akses
                </button>
                <!-- End Button -->               
            </div>
            <!-- End Button Group -->
            @endif
        </div>
        <!-- End Header -->

        <!-- Card -->
        <div class="bg-white border border-gray-200 rounded-2xl dark:bg-neutral-900 dark:border-neutral-700">
            <!-- Body -->
            <div class="p-4">
            <!-- List -->
            <dl class="grid grid-cols-1 sm:grid-cols-2 sm:gap-y-2 gap-x-4">
                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Nama user:
                </dt>
                <dd class="pb-3 font-semibold sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ $akses_token['user']['name'] }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                ID user:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                #{{ $akses_token['user']['id_user'] }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Username:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ '@'.$akses_token['user']['username'] }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Role:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ $akses_token['user']['role'] }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Status token:
                </dt>
                <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    @if ($akses_token['status'] == 'aktif')
                    <span class="ms-0.5 inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-800/30 dark:text-emerald-500">
                    @elseif($akses_token['status'] == 'kadaluarsa')
                    <span class="ms-0.5 inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500">
                    @endif
                        {{ str_replace('_', ' ', ucfirst($akses_token['status'])) }}
                    </span>
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Terakhir digunakan:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ ($akses_token['last_used_at'] == null) ? '-' : \Carbon\Carbon::parse($akses_token['last_used_at'])->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s') }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Token kadaluarsa:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ \Carbon\Carbon::parse($akses_token['expires_at'])->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s') }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Token terdaftar:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ \Carbon\Carbon::parse($akses_token['created_at'])->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s') }}
                </dd>
            </dl>
            <!-- End List -->
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->

        @if ($akses_token['status'] == 'aktif')            
        <!-- Confirm Modal -->
        <div id="hs-scale-confirm-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none [--overlay-backdrop:static]" role="dialog" tabindex="-1" aria-labelledby="hs-scale-confirm-modal-label">
            <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="p-7 relative">
                        <div class="flex justify-between items-center  ">
                            <h3 id="hs-scale-confirm-modal-label" class="font-bold text-gray-800 dark:text-white">
                            Cabut akses token?
                            </h3>
                        </div>
                        <div class="pb-3 overflow-y-auto">
                            <p class="mt-1 text-gray-800 dark:text-neutral-400">
                            Yakin ingin mencabut akses  token <b>#{{ $akses_token['token_id'] }}?</b>. Aksi ini tidak dapat dikembalikan.
                            </p>
                        </div>
                        <div class="flex justify-end items-center gap-x-2  ">
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-scale-confirm-modal">
                            Kembali
                            </button>
                            <button id="btn-revoke-token" onclick="revokeToken()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                            Cabut
                            </button>
                        </div>
                        <!-- Loading Overlay -->
                        <div id="loading-overlay_revoke_token" class="hidden absolute inset-0 z-50 flex flex-col items-center justify-center bg-white/80 rounded-xl dark:bg-neutral-800/80">
                            <div class="flex flex-col items-center gap-y-3">
                                <svg class="shrink-0 size-8 text-red-600 animate-spin" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>
                                <p class="text-sm font-medium text-gray-700 dark:text-neutral-300">Memproses data...</p>
                            </div>
                        </div>
                        <!-- End Loading Overlay -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Confirm Modal -->
        @endif
      @endif
    </div>
</x-app>

@if (!empty($akses_token) && $akses_token['status'] == 'aktif')
<script>
function revokeToken() {
    const button = document.getElementById('btn-revoke-token');
    const loadingOverlay = document.getElementById('loading-overlay_revoke_token');
    const modal = document.getElementById('hs-scale-confirm-modal');
    const allButtons = modal.querySelectorAll('button');

    button.disabled = true;
    button.textContent = "Loading...";
    allButtons.forEach(el => { if (el !== button) el.disabled = true });
    loadingOverlay.classList.remove('hidden');

    fetch("{{ route('daftar.akses_token.revoke') }}", {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            id: '{{ $akses_token['token_id'] }}'
        })
    })
    .then(async (response) => {
        const data = await response.json();
        if (!response.ok) throw new Error(data.message || 'Gagal memproses data');
        if (data.status === false) {
            loadingOverlay.classList.add('hidden');
            button.disabled = false;
            button.textContent = "Cabut";
            allButtons.forEach(el => { if (el !== button) el.disabled = false });
            return;
        }
        flashAndReload(data.message || 'Token berhasil dicabut');
    })
    .catch(error => {
        console.error('Error:', error);
        loadingOverlay.classList.add('hidden');
        button.disabled = false;
        button.textContent = "Cabut";
        allButtons.forEach(el => { if (el !== button) el.disabled = false });
    });
}
</script>
@endif