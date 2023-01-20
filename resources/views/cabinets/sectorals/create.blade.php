@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Cabinets</li>
                <li class="breadcrumb-item">{{ $cabinet->name }}</li>
                <li class="breadcrumb-item active">Add Sectoral</li>
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
            <form action="/cabinet/{{ $cabinet->id }}/sectoral/" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title/Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Abbreviation -->
                <div class="row mb-3">
                    <label for="abbreviation" class="col-sm-2 col-form-label">Abbreviation</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" name="abbreviation" id="abbreviation" value="{{ old('abbreviation') }}">
                        @error('abbreviation')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- description -->
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') }}">
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <!-- Logo -->
                <div class="row mb-3">
                    <label for="logo" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" id="logo" value="{{ old('logo') }}">
                        @error('logo')
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