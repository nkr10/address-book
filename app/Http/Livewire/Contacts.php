<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class Contacts extends Component
{
    public $modalFormVisible = false; //only want to show the modal form when add button is clicked

    //properties that will map to our database table fields
    public $first_name;
    public $last_name;
    public $e_mail;
    public $phone_number;
    public $date_of_birth;
    public $physical_address;

    public function create()
    {
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
    public function addShowModal(){
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
        return view('livewire.contacts');
    }
}
