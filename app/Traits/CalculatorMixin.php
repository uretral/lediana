<?php

namespace App\Traits;

use App\Models\Item\ItemSize;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Collection;

trait CalculatorMixin
{

    public Product $product;
    public Collection $sizes;
    public ItemSize $current;
    public Collection $covers;

    /*Spreads slider*/
    public int $rangeMin = 10;
    public int $rangeMax = 30;

    /*computed*/
    public string $uri;
    public string $size;
    public int $spreads = 15;
    public int $coverId = 1;
    public int $minPhotos;

    /*prices*/
    private int $priceCover = 0;
    private int $priceFixed = 0;
    private int $priceSpread = 0;

    public int $finalPrice = 0;

    /**
     * @return void
     */
    public function calcFixed()
    {
        if ($this->current->fixed->count()) {
            $this->priceFixed = 888;
        } else {
            $this->priceFixed = 0;
        }
    }

    /**
     * @return void
     */
    public function calcSpread()
    {
        $this->priceSpread = $this->current->spreadType->first()->price;
    }

    /**
     * @return void
     */
    public function calcCover(){
        $this->priceCover = $this->current->cover
            ->where('prop_id',$this->coverId)->first()->price;
    }

    /**
     * Counts number of required photos
     * @return void
     */
    public function calcPhotos(){
        $this->minPhotos = $this->spreads_cnt * 2;
    }

    /**
     * Selects default size(format) from
     * sizes of product and current url
     * @return void
     */
    public function beforeMount(){
        $productOptions = new \App\Classes\Product\Product($this->product->id);
        $this->sizes = $productOptions->calculator();
        $this->current = $this->sizes->first();
        $this->uri = url()->current();
    }

    /**
     * Calculate final price
     * @return void
     */
    public function calculate()
    {
        $this->calcFixed();
        $this->calcSpread();
        $this->calcCover();
        $this->calcPhotos();

        $this->finalPrice = ($this->priceSpread * $this->spreads_cnt) + $this->priceCover;
    }

}
