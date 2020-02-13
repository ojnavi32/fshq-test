@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit <strong>{{ $company->name }}</strong></div>
                </div>

                <div class="card-body">
                    <form action="{{ route('companies.update', ['company' => $company->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @include('company.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection