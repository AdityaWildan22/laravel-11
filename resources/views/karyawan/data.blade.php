@extends('layouts.template')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card-shadow">
        <button type="button" class="btn btn-primary mb-3" onclick="tambahData()">
            Tambah Data
        </button>
    </div>
    <div class="card shadow mb-3">
        <div class="card-header" style="background-color:#4e73df;color:#fff">
            <h2 class="card-title mb-0" style="font-size: 20px">DATA KARYAWAN</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered show-data">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Jenis Kelamin</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $item)
                            <tr>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="Edit" onclick="editKaryawan({{ $item->id }})"><i
                                            class="fas fa-pen"></i></button>
                                    <form class="d-inline-block" action="{{ url($routes->index . $item->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip"
                                            data-placement="top" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formModal" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="method" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nip" class="col-form-label">NIP</label>
                                    <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                        name="nip" id="nip" placeholder="NIP" value="{{ old('nip') }}">
                                    @error('nip')
                                        <div class="invalid-feedback"> {{ $errors->first('nip') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" id="nama" placeholder="Nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback"> {{ $errors->first('nama') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username" class="col-form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        name="username" id="username" placeholder="Username"
                                        value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback"> {{ $errors->first('username') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                        name="password" id="password" placeholder="Password" value="">
                                    @error('password')
                                        <div class="invalid-feedback"> {{ $errors->first('password') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="jabatan" class="col-form-label">Jabatan</label>
                                    <input type="text" class="form-control  @error('jabatan') is-invalid @enderror"
                                        name="jabatan" id="jabatan" placeholder="Jabatan"
                                        value="{{ old('jabatan') }}">
                                    @error('jabatan')
                                        <div class="invalid-feedback"> {{ $errors->first('jabatan') }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat" class="col-form-label">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        name="alamat" id="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <div class="invalid-feedback"> {{ $errors->first('alamat') }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="custom-select rounded-0  @error('jenis_kelamin') is-invalid  @enderror"
                                        id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="" selected="true" disabled>- Pilih Jenis Kelamin -</option>
                                        <option {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}
                                            value="Laki-laki">Laki-laki</option>
                                        <option {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}
                                            value="Perempuan">Perempuan</option>
                                    </select>
                                    @if ($errors->has('jenis_kelamin'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('jenis_kelamin') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="role">Role</label>
                                    <select class="custom-select rounded-0  @error('role') is-invalid  @enderror"
                                        id="role" name="role">
                                        <option value="" selected="true" disabled>- Pilih Role -</option>
                                        <option {{ old('role') == 'SuperAdmin' ? 'selected' : '' }} value="SuperAdmin">
                                            SuperAdmin</option>
                                        <option {{ old('role') == 'Admin' ? 'selected' : '' }} value="Admin">Admin
                                        </option>
                                        <option {{ old('role') == 'User' ? 'selected' : '' }} value="User">User
                                        </option>
                                    </select>
                                    @if ($errors->has('role'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('role') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="simpanButton">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var previousInputs = {};

        function tambahData() {
            $('#staticBackdropLabel').text('Tambah Data Karyawan');
            $('#mode').val('tambah');
            $('#nip').val('');
            $('#nama').val('');
            $('#username').val('');
            $('#password').val('');
            $('#jabatan').val('');
            $('#alamat').val('');
            $('#jenis_kelamin').val('');
            $('#role').val('');
            $('#simpanButton').text('Simpan');
            $('#staticBackdrop').modal('show');

            // Bersihkan pesan kesalahan
            $('.modal-body .invalid-feedback').text('');

            // Hapus kelas is-invalid dari semua input
            $('.modal-body input, .modal-body select').removeClass('is-invalid');
        }

        function editKaryawan(id) {
            // Fetch data karyawan dari backend
            $.ajax({
                url: 'karyawans/' + id + '/edit',
                type: 'GET',
                success: function(response) {
                    // Dapatkan data karyawan dan nilai isUpdate dari response
                    var karyawan = response.karyawan;
                    var is_update = response.is_update;

                    // Gunakan data karyawan sesuai kebutuhan
                    $('#staticBackdropLabel').text(is_update ? 'Edit Data Karyawan' : 'Tambah Data Karyawan');
                    $('#nip').val(karyawan.nip);
                    $('#nama').val(karyawan.nama);
                    $('#username').val(karyawan.username);
                    $('#password').val(karyawan.password);
                    $('#jabatan').val(karyawan.jabatan);
                    $('#alamat').val(karyawan.alamat);
                    $('#jenis_kelamin').val(karyawan.jenis_kelamin);
                    $('#role').val(karyawan.role);
                    $('#simpanButton').text(is_update ? 'Update' : 'Simpan');

                    // Atur action form sesuai dengan mode edit atau tambah data
                    if (is_update) {
                        $('#formModal').attr('action', '/karyawans/' + id);
                        $('#method').val('PUT'); // Ubah method form menjadi PUT
                    } else {
                        $('#formModal').attr('action', '/karyawans/store');
                        $('#method').val('POST'); // Ubah method form menjadi POST
                    }

                    $('#staticBackdrop').modal('show');

                    // Bersihkan pesan kesalahan
                    $('.modal-body .invalid-feedback').text('');

                    // Hapus kelas is-invalid dari semua input
                    $('.modal-body input, .modal-body select').removeClass('is-invalid');
                }
            });
        }

        $(function() {
            // Fungsi untuk menampilkan modal jika terjadi kesalahan validasi
            @if ($errors->any())
                $('#staticBackdrop').modal('show');

                // Simpan nilai-nilai input sebelumnya
                previousInputs = {
                    nip: '{{ old('nip') }}',
                    nama: '{{ old('nama') }}',
                    username: '{{ old('username') }}',
                    password: '{{ old('password') }}',
                    jabatan: '{{ old('jabatan') }}',
                    alamat: '{{ old('alamat') }}',
                    jenis_kelamin: '{{ old('jenis_kelamin') }}',
                    role: '{{ old('role') }}',
                };

                // Log nilai-nilai input sebelumnya ke konsol untuk debug
                console.log(previousInputs);
            @endif
        });
    </script>
@endsection
