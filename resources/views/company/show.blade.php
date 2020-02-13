@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><strong>{{ $company->name }}</strong> Details</div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Company Name</label>
                        <p>{{ $company->name }}</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <p>{{ $company->email }}</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Logo</label>
                        <img src="/storage{{ $company->logo }}" class="img-responsive">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Website</label>
                        <p>{{ $company->website }}</p>
                    </div>

                    <div class="form-group">
                        <a href="{{ route('companies.edit', ['company' => $company->id]) }}" class="btn btn-warning">Edit Company</a>
                        <button class="btn btn-danger btn-delete" data-id="{{ $company->id }}">Delete Company</button>
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
                url: '/admin/companies/'+id,
                type: 'DELETE',
                data: {
                    id: id,
                    _token: token
                },
                success: function () {
                    window.location.href = '/admin/companies'
                }
            })
        }
    })
})
</script>
@endpush