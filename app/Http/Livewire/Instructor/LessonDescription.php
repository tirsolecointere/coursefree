<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use Livewire\Component;

class LessonDescription extends Component
{
    public $lesson, $description, $name;

    protected $rules = [
        'description.name' => 'required',
    ];

    public function mount(Lesson $lesson) {
        $this->lesson = $lesson;

        if ($lesson->description) {
            $this->description = $lesson->description;
        }
    }

    public function render()
    {
        return view('livewire.instructor.lesson-description');
    }

    public function store() {
        $this->description = $this->lesson->description()->create(['name' => $this->name]);
        $this->reset('name');

        $this->lesson = Lesson::find($this->lesson->id);
    }

    public function update() {
        $this->validate();
        $this->description->save();
    }

    public function destroy(Lesson $lesson) {
        $this->description->delete();
        $this->reset('description');

        $this->lesson = Lesson::find($this->lesson->id);
    }
}
