<div class="form-group">
    <label class="form-label">Company</label>
    <select name="company_id" class="form-control">
        @foreach ($companies as $company)
            <option 
                value="{{ $company->id }}"
                {{ ( ( isset($employee) ) && ($employee->company->id === $company->id) ) ? 'selected' : '' }}
            >{{ $company->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label class="form-label">Firstname</label>
    <input type="text" class="form-control" name="firstname" value="{{ isset($employee) ? $employee->user->firstname : '' }}">
</div>

<div class="form-group">
    <label class="form-label">Lastname</label>
    <input type="text" class="form-control" name="lastname" value="{{ isset($employee) ? $employee->user->lastname : '' }}">
</div>

<div class="form-group">
    <label class="form-label">Email</label>
    <input type="text" class="form-control" name="email" value="{{ isset($employee) ? $employee->user->email : '' }}">
</div>

<div class="form-group">
    <label class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" value="{{ isset($employee) ? $employee->phone : '' }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success">Submit</button>
</div>