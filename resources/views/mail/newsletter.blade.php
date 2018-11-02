@component('mail::message')
# Thank you for your subscription at our newsletter!

This is an email adress verification. If yours is indeed {{$mail->newsMail}}, please click the button.


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
