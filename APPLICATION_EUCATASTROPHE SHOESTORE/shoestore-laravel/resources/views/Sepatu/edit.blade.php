@extends('layouts.main')

@section('container')

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- Notifikasi menggunakan flash session data -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif

            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('sepatu.update', $sepatu->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="image">
                            <label for="s_foto">Tambah Foto</label>
                            <input type="file" class="form-control @error('s_foto') is-invalid @enderror>" name="s_foto"
                                value={{ old('s_foto', $sepatu->s_foto) }} required>
                            <!-- error message untuk title -->
                            @error('s_foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <br>
                        <div class="form-group">
                            <label for="s_nama">Nama</label>
                            <input type="text" class="form-control @error('s_nama') is-invalid @enderror" name="s_nama"
                                value="{{ old('s_nama', $sepatu->s_nama) }}" required>

                            <!-- error message untuk title -->
                            @error('s_nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="s_kategori">Kategori</label>
                            <input type="text" class="form-control @error('s_kategori') is-invalid @enderror"
                                name="s_kategori" value="{{ old('s_kategori', $sepatu->s_kategori) }}" required>

                            <!-- error message untuk title -->
                            @error('s_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="s_hargajual">Harga Jual</label>
                            <input type="text" class="form-control @error('s_hargajual') is-invalid @enderror"
                                name="s_hargajual" value="{{ old('s_hargajual') }}" required>

                            <!-- error message untuk content -->
                            @error('s_hargajual')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="s_hargabeli">Harga Beli</label>
                            <input type="text" class="form-control @error('s_hargabeli') is-invalid @enderror"
                                name="s_hargabeli" value="{{ old('s_hargabeli') }}" required>

                            <!-- error message untuk content -->
                            @error('s_hargabeli')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="s_bahan">Bahan</label>
                            <input type="text" class="form-control @error('s_bahan') is-invalid @enderror"
                                name="s_bahan" value="{{ old('s_bahan') }}" required>

                            <!-- error message untuk content -->
                            @error('s_bahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="s_deskripsi">Deskripsi</label>
                            <textarea name="s_deskripsi" id="content"
                                class="form-control @error('s_deskripsi') is-invalid @enderror" rows="5"
                                required>{{ old('s_deskripsi', $sepatu->s_deskripsi) }}</textarea>

                            <!-- error message untuk content -->
                            @error('s_deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Update</button>
                        <a href="{{ route('sepatu.index') }}" class="btn btn-md btn-secondary">back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- include summernote js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
            $('#content').summernote({
                height: 250, //set editable area's height
            });
        })
</script>

@endsection