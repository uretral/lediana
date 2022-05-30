<?php

namespace App\Admin\Controllers\Printout;

use App\Models\Printout\PrintoutText;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PrintoutTextController extends Controller
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
        $grid = new Grid(new PrintoutText);

        $grid->id('ID');
        $grid->printout_id('printout_id');
        $grid->layout_id('layout_id');
        $grid->spread_nr('spread_nr');
        $grid->text('text');
        $grid->font_name('font_name');
        $grid->font_size('font_size');
        $grid->font_color('font_color');
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
        $show = new Show(PrintoutText::findOrFail($id));

        $show->id('ID');
        $show->printout_id('printout_id');
        $show->layout_id('layout_id');
        $show->spread_nr('spread_nr');
        $show->text('text');
        $show->font_name('font_name');
        $show->font_size('font_size');
        $show->font_color('font_color');
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
        $form = new Form(new PrintoutText);

        $form->display('ID');
        $form->text('printout_id', 'printout_id');
        $form->text('layout_id', 'layout_id');
        $form->text('spread_nr', 'spread_nr');
        $form->text('text', 'text');
        $form->text('font_name', 'font_name');
        $form->text('font_size', 'font_size');
        $form->text('font_color', 'font_color');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
