@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Scholarship</li>
                <li class="breadcrumb-item active">Add Scholarship</li>
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
            <form action="/scholarship" method="post" enctype="multipart/form-data">
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

                <!-- Organizer -->
                <div class="row mb-3">
                    <label for="organizer" class="col-sm-2 col-form-label">Organizer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('organizer') is-invalid @enderror" name="organizer" id="organizer" value="{{ old('organizer') }}">
                        @error('organizer')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') }}">
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Has Volunteer Program -->
                <div class="row mb-3">
                    <label for="has_volunteer_program" class="col-sm-2 col-form-label ">Has Volunteer Program?</label>
                    <div class="col-sm-10">
                        <div class="form-check ">
                            <input class="form-check-input " type="radio" name="has_volunteer_program" id="yes" value="1" {{ old('has_volunteer_program') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label " for="yes" >
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="has_volunteer_program" id="no" value="0" {{ old('has_volunteer_program') == '0'? 'checked' : '' }}>
                            <label class="form-check-label" for="no" >
                                No
                            </label>
                        </div>
                        @error('has_volunteer_program')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <!-- Registration End Date -->
                <div class="row mb-3">
                    <label for="registration_end_date" class="col-sm-2 col-form-label">Registration End Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('registration_end_date') is-invalid @enderror" name="registration_end_date" id="registration_end_date" value="{{ old('registration_end_date') }}">
                        @error('registration_end_date')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- URL -->
                <div class="row mb-3">
                    <label for="url" class="col-sm-2 col-form-label">URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url" value="{{ old('url') }}">
                        @error('url')
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