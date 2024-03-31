<?php

namespace App\Console\Commands\client;

use App\Models\admin\courses\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class CreateClientCourseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'course:create {--count=} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command to create course';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = $this->option('count');

        $bar = $this->output->createProgressBar($count);

        $bar->start();
        
        for($i=0; $i <= $count; $i++){
            
            $titre = Str::random(8);
            $description = Str::random(8);
            $adresse_depart = Str::random(8);
            $adresse_livraison = Str::random(8);
            $numero_client = rand(41000000, 44000000);
            $date_de_livraison = Carbon::now()->format('d/m/Y');
            $status_livraison = 'en cours de validation';
            $user_id = User::where('role_id', 3)->get()->random()->id;

            Course::create(
                [
                    'titre' => $titre,
                    'description' => $description,
                    'adresse_depart' => $adresse_depart,
                    'adresse_livraison' => $adresse_livraison,
                    'numero_client' => $numero_client,
                    'date_de_livraison' => $date_de_livraison,
                    'status_livraison' => $status_livraison,
                    'user_id' => $user_id,
                ]);

                $bar->advance();
            }
            
        $bar->finish();
            /* Message retourner */
        $this->info('Successfully Created: '.$count.'Users');
    }
}
