@extends('layouts.app')

@section('content')
<style>
    .form-image-upload{
        background: #e8e8e8 none repeat scroll 0 0;
        padding:15px;
        padding-top: 20px;
    }
</style>

<div class="container m">
    <div class="card">
        <div class="card-header"><h2>Edit Foto</h2></div>

        <form action="{{ route('update', $image->id) }}" method="post" class="form-image-upload" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Judul Foto <span class="text-danger"></span></label>
                <input class="form-control" required="required" type="text" name="judul" value="{{ $image->judul }}">
            </div>
            <div class="mb-3">
                <label>Image <span class="text-danger"></span></label>
                <input class="form-control" type="file" name="image" >
                <div class="form-text ps-5 pt-2">
                    <img src="{{ asset('images/'.$image->image) }}" height="75" />
                </div>
            </div>
            <div class="mb-3">
                <label>Deskripsi Foto</label>
                <textarea class="form-control" row="10" name="deskripsi">{{ $image->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
