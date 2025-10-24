@php
    $page = 'pinjaman';
@endphp
<x-app :page='$page'>
    <div class="max-w-4xl mx-auto py-5 sm:py-10 px-5 md:px-8 2xl:px-5">
      <!-- Button -->
      <div class="mb-5">
        <a class="pe-3 group inline-flex items-center gap-x-2 text-start text-sm text-gray-800 rounded-full hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="/pinjaman">
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

      <!-- Header -->
      <div class="mb-3 flex flex-wrap justify-between items-center gap-3">
        <div class="group flex items-center gap-x-2">
          <h1 class="font-semibold text-lg md:text-xl text-gray-800 dark:text-white">
            <span id="hs-pro-pytdcid">#{{ $pinjaman['id_borrowing'] }}</span>
            <p class="text-sm font-medium text-gray-500 dark:text-neutral-500">Rincian data pinjaman</p>
          </h1>
        </div>

        <!-- Button Group -->
        <div class="flex flex-wrap gap-3">
            @if ($pinjaman['status'] == 'dipinjam')                
            <!-- Button -->
            <form action="{{ route('daftar.pinjaman.patch', $pinjaman['id_borrowing']) }}" method="post">
                @csrf
                <input type="hidden" name="status" value="dikembalikan">
                <button class="py-1.5 px-2.5 sm:py-2 sm:px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-xl border border-gray-200 bg-white text-emerald-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-emerald-500 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                  Tandai dikembalikan
                </button>
            </form>
            <form action="{{ route('daftar.pinjaman.patch', $pinjaman['id_borrowing']) }}" method="post">
                @csrf
                <input type="hidden" name="status" value="hilang">
                <button class="py-1.5 px-2.5 sm:py-2 sm:px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-xl border border-gray-200 bg-white text-red-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-red-500 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                  Tandai hilang
                </button>
            </form>
            <!-- End Button -->
            @elseif ($pinjaman['status'] == 'dikembalikan')                
            <!-- Button -->
            <form action="{{ route('daftar.pinjaman.patch', $pinjaman['id_borrowing']) }}" method="post">
                @csrf
                <input type="hidden" name="status" value="hilang">
                <button class="py-1.5 px-2.5 sm:py-2 sm:px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-xl border border-gray-200 bg-white text-red-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-red-500 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                  Tandai hilang
                </button>
            </form>
            <!-- End Button -->
            @elseif ($pinjaman['status'] == 'hilang')                
            <!-- Button -->
            <form action="{{ route('daftar.pinjaman.patch', $pinjaman['id_borrowing']) }}" method="post">
                @csrf
                <input type="hidden" name="status" value="dikembalikan">
                <button class="py-1.5 px-2.5 sm:py-2 sm:px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-xl border border-gray-200 bg-white text-emerald-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-emerald-500 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                  Tandai dikembalikan
                </button>
            </form>
            <!-- End Button -->
            @endif
        </div>
        <!-- End Button Group -->
      </div>
      <!-- End Header -->

      <!-- Card -->
      <div class="mt-5 bg-white border border-gray-200 rounded-2xl dark:bg-neutral-900 dark:border-neutral-700">
        <!-- Body -->
        <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-gray-200 dark:divide-neutral-700">
          <div class="p-5 sm:p-8">
            <!-- Heading -->
            <div class="mb-3">
              <h2 class="font-medium text-sm text-gray-800 dark:text-neutral-200">
                Timeline kegiatan
              </h2>
            </div>
            <!-- End Heading -->

            <!-- Timeline -->
            @if ($pinjaman['status'] == 'dikembalikan')
            <div>
              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <svg class="shrink-0 size-3 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 6 9 17l-5-5" />
                    </svg>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Petugas input data
                  </p>
                  <p class="text-sm text-gray-700 dark:text-neutral-300">
                    {{ \Carbon\Carbon::parse($pinjaman['created_at'])->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y H:i:s') }}
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <svg class="shrink-0 size-3 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 6 9 17l-5-5" />
                    </svg>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Proses peminjaman
                  </p>
                  <p class="text-sm text-gray-700 dark:text-neutral-300">
                    Buku telah diberikan
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <svg class="shrink-0 size-3 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 6 9 17l-5-5" />
                    </svg>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Verifikasi petugas
                  </p>
                  <p class="text-sm text-gray-700 dark:text-neutral-300">
                    Menerima buku pinjaman
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <span class="flex shrink-0 justify-center items-center size-4 rounded-full bg-emerald-500 text-white">
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6 9 17l-5-5" />
                      </svg>
                    </span>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    {{ \Carbon\Carbon::parse($pinjaman['updated_at'])->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}
                  </p>
                  <p class="mb-1 font-medium text-gray-800 dark:text-neutral-200">
                    Buku dikembalikan
                  </p>
                  <p class="flex items-center text-sm text-gray-700 dark:text-neutral-300">
                    <svg class="shrink-0 size-3.5 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-signature-icon lucide-signature"><path d="m21 17-2.156-1.868A.5.5 0 0 0 18 15.5v.5a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1c0-2.545-3.991-3.97-8.5-4a1 1 0 0 0 0 5c4.153 0 4.745-11.295 5.708-13.5a2.5 2.5 0 1 1 3.31 3.284"/><path d="M3 21h18"/></svg>
                    Tanda tangan petugas
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->
            </div>
            @elseif ($pinjaman['status'] == 'dipinjam')
            <div>
              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <svg class="shrink-0 size-3 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 6 9 17l-5-5" />
                    </svg>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Petugas input data
                  </p>
                  <p class="text-sm text-gray-700 dark:text-neutral-300">
                    {{ \Carbon\Carbon::parse($pinjaman['created_at'])->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y H:i:s') }}
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <span class="flex shrink-0 justify-center items-center size-4 rounded-full bg-blue-500 text-white">
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-fading-icon lucide-clock-fading"><path d="M12 2a10 10 0 0 1 7.38 16.75"/><path d="M12 6v6l4 2"/><path d="M2.5 8.875a10 10 0 0 0-.5 3"/><path d="M2.83 16a10 10 0 0 0 2.43 3.4"/><path d="M4.636 5.235a10 10 0 0 1 .891-.857"/><path d="M8.644 21.42a10 10 0 0 0 7.631-.38"/></svg>
                    </span>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Proses peminjaman
                  </p>
                  <p class="text-sm text-gray-700 dark:text-neutral-300">
                    Buku telah diberikan
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <svg class="shrink-0 size-3 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dashed-icon lucide-circle-dashed"><path d="M10.1 2.182a10 10 0 0 1 3.8 0"/><path d="M13.9 21.818a10 10 0 0 1-3.8 0"/><path d="M17.609 3.721a10 10 0 0 1 2.69 2.7"/><path d="M2.182 13.9a10 10 0 0 1 0-3.8"/><path d="M20.279 17.609a10 10 0 0 1-2.7 2.69"/><path d="M21.818 10.1a10 10 0 0 1 0 3.8"/><path d="M3.721 6.391a10 10 0 0 1 2.7-2.69"/><path d="M6.391 20.279a10 10 0 0 1-2.69-2.7"/></svg>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Verifikasi petugas
                  </p>
                  <p class="text-sm text-gray-700 dark:text-neutral-300">
                    Menerima buku pinjaman
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <svg class="shrink-0 size-3 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dashed-icon lucide-circle-dashed"><path d="M10.1 2.182a10 10 0 0 1 3.8 0"/><path d="M13.9 21.818a10 10 0 0 1-3.8 0"/><path d="M17.609 3.721a10 10 0 0 1 2.69 2.7"/><path d="M2.182 13.9a10 10 0 0 1 0-3.8"/><path d="M20.279 17.609a10 10 0 0 1-2.7 2.69"/><path d="M21.818 10.1a10 10 0 0 1 0 3.8"/><path d="M3.721 6.391a10 10 0 0 1 2.7-2.69"/><path d="M6.391 20.279a10 10 0 0 1-2.69-2.7"/></svg>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Waktu pengembalian
                  </p>
                  <p class="mb-1 font-medium text-gray-800 dark:text-neutral-200">
                    Buku dikembalikan
                  </p>
                  <p class="flex items-center text-sm text-gray-700 dark:text-neutral-300">
                    <svg class="shrink-0 size-3.5 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-signature-icon lucide-signature"><path d="m21 17-2.156-1.868A.5.5 0 0 0 18 15.5v.5a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1c0-2.545-3.991-3.97-8.5-4a1 1 0 0 0 0 5c4.153 0 4.745-11.295 5.708-13.5a2.5 2.5 0 1 1 3.31 3.284"/><path d="M3 21h18"/></svg>
                    Tanda tangan petugas
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->
            </div>
            @elseif($pinjaman['status'] == 'hilang')
            <div>
              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <svg class="shrink-0 size-3 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 6 9 17l-5-5" />
                    </svg>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Petugas input data
                  </p>
                  <p class="text-sm text-gray-700 dark:text-neutral-300">
                    {{ \Carbon\Carbon::parse($pinjaman['created_at'])->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y H:i:s') }}
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <svg class="shrink-0 size-3 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 6 9 17l-5-5" />
                    </svg>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Proses peminjaman
                  </p>
                  <p class="text-sm text-gray-700 dark:text-neutral-300">
                    Buku telah diberikan
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <span class="flex shrink-0 justify-center items-center size-4 rounded-full bg-red-500 text-white">
                      <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </span>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Verifikasi petugas
                  </p>
                  <p class="text-sm text-gray-700 dark:text-neutral-300">
                    Menerima buku pinjaman
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="group flex gap-x-3">
                <!-- Icon -->
                <div class="relative group-last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-neutral-700">
                  <div class="relative z-10 size-7 flex justify-center items-center">
                    <svg class="shrink-0 size-3 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dashed-icon lucide-circle-dashed"><path d="M10.1 2.182a10 10 0 0 1 3.8 0"/><path d="M13.9 21.818a10 10 0 0 1-3.8 0"/><path d="M17.609 3.721a10 10 0 0 1 2.69 2.7"/><path d="M2.182 13.9a10 10 0 0 1 0-3.8"/><path d="M20.279 17.609a10 10 0 0 1-2.7 2.69"/><path d="M21.818 10.1a10 10 0 0 1 0 3.8"/><path d="M3.721 6.391a10 10 0 0 1 2.7-2.69"/><path d="M6.391 20.279a10 10 0 0 1-2.69-2.7"/></svg>
                  </div>
                </div>
                <!-- End Icon -->

                <!-- Right Content -->
                <div class="grow pt-1 pb-4">
                  <p class="mb-1 text-sm text-gray-500 dark:text-neutral-400">
                    Waktu pengembalian
                  </p>
                  <p class="mb-1 font-medium text-gray-800 dark:text-neutral-200">
                    Buku dikembalikan
                  </p>
                  <p class="flex items-center text-sm text-gray-700 dark:text-neutral-300">
                    <svg class="shrink-0 size-3.5 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-signature-icon lucide-signature"><path d="m21 17-2.156-1.868A.5.5 0 0 0 18 15.5v.5a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1c0-2.545-3.991-3.97-8.5-4a1 1 0 0 0 0 5c4.153 0 4.745-11.295 5.708-13.5a2.5 2.5 0 1 1 3.31 3.284"/><path d="M3 21h18"/></svg>
                    Tanda tangan petugas
                  </p>
                </div>
                <!-- End Right Content -->
              </div>
              <!-- End Item -->
            </div>
            @endif
            <!-- End Timeline -->
          </div>
          <!-- End Col -->

          <!-- Card -->
          <div class="px-5 sm:px-8 relative">
            <!-- Edit Button -->
            <div class="absolute top-3 end-3">
              <button type="button" class="inline-flex justify-center items-center gap-x-2 size-8 text-sm font-medium rounded-lg bg-gray-100 border border-transparent text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-confirm-modal" data-hs-overlay="#hs-scale-confirm-modal">
                <svg class="shrink-0 size-3.5 text-red-800 dark:text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
              </button>
            </div>
            <!-- End Edit Button -->

            <!-- Delete Button -->
            <div class="absolute top-3 end-13">
              <button type="button" class="inline-flex justify-center items-center gap-x-2 size-8 text-sm font-medium rounded-lg bg-gray-100 border border-transparent text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-200 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-form-update-pnjmn-modal" data-hs-overlay="#hs-form-update-pnjmn-modal">
                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen-icon lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></svg>
              </button>
            </div>
            <!-- End Delete Button -->

            <!-- Body -->
            <div class="divide-y divide-dashed divide-gray-300 dark:divide-neutral-700">
              <!-- Item -->
              <div class="py-5 sm:py-8">
                <!-- Heading -->
                <div class="mb-3">
                  <h2 class="font-medium text-sm text-gray-800 dark:text-neutral-200">
                    Detail pinjaman buku
                  </h2>
                </div>
                <!-- End Heading -->

                <!-- List -->
                <dl class="grid grid-cols-1 sm:grid-cols-2 sm:gap-y-2 gap-x-4">
                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Petugas:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 font-bold text-sm text-gray-800 dark:text-neutral-200">
                    {{ $pinjaman['petugas']['name'] }}
                    <p class="text-xs font-medium text-gray-500 dark:text-neutral-500">{{ ucfirst($pinjaman['petugas']['role']) }}</p>
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    ID Pinjaman:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    #{{ $pinjaman['id_borrowing'] }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Nama peminjam:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ $pinjaman['name'] }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Kontak peminjam:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ $pinjaman['contact'] ?? '-' }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Tanggal pinjam:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ \Carbon\Carbon::parse($pinjaman['borrow_date'])->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Tanggal pengembalian:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ ($pinjaman['status'] == 'dikembalikan') ? \Carbon\Carbon::parse($pinjaman['return_date'])->locale('id')->timezone('Asia/Jakarta')->translatedFormat('l, d F Y') : '-' }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Status pinjaman:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    @if ($pinjaman['status'] == 'dikembalikan')
                    <span class="ms-0.5 inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-800/30 dark:text-emerald-500">
                    @elseif($pinjaman['status'] == 'dipinjam')
                    <span class="ms-0.5 inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">
                    @elseif($pinjaman['status'] == 'hilang')
                    <span class="ms-0.5 inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-800/30 dark:text-red-500">
                    @endif
                        {{ ucfirst($pinjaman['status']) }}
                    </span>
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Waktu input:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ \Carbon\Carbon::parse($pinjaman['created_at'])->locale('id')->timezone('Asia/Jakarta')->translatedFormat('d-m-Y H:i:s') }}
                  </dd>
                </dl>
                <!-- End List -->
              </div>
              <!-- End Item -->

              <!-- Item -->
              <div class="py-5 sm:py-8">
                <!-- Heading -->
                <div class="mb-3">
                  <h2 class="font-medium text-sm text-gray-800 dark:text-neutral-200">
                    Detail buku
                  </h2>
                </div>
                <!-- End Heading -->

                <!-- List -->
                <dl class="grid grid-cols-1 sm:grid-cols-2 sm:gap-y-2 gap-x-4">
                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    ID buku:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    #{{ $pinjaman['buku']['id_book'] }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Nama buku:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ $pinjaman['buku']['title'] }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Author:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ $pinjaman['buku']['author'] }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Publisher:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ $pinjaman['buku']['publisher'] }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Tahun:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ $pinjaman['buku']['year'] }}
                  </dd>

                  <dt class="sm:py-0.5 text-sm text-gray-500 dark:text-neutral-500">
                    Kategori buku:
                  </dt>
                  <dd class="pb-3 sm:py-0.5 text-sm text-gray-800 dark:text-neutral-200">
                    {{ $pinjaman['buku']['kategori']['name'] }}
                  </dd>
                </dl>
                <!-- End List -->
              </div>
              <!-- End Item -->
            </div>
            <!-- End Body -->
          </div>
          <!-- End Card -->
        </div>
        <!-- End Body -->
      </div>
      <!-- End Card -->

      <!-- Footer -->
      <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-y-5">
        <div class="order-2 md:order-1">
          <h5 class="flex items-center mb-1 font-medium text-sm text-amber-500 dark:text-amber-600">
            <svg class="shrink-0 size-3.5 mr-1.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-folder-sync-icon lucide-folder-sync"><path d="M9 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2v.5"/><path d="M12 10v4h4"/><path d="m12 14 1.535-1.605a5 5 0 0 1 8 1.5"/><path d="M22 22v-4h-4"/><path d="m22 18-1.535 1.605a5 5 0 0 1-8-1.5"/></svg>
            Tersimpan {{ \Carbon\Carbon::parse($pinjaman['updated_at'])->locale('id')->diffForHumans() }}
          </h5>
          <p class="text-sm text-gray-600 dark:text-neutral-400">
            Terkahir diupdate pada {{ \Carbon\Carbon::parse($pinjaman['updated_at'])->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s') }}
          </p>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Footer -->
    </div>

    <!-- Confirm Modal -->
    <div id="hs-scale-confirm-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-confirm-modal-label">
        <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-7">
                    <div class="flex justify-between items-center  ">
                        <h3 id="hs-scale-confirm-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Hapus data pinjaman?
                        </h3>
                    </div>
                    <div class="pb-3 overflow-y-auto">
                        <p class="mt-1 text-gray-800 dark:text-neutral-400">
                        Yakin ingin menghapus data pinjaman buku <b>#{{ $pinjaman['id_borrowing'] }}?</b> Aksi ini tidak dapat dikembalikan.
                        </p>
                    </div>
                    <div class="flex justify-end items-center gap-x-2  ">
                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-scale-confirm-modal">
                        Kembali
                        </button>
                        <form method="post" action="{{ route('daftar.pinjaman.delete') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $pinjaman['id_borrowing'] }}">
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

    <!-- Form Update Pinjaman Modal -->
    <div id="hs-form-update-pnjmn-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-form-update-pnjmn-modal-label">
        <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-7">
                    <div class="flex justify-between">
                        <h3 id="hs-form-update-pnjmn-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Update data pinjaman buku
                        <p class="text-xs font-medium text-gray-500">Penanggung jawab update data adalah anda.</p>
                        </h3>
                        <h3 class="font-bold text-right text-gray-800 dark:text-white">
                        Hari {{ \Carbon\Carbon::parse(now())->locale('id')->translatedFormat('l')  }}
                        <p class="text-xs font-medium text-gray-500">{{ \Carbon\Carbon::parse(now())->locale('id')->translatedFormat('d F Y')  }}</p>
                        </h3>
                    </div>
                    <div class="py-5 overflow-y-auto">
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div class="flex gap-x-4">
                                <div class="w-full">
                                    <label for="name" class="block text-sm mb-2 dark:text-white">Nama</label>
                                    <div class="relative">
                                    <input type="text" id="name" name="name" value="{{ $pinjaman['name'] }}" placeholder="Nama peminjam" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                    </div>
                                    <p id="name_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                        <span><!-- --></span>
                                    </p>
                                </div>
                                <div class="w-full">
                                    <label for="contact" class="block text-sm mb-2 dark:text-white">Kontak</label>
                                    <div class="relative">
                                    <input type="text" id="contact" name="contact" value="{{ $pinjaman['contact'] }}" placeholder="No telp atau email, dll" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                    </div>
                                    <p id="contact_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                        <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                        <span><!-- --></span>
                                    </p>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label class="block text-sm mb-2 dark:text-white">Buku</label>
                                <div class="relative">
                                <select name="id_book" id="id_book" data-hs-select='{
                                    "apiUrl": "https://perpustakaan_digital.test/api/book/select",
                                    "apiQuery": "",
                                    "apiSearchQueryKey": "search",
                                    "apiDataPart": "data",
                                    "apiSelectedValues": ["{{ $pinjaman['buku']['id_book'] }}"],
                                    "apiFieldsMap": {
                                        "id": "id_book",
                                        "val": "id_book",
                                        "title": "title",
                                        "description": "author"
                                    },

                                    "isSelectedOptionOnTop": true,
                                    "hasSearch": true,
                                    "searchPlaceholder": "Cari buku...",
                                    "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-amber-500 focus:ring-amber-500 before:absolute before:inset-0 before:z-1 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-1.5 sm:py-2 px-3",
                                    "searchWrapperClasses": "bg-white p-2 -mx-1 -mt-1 sticky top-0 dark:bg-neutral-900",
                                    "placeholder": "{{ $pinjaman['buku']['title'] }}",
                                    "toggleTag": "<button id=\"book\" type=\"button\" aria-expanded=\"false\"><span class=\"\" data-title></span></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-hidden focus:border-amber-500 focus:ring-amber-500 dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400",
                                    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                    "optionTemplate": "<div class=\"flex items-center\"><div><div class=\"text-sm font-semibold text-gray-800 dark:text-neutral-200 \" data-title></div><div class=\"text-xs text-gray-500 dark:text-neutral-500 \" data-description></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-amber-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                                    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                    }' class="hidden">
                                    <option value="">Choose</option>
                                </select>
                                </div>
                                <p id="book_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="borrow_date" class="block text-sm mb-2 dark:text-white">Tanggal pinjam</label>
                                <div class="relative">
                                <input type="date" id="borrow_date" name="borrow_date" value="{{ $pinjaman['borrow_date'] }}" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500">
                                </div>
                                <p id="borrow_date_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="return_date" class="block text-sm mb-2 dark:text-white">Tanggal dikembalikan</label>
                                <div class="relative">
                                <input type="date" id="return_date" name="return_date" value="{{ $pinjaman['return_date'] }}" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500">
                                </div>
                                <p id="return_date_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label class="block text-sm mb-2 dark:text-white">Status pinjaman</label>
                                <div class="relative">
                                    <div class="grid gap-y-2 ml-2 py-2.5 sm:py-3">
                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5 mt-1">
                                            <input id="hs-radio-dipinjam" name="status" value="dipinjam" type="radio" class="border-gray-200 rounded-full text-amber-600 focus:ring-amber-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800" aria-describedby="hs-radio-dipinjam-description" {{ ($pinjaman['status'] == 'dipinjam') ? 'checked=""' : '' }} >
                                            </div>
                                            <label for="hs-radio-dipinjam" class="ms-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-300">Dipinjam</span>
                                            <span id="hs-radio-dipinjam-description" class="block text-sm text-gray-600 dark:text-neutral-500">Buku sedang dipinjam saat ini.</span>
                                            </label>
                                        </div>

                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5 mt-1">
                                            <input id="hs-radio-dikembalikan" name="status" value="dikembalikan" type="radio" class="border-gray-200 rounded-full text-amber-600 focus:ring-amber-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800" aria-describedby="hs-radio-dikembalikan-description" {{ ($pinjaman['status'] == 'dikembalikan') ? 'checked=""' : '' }}>
                                            </div>
                                            <label for="hs-radio-dikembalikan" class="ms-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-300">Dikembalikan</span>
                                            <span id="hs-radio-dikembalikan-description" class="block text-sm text-gray-600 dark:text-neutral-500">Buku selesai dipinjam dan dikembalikan.</span>
                                            </label>
                                        </div>

                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5 mt-1">
                                            <input id="hs-radio-hilang" name="status" value="hilang" type="radio" class="border-gray-200 rounded-full text-amber-600 focus:ring-amber-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800" aria-describedby="hs-radio-hilang-description" {{ ($pinjaman['status'] == 'hilang') ? 'checked=""' : '' }}>
                                            </div>
                                            <label for="hs-radio-hilang" class="ms-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-300">Hilang</span>
                                            <span id="hs-radio-hilang-description" class="block text-sm text-gray-600 dark:text-neutral-500">Buku hilang akan mengurangi stok buku tersebut.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <p id="status_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->
                            <p id="error" class="text-sm text-red-500"></p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center gap-x-2  ">
                        <button id="btn-close" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-form-update-pnjmn-modal">
                        Tutup
                        </button>
                        <button id="btn-send" onclick="input()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-amber-600 text-white hover:bg-amber-700 focus:outline-hidden focus:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none">
                        Update pinjaman
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Update Pinjaman Modal -->
</x-app>
<script>
function input(){
    const button = document.getElementById('btn-send')
    const label = document.getElementById('error')
    var name = document.getElementById('name')
    var contact = document.getElementById('contact')
    var id_book = document.getElementById('id_book')
    var book = document.getElementById('book')
    var borrow_date = document.getElementById('borrow_date')
    var return_date = document.getElementById('return_date')
    var status = document.querySelector('input[name="status"]:checked')

    var name_label = document.getElementById('name_label')
    var contact_label = document.getElementById('contact_label')
    var book_label = document.getElementById('book_label')
    var borrow_date_label = document.getElementById('borrow_date_label')
    var return_date_label = document.getElementById('return_date_label')
    var status_label = document.getElementById('status_label')

    button.disabled = true
    button.textContent = "Loading..."
    label.textContent = ''

    fetch("https://perpustakaan_digital.test/pinjaman/{{ $pinjaman['id_borrowing'] }}/update", {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            name: name.value,
            contact: contact.value,
            id_book: id_book.value,
            borrow_date: borrow_date.value,
            return_date: return_date.value,
            status: status.value
        })
    })
    .then(async (response) => {
        await new Promise(resolve => setTimeout(resolve, 500));
        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Gagal mengirim data ke server');
        }

        [name, contact, book, borrow_date, return_date].forEach(el => {
            el.classList.replace('border-red-500','border-gray-200')
            el.classList.replace('dark:border-red-600','dark:border-neutral-800')
        });
        [name_label, contact_label, book_label, borrow_date_label, return_date_label, status_label].forEach(el => {
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
                if(data.errors.contact){
                    contact.classList.replace('border-gray-200','border-red-500')
                    contact.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    contact_label.classList.remove('hidden')
                    contact_label.querySelector('span').textContent = data.errors.contact
                }
                if(data.errors.id_book){
                    book.classList.replace('border-gray-200','border-red-500')
                    book.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    book_label.classList.remove('hidden')
                    book_label.querySelector('span').textContent = data.errors.id_book
                }
                if(data.errors.borrow_date){
                    borrow_date.classList.replace('border-gray-200','border-red-500')
                    borrow_date.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    borrow_date_label.classList.remove('hidden')
                    borrow_date_label.querySelector('span').textContent = data.errors.borrow_date
                }
                if(data.errors.return_date){
                    return_date.classList.replace('border-gray-200','border-red-500')
                    return_date.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    return_date_label.classList.remove('hidden')
                    return_date_label.querySelector('span').textContent = data.errors.return_date
                }
                if (data.errors.status) {
                    status_label.classList.remove('hidden')
                    status_label.querySelector('span').textContent = data.errors.status
                }
            }
        } else {
            await new Promise(resolve => setTimeout(resolve, 500));
            document.getElementById('btn-close').click()
            location.reload();
        }

        button.disabled = false;
        button.textContent = "Update pinjaman";
    })
    .catch(error => {
        console.error('Error:', error);
        button.disabled = false;
        button.textContent = "Update pinjaman";
        label.textContent = error.message || 'Terjadi kesalahan koneksi.';
    });
}
</script>