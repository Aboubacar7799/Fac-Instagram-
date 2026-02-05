<div class="container mt-5">
        @foreach ($posts as $post)

            {{-- Image et Date de Postulation --}}
            <div class="row">
                <div class="col-6 offset-3 mb-3">
                    <div>
                        Posté par <strong>{{ $post->user->name }}</strong> 
                        <small>Il y'a {{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6 offset-3 mb-5">
                    <div class="mb-2">
                        <strong>{{ $post->description }}</strong>
                    </div>
                    
                    <hr>
                    <a href="{{ route('app_affiche_image',['post' => $post->id]) }}">
                        <img src="{{ asset('storage').'/'.$post->image }}" alt="" class="w-100 h-100">
                    </a>
                    <br>
                </div>
            </div>
            
            {{-- Le bouton j'aime --}}
            <div class="row">
                <div class="col-6 offset-3 mt-3">
                    <div class="d-flex align-items">
                        
                        <form action="{{ route('app_post_like') }}" id="form-js">
                            <div id="count-js">{{ $post->likes->count() }} Like(s)</div>
                            <input type="hidden" id="post-id-js" value="{{ $post->id }}">
                            <button type="submit" class="btn btn-link btn-sm"> J'aime</button>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="comments-section mt-3">
                <h5>Commentaires</h5>
                
                <div id="comments-lists-{{ $post->id }}" class="mb-3">
                    @foreach($post->comments as $comment)
                        <small>Il y'a {{ $comment->created_at->diffForHumans() }}</small>
                        <p><strong>{{ $comment->user->name  }}</strong> : {{ $comment->content }}</p>

                        @endforeach
                        @if(auth()->id() === $comment->user_id)
                            <button class="btn btn-sm btn-danger"> Supprimer
                        @endif
                </div>

                <form action="{{ route('comments.store', $post->id) }}" method="POST" data-post-id="{{ $post->id }}" class="comment-form">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="content" class="form-control" placeholder="Ajouter un commentaire...">
                        <button class="btn btn-outline-primary" type="submit">Publier</button>
                    </div>
                </form>
            </div>

        @endforeach

    </div>