<div class="form-group">
    <label for="firstNameInput">First Name</label>
    <input
        type="text"
        class="form-control @error('first_name') is-invalid @enderror"
        id="firstNameInput"
        name="first_name"
        value="{{ old('first_name', $employee->first_name) }}"
        required
    >
    @error('first_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="lastNameInput">Last Name</label>
    <input
        type="text"
        class="form-control @error('last_name') is-invalid @enderror"
        id="lastNameInput"
        name="last_name"
        value="{{ old('last_name', $employee->last_name) }}"
        required
    >
    @error('last_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="companyInput">Company</label>
    <select
        class="form-control @error('company_id') is-invalid @enderror"
        id="companyInput"
        name="company_id"
        required
    >
        <option value="">--- company ---</option>
        @foreach($companies as $company)
            <option
                value="{{ $company->id }}"
                {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}
            >
                {{ $company->name }}
            </option>
        @endforeach
    </select>
    @error('company_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="emailInput">Email</label>
    <input
        type="email"
        class="form-control @error('email') is-invalid @enderror"
        id="emailInput"
        name="email"
        value="{{ old('email', $employee->email) }}"
    >
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="phoneInput">Phone</label>
    <input
        type="text"
        class="form-control @error('phone') is-invalid @enderror"
        id="phoneInput"
        name="phone"
        value="{{ old('phone', $employee->phone) }}"
    >
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
