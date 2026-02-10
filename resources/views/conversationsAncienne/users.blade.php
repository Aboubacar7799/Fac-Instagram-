<div class="col-md-3">
    <div class="list-group">
        @foreach ($users as $user)
            <a class="list-group-item d-flex justify-content-between align-items-center"
                href="{{ route('app_conversations_show', $user->id) }}">
                {{ $user->name }}

                @if (isset($unread[$user->id]))
                    <span class="badge badge-pill badge-warning">
                        {{ $unread[$user->id] }}
                    </span>
                @endif
            </a>
        @endforeach
    </div>
</div>
