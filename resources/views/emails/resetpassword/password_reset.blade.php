@component('mail::message')
    # Introduction

    The body of your message.

    @component('mail::button', ['url' => route('TokenVerification.show', $data)])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
