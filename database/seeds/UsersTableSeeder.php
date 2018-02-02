<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Painel\UserProfile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'email' => 'admin@user.com',
            'enrolment' => 100001,
            'password' => bcrypt('trinity')
        ])->each(function(User $user){
            $profile = factory(UserProfile::class)->make();
            $user->profile()->create($profile->toArray());
            User::assignRole($user, User::ROLE_ADMIN);
            $user->save();
        });
    
        factory(User::class,100)->create()->each(function(User $user){
            if(!$user->userable) {
                $profile = factory(UserProfile::class)->make();
                $user->profile()->create($profile->toArray());
                User::assignRole($user, User::ROLE_PSYCHOANALYST);
                User::assignEnrolment(new User(), User::ROLE_PSYCHOANALYST);
                $user->save();
            }
        });
    
        factory(User::class,100)->create()->each(function(User $user){
            if(!$user->userable) {
                $profile = factory(UserProfile::class)->make();
                $user->profile()->create($profile->toArray());
                User::assignRole($user, User::ROLE_PATIENT);
                User::assignEnrolment(new User(), User::ROLE_PATIENT);
                $user->save();
            }
        });

       /*
        factory(\App\User::class)->create([
            'email' => 'admin@user.com',
            'enrolment' => 100001
        ]);

        */
        
        /*  factory(\App\User::class)->create([
       
     
        factory(\App\User::class)->create([
            'email' => 'admin@user.com',
            'enrolment' => 100001,
            'password' => bcrypt('trinity')
        ])->each(function(User $user){
            User::assignRole($user, User::ROLE_ADMIN);
            $user->save();
        });

        factory(User::class,10)->create()->each(function(User $user){
            if(!$user->userable) {
                User::assignRole($user, User::ROLE_PSYCHOANALYST);
                User::assignEnrolment(new User(), User::ROLE_PSYCHOANALYST);
                $user->save();
            }
        });

        factory(User::class,10)->create()->each(function(User $user){
            if(!$user->userable) {
                User::assignRole($user, User::ROLE_PATIENT);
                User::assignEnrolment(new User(), User::ROLE_PATIENT);
                $user->save();
            }
        });
        
      */
        
      
       
        /* factory(\App\User::class,10)->create();*/
       
       
        /*factory(\App\User::class,1)->states('admin')->create([
            'email' => 'admin@user.com'
        ]);

        factory(\App\User::class,1)->states('user')->create([
            'email' => 'user@user.com'
        ]);

        factory(\App\User::class,3)->states('user');*/
    }
}
