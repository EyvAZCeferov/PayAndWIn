<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class CommentSystem extends Component
{

    public $comments = null,$active=true,$formFields = [
        'top_comment_id' => 0,
        'name' => null,
        'email' => null,
        'description' => null,
    ],
    $postid=null,
    $table=null,
    $replyData=[
        'top_id',
        'name',
        'message',
        'userId'=>null,
       'active'=>false
    ];

    public function mount($id,$table){
        $this->postid=$id;
        $this->table=$table;
        $this->comments = Comments::where('table', $table)->orderBy('created_at','DESC')->where('post_id',$id)->with('get_top_comment')->get();
    }

    public function reply($id){
        $comment=Comments::where('table', 'customers')->where('id',$id)->with('get_top_comment')->first();
        $mess=json_decode($comment->message);
        $userId=null;
        if(property_exists($mess,'userId')){
            $userId=$mess->userId;
        }
        $this->replyData=[
            'top_id'=>$id,
            'name'=>$mess->name,
            'message'=>$mess->description,
            'userId'=>null,
            'active'=>true
        ];
        $this->formFields=[
            'top_comment_id' => $id,
            'name' => null,
            'email' => null,
            'description' => null,
        ];
    }

    public function updated()
    {
        $this->active=true;
        $this->validate([
            'formFields.name' => 'required|max:300',
            'formFields.email' => 'required|max:300|email',
            'formFields.description' => 'required|max:1000',
        ],[
            'formFields.name.required'=>\Lang::get('static.form.validation.required'),
            'formFields.email.required'=>\Lang::get('static.form.validation.required'),
            'formFields.description.required'=>\Lang::get('static.form.validation.required'),
            'formFields.name.max'=>\Lang::get('static.form.validation.length',['len'=>300]),
            'formFields.email.email'=>\Lang::get('static.form.validation.email'),
            'formFields.email.max'=>\Lang::get('static.form.validation.length',['len'=>300]),
            'formFields.description.max'=>\Lang::get('static.form.validation.length',['len'=>1000]),
        ]);
    }

    public function sendComment()
    {
        $userId=null;
        if(Auth::check()){
            $userId=Auth::user()->uid;
        }
        try{
            $message = [
                'name' => $this->formFields['name'],
                'email' => $this->formFields['email'],
                'description' => $this->formFields['description'],
                'userId'=>$userId
            ];
            Comments::insert([
                'top_comment_id' => $this->formFields['top_comment_id'],
                'table' => 'customers',
                'message' => json_encode($message),
                'post_id' => $this->postid
            ]);
            session()->flash('message', \Lang::get('static.form.validation.commentsSended'));
            $this->formFields = [
                'top_comment_id' => 0,
                'name' => null,
                'email' => null,
                'description' => null,
            ];
            $this->replyData=['top_id','name','message','active'=>false];
        }catch(\Exception $e){
            session()->flash('message', \Lang::get('static.form.validation.commentsNotSended',['err'=>$e]));
        }
        $this->mount($this->postid,$this->table);
    }

    public function render()
    {
        return view('livewire.comment-system');
    }
}
