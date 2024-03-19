<?php

namespace App\Livewire\Comment;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment as CommentModel;
use App\Http\Requests\StoreCommentRequest;

class Comment extends Component
{
    public $feedback_id, $comment='';

    public function mount($feedback_id)
    {
        $this->feedback_id = $feedback_id;
    }
    #[Title('Comments | Feedback Tool')]
    public function render()
    {
        $comments = CommentModel::where('feedback_id',$this->feedback_id)->latest()->paginate(5);
        return view('livewire.comment.comment',['comments' => $comments]);
    }

    public function rules()
    {
        return [
            'comment' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'Please Write Something...',
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();
        $this->createComment($validatedData);
    }


    protected function createComment($validatedData)
    {
        $validatedData['feedback_id'] = $this->feedback_id;
        $validatedData['user_id'] = Auth::user()->id;
        $savedData = CommentModel::create($validatedData);
        if($savedData)
        {
            session()->flash('alert', ['message' => 'Comment Saved Successfully','type' => 'success']);
            $this->redirectRoute('comments.index',['feedback_id'=>$this->feedback_id], navigate:true,);
        }
    }
}
