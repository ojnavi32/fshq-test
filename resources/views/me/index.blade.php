@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">Welcome back {{ Auth::user()->firstname }}</div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Co-employees</div>
                </div>
                <div class="card-body">
                    <table id="co-employee-table" class="table table-striped">
                        <thead>
                            <th>FIRSTNAME</th>
                            <th>LASTNAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
@endsection

@push('scripts')
<script>
$(function () {
    var token = $("meta[name='csrf-token']").attr("content")
    var table = $('#co-employee-table').dataTable({
        'processing': true,
        'serverSide': true,
        'ajax': '/me/co-workers',
        'columns': [
            { data: 'firstname' },
            { data: 'lastname' },
            { data: 'email' },
            { data: 'phone' }
        ]
    })
});
</script>
@endpush