<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'first_name' => Str::random(5),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);

        Contact::create([
            'first_name' => Str::random(),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);

        Contact::create([
            'first_name' => Str::random(),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);

        Contact::create([
            'first_name' => Str::random(),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);

        Contact::create([
            'first_name' => Str::random(),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);

        Contact::create([
            'first_name' => Str::random(),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);

        Contact::create([
            'first_name' => Str::random(),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);

        Contact::create([
            'first_name' => Str::random(),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);

        Contact::create([
            'first_name' => Str::random(),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);

        Contact::create([
            'first_name' => Str::random(),
            'last_name' => Str::random(),
            'e_mail' => Str::random().'@gmail.com',
            'phone_number' => '02-030-405-0692',
            'date_of_birth' => '2022-03-07',
            'physical_address' => Str::random()
        ]);
    }
}
