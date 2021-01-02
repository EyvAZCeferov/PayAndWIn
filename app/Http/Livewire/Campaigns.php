<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaigns as Campaign;
use Livewire\WithPagination;

class Campaigns extends Component
{
    use WithPagination;

    public $campaigns = null;

    public function mount($slug = null)
    {
        if ($slug != null) {
            $this->campaigns = Campaign::where('slug', $slug)->paginate(10);
        } else {
            $this->campaigns = Campaign::paginate(10);
        }

    }

    public function render()
    {
        return view('livewire.campaigns');
    }
}
