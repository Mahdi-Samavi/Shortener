@if (url()->previous() !== url()->current())
  <a href="{{ url()->previous() }}" title="{{ __('Back') }}">{{ __('Back') }}</a>
@endif