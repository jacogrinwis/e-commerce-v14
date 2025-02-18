<x-mail::message>
    # Nieuwe gebruiker geregistreerd

    Er heeft zich een nieuwe gebruiker geregistreerd:

    <x-mail::panel>
        **Naam:** {{ $user->name }}
        **Email:** {{ $user->email }}
        **Geregistreerd op:** {{ $user->created_at->format('d-m-Y H:i') }}
    </x-mail::panel>

    <x-mail::table>
        | Gegevens | Waarde |
        | -------------- | ----------------------------------------- |
        | Naam | {{ $user->name }} |
        | Email | {{ $user->email }} |
        | Rol | {{ $user->role }} |
        | Registratie | {{ $user->created_at->format('d-m-Y') }} |
    </x-mail::table>

    {{-- <x-mail::button :url="route('admin.users.show', $user)">
        Bekijk gebruiker
    </x-mail::button> --}}

    Met vriendelijke groet,<br>
    {{ config('app.name') }}
</x-mail::message>
