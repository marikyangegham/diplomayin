<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Deliveryman;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $user = new User();
        $user->email = "marikyangegham@gmail.com";
        $user->name= "Gegham";
        $user->password = Hash::make("123456");
        $user->role = 1;
        $user->save();

        $user2 = new User();
        $user2->email = "h.marikyan@gmail.com";
        $user2->name= "Hovo";
        $user2->password = Hash::make("123456");
        $user2->save();


        $deliveryman = new Deliveryman();
        $deliveryman->deliveryman_name = "Արփա+";
        $deliveryman->save();

        $deliveryman2 = new Deliveryman();
        $deliveryman2->deliveryman_name = "Երազ";
        $deliveryman2->save();

    }
}
