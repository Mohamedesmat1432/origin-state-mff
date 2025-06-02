@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('images/social_housing_logo.jpeg')}}" class="logo" alt="Social Housing Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
