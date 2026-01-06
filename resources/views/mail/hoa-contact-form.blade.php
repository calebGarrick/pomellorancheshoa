<x-mail::message>
# HOA Contact Form Submission

**Name:** {{ $data['name'] }}

**Email:** {{ $data['email'] }}

**Phone:** {{ $data['phone'] ?? 'Not provided' }}

**Address:** {{ $data['address'] ?? 'Not provided' }}

**Topic:** {{ $data['topic'] ?? 'Not specified' }}

**Message:**

{{ $data['message'] ?? 'No message' }}

**Preferred Response:** {{ $data['response_type'] }}

**Acknowledged TOS:** {{ $data['acknowledge_tos'] ? 'Yes' : 'No' }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
