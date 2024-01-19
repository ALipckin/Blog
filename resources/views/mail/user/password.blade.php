<x-mail::message>
@component('mail::message')
    {{$password}}
    @endcomponent

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
