@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Contact Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="/admin/settings">
                @csrf
                <div class="form-group">
                    <label for="setting-address">Address</label>
                    <textarea name="address" id="setting-address" class="form-control" rows="3">{{ old('address', $setting->address ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="setting-phone">Phone</label>
                    <input type="text" name="phone" id="setting-phone" class="form-control" value="{{ old('phone', $setting->phone ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="setting-email">Email</label>
                    <input type="text" name="email" id="setting-email" class="form-control" value="{{ old('email', $setting->email ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="setting-map">Google Map Embed</label>
                    <textarea name="map" id="setting-map" class="form-control" rows="4">{{ old('map', $setting->map ?? '') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
