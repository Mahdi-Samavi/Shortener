@extends('layouts.app')

@section('title', 'Create a link')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>{{ __('Create') }}</span>
                    @backward()@endbackward
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @can('create', App\Link::class)
                    <form action="{{ route('link.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="link" class="form-label">{{ __('Link') }}</label>
                            <input name="link" type="url" id="link" class="form-control" placeholder="https://example.com/page/direction" />
                        </div>
                        <button class="btn btn-primary">{{ __('Send') }}</button>
                    </form>
                    @else
                    <div class="alert alert-danger">{{ __('You must confirm your email before creating a link.') }}</div>
                    <a href="{{ route('verify') }}" title="{{ __('Verify an email') }}" class="btn btn-primary">{{ __('Verify an email') }}</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection