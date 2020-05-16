<?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session ('success')); ?>






        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div>
<?php endif; ?>


<?php if(session('notfound')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session ('notfound')); ?>

        <button type="button" class="close" data-dismiss="alert">
            <span>x</span>
        </button>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\workspace\resources\views/inc/message.blade.php ENDPATH**/ ?>