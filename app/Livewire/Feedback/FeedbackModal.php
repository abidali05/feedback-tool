<?php

namespace App\Livewire\Feedback;

use App\Models\Post;
use Livewire\Component;
use App\Models\Feedback;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
// use Masmerise\Toaster\Toastable;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class FeedbackModal extends Component
{
    use WithPagination;
    public $title = '',$description='', $category='';

    // #[Validate('sometimes')]
    // public $todos = [];
    
    public function rules()
    {
        return [
            'title' =>'required',
            'category' =>'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please Enter a Suitable Title',
            'category.required' => 'Please Select a Category',
            'description.required' => 'Please Write Some Description',
        ];
    }
    
    
    public function render()
    {
        return view('livewire.feedback.feedback-modal');
    }

    public function save()
    {
        $validatedData = $this->validate();
        $this->create($validatedData);
    }
    
    protected function create($validatedData)
    {
        $validatedData['user_id'] = Auth::user()->id;
        $savedData = Feedback::create($validatedData);
        if($savedData)
        {
            session()->flash('alert', ['message' => 'Feedback Saved Successfully','type' => 'success']);
            $this->redirectRoute('posts.create', navigate:true,);
        }
    }

    
}
