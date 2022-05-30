<?php

namespace App\Admin\Actions\Price;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;


class Replicate extends RowAction
{
    public $name = 'Редактировать';


    public function handle(Model $model,\Request $request)
    {
        // $model ...

        // Get the `type` value in the form
//        $request->get('type');

        // Get the `reason` value in the form
//        $request->get('reason');
        dd($model,$request);

        return $this->response()->success('Success message.')->refresh();
    }

    public function href()
    {
        return "/admin/prices";
    }

    public function form()
    {
        $type = [
            1 => 'Advertising',
            2 => 'Illegal',
            3 => 'Fishing',
        ];

        $this->checkbox('type', 'type')->options($type);
        $this->textarea('reason', 'reason')->rules('required');
    }

}
