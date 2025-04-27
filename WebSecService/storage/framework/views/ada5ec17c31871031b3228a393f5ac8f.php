<?php $__env->startSection('title', 'Prime Numbers'); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('products_save', $product->id)); ?>" method="post">
<?php echo e(csrf_field()); ?>

    <?php echo e(csrf_field()); ?>

    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="alert alert-danger">
    <strong>Error!</strong> <?php echo e($error); ?>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
    <div class="row mb-2">
        <div class="col-6">
            <label for="model" class="form-label">Discount:</label>
            <input type="numeric" class="form-control" placeholder="Discount" name="Discount" required value="<?php echo e($product->Discount); ?>">
        </div>
       
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo e(old('stock', $product->stock ?? 0)); ?>">
        </div>
    </div>
 
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\GitHub\WebSec230105042\WebSecService\resources\views/products/edit.blade.php ENDPATH**/ ?>