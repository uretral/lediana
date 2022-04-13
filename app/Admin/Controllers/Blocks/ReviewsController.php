<?php

namespace App\Admin\Controllers\Blocks;

use App\Models\Blocks\Reviews;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ReviewsController extends Controller
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
        $grid = new Grid(new Reviews);

        $grid->id('ID');
        $grid->order('order');
        $grid->active('active');
        $grid->text('text');
        $grid->product_id('product_id');
        $grid->user('user');
        $grid->avatar('avatar');
        $grid->rate('rate');
        $grid->product_img('product_img');
        $grid->created_at(trans('admin.created_at'));
        $grid->updated_at(trans('admin.updated_at'));

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
        $show = new Show(Reviews::findOrFail($id));

        $show->id('ID');
        $show->order('order');
        $show->active('active');
        $show->text('text');
        $show->product_id('product_id');
        $show->user('user');
        $show->avatar('avatar');
        $show->rate('rate');
        $show->product_img('product_img');
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
        $form = new Form(new Reviews);

        $form->display('ID');
        $form->text('order', 'order');
        $form->text('active', 'active');
        $form->text('text', 'text');
        $form->text('product_id', 'product_id');
        $form->text('user', 'user');
        $form->text('avatar', 'avatar');
        $form->text('rate', 'rate');
        $form->text('product_img', 'product_img');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
