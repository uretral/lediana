<?php

namespace App\Admin\Controllers\Product;

use App\Admin\Actions\Price\Replicate;
use App\Models\Item\ItemSizeTitle;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ProductController extends Controller
{
    use HasResourceActions;

/*    public string $titleColumn = 'title';
    public string $titleLabel = 'Заголовок';

    public string $descriptionColumn = 'description';
    public string $descriptionLabel = 'Кр. описание';

    public string $textColumn = 'text';
    public string $textLabel = 'Описание';

    public string $slugColumn = 'slug';
    public string $slugLabel = 'Слаг';

    public string $photoPreviewColumn = 'photo_preview';
    public string $photoPreviewLabel = 'Фото превью';

    public string $priceColumn = 'price';
    public string $priceLabel = 'Цена от';

    public string $weightColumn = 'weight';
    public string $weightLabel = 'Вес, гр.';*/

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content
            ->header(trans('admin.index'))
            ->description(trans('admin.description'))
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content): Content
    {
        return $content
            ->header(trans('admin.detail'))
            ->description(trans('admin.description'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content): Content
    {
        return $content
            ->header(trans('admin.edit'))
            ->description(trans('admin.description'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content): Content
    {
        return $content
            ->header(trans('admin.create'))
            ->description(trans('admin.description'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Product);
        $grid->id('ID');
        $grid->column('title','Название');
        $grid->column('slug','Ссылка')->display(function (){
            return '<a href="prices/'.$this->id.'">  В список размеров </a>';
        });


        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id): Show
    {
        $show = new Show(Product::findOrFail($id));
        $show->id('ID');
        $show->title('Название');

/*        $show->id('ID');
        $show->title($this->titleLabel);
        $show->description($this->descriptionLabel);
        $show->text($this->textLabel);
        $show->slug($this->slugLabel);
        $show->photo_preview($this->photoPreviewLabel);
        $show->price($this->priceLabel);
        $show->weight($this->weightLabel);*/

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new Product);
        $form->display('ID');
        $form->text('slug', 'Слаг');
        $form->text('title', 'Название товара')->rules('required');
/*
        $form->tab('Главное', function (Form $form){

        })->tab('size', function (Form $form){
            $form->hasMany('size','', function (Form\NestedForm $form){
                $form->number('width', 'ширина');
                $form->number('height', 'высота');
                $form->multipleSelect('sizes','Размеры')->options(ItemSizeTitle::pluck('title','id'));
            })->mode('table')->setWidth(12,12);
        })
            ;*/

/*
        $form
            ->tab('Карточка', function (Form $form) {
                $form->display('ID');
                $form->text('slug', 'Слаг');
                $form->text('title', 'Название товара')->rules('required');
                $form->textarea('description', 'Кр. описание');
                $form->number('price', 'Цена от');
            })
            ->tab('Баннер', function (Form $form) {

                // banner.title
                // banner.text
                // banner.link


                $form->textarea('text', $this->textLabel);

                $form->image('photo_preview', 'Фото превью');
                $form->image('photo_preview_mobile', 'Фото превью моб.');

                $form->number('weight', $this->weightLabel);
            })
            ->tab('Слайд', function (Form $form) {
                $form->text('hasSlide.title', 'Заголовок');
                $form->number('hasSlide.sort', 'Сортировка');
                $form->switch('hasSlide.active', 'Вкл/Выкл');
                $form->textarea('hasSlide.text', 'Текст');
                $form->image('hasSlide.img', 'Картинка');
                $form->image('hasSlide.img_mobile', 'Картинка mobile');

            })
            ->tab('Превью', function ($form) {

            });


        $form->saving(function (Form $form) {
            if (!$form->slug) {
                $form->slug = str_slug($form->title);
            }


        });
*/

//        $form->saving(function (Form $form) {
////            if (!$form->slug) {
//                $form->slug = str_slug('product-'.$form->title);
////            }
//        });

        return $form;
    }
}
