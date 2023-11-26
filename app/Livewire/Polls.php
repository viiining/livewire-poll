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

    public function vote(Option $option)
    {   
        // use model binding to get the option id
        // 這裡使用 Option $option 來取得選項的 id，並且透過關聯方法 votes() 來新增一筆投票資料
        $option->votes()->create();
    }
}
