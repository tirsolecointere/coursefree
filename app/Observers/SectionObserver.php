<?php

namespace App\Observers;
use App\Models\Section;
use Illuminate\Support\Facades\Storage;

class SectionObserver
{
    public function deleting(Section $section) {
        foreach ($section->lessons as $lesson) {
            if ($lesson->resource) {
                Storage::delete($lesson->resource->url);
                $lesson->resource->delete();
            }
        }
    }
}
