<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:table {--model=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove models array elements using path';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model_of_table = $this->option('model');

        $tables = $model_of_table::all();
        

        
        for($i=0 ; $i <= count($tables); $i++){
            foreach($tables as $table){
                $model_of_table::whereId($table->id)->delete();
            }
        }

        $this->info("Table ".$model_of_table." vidée avec succès !!! ");
    }
}
