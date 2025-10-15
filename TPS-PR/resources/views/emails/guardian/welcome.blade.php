@component('mail::message')
# Welcome, {{ $guardian->first_name }}!

Your guardian account has been created successfully.

Here are your login details:

- **Email:** {{ $guardian->email }}
- **Password:** {{ $plainPassword }}

@component('mail::button', ['url' => url('/guardian/login')])
Login Now
@endcomponent

Thanks,  
{{ config('app.name') }}
@endcomponent