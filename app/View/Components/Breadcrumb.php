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
        $originalSegments = collect(request()->segments());

        // Filter out numeric segments for display, but keep them for URL generation
        $displaySegments = $originalSegments->filter(function ($segment) {
            return !is_numeric($segment);
        });

        $breadcrumbs = $displaySegments->map(function ($segment) use ($originalSegments) {
            // Find the index of the current segment in the original segments
            $index = $originalSegments->search($segment);

            // Include all original segments in the URL, not just the display segments
            return [
                'name' => ucfirst($segment),
                'url' => url($originalSegments->slice(0, $index + 1)->implode('/'))
            ];
        });

        // Prepend the "Home" breadcrumb
        $breadcrumbs->prepend([
            'name' => 'Home',
            'url' => url('/')
        ]);

        return $breadcrumbs->values();
    }

    public function render()
    {
        return view('components.breadcrumb');
    }
}
?>