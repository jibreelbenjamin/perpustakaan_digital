@php
    $page = 'user';
@endphp
<x-app :page='$page'>
    <div class="max-w-4xl mx-auto py-5 sm:py-10 px-5 md:px-8 2xl:px-5">
      <!-- Button -->
      <div class="mb-5">
        <a class="pe-3 group inline-flex items-center gap-x-2 text-start text-sm text-gray-800 rounded-full hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="/user">
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
            <span id="hs-pro-pytdcid">#{{ $user['id_user'] }}</span>
            <p class="text-sm font-medium text-gray-500 dark:text-neutral-500">Rincian data petugas</p>
          </h1>
        </div>

        @if (Auth::user()->role != 'staff')            
        <!-- Button Group -->
        <div class="flex flex-wrap gap-3">              
            <!-- Button -->
            <button class="py-1.5 px-2.5 sm:py-2 sm:px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-xl border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-form-update-user-modal" data-hs-overlay="#hs-form-update-user-modal">
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
                Nama petugas:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ $user['name'] }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Username:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ '@'.$user['username'] }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Role:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ $user['role'] }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                No Telp:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ ($user['phone'] || $user['phone'] == ' ') ? $user['phone'] : '-' }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Jumlah input pinjaman:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ ($user['total_pinjaman'] > 0) ? $user['total_pinjaman'].' Data diinput' : 'Belum melakukan input' }}
                </dd>

                <dt class="sm:py-1 text-sm text-gray-500 dark:text-neutral-500">
                Tanggal ditambahkan:
                </dt>
                <dd class="pb-3 sm:py-1 min-h-8 text-sm text-gray-800 dark:text-neutral-200">
                {{ \Carbon\Carbon::parse($user['created_at'])->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s') }}
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
            Tersimpan {{ \Carbon\Carbon::parse($user['updated_at'])->locale('id')->diffForHumans() }}
          </h5>
          <p class="text-sm text-gray-600 dark:text-neutral-400">
            Terkahir diupdate pada {{ \Carbon\Carbon::parse($user['updated_at'])->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s') }}
          </p>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Footer -->
    </div>

    @if (Auth::user()->role != 'staff')
    <!-- Confirm Modal -->
    <div id="hs-scale-confirm-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-confirm-modal-label">
        <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-7">
                    <div class="flex justify-between items-center  ">
                        <h3 id="hs-scale-confirm-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Hapus petugas?
                        </h3>
                    </div>
                    <div class="pb-3 overflow-y-auto">
                        <p class="mt-1 text-gray-800 dark:text-neutral-400">
                        Yakin ingin menghapus data petugas <b>#{{ $user['id_user'] }}?</b>, menghapus akan memengaruhi seluruh data pinjaman dalam sistem. Aksi ini tidak dapat dikembalikan.
                        </p>
                    </div>
                    <div class="flex justify-end items-center gap-x-2  ">
                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-scale-confirm-modal">
                        Kembali
                        </button>
                        <form method="post" action="{{ route('daftar.user.delete') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $user['id_user'] }}">
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

    <!-- Form Update Petugas Modal -->
    <div id="hs-form-update-user-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-form-update-user-modal-label">
        <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
            <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                <div class="p-7">
                    <div class="flex justify-between">
                        <h3 id="hs-form-tambah-user-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Update petugas
                        <p class="text-xs font-medium text-gray-500">Memperbarui daftar petugas baru ke dalam sistem.</p>
                        </h3>
                    </div>
                    <div class="py-5 overflow-y-auto">
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="name" class="block text-sm mb-2 dark:text-white">Nama petugas</label>
                                <div class="relative">
                                <input type="text" id="name" value="{{ $user['name'] }}" placeholder="Masukan nama petugas" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                </div>
                                <p id="name_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="username" class="block text-sm mb-2 dark:text-white">Username</label>
                                <div class="relative">
                                <input type="text" id="username" value="{{ $user['username'] }}" placeholder="Masukan username" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                </div>
                                <p id="username_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label class="block text-sm mb-2 dark:text-white">Pilih role</label>
                                <div class="relative">
                                    <div class="grid gap-y-2 ml-2 py-2.5 sm:py-3">
                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5 mt-1">
                                            <input id="hs-radio-admin" name="role" value="admin" type="radio" class="border-gray-200 rounded-full text-amber-600 focus:ring-amber-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800" aria-describedby="hs-radio-admin-description" {{ ($user['role'] == 'admin') ? 'checked=""' : '' }}>
                                            </div>
                                            <label for="hs-radio-admin" class="ms-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-300">Admin</span>
                                            <span id="hs-radio-admin-description" class="block text-sm text-gray-600 dark:text-neutral-500">Master user yang memiliki semua akses.</span>
                                            </label>
                                        </div>

                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5 mt-1">
                                            <input id="hs-radio-moderator" name="role" value="moderator" type="radio" class="border-gray-200 rounded-full text-amber-600 focus:ring-amber-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800" aria-describedby="hs-radio-moderator-description" {{ ($user['role'] == 'moderator') ? 'checked=""' : '' }}>
                                            </div>
                                            <label for="hs-radio-moderator" class="ms-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-300">Moderator</span>
                                            <span id="hs-radio-moderator-description" class="block text-sm text-gray-600 dark:text-neutral-500">Akses kelola data pada user dan buku.</span>
                                            </label>
                                        </div>

                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5 mt-1">
                                            <input id="hs-radio-staff" name="role" value="staff" type="radio" class="border-gray-200 rounded-full text-amber-600 focus:ring-amber-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-amber-500 dark:checked:border-amber-500 dark:focus:ring-offset-gray-800" aria-describedby="hs-radio-staff-description" {{ ($user['role'] == 'staff') ? 'checked=""' : '' }}>
                                            </div>
                                            <label for="hs-radio-staff" class="ms-3">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-300">Staff</span>
                                            <span id="hs-radio-staff-description" class="block text-sm text-gray-600 dark:text-neutral-500">Hanya dapat akses pinjaman buku.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <p id="role_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="notelp" class="block text-sm mb-2 dark:text-white">No. Telp (opsional)</label>
                                <div class="relative">
                                <input type="number" id="notelp" value="{{ $user['phone'] }}" placeholder="Masukan nomor telepon" class="apperance-none py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-amber-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-800 dark:text-neutral-400 dark:placeholder-neutral-500" autocomplete="off">
                                </div>
                                <p id="notelp_label" class="hidden flex items-center gap-x-1 ml-1 mt-1 text-xs text-red-500 dark:text-red-600">
                                    <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-alert-icon lucide-circle-alert"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                    <span><!-- --></span>
                                </p>
                            </div>
                            <!-- End Form Group -->
                            <p id="error" class="text-sm text-red-500"></p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center gap-x-2  ">
                        <button id="btn-close" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-form-update-user-modal">
                        Tutup
                        </button>
                        <button id="btn-send" onclick="input()" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-amber-600 text-white hover:bg-amber-700 focus:outline-hidden focus:bg-amber-700 disabled:opacity-50 disabled:pointer-events-none">
                        Update petugas
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Update Petugas Modal -->
    @endif
</x-app>
<script>
function input(){
    const button = document.getElementById('btn-send')
    const label = document.getElementById('error')
    var name = document.getElementById('name')
    var username = document.getElementById('username')
    var role = document.querySelector('input[name="role"]:checked') ?? ''
    var notelp = document.getElementById('notelp')

    var name_label = document.getElementById('name_label')
    var username_label = document.getElementById('username_label')
    var role_label = document.getElementById('role_label')
    var notelp_label = document.getElementById('notelp_label')

    button.disabled = true
    button.textContent = "Loading..."
    label.textContent = ''

    fetch("https://perpustakaan_digital.test/user/{{ $user['id_user'] }}/update", {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            name: name.value,
            username: username.value,
            role: role.value,
            phone: notelp.value,
        })
    })
    .then(async (response) => {
        await new Promise(resolve => setTimeout(resolve, 500));
        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || 'Gagal mengirim data ke server');
        }

        [name, username, notelp].forEach(el => {
            el.classList.replace('border-red-500','border-gray-200')
            el.classList.replace('dark:border-red-600','dark:border-neutral-800')
        });
        [name_label, username_label, role_label, notelp_label].forEach(el => {
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
                if(data.errors.username){
                    username.classList.replace('border-gray-200','border-red-500')
                    username.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    username_label.classList.remove('hidden')
                    username_label.querySelector('span').textContent = data.errors.username
                }
                if(data.errors.phone){
                    notelp.classList.replace('border-gray-200','border-red-500')
                    notelp.classList.replace('dark:border-neutral-800','dark:border-red-600')
                    notelp_label.classList.remove('hidden')
                    notelp_label.querySelector('span').textContent = data.errors.phone
                }
                if (data.errors.role) {
                    role_label.classList.remove('hidden')
                    role_label.querySelector('span').textContent = data.errors.role
                }
            }
        } else {
            await new Promise(resolve => setTimeout(resolve, 500));
            document.getElementById('btn-close').click()
            location.reload();
        }

        button.disabled = false;
        button.textContent = "Update petugas";
        label.textContent = data.error || '';
    })
    .catch(error => {
        console.error('Error:', error);
        button.disabled = false;
        button.textContent = "Update petugas";
        label.textContent = error.message || 'Terjadi kesalahan koneksi.';
    });
}
</script>