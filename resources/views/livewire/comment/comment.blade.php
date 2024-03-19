<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form wire:submit.prevent='save' method="post" class="mb-4">
                @csrf
                <div class="mb-3">
                    <label for="comment" class="form-label">Add Comment:</label>
                        <div wire:ignore>
                            <textarea id="comment" wire:model.lazy="comment"></textarea>
                        </div>

                    @error('comment')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                @if (auth()->user())
                <button type="submit" class="btn btn-primary">Submit Comment</button>
                @else
                <a href="{{ route('login') }}"><button type="button" class="btn btn-primary">
                    Submit Comment
                </button></a>
                @endif
            </form>

            @forelse ($comments as $comment)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <h5 class="text-muted">{{ $loop->iteration }}. </h5>
                            <h5 class="card-title"><span>@</span> {{ $comment->user->name }}</h5>
                        </div>
                        <div class="text-right">
                            <p class="text-muted">{{ $comment->created_at->format('M d, Y h:i A') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">{!! $comment->comment !!}</p>
                </div>
            </div>
            @empty
                <p class="text-center">No Record Found</p>
            @endforelse
            {{ $comments->links('pagination::bootstrap-5') }}
        </div>
    </div>
    @script
        <script>
            ClassicEditor
                .create(document.querySelector('#comment'), {
                    toolbar: ['undo', 'redo', 'bold', 'italic', 'numberedList', 'bulletedList' ]
                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                    @this.set('comment', editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endscript
</div>
