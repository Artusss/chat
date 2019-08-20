<?php

use Illuminate\Database\Seeder;

class ChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            $chat = new App\Chat;
            $chat->name = 'chat_'.$i;
            $chat->save();
            $chat->users()->sync(App\User::all()->pluck('id')->toArray(), []);
        }
    }
}
