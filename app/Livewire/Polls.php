<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;
use App\Models\Option;

class Polls extends Component
{
    protected $listeners = ['pollCreated' => 'render'];
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();
        return view('livewire.polls', ['polls' => $polls]);
    }

    public function vote($optionId)
    {
        $option = Option::findOrFail($optionId);
        $option->votes()->create(); // 建立一筆投票紀錄
    }
}
