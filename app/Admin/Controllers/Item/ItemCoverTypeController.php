<?php

namespace App\Admin\Controllers\Item;

use App\Models\Item\ItemCoverMaterial;
use App\Models\Item\ItemCoverType;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ItemCoverTypeController extends Controller
{
    use HasResourceActions;

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
        $grid = new Grid(new ItemCoverType);

        $grid->id('ID');
        $grid->column('sort','Порядок')->editable();
        $grid->column('active','Активность')->switch();
        $grid->column('title','Название')->editable();

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
        $show = new Show(ItemCoverType::findOrFail($id));

        $show->id('ID');
        $show->sort('sort');
        $show->active('active');
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
    protected function form(): Form
    {
        $form = new Form(new ItemCoverType);

        $form->display('ID');
        $form->number('sort', 'Порядок')->default(100);
        $form->switch('active', 'Активность')->default(1);
        $form->text('title', 'Название');
        $form->textarea('text', 'Текст');
        $form->multipleSelect('materials', 'Материал обложки')->options(ItemCoverMaterial::pluck('title', 'id'));
        $form->datetime('created_at','Создан')->disable();
        $form->datetime('updated_at','Обновлен')->disable();

        return $form;
    }
}
