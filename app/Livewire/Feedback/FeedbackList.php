<?php

namespace App\Livewire\Feedback;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Masmerise\Toaster\Toaster;
use Livewire\Attributes\Validate;
use App\Http\Requests\ToDoRequest;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Masmerise\Toaster\Toastable;

class FeedbackList extends Component
{
    use WithPagination;

    #[Title('Home | Feedback Tool')]

    public function render()
    {
        $feedbacks = Feedback::latest()->paginate(5);
        return view('livewire.feedback.feedback-list',['feedbacks' => $feedbacks]);
    }
}
