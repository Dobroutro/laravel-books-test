<?php $__env->startSection('title'); ?> Create Book <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class='col-lg-4 col-lg-offset-4'>


    
    <h1><i class='fa fa-book'></i> Add Book</h1>


    <?php echo e(Form::open(['role' => 'form', 'url' => '/books', 'files' => 'true'])); ?>


    <div class='form-group <?php if($errors->has('title')): ?> has-error <?php endif; ?>'>
        <?php echo e(Form::label('title', 'Book title')); ?>

        <?php echo e(Form::text('title', null, ['placeholder' => 'Book title', 'class' => 'form-control'])); ?>

        <?php if($errors->has('title')): ?>
            <div class='help-block'> <?php echo e($errors->first('title')); ?> </div> 
        <?php endif; ?>
    </div>
    <div class='form-group <?php if($errors->has('purchase_year')): ?> has-error <?php endif; ?>'>
        <?php echo e(Form::label('purchase_year', 'Purchase year')); ?>

        <?php echo e(Form::text('purchase_year', null, ['placeholder' => 'Purchase year', 'class' => 'form-control'])); ?>

        <?php if($errors->has('purchase_year')): ?>
            <div class='help-block'> <?php echo e($errors->first('purchase_year')); ?> </div> 
        <?php endif; ?>
    </div>
    <div class='form-group'>
        <?php echo e(Form::label('note', 'Note')); ?>

        <?php echo e(Form::text('note', null, ['placeholder' => 'Note', 'class' => 'form-control'])); ?>

    </div>

    <div class='form-group'>
        <?php echo e(Form::label('author_id', 'Author')); ?>

        <select name="author_id" class="form-control">
            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <option value="<?php echo e($author->id); ?>" ><?php echo e($author->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </select>
    </div>

    <div class='form-group  <?php if($errors->has('image')): ?> has-error <?php endif; ?>'>
        <?php echo e(Form::label('image', 'Image')); ?>

        <?php echo e(Form::file('image', array('class' => 'form-control'))); ?>    
        <?php if($errors->has('image')): ?>
            <div class='help-block'> <?php echo e($errors->first('image')); ?> </div> 
        <?php endif; ?>        
    </div>

    <div class='form-group'>
        <?php echo e(Form::submit('Save', ['class' => 'btn btn-primary'])); ?>

    </div>

    <?php echo e(Form::close()); ?>



</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>