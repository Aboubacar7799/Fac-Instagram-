<div class="card-body overflow-auto" style="height: 60vh">
    @foreach (array_reverse($messages->items()) as $message)
        <div class="d-flex mb-3 {{ $message->from_id === auth()->id() ? 'justify-content-end' : '' }}">

            @if (auth()->id() !== $message->from_id)
                <img src="{{ $message->from->profil?->getImage() ?? 'https:://ui-avatars.com/api/?name=' . urlencode($message->name) }}"
                    class="rounded-circle" width="30" height="30">
            @endif
            <div class="p-2 rounded-5
                {{ $message->from_id === auth()->id() ? 'bg-secondary text-white' : 'bg-light' }} mx-2 "
                style="max-width: 75%">

                {{-- <small class="fw-bold">
                    {{ $message->from_id === auth()->id() ? 'Moi' : '' }}
                </small> --}}

                <div>{{ $message->content }}</div>

            </div>
            @if ($message->from_id === auth()->id())
                <div class="text-bottom">
                    <small class="text-muted d-block text-end">
                        {{ $message->created_at->format('H:i') }}
                    </small>
                    <small class="{{ $message->isRead() ? 'text-primary' : 'text-warning' }}">
                        {{ $message->isRead() ? 'vu' : 'Envoyé' }}
                    </small>

                </div>
            @endif

        </div>
    @endforeach
</div>
