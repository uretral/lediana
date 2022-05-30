<?php

namespace App\Services;

use App\Models\Printout\Printout;

class PrintoutSessionService
{
    const SECTION_KEY = 'printouts';
    private int $product_id;
    private int $size_id;
    private array $printouts;


    private function init($item)
    {
        $this->product_id = $item['product_id'];
        $this->size_id = $item['id'];
        if (!request()->session()->has(self::SECTION_KEY)) {
            request()->session()->put(self::SECTION_KEY, []);
        }
        $this->printouts = request()->session()->get(self::SECTION_KEY);
    }

    public function get($item)
    {
        $this->init($item);

        if ($this->printouts) {
            array_key_exists($this->product_id, $this->printouts) ? $this->update() : $this->add();
        } else {
            $this->add();
        }

        return Printout::where('id', $this->printouts[$this->product_id])->first();
    }

    private function add()
    {
        $printout = Printout::create(['product_id' => $this->product_id, 'size_id' => $this->size_id]);
        $this->printouts[$this->product_id] = $printout->id;
        $this->putPrintouts();

    }

    private function update()
    {
        Printout::where('id', $this->printouts[$this->product_id])->update(['size_id' => $this->size_id]);
    }

    private function putPrintouts(){
        request()->session()->forget(self::SECTION_KEY);
        request()->session()->put(self::SECTION_KEY, $this->printouts);
    }
}

