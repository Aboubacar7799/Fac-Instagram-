<div class="card-footer">
    <form action="{{ route('app_conversations_store', $user->id) }}" method="POST">
        @csrf
        <div class="input-group" >
            <textarea name="content"
                      class="form-control rounded-3 {{ $errors->has('content') ? 'is-invalid' : '' }} "
                      placeholder="Écris ton message..."></textarea>

                      <button class="btn btn-success">Envoyer</button>
                    </div>


        @error('content')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </form>
</div>