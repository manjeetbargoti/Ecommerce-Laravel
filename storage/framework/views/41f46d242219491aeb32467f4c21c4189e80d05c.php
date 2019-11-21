<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Role > <?php echo e($role->name); ?>

                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Role > <?php echo e($role->name); ?></div>
                    <div class="card-body">

                        <a href="<?php echo e(url('/admin/user/role')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="<?php echo e(url('/admin/user/role/' . $role->id . '/edit')); ?>" title="Edit Role"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        <?php echo Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/user/role', $role->id],
                        'style' => 'display:inline'
                        ]); ?>

                        <?php echo Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete Role',
                        'onclick'=>'return confirm("Confirm delete?")'
                        )); ?>

                        <?php echo Form::close(); ?>

                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td><?php echo e($role->id); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> <?php echo e($role->name); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Permissions </th>
                                        <td> <?php echo e(implode(', ', $role->permissions->pluck('name')->toArray())); ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.panel_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/admin/role/show.blade.php ENDPATH**/ ?>