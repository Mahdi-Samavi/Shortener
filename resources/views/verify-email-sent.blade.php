@extends('layouts.app')

@section('title', 'Verify email')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div calss="alert alert-success">{{ __('Verify email sent.') }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection