<div class="form-group">
    <label class="form-label">Company Name</label>
    <input 
        type="text" 
        name="name" 
        class="form-control"
        value="{{ isset($company) ? $company->name : '' }}"
    >
</div>

<div class="form-group">
    <label class="form-label">Email</label>
    <input 
        type="text" 
        name="email" 
        class="form-control"
        value="{{ isset($company) ? $company->email : '' }}"
    >
</div>

<div class="form-group">
    <label class="form-label">Logo</label>
    <input type="file" name="logo" class="form-control-file" value="{{ isset($company) ? $company->logo : '' }}">
    @if (isset($company))
        <img src="/storage/{{ $company->logo }}" class="img-reponsive">
    @endif
</div>

<div class="form-group">
    <label class="form-label">Website</label>
    <input 
        type="text" 
        name="website" 
        class="form-control"
        value="{{ isset($company) ? $company->website : '' }}"
    >
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Submit</button>
</div>