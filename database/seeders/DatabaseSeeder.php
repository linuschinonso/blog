<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      // User::factory()->count(10)->create();

      User::factory()->count(100)->create()->each(function ($user){
        $user->posts()->save(Post::factory()->create());
    });
        
      // factory(User::class, 10)->create()->each(function($user){
      //   $user->posts()->save(factory(Post::class)->make());
      //   });
        // \App\Models\User::factory(10)->create()->each(function($user){
        //     $user->posts()->save(factory('Post')->make());
        // });


                
        

        }
        

        }

        

        
//         // \App\Models\User::factory()->create([
//         //     'name' => 'Test User',
//         //     'email' => 'test@example.com',
//         // ]);
//     }
// }
