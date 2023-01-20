@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Cabinets</li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="col-6">
        <a href="/cabinet/create" class="btn btn-sm btn-primary float-end"><i class="bi bi-plus"></i> Add Cabinet</a>
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
                    <th class="text-center">Name</th>
                    <th class="text-center">President</th>
                    <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cabinets as $cabinet)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $cabinet->name }}</td>
                            <td class="text-center">{{ $cabinet->president->name }}</td>
                            <td class="text-center">
                                <a href="/cabinet/{{ $cabinet->id }}/edit" class="btn btn-sm btn-warning pd-2 mb-2"><i class="bi bi-pen me-1"></i> Edit</a>
                                <form action="/cabinet/{{ $cabinet->id }}" method="post" onSubmit="return alert('Are you sure want to delete this {{ $cabinet->name }}?'); return false;">
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