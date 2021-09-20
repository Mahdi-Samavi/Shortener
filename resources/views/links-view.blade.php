@extends('layouts.app')

@section('title', 'links view')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <span>{{ __('links') }}</span>
          @backward()@endbackward
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <td>{{ __('ID') }}</td>
                <td>{{ __('Link') }}</td>
                <td>{{ __('Shortened') }}</td>
                <td>{{ __('Created at') }}</td>
                <td>{{ __('Updated at') }}</td>
                <td>{{ __('Actions') }}</td>
              </tr>
            </thead>
            @foreach ($links as $link)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $link->link }}</td>
              <td>{{ url($link->shortened) }}</td>
              <td>{{ $link->created_at }}</td>
              <td>{{ $link->updated_at }}</td>
              <td>
                  <form action="{{ route('link.delete', $link->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">{{ __('Delete') }}</button>
                  </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection