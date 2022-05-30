<?php

namespace App\Admin\Controllers\Blocks;

use App\Models\Blocks\About;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class AboutController extends Controller
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
        $grid = new Grid(new About);

        $grid->id('ID');
        $grid->page_id('page_id');
        $grid->title('title');
        $grid->description('description');
        $grid->image('image');
        $grid->stat_sizes('stat_sizes');
        $grid->stat_sizes_text('stat_sizes_text');
        $grid->stat_pages('stat_pages');
        $grid->stat_pages_text('stat_pages_text');
        $grid->stat_covers('stat_covers');
        $grid->stat_covers_text('stat_covers_text');
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
        $show = new Show(About::findOrFail($id));

        $show->id('ID');
        $show->page_id('page_id');
        $show->title('title');
        $show->description('description');
        $show->image('image');
        $show->stat_sizes('stat_sizes');
        $show->stat_sizes_text('stat_sizes_text');
        $show->stat_pages('stat_pages');
        $show->stat_pages_text('stat_pages_text');
        $show->stat_covers('stat_covers');
        $show->stat_covers_text('stat_covers_text');
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
        $form = new Form(new About);

        $form->display('ID');
        $form->text('page_id', 'page_id');
        $form->text('title', 'title');
        $form->text('description', 'description');
        $form->text('image', 'image');
        $form->text('stat_sizes', 'stat_sizes');
        $form->text('stat_sizes_text', 'stat_sizes_text');
        $form->text('stat_pages', 'stat_pages');
        $form->text('stat_pages_text', 'stat_pages_text');
        $form->text('stat_covers', 'stat_covers');
        $form->text('stat_covers_text', 'stat_covers_text');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
