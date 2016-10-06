<?php $__env->startSection('title'); ?> Books <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('ok')): ?>
    <div class="col-lg-10 col-lg-offset-1">
        <?php echo $__env->make('partials/error', ['type' => 'success', 'message' => session('ok')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

<?php endif; ?>
<div class="col-lg-10 col-lg-offset-1">
 
    <div class="pull-right">
        <form method="POST" action="<?php echo e(URL::to('/books/search')); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="submit" name="Search" value="Search" class="btn btn-info"/>        
            <input type="text" name="search" value="<?php echo e($search); ?>" >
        </form>
    </div>    
</div>
<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-book"></i> Books Administration        
    </h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Purchase Year</th>
                    <th>Note</th>

                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($item->author->name); ?></td>
                    <td><?php echo e($item->title); ?></td>
                    <td><?php echo e($item->purchase_year); ?></td>
                    <td><?php echo e($item->note); ?></td>

                    <td>
                        <a href="/books/<?php echo e($item->id); ?>/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                        <form method="POST" action="<?php echo e(URL::to('/books')); ?>/<?php echo e($item->id); ?>">
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

    <a href="/books/create" class="btn btn-success">Add Book</a>

    <div class="pull-right link"><?php echo $links; ?></div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>