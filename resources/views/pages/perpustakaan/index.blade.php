<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Perpustakaan') }}
    </h2>
  </x-slot>
  
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
        <div class="row pb-2">
          <div class="col">
            <h2 class="fs-2 fw-bold">Anda telah meminjam buku</h2>
          </div>
          <div class="col text-end">
            <a class="btn btn-info" href="{{ route('perpustakaan.create') }}">Buat buku</a>
          </div>
        </div>
        <table class="table table-bordered">
          <thead class="text-center">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama buku</th>
            <th scope="col">Penerbit</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($datas as $data)
            <tr>
              <th class="text-center">
                <a href="{{ route('perpustakaan.show',$data['id']) }}">
                  <p>
                    {{ $data['id'] }}
                  </p>
                </a>
              </th>
              <th>
                <p>
                  {{ $data['nama_buku'] }}
                </p>
              </th>
              <td>
                <p>
                  {{ $data['penerbit'] }}
                </p>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app-layout>
