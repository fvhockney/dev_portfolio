@component('mail::message')
Someone has contacted you on your portfolio website!

The message that they sent is displayed below. Don't forget to follow up!

--------------------------------------------------------------------------

@component('mail::panel')
**From:** {{ $request->name }}

**Email:** {{ $request->email }}

**Message**

{{ $request->message }}
@endcomponent

@endcomponent
