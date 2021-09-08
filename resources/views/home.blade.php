@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex">
                        <a href="{{ route('link.create') }}" class="btn btn-primary flex-fill m-1">{{ __('Create link') }}</a>
                        <a href="{{ route('link.views') }}" class="btn btn-secondary flex-fill m-1">{{ __('View links') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
