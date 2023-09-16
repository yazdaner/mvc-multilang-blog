@php
    $lang = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first();
    $langId = $lang->id;

    $info = App\Models\Information::where('language_id', $langId)->first();

@endphp
@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
{{$info->copyright ?? ''}}
@endcomponent
@endslot
@endcomponent
