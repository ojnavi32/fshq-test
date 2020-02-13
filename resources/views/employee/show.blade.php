@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><strong>{{ $employee->user->firstname }} {{ $employee->user->lastname }}</strong> Details</div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Company</label>
                        <p>{{ $employee->company->name }}</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <p>{{ $employee->user->firstname }} {{ $employee->user->lastname }}</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <p>{{ $employee->user->email }}</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <p>{{ $employee->phone }}</p>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-warning">Edit Employee</a>
                        <button class="btn btn-danger btn-delete" data-id="{{ $employee->id }}">Delete Employee</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('.btn-delete').click(function () {
        let c = confirm('Are you sure you want to delete this?')

        if (c) {
            let id = $(this).data('id'),
                token = $("meta[name='csrf-token']").attr("content")
            
            $.ajax({
                url: '/admin/employees/'+id,
                type: 'DELETE',
                data: {
                    id: id,
                    _token: token
                },
                success: function () {
                    window.location.href = '/admin/employees'
                }
            })
        }
    })
})
</script>
@endpush