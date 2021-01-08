<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ratings;
use Illuminate\Support\Facades\Auth;

class RatingSystem extends Component
{
    public
    $rating=null,
    $ratingFields = ["r-1"=>null,"r-2"=>null,"r-3"=>null,"r-4"=>null,"r-5"=>null],
    $postid=null;

    public function mount($table,$postid){
        $this->postid=$postid;
        $allRatings = Ratings::where('tablename',$table)->where('ratingable_id',$postid)->get();
        $this->getRating($allRatings);
    }

    public function getRating($allRatings){
        $ratingnumb=0;
        foreach($allRatings as $rating){
            $ratingnumb += intval($rating->rating);
        }
        $this->rating=$ratingnumb;
    }

    public function updated(){
        try{
            for ($i=1;$i<6;$i++){
                if($this->ratingFields['r-'.$i]=='on'){
                    Ratings::create([
                        'rating'=>$i,
                        'ratingable_id'=>$this->postid,
                        'author_type'=>'user',
                        'author_id'=>Auth::user()->id,
                        'tablename'=>'customers',
                    ]);
                }
            }
            session()->flash('ratingInfo', \Lang::get('static.form.validation.ratingSended'));
        }catch(\Exception $e){
            session()->flash('ratingInfo', \Lang::get('static.form.validation.ratingNotSended').$e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.rating-system');
    }
}
