<?php if($paginator->hasPages()): ?>
<ul class="flex justify-between">
    <!-- prev -->
    <?php if($paginator->onFirstPage()): ?>
    <li class="w-16 px-2 py-1 text-center rounded border bg-gray-200">Prev</li>
    <?php else: ?>
    <li class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="previousPage">Prev</li>
    <?php endif; ?>
    <!-- prev end -->

    <!-- numbers -->
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="flex">
        <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($page == $paginator->currentPage()): ?>
        <li class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-blue-500 text-white cursor-pointer" wire:click="gotoPage(<?php echo e($page); ?>)"><?php echo e($page); ?></li>
        <?php else: ?>
        <li class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="gotoPage(<?php echo e($page); ?>)"><?php echo e($page); ?></li>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- end numbers -->


    <!-- next  -->
    <?php if($paginator->hasMorePages()): ?>
    <li class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="nextPage">Next</li>
    <?php else: ?>
    <li class="w-16 px-2 py-1 text-center rounded border bg-gray-200">Next</li>
    <?php endif; ?>
    <!-- next end -->
</ul>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\sebi\Laravel72CRUD\resources\views/pagination-links.blade.php ENDPATH**/ ?>