<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Usertype;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    protected $signature = 'soccer:createadmin';

    protected $description = 'Create admin user from command line.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $user = User::make();
        $user->usertype_id = Usertype::where('name', 'admin')->first()->id;
        $user->first_name = $this->ask('Enter first name of admin user');
        $this->line('User\'s first name is ' . $user->first_name);
        $user->last_name = $this->ask('Enter last name of admin user');
        $this->line('User\'s last name is ' . $user->last_name);
        $email = $this->ask('User email');

        $is_email_unique = false;

        while ($is_email_unique == false) {
            if(count(User::where('email', $email)->get()) > 0) {
                $this->error('Mail already exists, please enter another');
                $email = $this->ask('User email');
            } else {
                $user->email = $email;
                $this->line('Email acceppted');
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
            'First name',
            'Last name',
            'Email',
        ],
        [
            [
            'First name' => ucfirst($user->first_name),
            'Last name' => ucfirst($user->last_name),
            'Email' => $user->email,
            ]
        ]);
            
        $user->save();
        $this->info('Admin user was successfuly created.');
        return 0;
    }
}
