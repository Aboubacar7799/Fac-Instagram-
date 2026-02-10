 {{-- Liste des conversations --}}

<div class="col-md-4 col-lg-3 border-end">
    <div class="list-group list-group-flush">
        @forelse($users as $conversationUser)
            <a href="{{ route('app_conversations_show', $conversationUser->id) }}"
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center bg-light 
               {{ isset($user) && $user->id === $conversationUser->id ? 'active' : '' }}">

                <div class="d-flex align-items-center">
                    <img src="{{ $conversationUser->profil?->getImage() ?? 'https:://ui-avatars.com/api/?name=' . urlencode($conversationUser->name) }}"
                    class="rounded-circle border "
                    width="45" height="45">

                    <span class="fw-semibold text-dark p-1">{{ $conversationUser->name }}</span>
                </div>

                @if(isset($unread[$conversationUser->id]))
                    <span class="badge bg-warning text-dark rounded-pill">
                        {{ $unread[$conversationUser->id] }}
                    </span>
                @endif
            </a>
        @empty
            <div class="text-center text-muted p-3">
                Aucune conversation
            </div>
        @endforelse
    </div>
</div>