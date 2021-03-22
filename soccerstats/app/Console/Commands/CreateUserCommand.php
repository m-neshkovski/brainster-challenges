<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Usertype;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {is_admin=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user from command line. Specify type.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $is_admin = $this->argument('is_admin');
        
        // $input = 'S';
        // dd(User::where('first_name', 'LIKE', "$input%")->pluck('first_name')->all());

        $usertypes = Usertype::pluck('name')->all();

        if($is_admin == false) {
            $role = $this->choice('Choose user type', $usertypes);
            $this->info('You are creating user of type ' . $role);
            $role = Usertype::where('name', $role)->first()->id;
        } else {
            $this->info('You are creating user of type admin');
        }



        $user = User::make();
        $user->usertype_id = $is_admin ? Usertype::where('name', 'admin')->first()->id : $role;
        $user->first_name = $this->anticipate('Enter first name of a user', array_unique(User::pluck('first_name')->all()), null);
        $this->info('User\'s first name is ' . $user->first_name);
        // $user->last_name = $this->anticipate('Enter last name of a user', array_unique(User::pluck('last_name')->all()), null);
        $user->last_name = $this->anticipate('Enter last name of a user', 
        function($input) {
            $filter = array_unique(User::where('first_name', 'LIKE', "$input%")->pluck('first_name')->all());
            if(empty($filter)) {
                return $input;
            } else {
                return array_unique(User::where('first_name', 'LIKE', "$input%")->pluck('first_name')->all());
            }
        }, null);
        $this->info('User\'s last name is ' . $user->last_name);
        $email = $this->ask('User email');

        $is_email_unique = false;

        while ($is_email_unique == false) {
            if(count(User::where('email', $email)->get()) > 0) {
                $this->error('Mail already exists, please enter another');
                $email = $this->ask('User email');
            } else {
                $user->email = $email;
                $this->info('Email acceppted');
                $is_email_unique = true;
            }
        }

        $password_confirmed = false;

        while (!$password_confirmed) {
            $password = $this->secret('Password');
            $password_verify = $this->secret('Confirm password');

            if($password == $password_verify) {
                $user->password = Hash::make($password);
                $password_confirmed = true;
            } else {
                $this->error('Paswords do not match, try again!!!');
            }
        }
        
        
        $this->table(
        [
            'Role',
            'First name',
            'Last name',
            'Email',
        ],
        [
            [
            'Role' => ucfirst(Usertype::find($user->usertype)->first()->name),
            'First name' => ucfirst($user->first_name),
            'Last name' => ucfirst($user->last_name),
            'Email' => $user->email,
            ]
        ]);
            
        $user->save();
        $this->info('User was successfuly created.');
        return 0;
    }
}
