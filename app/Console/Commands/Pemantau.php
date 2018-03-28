<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class Pemantau extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pemantau';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengganti status langganan kursus secara otomatis ketika waktu kursus telah berakhir';

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
     * @return mixed
     */
    public function handle()
    {
		// Pantau kursus
		

        $this->info('Pemantauan berhasil dilakukan');
    }
}
