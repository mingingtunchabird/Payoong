<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<?php $__env->startSection('content'); ?>








        <h2 style="float: top;" class="text-center"> All Artwork : <?php echo e($counts); ?></h2>

    <?php if(count($todos)>0): ?>
        <div class="container-fluid m-4">
            <div class="row">

                <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-3">
                        <div class="card" style="width: 27rem;">
                            <img class="card-img-top" src="<?php echo e(url('uploads/'.$todo->file_name)); ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-text"><?php echo e($todo->title); ?></h4>
                                <p class="card-text"><?php echo e($todo->about); ?></p>
                                <p class="card-text"> @ <?php echo e($todo->type); ?></p>


                                <form action="<?php echo e(url('/todo/'.$todo->id)); ?>" method="post" form="form-delete">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-outline-danger" style="float: right;" type="submit" onclick="confirm_delete()">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
            </div>

        </div>






























        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script>
            function confirm_delete() {

                var confirm = window.confirm('ยืนยันการลบ ?');
                if (confirm) {
                    document.getElementById('form-delete').submit();
                }
            }
        </script>
        </body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\workspace\resources\views/admin/adminHome.blade.php ENDPATH**/ ?>