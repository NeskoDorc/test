<?php

namespace App\Console\Commands;
use App\Imports\CsvImport;
use Illuminate\Console\Command;
use Excel;

class importCsvFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv {file:path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Csv File Into Database';

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
        $userId = $this->argument('file:path');


        Excel::import( new CsvImport(),$userId);

        echo 'finish';
    }
}
