<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $new_user= User::create([
        //     'username'=>'mariamkomayha',
        //     'password'=>'12345678',
        //     'name'=>'Mariam Komayha',
        //     'role'=>'employee',
        //     'manager_id'=>1

        // ]);

            
        dd("done");


    }
}
