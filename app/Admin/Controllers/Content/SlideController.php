<?php

namespace App\Admin\Controllers\Content;

use App\DTO\SlideDTO;
use App\Models\Content\Slide;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SlideController extends Controller
{
    use HasResourceActions;

    public string $sortColumn = 'sort';
    public string $sortLabel = 'Сортировка';
    public int $sortDefault = 500;

    public string $activeColumn = 'active';
    public string $activeLabel = 'Актив';

    public string $titleColumn = 'title';
    public string $titleLabel = 'Заголовок';

    public string $textColumn = 'text';
    public string $textLabel = 'Текст';

    public string $imgColumn = 'img';
    public string $imgLabel = 'Картинка';

    public string $imgMobileColumn = 'img_mobile';
    public string $imgMobileLabel = 'Картинка mobile';



    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content) : Content
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
    public function show($id, Content $content) : Content
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
    public function edit($id, Content $content) :Content
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
        $grid = new Grid(new Slide);

        $grid->id('ID');
        $grid->column($this->sortColumn, $this->sortLabel)->integer();
        $grid->column($this->activeColumn, $this->activeLabel)->switch();
        $grid->column($this->titleColumn, $this->titleLabel);
        $grid->column($this->textColumn, $this->textLabel);
        $grid->column($this->imgColumn, $this->imgLabel)->image('','30','30');
        $grid->column($this->imgMobileColumn, $this->imgMobileLabel)->image('','30','30');

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
        $show = new Show(Slide::findOrFail($id));

        $show->id('ID');
        $show->sort($this->sortLabel);
        $show->active($this->activeLabel);
        $show->title($this->titleLabel);
        $show->text($this->textLabel);
        $show->img($this->imgLabel);
        $show->img_mobile($this->imgMobileLabel);

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new Slide);

        $form->display('ID');
        $form->number($this->sortColumn, $this->sortLabel)->default($this->sortDefault);
        $form->switch($this->activeColumn, $this->activeLabel);
        $form->textarea($this->titleColumn, $this->titleLabel);
        $form->textarea($this->textColumn, $this->textLabel);
        $form->image($this->imgColumn, $this->imgLabel);
        $form->image($this->imgMobileColumn, $this->imgMobileLabel);

        return $form;
    }
}
