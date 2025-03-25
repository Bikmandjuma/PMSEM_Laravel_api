@component('mail::message')
# We have received your request to register a new account.

Please use the following code to complete your registration:

@component('mail::panel')
    {{ $code }}
@endcomponent

The code is valid for one hour from the time this message was sent.

@endcomponent
