<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocks';

    /**
     * @var array
     */
    protected $fillable = [
        'sku',
        'stock',
        'city'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    public static function findBySku($sku) {
        $stocks = self::all();
        $output = [];

        foreach ($stocks as $stock) {
            if($stock['sku'] === $sku) {
                $output[] = $stock;
            }
        }

        return $output;
    }
}
