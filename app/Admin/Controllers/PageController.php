<?php

namespace App\Admin\Controllers;

use App\Admin\Classes\PageExtender;
use App\Models\Page;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Tree;

class PageController extends Controller
{
    use HasResourceActions;

    private $id;


    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {

        return Admin::content(function (Content $content) {

            $content->header('Страницы');
            $content->body($this->treeDisplay());
        });
    }


    public function treeDisplay(): Tree
    {
        return Page::tree(function ($tree) {
            $this->removeTrash();
        });
    }


    public function removeTrash()
    {
        return Admin::script("
        $(document).ready(function () {
            $('.tree_branch_delete').each(function (i, el) {
                if ($.inArray(Number($(el).attr('data-id')), [1, 2, 4]) !== -1) {
                    $(el).remove() }
                })
            });
        ");
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
    public function edit(int $id, Content $content): Content
    {
        $this->id = $id;
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
        $grid = new Grid(new Page);

        $grid->id('ID');
        $grid->parent_id('parent_id');
        $grid->order('order');
        $grid->status('status');
        $grid->title('title');
        $grid->meta_title('meta_title');
        $grid->meta_description('meta_description');
        $grid->slug('slug');
        $grid->type('type');
        $grid->blocks('blocks');
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
        $show = new Show(Page::findOrFail($id));

        $show->id('ID');
        $show->parent_id('parent_id');
        $show->order('order');
        $show->status('status');
        $show->title('title');
        $show->meta_title('meta_title');
        $show->meta_description('meta_description');
        $show->slug('slug');
        $show->type('type');
        $show->blocks('blocks');
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
        $form = new Form(new Page);

        $type = [
            'index' => 'Главная',
            'text' => 'Текстовая',
            'promo' => 'Промо',
            'constructor' => 'Конструктор',
            'sizes' => 'Форматы',
            'reviews' => 'Отзывы',
        ];

        $segments = request()->segments();

        if (count($segments) > 2 && is_numeric($segments[2])) {

            $page = Page::where('id', $segments[2])->first();

            switch ($page->type) {
                case 'index':
                    $ext = new PageExtender\PageIndex($form, [
                        $form->select('type', 'Тип страниц')->options($type)->disable()
                    ]);
                    break;
                case 'promo':
                    $ext = new PageExtender\PagePromo($form, [
                        $form->select('type', 'Тип страниц')->options($type),
                        $form->text('slug', 'Слаг'),
                        $form->number('price_from', 'Цена от'),
                    ]);
                    break;
                case 'text':
                    $ext = new PageExtender\PageText($form, [
                        $form->select('type', 'Тип страниц')->options($type),
                        $form->text('slug', 'Слаг')
                    ]);
                    break;
                case 'constructor':
                    $ext = new PageExtender\PageConstructor($form, [
                        $form->select('type', 'Тип страниц')->options($type),
                        $form->text('slug', 'Слаг')
                    ]);
                    break;
                case 'sizes':
                    $ext = new PageExtender\PageSize($form, [
                        $form->select('type', 'Тип страниц')->options($type),
                    ]);

                    break;
                default:
                    $ext = new PageExtender($form, [
                        $form->select('type', 'Тип страниц')->options($type)
                    ]);
                    break;
            }
        } else {
            $ext = new PageExtender($form, [
                $form->text('slug', 'Слаг'),
                $form->select('type', 'Тип страниц')->options($type)
            ]);
        }
        return $ext->form;

    }


/*    public function pageIndex(Form $form)
    {
        return $form->tab('dadsd', function (Form $form) {
        });

    }

    public function pageText(Form $form)
    {
        $form->tab('Текстовые блоки', function (Form $form) {
            $form->hasMany('texts', '', function (Form\NestedForm $form) {
                $form->text('title', 'Заголовок');
                $form->textarea('text', 'Текст')->attribute('style', 'resize: vertical;');
                $form->image('image', 'Картинка');
            });
        });
    }

    public function pageProduct(Form $form): Form
    {
        return $form->tab('dddd', function (Form $form) {
        });
    }*/


}
