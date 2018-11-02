@component('mail::message')
# Hello {{$mail->nameContact}} !
Thanks for contacting us regarding {{$mail->subjectContact}}.

{{$mail->msgContact}}

We will contact you asap !


Thanks,<br>
{{ config('app.name') }}
@endcomponent
