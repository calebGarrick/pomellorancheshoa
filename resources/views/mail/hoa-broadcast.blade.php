<x-mail::message>
@if(!empty($recipientName))
# Hello {{ $recipientName }},
@else
# Hello,
@endif

{{ $bodyText }}

Thank you,

{{ $senderName }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
