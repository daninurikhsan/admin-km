@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">News</li>
                <li class="breadcrumb-item">Edit News</li>
                <li class="breadcrumb-item active">{{ $news->title }}</li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="col-6">
        @include('layouts.alert')
    </div>
</div>

<div class="col-lg-12">

    <div class="card">
        <div class="card-body pt-3">
            <form action="/news/{{ $news->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $news->title) }}">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Body -->
                <div class="row mb-3">
                    <label for="body" class="col-sm-2 col-form-label">Body</label>
                    <div class="col-sm-10">
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror" >{{ old('body', $news->body) }}</textarea>
                        @error('body')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <!-- Thumbnail -->
                <div class="row mb-3">
                    <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail" value="{{ old('thumbnail') }}">
                        @error('thumbnail')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Thumbnail Description -->
                <div class="row mb-3">
                    <label for="thumbnail_desc" class="col-sm-2 col-form-label">Thumbnail Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('thumbnail_desc') is-invalid @enderror" name="thumbnail_desc" id="thumbnail_desc" value="{{ old('thumbnail_desc', $news->thumbnail_desc) }}">
                        @error('thumbnail_desc')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success float-end"><i class="bi bi-save"></i> Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection