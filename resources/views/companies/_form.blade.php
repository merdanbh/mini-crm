<div class="form-group">
    <label for="nameInput">Name</label>
    <input
        type="text"
        class="form-control @error('name') is-invalid @enderror"
        id="nameInput"
        name="name"
        value="{{ old('name', $company->name) }}"
        required
    >
    @error('name')
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
        value="{{ old('email', $company->email) }}"
    >
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="logoInput">Logo</label>
    <input
        type="file"
        class="form-control @error('logo') is-invalid @enderror"
        id="logoInput"
        name="logo"
    >
    @error('logo')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="websiteInput">Website</label>
    <input
        type="text"
        class="form-control @error('website') is-invalid @enderror"
        id="websiteInput"
        name="website"
        value="{{ old('website', $company->website) }}"
    >
    @error('website')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
