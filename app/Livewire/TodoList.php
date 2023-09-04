<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

    public $name;
    public $search;
    public $editingTodoID;
    public $editingTodoName;

    public function createTodo () {
        $validate =  $this->validate([
            'name' => ['required','min:3','max:50'],
        ],[
            'name.required' => 'The name field is required',
            'name.min' => 'The name must be at least 3 characters',
            'name.max' => 'The name may not be greater than 50 characters',
        ]);
        Todo::create($validate);

        $this->reset('name');
        $this->resetPage();
        session()->flash('success', 'Todo List Success Created');
    }

    public function deleteTodo ($id) {
        try {
            Todo::findOrfail($id)->delete();
        } catch (Exception $err) {
            session()->flash('error', 'Failed To Delete Todo!!');
            return;
        }
    }

    public function toggle ($id) {
        $todo = Todo::find($id);
        $todo->completed =!$todo->completed;
        $todo->save();
    }

    public function editTodo ($id) {
        try {
            $this->editingTodoID = $id;
            $this->editingTodoName = Todo::findOrfail($id)->name;
        } catch (Exception $err) {
            session()->flash('error', 'Failed To Open Edit Todo!!');
            return;
        }
    }

    public function cancleEdit () {
        $this->reset('editingTodoID', 'editingTodoName');
    }

    public function updateTodo () {
        $validate =  $this->validate([
            'editingTodoName' => ['required','min:3','max:50'],
        ],[
            'editingTodoName.required' => 'The name field is required',
            'editingTodoName.min' => 'The name must be at least 3 characters',
            'editingTodoName.max' => 'The name may not be greater than 50 characters',
        ]);
        Todo::find($this->editingTodoID)->update(
            [
                'name' => $this->editingTodoName
            ]
        );

        $this->cancleEdit();
    }

    public function render () {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5)
        ]);
    }
}
