<?php

use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users=DB::select('select * from users');
        foreach($users as $key=>$user){         
            for($i=0;$i<5;$i++){
                DB::table('entries')->insert([ 
                    'title' => Str::random(10),
                    'content' => Str::random(50),
                    'user_id' =>$user->id,
                    'creation' => now(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
