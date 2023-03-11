<?php

namespace App\Admin\Controllers\Layout;

use App\Models\Layout\Layout;
use App\Http\Controllers\Controller;
use App\Models\Layout\LayoutTemplate;
use App\Models\Layout\LayoutRatio;
use App\Models\Product\Product;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LayoutController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
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
    public function show($id, Content $content)
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
    public function edit($id, Content $content)
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
    public function create(Content $content)
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
    protected function grid()
    {
        $grid = new Grid(new Layout);



        $grid->id('ID');
        $grid->column('ratio_id', 'Тип формата')->display(function () {
            return LayoutRatio::where('id', $this->ratio_id)->first()->title;
        });
        $grid->column('template_id', 'Тип шаблона')->display(function () {
            return LayoutTemplate::where('id', $this->template_id)->first()->title;
        })->filter(LayoutTemplate::pluck('title','id')->toArray());

        $grid->column('product_id', 'Тип продукта')->display(function () {
            return Product::where('id', $this->product_id)->first()->title;
        })->filter(Product::pluck('title','id')->toArray());

        $grid->column('icon', 'Иконка')->image();
//        $grid->column('template_id', 'Тип шаблона');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Layout::findOrFail($id));

        $show->id('ID');
        $show->title('title');
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Layout);

        $form->display('ID');
        $form->text('title', 'title');
        $form->image('icon', 'Иконка')->move('layouts')->uniqueName();
        $form->image('tpl', 'Макет из Фотошопа')->move('layouts')->uniqueName();
        $form->select('ratio_id', 'Тип формата')->options(LayoutRatio::all()->pluck('title', 'id'));
        $form->select('template_id', 'Тип шаблона')->options(LayoutTemplate::all()->pluck('title', 'id'));
        $form->select('product_id', 'Тип продукта')->options(Product::all()->pluck('title', 'id'));

        $form->layoutSizer('asdasd');

        $form->hasMany('photos', 'Фото', function (Form\NestedForm $form) {

//            $form->decimal('width', 'Ширина');
//            $form->decimal('height', 'Высота');
            $form->decimal('top', 'top');
            $form->decimal('right', 'right');
            $form->decimal('bottom', 'bottom');
            $form->decimal('left', 'left');

/*            $form->decimal('w', 'Ширина PSD');
            $form->decimal('h', 'Высота PSD');
            $form->decimal('t', 'top PSD');
            $form->decimal('r', 'right PSD');
            $form->decimal('b', 'bottom PSD');
            $form->decimal('l', 'left PSD');*/

        })->mode('table');
        $form->hasMany('texts', 'Текст', function (Form\NestedForm $form) {
//            $form->decimal('width', 'Ширина');
//            $form->decimal('height', 'Высота');
            $form->decimal('top', 'top');
            $form->decimal('right', 'right');
            $form->decimal('bottom', 'bottom');
            $form->decimal('left', 'left');

/*            $form->decimal('w', 'Ширина PSD');
            $form->decimal('h', 'Высота PSD');
            $form->decimal('t', 'top PSD');
            $form->decimal('r', 'right PSD');
            $form->decimal('b', 'bottom PSD');
            $form->decimal('l', 'left PSD');*/
            $form->textarea('placeholder', 'Текст подсказки');
            $form->select('align', 'Направление')->options(['left' => 'слева','right' => 'справа','center' => 'по центру','justify' => 'распределённый']);

        })->mode('table');
        $form->datetime('created_at', 'Создан')->disable();
        $form->datetime('updated_at', 'Обновлен')->disable();


        return $form;
    }
}
