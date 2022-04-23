<?php

namespace App\Admin\Controllers;

use App\Models\Promocode;
use App\Http\Controllers\Controller;
use App\Models\User;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PromocodeController extends Controller
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
    protected function grid(): Grid
    {
        $grid = new Grid(new Promocode);

        $grid->id('ID');
        $grid->column('active','Активность')->switch();
        $grid->column('promocode','Промокод')->editable();
        $grid->column('discount','Скидка')->editable();
        $grid->column('min_cost','Мин сумма для скидки')->editable();
        $grid->column('is_personal','Персональная скидка?')->switch();
        $grid->column('user_id','Пользователь')->editable('select',User::pluck('email','id')->toArray());

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
        $show = new Show(Promocode::findOrFail($id));

        $show->id('ID');
        $show->active('active');
        $show->promocode('promocode');
        $show->discount('discount');
        $show->min_cost('min_cost');
        $show->is_personal('is_personal');
        $show->user_id('user_id');
//        $show->created_at(trans('admin.created_at'));
//        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Promocode);

        $form->display('ID');
        $form->switch('active', 'Активность')->default(1);
        $form->text('promocode', 'Промокод');
        $form->textarea('text', 'Текст акции');
        $form->number('discount', 'Скидка')->default(0);
        $form->number('min_cost', 'Минимальная сумма для скидки')->default(0);
        $form->switch('is_personal', 'Персональная скидка?')->default(0);
        $form->select('user_id', 'Пользователь')->options(User::pluck('email','id'));
        $form->datetime('created_at','Создан')->disable();
        $form->datetime('updated_at','Обновлен')->disable();

        return $form;
    }
}
