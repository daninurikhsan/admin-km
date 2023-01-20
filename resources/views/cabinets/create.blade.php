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
                <li class="breadcrumb-item active">Add Cabinet</li>
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
            <form action="/cabinet" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
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

                <!-- Vision -->
                <div class="row mb-3">
                    <label for="vision_statement" class="col-sm-2 col-form-label">Vision</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('vision_statement') is-invalid @enderror" name="vision_statement" id="vision_statement" value="{{ old('vision_statement') }}">
                        @error('vision_statement')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Start Date -->
                <div class="row mb-3">
                    <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" id="start_date" value="{{ old('start_date') }}">
                        @error('start_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- End Date -->
                <div class="row mb-3">
                    <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" id="end_date" value="{{ old('end_date') }}">
                        @error('end_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- President -->
                <hr>
                <h5><b>President</b></h5>

                <!-- NIM -->
                <div class="row mb-3">
                    <label for="president_nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('president_nim') is-invalid @enderror" name="president_nim" id="president_nim" value="{{ old('president_nim') }}">
                        @error('president_nim')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Name -->
                <div class="row mb-3">
                    <label for="president_name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('president_name') is-invalid @enderror" name="president_name" id="president_name" value="{{ old('president_name') }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Study Program -->
                <div class="row mb-3">
                    <label for="president_study_program" class="col-sm-2 col-form-label">Study Program</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('president_study_program') is-invalid @enderror" name="president_study_program" id="president_study_program" value="{{ old('president_study_program') }}">
                        @error('president_study_program')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Generation -->
                <div class="row mb-3">
                    <label for="president_generation" class="col-sm-2 col-form-label">Generation</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('president_generation') is-invalid @enderror" name="president_generation" id="president_generation" value="{{ old('president_generation') }}">
                        @error('president_generation')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Avatar -->
                <div class="row mb-3">
                    <label for="president_avatar" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('president_avatar') is-invalid @enderror" name="president_avatar" id="president_avatar" value="{{ old('president_avatar') }}">
                        @error('president_avatar')
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