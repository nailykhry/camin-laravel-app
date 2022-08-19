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

                    <form action="{{ route('ukuran.store', $sepatu->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="u_ukuran">Ukuran</label>
                            <input type="text" class="form-control @error('u_ukuran') is-invalid @enderror"
                                name="u_ukuran" value="{{ old('u_ukuran') }}" required>

                            <!-- error message untuk title -->
                            @error('u_ukuran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="u_stock">Stock</label>
                            <input type="text" class="form-control @error('u_stock') is-invalid @enderror"
                                name="u_stock" value="{{ old('u_stock') }}" required>

                            <!-- error message untuk title -->
                            @error('u_stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="s_deskripsi">Deskripsi</label>
                            <textarea name="s_deskripsi" id="content"
                                class="form-control @error('s_deskripsi') is-invalid @enderror" rows="5"
                                required>{{ old('s_deskripsi') }}</textarea>

                            <!-- error message untuk content -->
                            @error('s_deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <a href="/sepatu/{{ $sepatu->id }}" class="btn btn-md btn-secondary">back</a>

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