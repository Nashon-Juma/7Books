@extends('layouts.dashboard')

@section('title', "Dashboard - Libraries")

@section('content')
<x-dashboard-side-bar selected="library" class="bg-primary"></x-dashboard-side-bar>

<div id="dashboardLeftFrame" class="flex-fill mw-100 d-flex flex-column">
  <x-dashboard-navigation></x-dashboard-navigation>

  <div class="container flex-fill d-flex flex-column">
    <div class="row flex-fill mt-auto">
      <div class="col-12 col-md-6 d-md-flex align-items-center justify-content-center mb-3 mb-md-0 mt-3 mt-md-0 d-none">
        <img src="{{ Vite::asset('resources/images/add-files.svg') }}" alt="Image not available..." class="img-fluid w-75 ratio-box">
      </div>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="container">
          <form method="POST" action="{{ route('libraries.store') }}" enctype="multipart/form-data" class="shadow p-3 rounded">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input class="form-control" id="name" type="text" name="name" required autofocus>

              @error('name')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
              <label for="region_id" class="form-label">Region</label>

              <select name="region_id" id="region_id" class="form-control">
                <option selected disabled>Please select a region</option>

                @foreach ($regions as $region)
                  <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-4">
              <label for="desc" class="form-label">Description</label>
              <textarea class="form-control" id="desc" name="desc">{{ old('desc') }}</textarea>

              @error('desc')
                <span>{{ $message }}</span>
              @enderror
            </div>

            <div class="d-flex align-items-md-center flex-column flex-md-row gap-1">
              <div class="d-flex gap-1">
                <a href="{{ route('libraries.index') }}" class="btn btn-danger flex-fill">Cancel</a>
                <button type="submit" class="btn btn-primary flex-fill">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection