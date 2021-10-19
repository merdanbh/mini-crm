@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-content-center">
                        {{ __('Companies') }}
                        <a href="{{ route('companies.create') }}" class="btn btn-sm btn-primary">New</a>
                    </div>

                    <div class="card-body p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-sm table-striped mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($companies as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        @if($company->logo)
                                            <img
                                                width="70"
                                                src="{{ asset('storage/' . $company->logo) }}"
                                                alt="company logo"
                                            >
                                        @endif
                                    </td>
                                    <td>{{ $company->website }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a
                                            href="{{ route('companies.edit', $company) }}"
                                            class="btn btn-sm btn-warning"
                                        >
                                            Edit
                                        </a>
                                        <form action="{{ route('companies.destroy', $company) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="container-fluid mt-3">
                            <div class="row justify-content-end">
                                {{ $companies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
