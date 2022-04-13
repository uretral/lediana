<?php

namespace App\Admin\Controllers\Blocks;

use App\Models\Blocks\Slide;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SlideController extends Controller
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
        $grid = new Grid(new Slide);

        $grid->id('ID');
        $grid->page_id('page_id');
        $grid->title('title');
        $grid->text('text');
        $grid->price_from('price_from');
        $grid->btn_text('btn_text');
        $grid->btn_link('btn_link');
        $grid->img('img');
        $grid->img_mobile('img_mobile');
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
        $show = new Show(Slide::findOrFail($id));

        $show->id('ID');
        $show->page_id('page_id');
        $show->title('title');
        $show->text('text');
        $show->price_from('price_from');
        $show->btn_text('btn_text');
        $show->btn_link('btn_link');
        $show->img('img');
        $show->img_mobile('img_mobile');
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
        $form = new Form(new Slide);

        $form->display('ID');
        $form->text('page_id', 'page_id');
        $form->text('title', 'title');
        $form->text('text', 'text');
        $form->text('price_from', 'price_from');
        $form->text('btn_text', 'btn_text');
        $form->text('btn_link', 'btn_link');
        $form->text('img', 'img');
        $form->text('img_mobile', 'img_mobile');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
