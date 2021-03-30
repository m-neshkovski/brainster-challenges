<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClearDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:db_clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears vehicles table from softdeletes';

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
        $trash = Vehicle::onlyTrashed()->get();
        foreach($trash as $t) {
            $t->forceDelete();
        }
        $this->info('Trash is cleared');
        $noInsurance = Vehicle::where('insurance_date', '<', date('Y-m-d', strtotime(now())))->get();
        foreach($noInsurance as $n) {
            $n->forceDelete();
        }
        $this->info('Insurance passed is cleared');
        return 0;
    }
}
