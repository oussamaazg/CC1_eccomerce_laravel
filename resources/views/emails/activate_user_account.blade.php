<x-mail::message>
# Merci d'activer votre compte

pour activer votre compte.

<x-mail::button :url="$url">
Cliquez ici
</x-mail::button>

Thanks,<br> équipe 
{{ config('app.name') }}
</x-mail::message>
