<div wire:poll style="padding:2px;">
    @forelse ($notifications as $notification)
        @if ($notification->type_de_notification == "Livraison")
            <li style="background-color: white;">
                <p>
                <a href="{{ route('messages.client.write_livraison', $notification->id) }}">{{ $notification->message }}</a>
                </p>
            </li>
        @endif
    @empty
        <li style="background-color: white;">
            <p>
            <a href="#" style=" color:black;">Pas de notification</a>
            </p>
        </li>
    @endforelse
</div>
