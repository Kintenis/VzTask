<?php

namespace App\Console\Commands;

use App\Models\Stock;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImportStocks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-stocks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports products stocks from JSON file regularly.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $stocks = File::json('storage/app/public/stocks.json');

        DB::table('stocks')->truncate();

        $progressBar = $this->output->createProgressBar(count($stocks));

        $progressBar->start();

        foreach ($stocks as $stock) {
            $stockInsert = new Stock();

            $stockInsert->sku = $stock['sku'];
            $stockInsert->stock = $stock['stock'];
            $stockInsert->city = $stock['city'];

            $stockInsert->save();

            $progressBar->advance();
        }

        $progressBar->finish();
    }
}
