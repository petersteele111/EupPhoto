<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $segments;

    public function __construct()
    {
        $this->segments = $this->createSegments();
    }

    public function createSegments()
    {
        $segments = collect(request()->segments());

        $segments = $segments->prepend('home');

        // Filter out numeric segments
        $segments = $segments->filter(function ($segment) {
            return !is_numeric($segment);
        });

        return $segments->values()->map(function ($segment, $index) use ($segments) {
            return [
                'name' => ucfirst($segment),
                'url' => url($segments->slice(0, $index + 1)->implode('/'))
            ];
        });
    }

    public function render()
    {
        return view('components.breadcrumb');
    }
}
?>