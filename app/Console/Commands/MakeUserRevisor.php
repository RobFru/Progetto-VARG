<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-user-revisor {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Render a user a revisor';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $user= User::where('email', $this->argument('email'))->first();
        if (!$user) {
            $this->error('User not found');
            return;
        }
        $user->is_revisor = true;
        $user->save();
        $this->info("User {$user->name} is now a revisor");
    }
}
