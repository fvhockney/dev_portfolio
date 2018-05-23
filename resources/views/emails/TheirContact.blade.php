@component('mail::message')
Thank you for taking the time to contact me. I always love hearing from new people. I take the time to read each email that I receive and will contact you as soon as possible if your email requires a response. Please find a copy of the information you sent below for your records.

Sincerely,


Fred Hockney

--------------------------------------------------------------------------

@component('mail::panel')
**From:** {{ $request->name }}

**Email:** {{ $request->email }}

**Message**

{{ $request->message }}
@endcomponent

@endcomponent
