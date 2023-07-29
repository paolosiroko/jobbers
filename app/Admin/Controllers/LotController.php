<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Lot;
use App\Models\Task;
use App\Models\User;

class LotController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Lots';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Lot);

        $grid->column('id', __('Lot no.'))->sortable();
        $grid->column('Sr_no', __('Sr_no'))->sortable();
        $grid->column('slug', __('slug'))->sortable();
        $grid->column('Roll_no', __('Roll_no'))->sortable();
        $grid->column('Fabric_type', __('Fabric_type'))->sortable();
        $grid->column('Panna60', __('Panna60'))->sortable();
        $grid->column('Meter', __('Meter'))->sortable();
        $grid->column('size', __('Sizes'))->sortable();
        $grid->column('total', __('total'))->sortable();
        $grid->column('status', __('status'))->sortable();
        $grid->column('is_complete', __('is_complete'))->sortable();
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
        $show = new Show(Lot::findOrFail($id));

        $show->field('id', __('Lot no.'));
        $show->field('Sr_no', __('Sr_no'));
        $show->field('slug', __('slug'));
        $show->field('Roll_no', __('Roll_no'));
        $show->field('Fabric_type', __('Fabric_type'));
        $show->field('Panna60', __('Panna60'));
        $show->field('Meter', __('Meter'));
        $show->field('size', __('Sizes'));
        $show->field('total', __('total'));
        $show->field('status', __('status'));
        $show->field('is_complete', __('is_complete'));
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
        $form = new Form(new Lot);

        $form->display('id', __('Lot no.'));
        $form->number('Sr_no', __('Sr no'));
        $form->text('slug', __('slug'));
        $form->number('Roll_no', __('Roll_no'));
        $form->text('Fabric_type', __('Fabric_type'));
        $form->text('Panna60', __('Panna60'));
        $form->number('Meter', __('Meter'));
        $form->select('sizes[]', __('Sizes'))->options([
            '26' => '26',
            '28' => '28',
            '30' => '30',
            '32' => '32',
            '34' => '34',
            '36' => '36'
        ])->attribute('multiple', 'multiple');
        $form->number('total', __('total'));
        $form->radio('status', __('status'))->options([
            'pending' => 'pending',
            'started' => 'started'
        ]);
        $form->radio('is_complete', __('is_complete'))->options([
            'pending' => 'pending',
            'completed' => 'completed'
        ]);
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
