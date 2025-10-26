@php
$page = 'home';
function simple_format($number) {
    if ($number >= 1000000000) {
        return round($number / 1000000000, 1) . 'B+';
    } elseif ($number >= 1000000) {
        return round($number / 1000000, 1) . 'M+';
    } elseif ($number >= 1000) {
        return round($number / 1000, 1) . 'K+';
    }

    return number_format($number);
}
@endphp
<x-app :page='$page'>
<div class="max-w-4xl mx-auto py-5 sm:py-10 px-5 md:px-8 2xl:px-5">
  <!-- Header -->
  <div class="mb-5 flex flex-wrap justify-between items-center gap-3">
    <!-- Heading -->
    <div class="flex items-center gap-x-4">

      <div class="grow">
        <h1 class="text-gray-500 dark:text-neutral-500">
          Selamat datang!
        </h1>
        <p class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-white">
          {{ Auth::user()->name }}
        </p>
      </div>
    </div>
    <!-- End Heading -->

    <!-- Button Group -->
    <div class="flex flex-wrap gap-2">
      <!-- Button -->
      <button class="py-2 px-3 inline-flex items-center gap-x-1.5 text-sm font-medium rounded-xl border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-form-input-pnjmn-modal" data-hs-overlay="#hs-form-input-pnjmn-modal">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus-icon lucide-circle-plus"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
        Input data pinjaman
      </button>
      <!-- End Button -->
    </div>
    <!-- End Button Group -->
  </div>
  <!-- End Header -->

  <!-- Card Group -->
  <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
    <!-- Card -->
    <div class="col-span-full sm:col-span-1 relative overflow-hidden p-4 bg-indigo-200 rounded-2xl dark:bg-indigo-900">
      <!-- Body -->
      <div class="relative z-10">
        <!-- Icon -->
        <svg class="mb-2 shrink-0 size-8 text-indigo-700 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-up2-icon lucide-book-up-2"><path d="M12 13V7"/><path d="M18 2h1a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2"/><path d="m9 10 3-3 3 3"/><path d="m9 5 3-3 3 3"/></svg>
        <!-- End Icon -->

        <h3 class="font-semibold text-sm text-gray-800 dark:text-indigo-100">
          Buku sedang dipinjam
        </h3>

        <div class="mt-5">
          <p class="font-semibold text-xl text-gray-800 dark:text-white">
            {{ simple_format(count($bukuDipinjam)) }} Buku
          </p>
          <p class="text-xs text-indigo-900 dark:text-indigo-100/50">
            Dari <b>{{ simple_format(count($pinjaman)) }}</b> data pinjaman
          </p>
          <div class="mt-4">
            <a href="/pinjaman?filter=dipinjam" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-indigo-800 hover:text-indigo-600 disabled:opacity-50 disabled:pointer-events-none decoration-2 focus:outline-hidden focus:underline dark:text-indigo-100/50 dark:hover:text-indigo-100">
              Lihat detail
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
            </a>
          </div>
        </div>
      </div>
      <!-- End Body -->

      <!-- Bg Element -->
      <div class="z-9 absolute top-0 end-0">
        <svg class="w-48 h-56" width="806" height="511" viewBox="0 0 806 511" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M544.8 -1147.08L1098.08 484L714.167 614.228C692.688 577.817 658.308 547.748 620.707 527.375C561.271 495.163 493.688 482.213 428.253 465.21C391.41 455.641 349.053 438.735 340.625 401.621C335.248 377.942 346.056 354.034 351.234 330.304C364.887 267.777 335.093 198.172 280.434 164.889C266.851 156.619 251.423 149.934 242.315 136.897C214.215 96.6599 268.253 45.1471 263.125 -3.66296C261.266 -21.3099 251.617 -37.124 241.172 -51.463C126.21 -209.336 -87.5388 -248.663 -263.351 -333.763C-314.682 -358.613 -364.939 -389.135 -400.106 -434.021C-435.273 -478.907 -453.106 -540.621 -434.096 -594.389C-408.119 -667.874 -325.246 -703.948 -248.613 -718.248C-171.98 -732.548 -90.1128 -734.502 -23.1788 -774.468C49.5632 -817.9 90.8002 -897.847 147.393 -960.879C175.737 -992.458 208.024 -1019.8 242.465 -1044.52L544.8 -1147.08Z" fill="currentColor" class="fill-indigo-300/40 dark:fill-indigo-700/40" />
          <path d="M726.923 -1341.99L1280.23 288.8L896.3 419.008C874.821 382.608 840.438 352.54 802.834 332.171C743.394 299.964 675.808 287.017 610.369 270.017C573.523 260.45 531.162 243.546 522.736 206.439C517.358 182.765 528.167 158.861 533.345 135.139C547 72.6228 517.203 3.03076 462.545 -30.2462C448.963 -38.5142 433.533 -45.1982 424.425 -58.2323C396.325 -98.4623 450.366 -149.965 445.237 -198.767C443.377 -216.411 433.727 -232.222 423.283 -246.567C308.3 -404.412 94.5421 -443.732 -81.2789 -528.817C-132.615 -553.663 -182.874 -584.179 -218.044 -629.057C-253.214 -673.935 -271.044 -735.64 -252.036 -789.397C-226.058 -862.869 -143.178 -898.936 -66.543 -913.234C10.092 -927.532 91.9721 -929.485 158.905 -969.444C231.652 -1012.86 272.9 -1092.8 329.489 -1155.82C357.834 -1187.39 390.124 -1214.73 424.565 -1239.45L726.923 -1341.99Z" fill="currentColor" class="fill-indigo-400/20 dark:fill-indigo-600/30" />
        </svg>
      </div>
      <!-- End Bg Element -->
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="relative overflow-hidden p-4 bg-pink-200 rounded-2xl dark:bg-pink-900">
      <!-- Body -->
      <div class="relative z-10">
        <!-- Icon -->
        <svg class="mb-2 shrink-0 size-8 text-pink-700 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-alert-icon lucide-book-alert"><path d="M12 13h.01"/><path d="M12 6v3"/><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/></svg>
        <!-- End Icon -->

        <h3 class="font-semibold text-sm text-gray-800 dark:text-pink-100">
          Buku hilang
        </h3>

        <div class="mt-5">
          <p class="font-semibold text-xl text-gray-800 dark:text-white">
            {{ simple_format(count($bukuHilang)) }} Buku
          </p>
          <p class="text-xs text-pink-900 dark:text-pink-100/50">
            Dari <b>{{ simple_format(count($pinjaman)) }}</b> data pinjaman
          </p>
          <div class="mt-4">
            <a href="/pinjaman?filter=hilang" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-pink-800 hover:text-pink-600 disabled:opacity-50 disabled:pointer-events-none decoration-2 focus:outline-hidden focus:underline dark:text-pink-100/50 dark:hover:text-pink-100">
              Lihat detail
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
            </a>
          </div>
        </div>
      </div>
      <!-- End Body -->

      <!-- Bg Element -->
      <div class="z-9 absolute top-0 end-0">
        <svg class="w-48 h-56" width="806" height="511" viewBox="0 0 806 511" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M544.8 -1147.08L1098.08 484L714.167 614.228C692.688 577.817 658.308 547.748 620.707 527.375C561.271 495.163 493.688 482.213 428.253 465.21C391.41 455.641 349.053 438.735 340.625 401.621C335.248 377.942 346.056 354.034 351.234 330.304C364.887 267.777 335.093 198.172 280.434 164.889C266.851 156.619 251.423 149.934 242.315 136.897C214.215 96.6599 268.253 45.1471 263.125 -3.66296C261.266 -21.3099 251.617 -37.124 241.172 -51.463C126.21 -209.336 -87.5388 -248.663 -263.351 -333.763C-314.682 -358.613 -364.939 -389.135 -400.106 -434.021C-435.273 -478.907 -453.106 -540.621 -434.096 -594.389C-408.119 -667.874 -325.246 -703.948 -248.613 -718.248C-171.98 -732.548 -90.1128 -734.502 -23.1788 -774.468C49.5632 -817.9 90.8002 -897.847 147.393 -960.879C175.737 -992.458 208.024 -1019.8 242.465 -1044.52L544.8 -1147.08Z" fill="currentColor" class="fill-pink-300/40 dark:fill-pink-700/40" />
          <path d="M726.923 -1341.99L1280.23 288.8L896.3 419.008C874.821 382.608 840.438 352.54 802.834 332.171C743.394 299.964 675.808 287.017 610.369 270.017C573.523 260.45 531.162 243.546 522.736 206.439C517.358 182.765 528.167 158.861 533.345 135.139C547 72.6228 517.203 3.03076 462.545 -30.2462C448.963 -38.5142 433.533 -45.1982 424.425 -58.2323C396.325 -98.4623 450.366 -149.965 445.237 -198.767C443.377 -216.411 433.727 -232.222 423.283 -246.567C308.3 -404.412 94.5421 -443.732 -81.2789 -528.817C-132.615 -553.663 -182.874 -584.179 -218.044 -629.057C-253.214 -673.935 -271.044 -735.64 -252.036 -789.397C-226.058 -862.869 -143.178 -898.936 -66.543 -913.234C10.092 -927.532 91.9721 -929.485 158.905 -969.444C231.652 -1012.86 272.9 -1092.8 329.489 -1155.82C357.834 -1187.39 390.124 -1214.73 424.565 -1239.45L726.923 -1341.99Z" fill="currentColor" class="fill-pink-400/20 dark:fill-pink-600/30" />
        </svg>
      </div>
      <!-- End Bg Element -->
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="relative overflow-hidden p-4 bg-green-200 rounded-2xl dark:bg-green-900">
      <!-- Body -->
      <div class="relative z-10">
        <!-- Icon -->
        <svg class="mb-2 shrink-0 size-8 text-green-700 dark:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-check-icon lucide-book-check"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/><path d="m9 9.5 2 2 4-4"/></svg>
        <!-- End Icon -->

        <h3 class="font-semibold text-sm text-gray-800 dark:text-green-100">
          Buku dikembalikan
        </h3>

        <div class="mt-5">
          <p class="font-semibold text-xl text-gray-800 dark:text-white">
            {{ simple_format(count($bukuDikembalikan)) }} Buku
          </p>
          <p class="text-xs text-green-900 dark:text-green-100/50">
            Dari <b>{{ simple_format(count($pinjaman)) }}</b> data pinjaman
          </p>
          <div class="mt-4">
            <a href="/pinjaman?filter=dikembalikan" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-800 hover:text-green-600 disabled:opacity-50 disabled:pointer-events-none decoration-2 focus:outline-hidden focus:underline dark:text-green-100/50 dark:hover:text-green-100">
              Lihat detail
              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
            </a>
          </div>
        </div>
      </div>
      <!-- End Body -->

      <!-- Bg Element -->
      <div class="z-9 absolute top-0 end-0">
        <svg class="w-48 h-56" width="806" height="511" viewBox="0 0 806 511" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M544.8 -1147.08L1098.08 484L714.167 614.228C692.688 577.817 658.308 547.748 620.707 527.375C561.271 495.163 493.688 482.213 428.253 465.21C391.41 455.641 349.053 438.735 340.625 401.621C335.248 377.942 346.056 354.034 351.234 330.304C364.887 267.777 335.093 198.172 280.434 164.889C266.851 156.619 251.423 149.934 242.315 136.897C214.215 96.6599 268.253 45.1471 263.125 -3.66296C261.266 -21.3099 251.617 -37.124 241.172 -51.463C126.21 -209.336 -87.5388 -248.663 -263.351 -333.763C-314.682 -358.613 -364.939 -389.135 -400.106 -434.021C-435.273 -478.907 -453.106 -540.621 -434.096 -594.389C-408.119 -667.874 -325.246 -703.948 -248.613 -718.248C-171.98 -732.548 -90.1128 -734.502 -23.1788 -774.468C49.5632 -817.9 90.8002 -897.847 147.393 -960.879C175.737 -992.458 208.024 -1019.8 242.465 -1044.52L544.8 -1147.08Z" fill="currentColor" class="fill-green-300/40 dark:fill-green-700/40" />
          <path d="M726.923 -1341.99L1280.23 288.8L896.3 419.008C874.821 382.608 840.438 352.54 802.834 332.171C743.394 299.964 675.808 287.017 610.369 270.017C573.523 260.45 531.162 243.546 522.736 206.439C517.358 182.765 528.167 158.861 533.345 135.139C547 72.6228 517.203 3.03076 462.545 -30.2462C448.963 -38.5142 433.533 -45.1982 424.425 -58.2323C396.325 -98.4623 450.366 -149.965 445.237 -198.767C443.377 -216.411 433.727 -232.222 423.283 -246.567C308.3 -404.412 94.5421 -443.732 -81.2789 -528.817C-132.615 -553.663 -182.874 -584.179 -218.044 -629.057C-253.214 -673.935 -271.044 -735.64 -252.036 -789.397C-226.058 -862.869 -143.178 -898.936 -66.543 -913.234C10.092 -927.532 91.9721 -929.485 158.905 -969.444C231.652 -1012.86 272.9 -1092.8 329.489 -1155.82C357.834 -1187.39 390.124 -1214.73 424.565 -1239.45L726.923 -1341.99Z" fill="currentColor" class="fill-green-400/20 dark:fill-green-600/30" />
        </svg>
      </div>
      <!-- End Bg Element -->
    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Group -->

  <!-- Card Group -->
  <div class="mt-3 grid grid-cols-2 sm:grid-cols-4 gap-3">
    <!-- Card -->
    <div class="relative overflow-hidden p-4 bg-gray-200 rounded-2xl dark:bg-neutral-800">
      <!-- Body -->
      <div class="relative z-10">
        <!-- Icon -->
        <svg class="mb-2 shrink-0 size-8 text-gray-800 dark:text-neutral-100" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-stamp-icon lucide-stamp"><path d="M14 13V8.5C14 7 15 7 15 5a3 3 0 0 0-6 0c0 2 1 2 1 3.5V13"/><path d="M20 15.5a2.5 2.5 0 0 0-2.5-2.5h-11A2.5 2.5 0 0 0 4 15.5V17a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1z"/><path d="M5 22h14"/></svg>
        <!-- End Icon -->

        <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-100">
          Data pinjaman
        </h3>

        <div class="mt-5">
          <p class="font-semibold text-xl text-gray-800 dark:text-white">
            {{ simple_format(count($pinjaman)) }} <span class="font-normal text-sm text-gray-500 dark:text-neutral-100/50">Data</span>
          </p>
          <p class="text-xs text-gray-500 dark:text-neutral-100/50">
            Tercatat sistem 
          </p>
        </div>
      </div>
      <!-- End Body -->

      <!-- Bg Element -->
      <div class="z-9 absolute top-0 end-0">
        <svg class="w-48 h-56" width="806" height="511" viewBox="0 0 806 511" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M544.8 -1147.08L1098.08 484L714.167 614.228C692.688 577.817 658.308 547.748 620.707 527.375C561.271 495.163 493.688 482.213 428.253 465.21C391.41 455.641 349.053 438.735 340.625 401.621C335.248 377.942 346.056 354.034 351.234 330.304C364.887 267.777 335.093 198.172 280.434 164.889C266.851 156.619 251.423 149.934 242.315 136.897C214.215 96.6599 268.253 45.1471 263.125 -3.66296C261.266 -21.3099 251.617 -37.124 241.172 -51.463C126.21 -209.336 -87.5388 -248.663 -263.351 -333.763C-314.682 -358.613 -364.939 -389.135 -400.106 -434.021C-435.273 -478.907 -453.106 -540.621 -434.096 -594.389C-408.119 -667.874 -325.246 -703.948 -248.613 -718.248C-171.98 -732.548 -90.1128 -734.502 -23.1788 -774.468C49.5632 -817.9 90.8002 -897.847 147.393 -960.879C175.737 -992.458 208.024 -1019.8 242.465 -1044.52L544.8 -1147.08Z" fill="currentColor" class="fill-gray-300/40 dark:fill-neutral-700/40" />
          <path d="M726.923 -1341.99L1280.23 288.8L896.3 419.008C874.821 382.608 840.438 352.54 802.834 332.171C743.394 299.964 675.808 287.017 610.369 270.017C573.523 260.45 531.162 243.546 522.736 206.439C517.358 182.765 528.167 158.861 533.345 135.139C547 72.6228 517.203 3.03076 462.545 -30.2462C448.963 -38.5142 433.533 -45.1982 424.425 -58.2323C396.325 -98.4623 450.366 -149.965 445.237 -198.767C443.377 -216.411 433.727 -232.222 423.283 -246.567C308.3 -404.412 94.5421 -443.732 -81.2789 -528.817C-132.615 -553.663 -182.874 -584.179 -218.044 -629.057C-253.214 -673.935 -271.044 -735.64 -252.036 -789.397C-226.058 -862.869 -143.178 -898.936 -66.543 -913.234C10.092 -927.532 91.9721 -929.485 158.905 -969.444C231.652 -1012.86 272.9 -1092.8 329.489 -1155.82C357.834 -1187.39 390.124 -1214.73 424.565 -1239.45L726.923 -1341.99Z" fill="currentColor" class="fill-gray-400/20 dark:fill-neutral-600/30" />
        </svg>
      </div>
      <!-- End Bg Element -->
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="relative overflow-hidden p-4 bg-gray-200 rounded-2xl dark:bg-neutral-800">
      <!-- Body -->
      <div class="relative z-10">
        <!-- Icon -->
        <svg class="mb-2 shrink-0 size-8 text-gray-800 dark:text-neutral-100" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-library-big-icon lucide-library-big"><rect width="8" height="18" x="3" y="3" rx="1"/><path d="M7 3v18"/><path d="M20.4 18.9c.2.5-.1 1.1-.6 1.3l-1.9.7c-.5.2-1.1-.1-1.3-.6L11.1 5.1c-.2-.5.1-1.1.6-1.3l1.9-.7c.5-.2 1.1.1 1.3.6Z"/></svg>
        <!-- End Icon -->

        <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-100">
          Data buku
        </h3>

        <div class="mt-5">
          <p class="font-semibold text-xl text-gray-800 dark:text-white">
            {{ simple_format(count($buku)) }} <span class="font-normal text-sm text-gray-500 dark:text-neutral-100/50">Buku</span>
          </p>
          <p class="text-xs text-gray-500 dark:text-neutral-100/50">
            Tercatat sistem 
          </p>
        </div>
      </div>
      <!-- End Body -->

      <!-- Bg Element -->
      <div class="z-9 absolute top-0 end-0">
        <svg class="w-48 h-56" width="806" height="511" viewBox="0 0 806 511" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M544.8 -1147.08L1098.08 484L714.167 614.228C692.688 577.817 658.308 547.748 620.707 527.375C561.271 495.163 493.688 482.213 428.253 465.21C391.41 455.641 349.053 438.735 340.625 401.621C335.248 377.942 346.056 354.034 351.234 330.304C364.887 267.777 335.093 198.172 280.434 164.889C266.851 156.619 251.423 149.934 242.315 136.897C214.215 96.6599 268.253 45.1471 263.125 -3.66296C261.266 -21.3099 251.617 -37.124 241.172 -51.463C126.21 -209.336 -87.5388 -248.663 -263.351 -333.763C-314.682 -358.613 -364.939 -389.135 -400.106 -434.021C-435.273 -478.907 -453.106 -540.621 -434.096 -594.389C-408.119 -667.874 -325.246 -703.948 -248.613 -718.248C-171.98 -732.548 -90.1128 -734.502 -23.1788 -774.468C49.5632 -817.9 90.8002 -897.847 147.393 -960.879C175.737 -992.458 208.024 -1019.8 242.465 -1044.52L544.8 -1147.08Z" fill="currentColor" class="fill-gray-300/40 dark:fill-neutral-700/40" />
          <path d="M726.923 -1341.99L1280.23 288.8L896.3 419.008C874.821 382.608 840.438 352.54 802.834 332.171C743.394 299.964 675.808 287.017 610.369 270.017C573.523 260.45 531.162 243.546 522.736 206.439C517.358 182.765 528.167 158.861 533.345 135.139C547 72.6228 517.203 3.03076 462.545 -30.2462C448.963 -38.5142 433.533 -45.1982 424.425 -58.2323C396.325 -98.4623 450.366 -149.965 445.237 -198.767C443.377 -216.411 433.727 -232.222 423.283 -246.567C308.3 -404.412 94.5421 -443.732 -81.2789 -528.817C-132.615 -553.663 -182.874 -584.179 -218.044 -629.057C-253.214 -673.935 -271.044 -735.64 -252.036 -789.397C-226.058 -862.869 -143.178 -898.936 -66.543 -913.234C10.092 -927.532 91.9721 -929.485 158.905 -969.444C231.652 -1012.86 272.9 -1092.8 329.489 -1155.82C357.834 -1187.39 390.124 -1214.73 424.565 -1239.45L726.923 -1341.99Z" fill="currentColor" class="fill-gray-400/20 dark:fill-neutral-600/30" />
        </svg>
      </div>
      <!-- End Bg Element -->
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="relative overflow-hidden p-4 bg-gray-200 rounded-2xl dark:bg-neutral-800">
      <!-- Body -->
      <div class="relative z-10">
        <!-- Icon -->
        <svg class="mb-2 shrink-0 size-8 text-gray-800 dark:text-neutral-100" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-blocks-icon lucide-blocks"><path d="M10 22V7a1 1 0 0 0-1-1H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-5a1 1 0 0 0-1-1H2"/><rect x="14" y="2" width="8" height="8" rx="1"/></svg>
        <!-- End Icon -->

        <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-100">
          Data kategori
        </h3>

        <div class="mt-5">
          <p class="font-semibold text-xl text-gray-800 dark:text-white">
            {{ simple_format(count($kategori)) }} <span class="font-normal text-sm text-gray-500 dark:text-neutral-100/50">Jenis</span>
          </p>
          <p class="text-xs text-gray-500 dark:text-neutral-100/50">
            Tercatat sistem 
          </p>
        </div>
      </div>
      <!-- End Body -->

      <!-- Bg Element -->
      <div class="z-9 absolute top-0 end-0">
        <svg class="w-48 h-56" width="806" height="511" viewBox="0 0 806 511" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M544.8 -1147.08L1098.08 484L714.167 614.228C692.688 577.817 658.308 547.748 620.707 527.375C561.271 495.163 493.688 482.213 428.253 465.21C391.41 455.641 349.053 438.735 340.625 401.621C335.248 377.942 346.056 354.034 351.234 330.304C364.887 267.777 335.093 198.172 280.434 164.889C266.851 156.619 251.423 149.934 242.315 136.897C214.215 96.6599 268.253 45.1471 263.125 -3.66296C261.266 -21.3099 251.617 -37.124 241.172 -51.463C126.21 -209.336 -87.5388 -248.663 -263.351 -333.763C-314.682 -358.613 -364.939 -389.135 -400.106 -434.021C-435.273 -478.907 -453.106 -540.621 -434.096 -594.389C-408.119 -667.874 -325.246 -703.948 -248.613 -718.248C-171.98 -732.548 -90.1128 -734.502 -23.1788 -774.468C49.5632 -817.9 90.8002 -897.847 147.393 -960.879C175.737 -992.458 208.024 -1019.8 242.465 -1044.52L544.8 -1147.08Z" fill="currentColor" class="fill-gray-300/40 dark:fill-neutral-700/40" />
          <path d="M726.923 -1341.99L1280.23 288.8L896.3 419.008C874.821 382.608 840.438 352.54 802.834 332.171C743.394 299.964 675.808 287.017 610.369 270.017C573.523 260.45 531.162 243.546 522.736 206.439C517.358 182.765 528.167 158.861 533.345 135.139C547 72.6228 517.203 3.03076 462.545 -30.2462C448.963 -38.5142 433.533 -45.1982 424.425 -58.2323C396.325 -98.4623 450.366 -149.965 445.237 -198.767C443.377 -216.411 433.727 -232.222 423.283 -246.567C308.3 -404.412 94.5421 -443.732 -81.2789 -528.817C-132.615 -553.663 -182.874 -584.179 -218.044 -629.057C-253.214 -673.935 -271.044 -735.64 -252.036 -789.397C-226.058 -862.869 -143.178 -898.936 -66.543 -913.234C10.092 -927.532 91.9721 -929.485 158.905 -969.444C231.652 -1012.86 272.9 -1092.8 329.489 -1155.82C357.834 -1187.39 390.124 -1214.73 424.565 -1239.45L726.923 -1341.99Z" fill="currentColor" class="fill-gray-400/20 dark:fill-neutral-600/30" />
        </svg>
      </div>
      <!-- End Bg Element -->
    </div>
    <!-- End Card -->

    <!-- Card -->
    <div class="relative overflow-hidden p-4 bg-gray-200 rounded-2xl dark:bg-neutral-800">
      <!-- Body -->
      <div class="relative z-10">
        <!-- Icon -->
        <svg class="mb-2 shrink-0 size-8 text-gray-800 dark:text-neutral-100" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M16 3.128a4 4 0 0 1 0 7.744"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="9" cy="7" r="4"/></svg>
        <!-- End Icon -->

        <h3 class="font-semibold text-sm text-gray-800 dark:text-neutral-100">
          Data pengguna
        </h3>

        <div class="mt-5">
          <p class="font-semibold text-xl text-gray-800 dark:text-white">
            {{ simple_format(count($petugas)) }} <span class="font-normal text-sm text-gray-500 dark:text-neutral-100/50">Petugas</span>
          </p>
          <p class="text-xs text-gray-500 dark:text-neutral-100/50">
            Tercatat sistem 
          </p>
        </div>
      </div>
      <!-- End Body -->

      <!-- Bg Element -->
      <div class="z-9 absolute top-0 end-0">
        <svg class="w-48 h-56" width="806" height="511" viewBox="0 0 806 511" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M544.8 -1147.08L1098.08 484L714.167 614.228C692.688 577.817 658.308 547.748 620.707 527.375C561.271 495.163 493.688 482.213 428.253 465.21C391.41 455.641 349.053 438.735 340.625 401.621C335.248 377.942 346.056 354.034 351.234 330.304C364.887 267.777 335.093 198.172 280.434 164.889C266.851 156.619 251.423 149.934 242.315 136.897C214.215 96.6599 268.253 45.1471 263.125 -3.66296C261.266 -21.3099 251.617 -37.124 241.172 -51.463C126.21 -209.336 -87.5388 -248.663 -263.351 -333.763C-314.682 -358.613 -364.939 -389.135 -400.106 -434.021C-435.273 -478.907 -453.106 -540.621 -434.096 -594.389C-408.119 -667.874 -325.246 -703.948 -248.613 -718.248C-171.98 -732.548 -90.1128 -734.502 -23.1788 -774.468C49.5632 -817.9 90.8002 -897.847 147.393 -960.879C175.737 -992.458 208.024 -1019.8 242.465 -1044.52L544.8 -1147.08Z" fill="currentColor" class="fill-gray-300/40 dark:fill-neutral-700/40" />
          <path d="M726.923 -1341.99L1280.23 288.8L896.3 419.008C874.821 382.608 840.438 352.54 802.834 332.171C743.394 299.964 675.808 287.017 610.369 270.017C573.523 260.45 531.162 243.546 522.736 206.439C517.358 182.765 528.167 158.861 533.345 135.139C547 72.6228 517.203 3.03076 462.545 -30.2462C448.963 -38.5142 433.533 -45.1982 424.425 -58.2323C396.325 -98.4623 450.366 -149.965 445.237 -198.767C443.377 -216.411 433.727 -232.222 423.283 -246.567C308.3 -404.412 94.5421 -443.732 -81.2789 -528.817C-132.615 -553.663 -182.874 -584.179 -218.044 -629.057C-253.214 -673.935 -271.044 -735.64 -252.036 -789.397C-226.058 -862.869 -143.178 -898.936 -66.543 -913.234C10.092 -927.532 91.9721 -929.485 158.905 -969.444C231.652 -1012.86 272.9 -1092.8 329.489 -1155.82C357.834 -1187.39 390.124 -1214.73 424.565 -1239.45L726.923 -1341.99Z" fill="currentColor" class="fill-gray-400/20 dark:fill-neutral-600/30" />
        </svg>
      </div>
      <!-- End Bg Element -->
    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Group -->

  <!-- Header -->
  <div class="mt-8 sm:mt-16 mb-3 flex flex-col md:flex-row md:items-center gap-y-2 md:gap-y-0 gap-3">
    <div>
      <h2 class="font-semibold text-lg md:text-xl text-gray-800 dark:text-white">
        Daftar pinjaman buku terakhir
      </h2>
    </div>
    <!-- End Col -->
  </div>
  <!-- End Header -->

  <!-- Borrowings List Group Card -->
  <div>
    <div class="mb-3">
      <!-- List -->
      <div class="-mx-3">

        @if (!empty($pinjaman))
          @foreach ($pinjaman->reverse()->take(10) as $item)            
          <!-- List Item -->
          <a class="mb-2 p-3 group flex gap-x-4 rounded-2xl hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="/pinjaman/{{ $item['id_borrowing'] }}/detail">
            <div class="grow">
              <div class="flex justify-between items-center gap-x-3">
                <div>
                  <h4 class="font-medium text-gray-800 dark:text-white">
                    {{ $item['buku']['title'] }}
                  </h4>
                  <ul class="flex flex-wrap">
                    <li class="inline-block relative text-sm text-gray-500 pe-4 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:bg-gray-500 before:rounded-full dark:before:bg-neutral-500 dark:text-neutral-500">
                      #{{ ucfirst($item['id_borrowing']) }}
                    </li>
                    <li class="inline-block relative text-sm {{ ($item['status'] == 'dipinjam') ? 'text-blue-500' : '' }} {{ ($item['status'] == 'hilang') ? 'text-red-500' : '' }} {{ ($item['status'] == 'dikembalikan') ? 'text-green-500' : '' }} pe-4 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:bg-gray-500 before:rounded-full dark:before:bg-neutral-500">
                      {{ ucfirst($item['status']) }}
                    </li>
                    <li class="inline-block relative text-sm text-gray-500 pe-4 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-1.5 before:-translate-y-1/2 before:size-[3px] before:bg-gray-500 before:rounded-full dark:before:bg-neutral-500 dark:text-neutral-500">
                      {{ $item['name'] }}
                    </li>
                  </ul>
                </div>

                <div class="text-end">
                  <p class="whitespace-nowrap font-medium sm:text-md text-gray-800 dark:text-white">
                    {{ \Carbon\Carbon::parse($item['borrow_date'])->locale('id')->translatedFormat('d F Y') }}
                  </p>
                  <p class="whitespace-nowrap text-sm text-gray-500 dark:text-neutral-500">
                    Tersimpan {{ \Carbon\Carbon::parse($item['created_at'])->locale('id')->diffForHumans() }}
                  </p>
                </div>
              </div>
            </div>
            <!-- End Col -->
          </a>
          <!-- End List Item -->
          @endforeach
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
      <a class="inline-flex items-center gap-x-1 font-medium text-sm text-start text-amber-600 underline underline-offset-4 hover:text-amber-700 focus:outline-hidden dark:text-amber-500 dark:hover:text-amber-600" href="/pinjaman">
        Lihat semua daftar pinjaman
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="m9 18 6-6-6-6" />
        </svg>
      </a>
    </div>
  @endif
</div>
</x-app>