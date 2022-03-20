<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        try {

            Artisan::call('key:generate');
            $this->info('key:generate => successful');
            Artisan::call('migrate:reset');
            $this->info('migrate:reset => successful');
            Artisan::call('voyager:install');
            $this->info('voyager:install => successful');
            Artisan::call('db:seed');
            $this->info('db:seed => successful');
            Artisan::call('passport:install');
            $this->info('passport:install => successful');

            $this->info('Predefined data set correctly..');
        }catch (\Exception $exception){
            $this->alert($exception->getMessage());
        }
        return 0;
    }
}
