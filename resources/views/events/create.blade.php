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
                <li class="breadcrumb-item active">Add Event</li>
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
            <form action="/event" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
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

                <!-- Short Description -->
                <div class="row mb-3">
                    <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" id="short_description" cols="30" rows="5">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Registration URL -->
                <div class="row mb-3">
                    <label for="registration_url" class="col-sm-2 col-form-label">Registration URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('registration_url') is-invalid @enderror" name="registration_url" id="registration_url" value="{{ old('registration_url') }}">
                        @error('registration_url')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Information URL -->
                <div class="row mb-3">
                    <label for="information_url" class="col-sm-2 col-form-label">Information URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('information_url') is-invalid @enderror" name="information_url" id="information_url" value="{{ old('information_url') }}">
                        @error('information_url')
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

                <!-- Background Thumbnail -->
                <div class="row mb-3">
                    <label for="bg_thumbnail" class="col-sm-2 col-form-label">Background Thumbnail</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('bg_thumbnail') is-invalid @enderror" name="bg_thumbnail" id="bg_thumbnail" value="{{ old('bg_thumbnail') }}">
                        @error('bg_thumbnail')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Foreground Thumbnail -->
                <div class="row mb-3">
                    <label for="fg_thumbnail" class="col-sm-2 col-form-label">Foreground Thumbnail</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('fg_thumbnail') is-invalid @enderror" name="fg_thumbnail" id="fg_thumbnail" value="{{ old('fg_thumbnail') }}">
                        @error('fg_thumbnail')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <!-- Event Schedules -->
                <hr>
                <b><h5>Schedules</h5></b>

                <!-- Title -->
                <div class="row mb-3">
                    <label for="activity_title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('activity_title') is-invalid @enderror" name="activity_title" id="activity_title" value="{{ old('activity_title') }}">
                        @error('activity_title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="row mb-3">
                    <label for="activity_description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('activity_description') is-invalid @enderror" name="activity_description" id="activity_description" value="{{ old('activity_description') }}">
                        @error('activity_description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Presenter -->
                <div class="row mb-3">
                    <label for="presenter" class="col-sm-2 col-form-label">Presenter</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('presenter') is-invalid @enderror" name="presenter" id="presenter" value="{{ old('presenter') }}">
                        @error('presenter')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Presenter Avatar -->
                <div class="row mb-3">
                    <label for="presenter_avatar" class="col-sm-2 col-form-label">Presenter Avatar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('presenter_avatar') is-invalid @enderror" name="presenter_avatar" id="presenter_avatar" value="{{ old('presenter_avatar') }}">
                        @error('presenter_avatar')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                
                <!-- Benefits -->
                <hr>
                <b><h5>Benefits</h5></b>

                <!-- Title -->
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Icon -->
                <div class="row mb-3">
                    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('icon') is-invalid @enderror" name="icon" id="icon" value="{{ old('icon') }}">
                        @error('icon')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Person in Charge -->
                <hr>
                <b><h5>Person in Charge</h5></b>

                <!-- name -->
                <div class="row mb-3">
                    <label for="functionary_id" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <select name="functionary_id" id="functionary_id" class="form-control @error('functionary_id') is-invalid @enderror">
                            <option value="dani">Dani</option>
                        </select>
                        @error('functionary_id')
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