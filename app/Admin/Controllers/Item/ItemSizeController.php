<?php

namespace App\Admin\Controllers\Item;

use App\Admin\Actions\Price\Replicate;
use App\Models\Item\ItemAttribute;
use App\Models\Item\ItemCoverType;
use App\Models\Item\ItemSize;
use App\Http\Controllers\Controller;
use App\Models\Item\ItemSizeTitle;
use App\Models\Item\ItemSpreadType;
use App\Models\Layout\LayoutRatio;
use App\Models\Product\Price;
use App\Models\Product\Product;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ItemSizeController extends Controller
{
    use HasResourceActions;

    private $product;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content, $item = null): Content
    {
        $this->product = $item;
        $product = $this->product($item);
        return $content
            ->header($product->title)
            ->description('<a href="/admin/products">К продуктам</a>')
            ->body($this->grid($item));
    }

    private function product($id)
    {
        return Product::whereId($id)->first();
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
    public function edit(Content $content, $item, $id): Content
    {
        $this->product = $item;
        $product = $this->product($item);
        return $content
            ->header($product->title)
            ->description('<a href="/admin/products">К продуктам</a>')
            ->body($this->form()->edit($id));
    }

    public function update($item, $id)
    {
        $this->product = $item;
        return $this->form()->update($id);
    }

    public function store($item)
    {
        $this->product = $item;
        return $this->form()->store();
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content, $item = null): Content
    {
        $this->product = $item;
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
    protected function grid($item): Grid
    {
        $grid = new Grid(new ItemSize);
        $grid->model()->where('product_id', $item);

        $grid->column('id','ID');
        $grid->column('sort','Сортировка')->editable();

        $grid->column('sizes','Размер')->label('danger');

        $grid->column('Rem','rem')->editable();

        $grid->column('ratio_id')->display(function () {
            $ratio = LayoutRatio::where('id',$this->ratio_id)->first();
            return $ratio ? $ratio->title : '';
        });

        if (in_array($this->product, [3, 4, 5, 7, 9])) {
            $grid->column('Тираж')->display(function () {
                return $this->makeLabels($this->id, 'fixed', 'copies');
            });
        }

        if (in_array($this->product, [4, 5])) {
            $grid->column('Атрибуты')->display(function () {
                return $this->makeLabelsWith($this->id, 'attributes', 'copies');
            });
        }

        $grid->column('Формат')->display(function () {
            return $this->makeLabelsWith($this->id, 'format');
        });


        if (in_array($this->product, [1, 2])) {



            $grid->column('Развороты')->display(function () {
                return $this->makeLabelsWith($this->id, 'spreadType');
            });

            $grid->column('Обложка')->display(function () {
                return $this->makeLabelsWith($this->id, 'cover');
            });

            $grid->column('Форзац')->display(function () {
                return Price::where('size_id', $this->id)->where('prop_name', 'flyleaf')
                    ->pluck('price')->toArray();
            })->label('default');
        }


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
        $show = new Show(ItemSize::findOrFail($id));

        $show->id('ID');
        $show->product_id('product_id');
        $show->width('width');
        $show->height('height');
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new ItemSize);

        $form->display('id');
        $form->hidden('product_id', 'product_id')->default($this->product);
        $form->number('sort','Порядок');
        $form->divider();
        $form->currency('width', 'Ширина')->symbol('');
        $form->currency('height', 'Высота')->symbol('');
        $form->currency('rem', 'значение стиля "rem"')->symbol('');
        $form->hidden('sizes');


        $form->divider();

        $form->hasMany('format', 'Форматы (не обязательно)', function (Form\NestedForm $form) {
            $form->hidden('product_id')->default($this->product);
            $form->hidden('prop_name')->default('format');
            $form->select('prop_id', 'Вид формата')->options(ItemSizeTitle::pluck('title', 'id'))->default(null);
            $form->number('price', 'Доп стоимость за формат')->default(0);
        })->mode('table');

        if (in_array($this->product, [3, 4, 5, 7, 9])) {
            $form->hasMany('fixed', 'Тираж / Цена', function (Form\NestedForm $form) {
                $form->hidden('product_id')->default($this->product);
                $form->hidden('prop_name')->default('fixed');
                $form->number('copies', 'Тираж от')->default(1);
                $form->number('price', 'Цена 1 экземпляра')->default(0);
            })->mode('table');
        }

        if (in_array($this->product, [1, 2])) {

            $form->hasMany('spreadType', 'Разворот', function (Form\NestedForm $form) {
                $form->hidden('product_id')->default($this->product);
                $form->hidden('prop_name')->default('spreadType');
                $form->select('prop_id', 'Тип разворота')->options(ItemSpreadType::pluck('title', 'id'));
                $form->number('price', 'Стоимость')->default(0);
            })->mode('table');

            $form->hasMany('cover', 'Обложка', function (Form\NestedForm $form) {
                $form->hidden('product_id')->default($this->product);
                $form->hidden('prop_name')->default('cover');
                $form->select('prop_id', 'Тип обложки')->options(ItemCoverType::pluck('title', 'id'));
                $form->number('price', 'Стоимость')->default(0);
            })->mode('table');

            $form->hidden('flyleaf.product_id')->default($this->product);
            $form->hidden('flyleaf.prop_name')->default('flyleaf');
            $form->number('flyleaf.price', 'Форзац');


        }


        if (in_array($this->product, [4, 5])) {
            $form->hasMany('attributes', 'Атрибуты', function (Form\NestedForm $form) {
                $form->hidden('product_id')->default($this->product);
                $form->hidden('prop_name')->default('attributes');
                $form->select('prop_id', 'Атрибут')->options(ItemAttribute::pluck('title', 'id'));
                $form->number('price', 'Стоимость')->default(0);
            })->mode('table');
        }

        $form->datetime('created_at', 'Создан')->disable();
        $form->datetime('updated_at', 'Обновлен')->disable();


        /*
            1	Фотокниги
            2	Дизайнерские фотокниги
            3	Фотографии
            4	Фотохолсты
            5	Фотокубики
            6	Подарочная карта
            7	Открытки
            8	Премиум фотокниги
            9	Фотомагниты
        */


        return $form;
    }

    private function makeLabelsWith($id, string $string)
    {
    }

    private function makeLabels($id, string $string, string $copies)
    {
    }
}
