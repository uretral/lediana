<?php

namespace App\Admin\Classes\PageExtender;

use App\Admin\Classes\PageExtender;
use App\Models\Page;
use Encore\Admin\Form;

class PagePromo extends PageExtender
{
    public function __construct($form, ...$args)
    {
        parent::__construct($form, $args);
        $this->promoTab($this->form);
        $this->reviewsTab($this->form);
        $this->infoTab($this->form);
        $this->aboutTab($this->form);
        $this->crossLinkTab($this->form);
        $this->galleryTab($this->form);
        $this->creationTab($this->form);
        $this->giftTab($this->form);
        $this->advantageTab($this->form);

    }
    public function promoTab(Form $form){
        $form->tab('Промо блок', function (Form $form) {
            $form->switch('promoCard.active', 'Активность блока')->default(1);
            $form->text('promoCard.title', 'Заголовок');
            $form->textarea('promoCard.text', 'Текст');
            $form->image('promoCard.img', 'Изображение');
            $form->image('promoCard.img_mobile', 'Изображение (моб)');
        });
    }

    public function reviewsTab(Form $form)
    {
        $form->tab('Отзывы', function (Form $form) {
            $form->hasMany('reviews', '', function (Form\NestedForm $form) {
//                $form->hidden('product_id')->default();
                $form->number('order', 'Очередь')->default(100);
                $form->switch('active', 'Активность')->default(1);
                $form->textarea('text', 'Текст');
                $form->text('user', 'Пользователь');
                $form->image('avatar', 'Аватар')->move('avatars');
                $form->number('rate', 'Рейтинг')->min(0)->max(5);
                $form->image('product_img', 'Картинка продукта')->move('reviews');
            })->mode('table')->setWidth(12, 12);
        });
    }

    public function infoTab(Form $form) {
        $form->tab('Инфо блок', function (Form $form) {
            $form->text('info.title','Название');
            $form->text('info.text','Текст');
            $form->text('info.link_text','Текст ссылки');
            $form->select('info.link','Ссылка')->options(Page::where('parent_id', '!=', 0)->pluck('title','id'));
            $form->image('info.img','Изображение');
            $form->image('info.img_mobile','Изображение mobile');
        });
    }

    public function aboutTab(Form $form) {
        $form->tab('Об изделии', function (Form $form) {
            $form->text('about.title','Название');
            $form->textarea('about.description','Текст');
            $form->image('about.image','Изображение');

            $form->divider('Список особенностей изделия');

            $form->switch('about.stat_sizes','Размеры: включить блок')->default(1);
            $form->textarea('about.stat_sizes_text','Размеры: текст');

            $form->switch('about.stat_pages','Страницы: включить блок')->default(1);
            $form->textarea('about.stat_pages_text','Страницы: текст');

            $form->switch('about.stat_covers','Обложки: включить блок')->default(1);
            $form->textarea('about.stat_covers_text','Обложки: текст');


        });
    }

    public function crossLinkTab(Form $form) {
        $form->tab('Кросс ссылки', function (Form $form) {
            $form->hasMany('crossLink','', function (Form\NestedForm $form){
                $form->divider('Элемент');
                $form->text('title','Название');
                $form->textarea('text','Текст');
                $form->image('image','Изображение');
                $form->select('link_page','Ссылка на страницу')->options(Page::where('parent_id', '!=', 0)->pluck('title','id'));
            });
        });
    }

    public function galleryTab(Form $form){
        $form->tab('Галерея', function (Form $form) {
            $form->hasMany('galleryTitle','', function (Form\NestedForm $form){
                $form->text('title','Заголовок');
                $form->image('img_1','Изображение');
                $form->image('img_2','Изображение');
                $form->image('img_3','Изображение');
                $form->image('img_4','Изображение');
                $form->image('img_5','Изображение');
                $form->image('img_6','Изображение');
                $form->image('img_7','Изображение');
            });
        });
    }

    public function creationTab(Form $form){
        $form->tab('Создание', function (Form $form) {
            $form->text('creation.title','Заголовок');
            $form->textarea('creation.text','Текст');
            $form->text('creation.btn_text','Текст кнопки');
            $form->text('creation.btn_link','Ссылка кнопки');
            $form->image('creation.img','Картинка');
            $form->image('creation.img_mobile','Картинка моб');
        });
    }

    public function giftTab(Form $form){
        $form->tab('Подарок', function (Form $form) {
            $form->text('gift.title','Заголовок');
            $form->textarea('gift.text','Текст');
            $form->text('gift.btn_text','Текст кнопки');
            $form->text('gift.btn_link','Ссылка кнопки');
            $form->image('gift.img','Картинка');
        });
    }

    public function advantageTab(Form $form){
        $form->tab('Возможности', function (Form $form) {
            $form->text('advantages_title','Заголовок');
            $form->hasMany('advantage','', function (Form\NestedForm $form){
                $form->textarea('text','Текст');
                $form->image('img','Изображение');
            });
        });
    }
}
