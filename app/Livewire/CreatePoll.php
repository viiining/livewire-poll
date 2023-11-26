<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;

class CreatePoll extends Component
{
    public $title;
    public $options = [''];
    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        // 用於動態刪除陣列元素後，重新排列陣列索引
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        // 透過 createMany() 方法，一次新增多筆資料，就不需要使用迴圈了    
        Poll::create([
            'title' => $this->title,
        ])->options()->createMany(
            array_map(function ($option) {
                return ['name' => $option];
            }, $this->options)
        );

        $this->reset(['title', 'options']);
    }
}
