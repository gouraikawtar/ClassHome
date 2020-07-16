@component('mail::message')
# Hello from ClassHome 

{{ $details['senderName'] }} < {{ $details['senderEmail'] }} >
invited you to co-teach : "{{ App\TeachingClass::find($details['class_id'])->name }}".

# How to get started 

1- Sign up <a href="//localhost:8000/register">ClassHome:Register</a><br>
2- Copy this code: <b> {{ App\TeachingClass::find($details['class_id'])->code }}</b><br>
3- Go to "Co-teach class" and paste it there <br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
