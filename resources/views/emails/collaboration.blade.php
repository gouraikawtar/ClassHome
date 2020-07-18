@component('mail::message')
# Hello 

{{ $details['senderName'] }} < {{ $details['senderEmail'] }} >
invited you to co-teach : "{{ App\TeachingClass::find($details['class_id'])->name }}",
here is the unique code to join it: 

@component('mail::button', ['url' => '' ] )
<b> {{ App\TeachingClass::find($details['class_id'])->code }} </b>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
