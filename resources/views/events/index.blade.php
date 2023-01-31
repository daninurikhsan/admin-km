@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Events</li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="col-6">
        <a href="/event/create" class="btn btn-sm btn-primary float-end"><i class="bi bi-plus"></i> Add Event</a>
    </div>
</div>

<div class="col-lg-12">

    <div class="card">
        <div class="card-body pt-3">

            <!-- Table with stripped rows -->
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">PIC</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $event->title }}</td>
                            <td class="text-center">
                                Dani Ikhsan <br>
                                Haidar Dzaky
                            </td>
                            <td class="text-center">
                                <a href="/event/{{ $event->id }}/edit" class="btn btn-sm btn-warning pd-2 mb-2"><i class="bi bi-pen me-1"></i> Edit</a>
                                <form action="/event/{{ $event->id }}" method="post" onSubmit="return confirm('Are you sure want to delete this {{ $event->title }}?'); return false;">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger pt-1"><i class="bi bi-trash me-1"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No data found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
        </div>
    </div>

</div>
@endsection