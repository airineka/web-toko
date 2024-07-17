<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Buku') }}
    </h2>
  </x-slot>
  
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
        <form method="post" action="{{ route('perpustakaan.update',$data['id']) }}">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="mb-3">
              <label for="nama_buku" class="form-label fw-bold">{{ __('Id Buku') }}</label>
              <input id="nama_buku" name="nama_buku" type="text" class="form-control disabled" value="{{ $data['id'] }}" placeholder="Jas merah" readonly autocomplete="nama_buku">
            </div>
            <div class="mb-3">
              <label for="nama_buku" class="form-label fw-bold">{{ __('Nama Buku') }}</label>
              <input id="nama_buku" name="nama_buku" type="text" class="form-control" value="{{ $data['nama_buku'] }}" placeholder="Jas merah" required autocomplete="nama_buku">
            </div>
            <div class="col-span-6 sm:col-span-4">
              <label for="penerbit" class="form-label fw-bold">{{ __('Penerbit Buku') }}</label>
              <input id="penerbit" name="penerbit" type="text" class="form-control" value="{{ $data['penerbit'] }}" placeholder="Soekarno" required autocomplete="penerbit">
            </div>
          </div>
          <div class="col col-span-6 sm:col-span-4 text-end mt-2">
            <button class="col btn btn-primary" type="submit">{{ __('Simpan')}}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
