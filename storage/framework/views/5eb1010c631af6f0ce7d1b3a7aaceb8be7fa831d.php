<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<?php $__env->startSection('content'); ?>






































<div class="container">
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
            <tr>

                <th scope="col" style=" font-family: 'Segoe UI Black';">TYPE</th>
                <th scope="col" style=" font-family: 'Segoe UI Black';">NUMBER</th>

            </tr>
            </thead>

                    <tbody >
                    <tr class="table-light col-1" >
                        <td style=" font-family: 'Segoe UI Semibold';"> Web Design </td>
                        <td style=" font-family: 'Segoe UI Semibold';"><?php echo e($countweb); ?>  </td>
                    </tr>
                    <tr class="table-light">
                        <td style=" font-family: 'Segoe UI Semibold';"> UX/UI </td>
                        <td style=" font-family: 'Segoe UI Semibold';"><?php echo e($countuxui); ?>  </td>
                    </tr>
                    <tr class="table-light">
                        <td style=" font-family: 'Segoe UI Semibold';"> Illustration </td>
                        <td style=" font-family: 'Segoe UI Semibold';"><?php echo e($countillustration); ?>  </td>
                    </tr>


                    </tbody>
        </table>
    </div>
</div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\workspace\resources\views/admin/adminToptag.blade.php ENDPATH**/ ?>