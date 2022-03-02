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

    /**
     * Displays the form modal
     * of the add function
     *
     * @return void
     */
    public function addShowModal(){
        $this->modalFormVisible = true;
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
