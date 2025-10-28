@php
    $page = 'kategori';
@endphp
<x-app :page='$page'>
    <div class="max-w-4xl mx-auto py-5 sm:py-10 px-5 md:px-8 2xl:px-5">
      <!-- Button -->
      <div class="mb-5">
        <a class="pe-3 group inline-flex items-center gap-x-2 text-start text-sm text-gray-800 rounded-full hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="{{ route('daftar.kategori') }}">
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

      @if (empty($kategori))
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
                <span id="hs-pro-pytdcid">#{{ $kategori['id_category'] }}</span>
                <p class="text-sm font-medium text-gray-500 dark:text-neutral-500">Rincian data kategori</p>
            </h1>
            </div>

            @if (Auth::user()->role != 'staff')            
            <!-- Button Group -->
            <div class="flex flex-wrap gap-3">              
                <!-- Button -->
                <button class="py-1.5 px-2.5 sm:py-2 sm:px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-xl border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-form-update-kategori-modal" data-hs-overlay="#hs-form-update-kategori-modal">
                    Edit
                </button>
                <button class="py-1.5 px-2.5 sm:py-2 sm:px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-xl border border-gray-200 bg-white text-red-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-red-500 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-confirm-modal" data-hs-overlay="#hs-scale-confirm-modal">
                    Hapus
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
                Nama kategori:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ $kategori['name'] }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Deskripsi:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ $kategori['description'] }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Jumlah pemakaian kategori:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ ($kategori['total_buku'] > 0) ? $kategori['total_buku'].' Buku' : 'Belum ada buku menggunakan kategori ini' }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Tanggal ditambahkan:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ \Carbon\Carbon::parse($kategori['created_at'])->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s') }}
                </dd>
            </dl>
            <!-- End List -->
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->

        <!-- Footer -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-y-5">
            <div class="order-2 md:order-1">
            <h5 class="flex items-center mb-1 font-medium text-sm text-amber-500 dark:text-amber-600">
                <svg class="shrink-0 size-3.5 mr-1.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-sync-icon lucide-folder-sync"><path d="M9 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v.5"/><path d="M12 10v4h4"/><path d="m12 14 1.535-1.605a5 5 0 0 1 8 1.5"/><path d="M22 22v-4h-4"/><path d="m22 18-1.535 1.605a5 5 0 0 1-8-1.5"/></svg>
                Tersimpan {{ \Carbon\Carbon::parse($kategori['updated_at'])->locale('id')->diffForHumans() }}
            </h5>
            <p class="text-sm text-gray-600 dark:text-neutral-400">
                Terkahir diupdate pada {{ \Carbon\Carbon::parse($kategori['updated_at'])->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s') }}
            </p>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Footer -->
        @if (Auth::user()->role != 'staff')
        <!-- Confirm Modal -->
        <div id="hs-scale-confirm-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-confirm-modal-label">
            <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="p-7">
                        <div class="flex justify-between items-center  ">
                            <h3 id="hs-scale-confirm-modal-label" class="font-bold text-gray-800 dark:text-white">
                            Hapus kategori?
                            </h3>
                        </div>
                        <div class="pb-3 overflow-y-auto">
                            <p class="mt-1 text-gray-800 dark:text-neutral-400">
                            Yakin ingin menghapus data kategori <b>#{{ $kategori['id_category'] }}?</b>, menghapus akan memengaruhi seluruh data buku dalam sistem. Aksi ini tidak dapat dikembalikan.
                            </p>
                        </div>
                        <div class="flex justify-end items-center gap-x-2  ">
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-scale-confirm-modal">
                            Kembali
                            </button>
                            <form method="post" action="{{ route('daftar.kategori.delete') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $kategori['id_category'] }}">
                                <button class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                                Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Confirm Modal -->
    
        <!-- Form Update Kategori Modal -->
        <div id="hs-form-update-kategori-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-form-update-kategori-modal-label">
            <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="p-7">
                        <div class="flex justify-between">
                            <h3 id="hs-form-update-kategori-modal-label" class="font-bold text-gray-800 dark:text-white">
                            Update kategori
                            <p class="text-xs font-medium text-gray-500">Memperbarui informasi daftar buku.</p>
                            </h3>
                        </div>
                        <div class="py-5 overflow-y-auto">
                            <div class="grid gap-y-4">
                                <!-- Form Group -->
                                <div>
                                    <label for="name" class="block text-sm mb-2 dark:text-white">Nama kategori</label>
                                    <div class="relative">
                                    <input type="text" id="name" value="{{ $kategori['name'] }}" placeholder="Masukan nama kategori" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                    </div>
                                    <p id="name_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                        <span><!-- --></span>
                                    </p>
                                </div>
                                <!-- End Form Group -->
    
                                <!-- Form Group -->
                                <div>
                                    <label for="description" class="block text-sm mb-2 dark:text-white">Deskripsi (opsional)</label>
                                    <div class="relative">
                                    <input type="text" id="description" value="{{ $kategori['description'] }}" placeholder="Masukan deskripsi" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                    </div>
                                    <p id="description_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                        <span><!-- --></span>
                                    </p>
                                </div>
                                <!-- End Form Group -->
                                <p id="error" class="text-sm text-red-500"></p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center gap-x-2  ">
                            <button id="btn-close" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-form-update-kategori-modal">
                            Tutup
                            </button>
                            <button id="btn-send" onclick="input()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-amber-600 text-white hover:bg-amber-700 focus:outline-hidden focus:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none">
                            Update kategori
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form Update Kategori Modal -->
        @endif
      @endif
    </div>
</x-app>

@if (!empty($kategori))    
<script>
function input(){
    const button = document.getElementById('btn-send')
    const label = document.getElementById('error')
    var name = document.getElementById('name')
    var description = document.getElementById('description')

    var name_label = document.getElementById('name_label')
    var description_label = document.getElementById('description_label')

    button.disabled = true
    button.textContent = "Loading..."
    label.textContent = ''

    fetch("{{ route('daftar.kategori.update', $kategori['id_category']) }}", {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            name: name.value,
            description: description.value
        })
    })
    .then(async (response) => {
        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Gagal mengirim data ke server');
        }

        [name, description].forEach(el => {
            el.classList.replace('border-red-500','border-gray-200')
            el.classList.replace('dark:border-red-600','dark:border-neutral-800')
        });
        [name_label, description_label].forEach(el => {
            el.classList.add('hidden')
        });

        if (data.status === false) {
            if (data.errors && typeof data.errors === 'object') {
                if(data.errors.name){
                    name.classList.replace('border-gray-200','border-red-500')
                    name.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    name_label.classList.remove('hidden')
                    name_label.querySelector('span').textContent = data.errors.name
                }
                if(data.errors.description){
                    description.classList.replace('border-gray-200','border-red-500')
                    description.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    description_label.classList.remove('hidden')
                    description_label.querySelector('span').textContent = data.errors.description
                }
            }
        } else {
            await new Promise(resolve => setTimeout(resolve, 500));
            document.getElementById('btn-close').click()
            location.reload();
        }

        button.disabled = false;
        button.textContent = "Update kategori";
        if(data.errors){
            label.textContent = data.message
        }
    })
    .catch(error => {
        console.error('Error:', error);
        button.disabled = false;
        button.textContent = "Update kategori";
        label.textContent = error.message || 'Terjadi kesalahan koneksi.';
    });
}
</script>
@endif