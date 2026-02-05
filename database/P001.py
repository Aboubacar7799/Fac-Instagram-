{{-- COMMENTS --}}
<div class="card-body pt-2">

    {{-- LISTE DES COMMENTAIRES --}}
    <div id="comments-lists-{{ $post->id }}" class="mb-3">

        @foreach ($post->comments as $comment)
            <div class="mb-2 d-flex">
                <img src="{{ $comment->user->profil->getImage() }}"
                     class="rounded-circle me-2"
                     width="35" height="35">

                <div>
                    <div class="bg-light rounded px-3 py-2">
                        <strong>{{ $comment->user->name }}</strong><br>
                        {{ $comment->content }}
                    </div>
                    <small class="text-muted">
                        Il y’a {{ $comment->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        @endforeach

    </div>

    {{-- FORMULAIRE --}}
    <form class="comment-form border-top pt-3"
          data-post-id="{{ $post->id }}"
          action="{{ route('comments.store', $post->id) }}"
          method="POST">
        @csrf

        <div class="d-flex align-items-center">
            <img src="{{ auth()->user()->profil->getImage() }}"
                 class="rounded-circle me-2"
                 width="35" height="35">

            <input type="text"
                   name="content"
                   class="form-control rounded-pill"
                   placeholder="Écrire un commentaire…">
        </div>
    </form>

</div>






.reaction-wrapper {
    position: relative;
    display: inline-block;
}

.reaction-options {
    position: absolute;
    bottom: 40px;
    left: 0;
    background: white;
    padding: 6px 10px;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,.2);
    display: none;
    z-index: 10;
}

.reaction-options span {
    font-size: 22px;
    cursor: pointer;
    margin: 0 5px;
    transition: transform .2s;
}

.reaction-options span:hover {
    transform: scale(1.3);
}

.reaction-wrapper:hover .reaction-options {
    display: flex;
}







<div class="px-3 py-2 text-muted small d-flex justify-content-between">

    <div id="counts-{{ $post->id }}">
        👍 {{ $post->likes->where('type', 'like')->count() }}
        ❤️ {{ $post->likes->where('type', 'love')->count() }}
        😢 {{ $post->likes->where('type', 'sad')->count() }}
        😡 {{ $post->likes->where('type', 'angry')->count() }}
        😮 {{ $post->likes->where('type', 'wow')->count() }}
    </div>

    <div>
        {{ $post->comments->count() }} commentaires
    </div>

</div>





<div class="d-flex justify-content-between px-3 py-2 border-top">

    {{-- LIKE --}}
    <div class="reaction-wrapper" data-post="{{ $post->id }}">
        <button type="button" class="btn btn-light btn-sm">
            👍 J’aime
        </button>

        <div class="reaction-options">
            @foreach (['like'=>'👍','love'=>'❤️','sad'=>'😢','angry'=>'😡','wow'=>'😮'] as $type=>$emoji)
                <span onclick="sendReaction('{{ $type }}', {{ $post->id }})">
                    {{ $emoji }}
                </span>
            @endforeach
        </div>
    </div>

    {{-- COMMENTER --}}
    <button class="btn btn-light btn-sm"
            onclick="document.querySelector('#comments-lists-{{ $post->id }}').scrollIntoView({behavior:'smooth'})">
        💬 Commenter
    </button>

</div>