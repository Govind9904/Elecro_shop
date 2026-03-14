@extends('admin.layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Slider</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/sliders">Sliders</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="/admin/sliders/store" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="slider-title">Title</label>
                    <input type="text" name="title" id="slider-title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="slider-subtitle">Subtitle</label>
                    <input type="text" name="subtitle" id="slider-subtitle" class="form-control" value="{{ old('subtitle') }}">
                </div>

                <div class="form-group">
                    <label for="slider-button-link">Button Link</label>
                    <input type="text" name="button_link" id="slider-button-link" class="form-control" value="{{ old('button_link') }}">
                </div>

                <div class="form-group">
                    <label for="slider-image">Image</label>
                    <input type="file" name="image" id="slider-image" class="form-control-file" required>
                </div>

                <div class="form-group">
                    <label for="slider-status">Status</label>
                    <select name="status" id="slider-status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/admin/sliders" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
