<div>
    <h1 class="text-3xl">Posts</h1>
    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="rounded border shadow p-3 my-2 <?php echo e($active == $ticket->id ? 'bg-green-200':''); ?>"
        wire:click="$emit('ticketSelected',<?php echo e($ticket->id); ?>)">
        <p class="text-gray-800"><?php echo e($ticket->question); ?></p>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\xampp\htdocs\sebi\Laravel72CRUD\resources\views/livewire/tickets.blade.php ENDPATH**/ ?>