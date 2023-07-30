<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Role;
use App\Models\User;

class JobberController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Jobbers';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('name'))->sortable();
        $grid->column('email', __('email'))->sortable();
        $grid->column('phone_number', __('phone_number'))->sortable();
        $grid->column('role_id', __('Role'))->sortable();
        $grid->column('password', __('password'))->sortable();
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('IDphone_number'));
        $show->field('name', __('name'));
        $show->field('email', __('email'));
        $show->field('phone_number', __('phone_number'));
        $show->field('role_id', __('Role '));
        $show->field('password', __('password'));
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
        $form = new Form(new User);

        $form->display('id', __('ID'));
        $form->text('name', __('name'));
        $form->email('email', __('mail'));
        $form->text('phone_number', __('phone_number'));
        $form->select('role_id', 'Role')
                ->options(Role::pluck('role', 'id'));
        $form->password('password', __('password'));
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
