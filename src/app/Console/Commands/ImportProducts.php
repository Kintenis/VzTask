<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use JsonException;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports products from JSON file.';

    /**
     * Execute the console command.
     * @throws JsonException
     */
    public function handle(): void
    {
        $products = File::json('storage/app/public/products.json');

        DB::table('products')->truncate();

        $progressBar = $this->output->createProgressBar(count($products));

        $progressBar->start();

        foreach ($products as $product) {
            $productInsert = new Product();

            $productInsert->sku = $product['sku'];
            $productInsert->description = $product['description'];
            $productInsert->size = $product['size'];
            $productInsert->photo = $product['photo'];
            $productInsert->tags = json_encode($product['tags'], JSON_THROW_ON_ERROR);
            $productInsert->updated_at = $product['updated_at'];

            $productInsert->save();

            $progressBar->advance();
        }

        $progressBar->finish();
    }
}
