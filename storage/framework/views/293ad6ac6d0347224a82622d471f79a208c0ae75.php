<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Users
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">User (<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>)</div>
                    <div class="card-body">

                        <a href="<?php echo e(url('/admin/user')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="<?php echo e(url('/admin/user/' . $user->id . '/edit')); ?>" title="Edit user"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        <?php echo Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/user', $user->id],
                        'style' => 'display:inline'
                        ]); ?>

                        <?php echo Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete user',
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
                                        <td><?php echo e($user->id); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td><?php echo e($user->title); ?> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> (<?php echo e($user->username); ?>)</td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> <?php echo e($user->phone); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td> <?php echo e($user->email); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Role </th>
                                        <td> <?php echo e(implode(', ', $user->getRoleNames()->toArray())); ?> </td>
                                    </tr>
                                    <?php if($user->lawyerlevel): ?>
                                    <tr>
                                        <th> Lawyer Level </th>
                                        <td> <?php echo e($user->lawyerlevel); ?> </td>
                                    </tr>
                                    <?php endif; ?>
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
<?php echo $__env->make('layouts.panel.panel_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\New-Ecom\resources\views/admin/user/show.blade.php ENDPATH**/ ?>