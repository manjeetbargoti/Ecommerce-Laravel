<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Products
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/admin/product/create')); ?>" class="btn btn-success btn-sm"
                            title="Add New Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="<?php echo e(url('/admin/product')); ?>" accept-charset="UTF-8"
                            class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..."
                                    value="<?php echo e(request('search')); ?>">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <!-- <th>Initial Stock</th> -->
                                        <th>Current Stock</th>
                                        <!-- <th>Buying Price</th> -->
                                        <th>Selling Price</th>
                                        <th>Status</th>
                                        <th>Premium</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->product_name); ?></td>
                                        <td><?php echo e($item->product_category); ?></td>
                                        <td><?php echo e($item->quantity); ?></td>
                                        <!-- <td><?php echo e($item->initial_stock); ?></td> -->
                                        <td><?php echo e($item->current_stock); ?></td>
                                        <!-- <td><?php echo e($item->buying_price); ?></td> -->
                                        <td><?php echo e($item->selling_price); ?></td>
                                        <td><?php if($item->status == 1): ?><i class="fa text-success fa-check-square-o"></i><?php elseif($item->status == 0): ?> <i class="fa fa-window-close text-danger"></i> <?php endif; ?></td>
                                        <td><?php if($item->is_premium == 1): ?><i class="fa text-success fa-check-square-o"></i><?php elseif($item->is_premium == 0): ?> <i class="fa fa-window-close text-danger"></i> <?php endif; ?></td>
                                        <td>
                                            <a href="<?php echo e(url('/admin/product/' . $item->id)); ?>"
                                                title="View Product"><button class="btn btn-info btn-sm"><i
                                                        class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="<?php echo e(url('/admin/product/' . $item->id . '/edit')); ?>"
                                                title="Edit Product"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button></a>

                                            <form method="POST" action="<?php echo e(url('/admin/product' . '/' . $item->id)); ?>"
                                                accept-charset="UTF-8" style="display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete Product"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $products->appends(['search' =>
                                Request::get('search')])->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.panel_design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\Ecommerce-Laravel\resources\views/admin/products/index.blade.php ENDPATH**/ ?>