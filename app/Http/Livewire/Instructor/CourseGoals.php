<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Goal;
use Livewire\Component;

class CourseGoals extends Component
{
    public $course, $goal, $name;

    protected $rules = [
        'goal.name' => 'required',
    ];

    public function mount(Course $course) {
        $this->course = $course;
        $this->goal = new Goal();
    }

    public function render()
    {
        return view('livewire.instructor.course-goals');
    }

    public function store() {
        $this->validate([
            'name' => 'required',
        ]);

        $this->course->goals()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');

        $this->course = Course::find($this->course->id);
    }

    public function edit(Goal $goal) {
        $this->goal = $goal;
    }

    public function update() {
        $this->validate();

        $this->goal->save();

        $this->goal = new Goal();

        $this->course = Course::find($this->course->id);
    }

    public function destroy(Goal $goal) {
        $goal->delete();

        $this->course = Course::find($this->course->id);
    }

    public function cancel() {
        $this->goal = new Goal();
        $this->resetValidation();

        $this->reset('name');
    }
}
