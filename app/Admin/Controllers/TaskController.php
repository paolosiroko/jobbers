<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Lot;
use App\Models\Task;
use App\Models\User;

class TaskController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Tasks';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Task);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('task', __('task'))->sortable();
        $grid->column('slug', __('slug'))->sortable();
        $grid->column('summary', __('summary'))->sortable();
        $grid->column('description', __('description'))->sortable();
        $grid->column('status', __('status'))->sortable();
        $grid->column('is_complete', __('is_complete'))->sortable();
        $grid->column('lot_id', __('Lot'))->sortable();
        $grid->column('user_id', __('Jobber'))->sortable();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Task::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('task', __('task'));
        $show->field('slug', __('slug'));
        $show->field('summary', __('summary'));
        $show->field('description', __('description'));
        $show->field('status', __('status'));
        $show->field('is_complete', __('is_complete'));
        $show->field('lot_id', __('Lot '));
        $show->field('user_id', __('Jobber '));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Task);

        $form->display('id', __('ID'));
        $form->text('task', __('task'));
        $form->text('slug', __('slug'));
        $form->text('summary', __('summary'));
        $form->textarea('description', __('description'));
        $form->radio('status', __('status'))->options([
            'pending' => 'pending',
            'started' => 'started'
        ]);
        $form->switch('is_complete', __('is_complete'));
        $form->select('lot_id', 'Lot')
                ->options(Lot::pluck('Sr_no', 'id'));
        $form->select('user_id', 'Jobber')
                ->options(User::pluck('name', 'id'));
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
