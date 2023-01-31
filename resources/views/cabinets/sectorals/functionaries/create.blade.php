@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Cabinets</li>
                <li class="breadcrumb-item">Functionaries</li>
                <li class="breadcrumb-item active">Add Functionary</li>
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
            <form action="/cabinet/{{ $cabinet->id }}/sectoral/{{ $sectoral->id }}/functionaries" method="post" enctype="multipart/form-data">
                @csrf

                <!-- NIM -->
                <div class="row mb-3">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim" value="{{ old('nim') }}">
                        @error('nim')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

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

                <!-- Role -->
                <div class="row mb-3">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" id="role" value="{{ old('role') }}">
                        @error('role')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Study Program -->
                <div class="row mb-3">
                    <label for="study_program" class="col-sm-2 col-form-label">Study Program</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('study_program') is-invalid @enderror" name="study_program" id="study_program" value="{{ old('study_program') }}">
                        @error('study_program')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Generation -->
                <div class="row mb-3">
                    <label for="generation" class="col-sm-2 col-form-label">Generation</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('generation') is-invalid @enderror" name="generation" id="generation" value="{{ old('generation') }}">
                        @error('generation')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Avatar -->
                <div class="row mb-3">
                    <label for="avatar" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" id="avatar" value="{{ old('avatar') }}">
                        @error('avatar')
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