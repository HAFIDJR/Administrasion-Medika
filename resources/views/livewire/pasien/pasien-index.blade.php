<div>
    @php
        $role = Auth::user()->role;
    @endphp

    @if ($role === 'admin')
        <div class="col-lg-10 mb-10 mx-auto">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="{{ route('pasien.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i>
                    </a>
                    <h4 class="m-15 font-weight-bold">DAFTAR PASIEN</h4>
                </div>
                <div class="card-body">
                    <!-- Menampilkan pesan kesuksesan -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-error" role="alert">
                            {{ session('error') }}
                    @endif

                    <table id="dataTable" class="table table-bordered" cellspacing="1"><br />
                        <thead>
                            <tr align="center">
                                <th style="width: 5%">#</th>
                                <th style="width: 20%">Nama Pasien</th>
                                <th style="width: 10%">Umur</th>
                                <th style="width: 30%">Alamat</th>
                                <th style="width: 10%">Tensi</th>
                                <th style="width: 25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $index => $pasienItem)
                                <tr align="center">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pasienItem->nm_pasien }}</td>
                                    <td>{{ $pasienItem->umur }}</td>
                                    <td>{{ $pasienItem->alamat }}</td>
                                    <td>{{ $pasienItem->tensi }}</td>
                                    <td>
                                        <a href="{{ route('pasien.edit', $pasienItem->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#confirmDeleteModal{{ $pasienItem->id }}">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="confirmDeleteModal{{ $pasienItem->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form wire:submit='deletePasien({{ $pasienItem->id }})'>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi
                                                        Hapus
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus Data Pasien ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    @if ($role === 'dokter')
        <div class="col-lg-10 mb-10 mx-auto">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <a href="{{ route('pasien.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i>
                    </a> --}}
                    <h4 class="m-15 font-weight-bold">DAFTAR PASIEN</h4>
                </div>
                <div class="card-body">
                    <!-- Menampilkan pesan kesuksesan -->
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table id="dataTable" class="table table-bordered" cellspacing="1"><br />
                        <thead>
                            <tr align="center">
                                <th style="width: 5%">#</th>
                                <th style="width: 20%">Nama Pasien</th>
                                <th style="width: 10%">Umur</th>
                                <th style="width: 30%">Alamat</th>
                                <th style="width: 10%">Tensi</th>
                                <th style="width: 25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $index => $pasienItem)
                                <tr align="center">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pasienItem->nm_pasien }}</td>
                                    <td>{{ $pasienItem->umur }}</td>
                                    <td>{{ $pasienItem->alamat }}</td>
                                    <td>{{ $pasienItem->tensi }}</td>
                                    <td>
                                        <a href="{{ route('dokter.edit', $pasienItem->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Pilih
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
