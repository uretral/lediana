<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;
use Livewire\Component;

class BaseComponent extends Component
{
    protected function getEventsAndHandlers(): array
    {
        $eventsAndhandlers = collect($this->getListeners())
            ->mapWithKeys(function ($value, $key) {
                $key = is_numeric($key) ? $value : $key;

                return [$key => $value];
            })->toArray();
        if(config('app.debug')){
            // Hot module reloading

            $nameBladeFile = Str::of($this->getName())
                ->replace('.','/')
                ->append('.blade.php')
                ->prepend('resources/views/livewire/')
            ;
            $eventsAndhandlers['hmrupdated'.$nameBladeFile] = '$refresh';
            $nameClass = Str::of(static::class)
                    ->replaceFirst('App', 'app')
                    ->replace('\\', '/') . ".php";
            $eventsAndhandlers['hmrupdated'.$nameClass] = '$refresh';
        }
        return $eventsAndhandlers;
    }
}
