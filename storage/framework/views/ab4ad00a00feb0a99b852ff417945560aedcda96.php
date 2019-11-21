<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Create New Permission
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
                    <div class="card-header">Post <?php echo e($post->id); ?></div>
                    <div class="card-body">

                        <a href="<?php echo e(url('/admin/posts')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="<?php echo e(url('/admin/posts/' . $post->id . '/edit')); ?>" title="Edit Post"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        <?php echo Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/posts', $post->id],
                        'style' => 'display:inline'
                        ]); ?>

                        <?php echo Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete Post',
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
                                        <td><?php echo e($post->id); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Title </th>
                                        <td> <?php echo e($post->title); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Content </th>
                                        <td> <?php echo e($post->content); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Is Permission </th>
                                        <td> <?php echo e($post->is_permission); ?> </td>
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
<?php echo $__env->make('layouts.panel.panel_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\USER-MANAGEMENT\resources\views/admin/posts/show.blade.php ENDPATH**/ ?>