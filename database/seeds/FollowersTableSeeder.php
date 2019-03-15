<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->first();
        $user_id = $user->id;

        $followers = $users->slice(1);
        $followers_ids = $followers->pluck('id')->toArray();

        $user->follow($followers_ids);

        foreach ($followers as $follower){
            $follower->follow($user_id);
        }
     }
}
