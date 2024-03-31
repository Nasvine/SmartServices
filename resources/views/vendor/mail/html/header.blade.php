@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')

@else
<img src="http://anycourse.bj/logo_smart_service.jpg" class="logo" alt="Laravel Logo">
{{-- {{ $slot }} --}}
@endif
</a>
</td>
</tr>
