<?php
namespace App\Admin\Classes;

use App\Admin\Controllers\PageController;
use App\Models\Blocks\Promotion;
use Encore\Admin\Form;

class PageExtender extends PageController
{

    public Form $form;


    public function __construct($form,...$args)
    {

        $this->form = $form;
        $this->form->tab('Основное', function (Form $form){

            $form->text('id')->disable();
            $form->hidden('parent_id')->default(0);
            $form->number('order')->default(100);

            $form->switch('status', 'Статус')->default(0);
            $form->text('name', 'Заголовок страницы');
            $form->text('title', 'title');
            $form->textarea('meta_title', 'meta title');
            $form->textarea('meta_description', 'meta description');
            $form->text('menu_title', 'Альтернативное название пункта меню');

            $form->datetime('created_at', 'Создан')->format('YYYY-MM-DD HH:mm:ss')->disable();
            $form->datetime('updated_at', 'Обновлен')->format('YYYY-MM-DD HH:mm:ss')->disable();
        });

        $this->promotionTab($this->form);
        $this->savingForm();

    }

    public function savingForm() {
        $this->form->saving(function (Form $form) {

            if (in_array($form->id . '', [1, 2, 4, 8])) {
                $form->slug = '';
            } else {
                $form->slug = str_slug($form->title);
                switch ($form->type) {
                    case 'index':
                        $form->parent_id = 1;
                        break;
                    case 'promo':
                        $form->parent_id = 2;
                        break;
                    case 'text':
                        $form->parent_id = 4;
                        break;
                    case 'constructor':
                        $form->parent_id = 8;
                        break;
                }
            }

        });
    }

    public function promotionTab(Form $form) {
        $form->tab('Консультация', function (Form $form) {
            $form->select('promotion_id','Выберите')->options(Promotion::all()->pluck('name','id'));
        });
    }
}
