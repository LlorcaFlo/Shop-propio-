<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        User::create ( [
            'name' => 'Llorca',
            'email' => 'llorca@llorca.com',
            'user_name' => 'Llorca',
            'password' => bcrypt ('12345678'),
            'admin' => true,
            'phone' => '968080808',
            'address' => 'C/Palamos nº5 Bda Hispanoámerica, Los Dolores(Cartagena), Murcia'

        ]);

        User::create ( [
            'name' => 'Pepe',
            'email' => 'Pepe@Pepe.com',
            'user_name' => 'Pepe',
            'password' => bcrypt ('12345678'),
            'admin' => false,
            'phone' => '968080808',
            'address' => 'C/Palamos nº5 Bda Hispanoámerica, Los Dolores(Cartagena), Murcia'
        ]);

        User::create ( [
            'name' => 'Damian',
            'email' => 'Damian@Damian.com',
            'user_name' => 'Damian',
            'password' => bcrypt ('12345678'),
            'admin' => false,
            'phone' => '968080808',
            'address' => 'C/Palamos nº5 Bda Hispanoámerica, Los Dolores(Cartagena), Murcia'
        ]);

        User::create ( [
            'name' => 'Felipon',
            'email' => 'Felipon@Felipon.com',
            'user_name' => 'Felipon',
            'password' => bcrypt ('12345678'),
            'admin' => false,
            'phone' => '968080808',
            'address' => 'C/Palamos nº5 Bda Hispanoámerica, Los Dolores(Cartagena), Murcia'
        ]);

        User::create ([
            'name' => 'Luis',
            'email' => 'Luis@Luis.com',
            'user_name' => 'Luis',
            'password' => bcrypt ('12345678'),
            'admin' => false,
            'phone' => '968080808',
            'address' => 'C/Palamos nº5 Bda Hispanoámerica, Los Dolores(Cartagena), Murcia'
        ]);

        User::create ([
            'name' => 'MªPaz',
            'email' => 'MPaz@MPaz.com',
            'user_name' => 'MPaz',
            'password' => bcrypt ('12345678'),
            'admin' => false,
            'phone' => '968080808',
            'address' => 'C/Palamos nº5 Bda Hispanoámerica, Los Dolores(Cartagena), Murcia'
        ]);

        factory(User::class, 5)->create();

    }
}
