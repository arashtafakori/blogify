<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ParagraphMore extends Component
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render()
    {
        return view('components.paragraph-more');
    }
}