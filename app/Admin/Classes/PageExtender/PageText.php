<?php
namespace App\Admin\Classes\PageExtender;

use \App\Admin\Classes\PageExtender;
use Encore\Admin\Form;


class PageText extends PageExtender
{

    public function __construct($form, ...$args)
    {
        parent::__construct($form, ...$args);

        $this->pageText($this->form);
    }

    public function pageText(Form $form)
    {
        $this->form->tab('Текстовые блоки', function (Form $form) {
            $form->hasMany('texts', '', function (Form\NestedForm $form) {
                $form->text('title', 'Заголовок');
                $form->textarea('text', 'Текст')->attribute('style','resize: vertical;');
                $form->image('image', 'Картинка');
            });
        });
    }
}


