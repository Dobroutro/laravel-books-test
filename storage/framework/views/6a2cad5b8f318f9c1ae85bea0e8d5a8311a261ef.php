<?php $__env->startSection('title'); ?> Authors <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('ok')): ?>
    <div class="col-lg-10 col-lg-offset-1">
    <?php echo $__env->make('partials/error', ['type' => 'success', 'message' => session('ok')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

<?php endif; ?>
<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-users"></i> Authors Administration 

        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
    </h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Name</th>
                    <th width="40%">Note</th>
                    <th>Books Count</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->note); ?></td>
                    <td><?php echo e($item->books->count()); ?></td>
                    <td>
                        <a href="/authors/<?php echo e($item->id); ?>/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        <form method="POST" action="<?php echo e(URL::to('/authors')); ?>/<?php echo e($item->id); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" name="Delete" value="Delete" class="btn btn-danger"/>
                        </form>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>

        </table>
    </div>

    <a href="/authors/create" class="btn btn-success">Add Author</a>

    <div class="pull-right link"><?php echo $links; ?></div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>