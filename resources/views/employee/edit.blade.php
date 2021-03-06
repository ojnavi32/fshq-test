@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit <strong>{{ $employee->user->firstname }} {{ $employee->user->lastname }}</strong></div>
                </div>

                <div class="card-body">
                    <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @include('employee.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection