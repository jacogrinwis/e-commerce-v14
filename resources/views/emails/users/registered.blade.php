<x-mail::message>
    # Welkom bij {{ config('app.name') }}!

    Beste {{ $user->name }},

    Bedankt voor je registratie bij {{ config('app.name') }}. We zijn blij je als nieuwe klant te mogen verwelkomen.

    <x-mail::panel>
        Je kunt nu:
        - Je favoriete producten opslaan
        - Je bestellingen bekijken
        - Je gegevens beheren
        - Adressen toevoegen
    </x-mail::panel>

    <x-mail::button :url="route('account.dashboard')">
        Ga naar je account
    </x-mail::button>

    Met vriendelijke groet,<br>
    {{ config('app.name') }}
</x-mail::message>
