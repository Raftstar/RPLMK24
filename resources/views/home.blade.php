@extends('layouts.app')

@section('content')
<style>
    .gallery{
        display:inline-block;
        margin-top:20px;
    }
    .close-icon{
        border-radius:50%;
        position:absolute;
        right:5px;
        top:-10px;
        padding:5px 8px;
    }
    .form-image-upload{
         background:#e8e8e8 none repeat scroll 0 0;
         padding:15px
    }
    .close-icon{
        border-radius:30%;
        position: absolute;
        right:5px;
        top: -10px;
        padding:5px 8px;
    }
</style>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Gallery</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('upload') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul Foto" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-10">
                        <strong>Deskripsi</strong>
                        <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" autocomplete="off">
                    </div>

                    <div class="col-md-2 mt-4">
                        <button type="submit" class="btn btn-primary">Unggah Gambar</button>
                    </div>
                </div>
            </form>
            <div class="row mt-4">
                <div class="list-group gallery">
                    @foreach ($images as $image)
                    <div class="col-sm-4 col-xs-6 col-md-3 col-lg-3">
                        <div class="card mb-3">
                            <a class="thumbnail fancybox" rel="lightbox" href="">
                                <img src="{{ asset('images/'.$image->image) }}" class="card-img-top" alt="image">
                            </a>
                            <div class="card-body">
                                <p class="card-text text-center"><strong>{{ $image->judul }}</strong></p>
                                <p class="card-text text-center">{{ $image->deskripsi }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <form action="{{ url('home/edit/'.$image->id) }}" method="GET">
                                    <button type="submit" class="edit-icon btn btn-success"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                                </form>
                                
                                    @csrf
                                    <form action="{{ route('delete', $image->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
