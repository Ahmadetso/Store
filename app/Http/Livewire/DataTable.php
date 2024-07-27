<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{ use WithPagination;

    public $search = '';
    public $perPage = 5;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {

        $query = Book::query();


        $query->when($this->search, function ($q, $search) {

            return $q->where('title', 'like', "%{$search}%");

        });

        $books = $query->paginate($this->perPage);

        return view('livewire.data-table', compact('books'));
    }

}
