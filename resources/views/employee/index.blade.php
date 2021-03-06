@extends('layouts.adminlte')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Employee List</h5>
                    <h5 class="text-right">
                        <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm">Add New Employee</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="col-12">
                    <table id="employee-table" class="table table-striped">
                        <thead>
                            <th>COMPANY</th>
                            <th>FIRSTNAME</th>
                            <th>LASTNAME</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>ACTION</th>
                        </thead>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
@endsection

@push('scripts')
<script>
$(function () {
    var table = $('#employee-table').dataTable({
        'processing': true,
        'serverSide': true,
        'ajax': '/api/v1/employees/list',
        'dom': 'Bfrtip',
        'buttons': [
            'csv', 'excel'
        ],
        'columns': [
            { data: 'company_name' },
            { data: 'firstname' },
            { data: 'lastname' },
            { data: 'email' },
            { data: 'phone' },
            { mRender: function (data, type, row) {
                const id = row['id']
                const viewUrl = '/admin/employees/'+id
                const editUrl = '/admin/employees/'+id+'/edit'

                let actions = '<a href="'+viewUrl+'" title="View" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>'
                    actions += '<a href="'+editUrl+'" title="Edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>'
                    actions += '<button title="Delete" data-id="'+id+'" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></button>'
                
                return actions
            } }
        ]
    })

    setTimeout(() => {
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
                        // table.ajax.reload() - not working
                        window.location.reload()
                    }
                })
            }
        })
    }, 3000);
})
</script>
@endpush