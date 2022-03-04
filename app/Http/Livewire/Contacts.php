<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;
    public $modalFormVisible = false; //only want to show the modal form when add button is clicked
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    //properties that will map to our database table fields
    public $first_name;
    public $last_name;
    public $e_mail;
    public $phone_number;
    public $date_of_birth;
    public $physical_address;

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'e_mail' => 'required'
        ];

    }

    public function cancelUpdate(){
        $this->modalFormVisible = false;
        $this->reset();
    }

    public function cancelDelete(){
        $this->modalConfirmDeleteVisible = false;
        $this->reset();
    }

    public function delete(){
        Contact::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    public function deleteShowModal($id){
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function mount()
    {
        // Resets the pagination after reloading the page
        $this->resetPage();
    }

    public function loadModel(){
        $data = Contact::find($this->modelId);
        $this->first_name = $data->first_name;
        $this->last_name = $data->last_name;
        $this->e_mail = $data->e_mail;
        $this->phone_number = $data->phone_number;
        $this->date_of_birth = $data->date_of_birth;
        $this->physical_address = $data->physical_address;
    }

    public function update(){
        $this->validate();
        Contact::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    public function updateShowModal($id){
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();

    }

    public function read()
    {
        return Contact::paginate(3);
    }

    public function create()
    {
        $this->validate();
        Contact::create($this->modelData()); //save data
        $this->modalFormVisible = false; //hiding modal data
        $this->reset();
    }

    /**
     * Displays the form modal
     * of the add function
     *
     * @return void
     */
    public function addShowModal()
    {
        $this->modalFormVisible = true;
    }

    public function modelData(){
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'e_mail' => $this->e_mail,
            'phone_number' => $this->phone_number,
            'date_of_birth' => $this->date_of_birth,
            'physical_address' => $this->physical_address
        ];
    }

    /**
     * The livewire render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.contacts', [
            'data' => $this->read(),
        ]);
    }
}
