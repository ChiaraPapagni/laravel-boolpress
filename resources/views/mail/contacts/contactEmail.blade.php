@component('mail::message')
# Introduction

Subject: {{$contact->subject}}<br>

{{$contact->message}}

@component('mail::panel')
Name: {{$contact->name}}
Email: {{$contact->email}}
@endcomponent

@component('mail::button', ['url' => $url])
Go to Boolpress
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent