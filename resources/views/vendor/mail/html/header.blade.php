@php
    $langId = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->id;

    $info = App\Models\Information::where('language_id', $langId)->first();

@endphp
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (isset($info->siteLogo))
<img src="{{ asset(env('LOGO_IMAGES_PATH') . $info->siteLogo) }}" class="logo" alt="site Logo">

@else
{{ $info->siteName ?? '' }}
@endif
</a>
</td>
</tr>
