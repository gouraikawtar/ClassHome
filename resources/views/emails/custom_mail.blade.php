@component('mail::message')
# Hello from ClassHome

You got an e-mail from :  <br>
{{ $details['senderName'] }} < {{ $details['senderEmail'] }} >

<pre> {{ $details['body'] }} </pre>

Yours,<br>
{{ config('app.name') }}
@endcomponent
