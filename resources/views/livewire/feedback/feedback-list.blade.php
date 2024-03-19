<div>
    <div>
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @if(auth()->user())
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Submit Feedback
                    </button>
                    @else
                    <a href="{{ route('login') }}"><button type="button" class="btn btn-primary btn-lg">
                        Submit Feedback
                    </button></a>
                    @endif
                    {{-- Feedback Modal --}}
                    @livewire('feedback.feedback-modal')

                    <div class="mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center">Feedback List</h2>
                                <h3 class="text-danger text-end">{{ $feedbacks->total() }}</h3>
                            </div>
                            <div class="card-body">
                                @forelse ($feedbacks as $feedback)
                                    <div class="card mb-3">
                                        <div class="card-header d-flex justify-content-between">
                                            <h5 class="text-muted">{{ $loop->iteration }}. {{ $feedback->title }}</h5>
                                            <div class="d-flex">
                                                <p class="card-text me-3"><span>@</span>{{ $feedback->user->name }}</p>
                                                <p class="card-text">{{ ucfirst(str_replace('-', ' ', $feedback->category)) }}</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ $feedback->description }}</p>
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <a href="{{ route('comments.index',$feedback->id) }}" wire:navigate class="btn btn-primary">
                                                    <img src="https://api.iconify.design/memory:comment-text.svg?color=%23fafaff" alt="" class="me-2"> Comments
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center">No Record Found</p>
                                @endforelse
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                {{ $feedbacks->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
