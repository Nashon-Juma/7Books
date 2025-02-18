@extends('layouts.app')

@section('title', 'Dashboard - Authors')

@section('main')
  <x-dashboard-layout active="author">
    <div class="d-flex flex-column rounded border shadow-sm">
      <div class="d-flex align-items-center justify-content-between flex-column flex-lg-row gap-2 border-b border-body-tertiary px-3 py-4">
        <a class="btn btn-success w-100 w-lg-fit" href="{{ route('authors.create') }}">Add a new author</a>

        <x-query-accordion>
          <form action="{{ route('authors.index') }}" method="get"
            class="d-flex flex-column flex-lg-row gap-lg-1 py-lg-0 gap-2 py-3">
            <input name="search" class="form-control" type="search" placeholder="Search"
              value="{{ request()->query('search', '') }}" aria-label="Search">

            <select name="o" class="form-select">
              <option selected disabled>Order by</option>

              @if (request()->query('o') === 'oldest')
                <option selected value="oldest">Oldest</option>
              @else
                <option value="oldest">Oldest</option>
              @endif

              @if (request()->query('o') === 'latest')
                <option selected value="latest">Latest</option>
              @else
                <option value="latest">Latest</option>
              @endif
            </select>

            <button class="btn btn-outline-primary" type="submit">Apply</button>
          </form>
        </x-query-accordion>
      </div>

      <div class="table-responsive px-3">
        <table class="table-striped table-bordered table-hover table">
          <thead>
            <th scope="col" width="5%">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col" width="15%">Phone</th>
            <th scope="col" width="15%">Actions</th>
          </thead>

          <tbody>
            @foreach ($authors as $i => $author)
              <tr>
                <td>{{ ($authors->currentPage() - 1) * $authors->perPage() + $i+1 }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->address }}</td>
                <td>{{ $author->phone }}</td>

                <td class="d-flex gap-1">
                  <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info">
                    Show
                  </a>

                  <button type="button" class="btn btn-danger" hx-confirm="author"
                    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                    hx-delete="{{ route('authors.destroy', $author->id) }}" hx-target="closest tr"
                    hx-swap="outerHTML"
                    delete-confirmation>Delete
                  </button>

                  <a class="btn btn-warning" href="{{ route('authors.edit', $author->id) }}">Edit
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="d-flex align-items-center justify-content-between px-3 pt-2 pb-3">
        <x-paginate-links :links="$authors" :useHtmx=false></x-paginate-links>

        <x-paginate-counter :items="$authors"></x-paginate-counter>
      </div>
    </div>
  </x-dashboard-layout>
@endsection
