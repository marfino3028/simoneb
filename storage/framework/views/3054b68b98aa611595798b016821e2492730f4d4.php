<div>
    <h1 class="text-3xl">Comments</h1>
    <?php $__errorArgs = ['newComment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <div>
        <?php if(session()->has('message')): ?>
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
            <?php echo e(session('message')); ?>

        </div>
        <?php endif; ?>
    </div>

    <section>
        <?php if($image): ?>
        <img src=<?php echo e($image); ?> width="200" />
        <?php endif; ?>
        <input type="file" id="image" wire:change="$emit('fileChoosen')">
    </section>

    <form class="my-4 flex" wire:submit.prevent="addComment">
        <input type="text" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="What's in your mind."
            wire:model.debounce.500ms="newComment">
        
        <div class="py-2">
            <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">Add</button>
        </div>
    </form>
    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="rounded border shadow p-3 my-2">
        <div class="flex justify-between my-2">
            <div class="flex">
                <p class="font-bold text-lg"><?php echo e($comment->creator->name); ?></p>
                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold"><?php echo e($comment->created_at->diffForHumans()); ?>

                </p>
            </div>
            <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" onclick="confirm('Are you sure want to delete this record?') || event.stopImmediatePropagation()"
                wire:click="remove(<?php echo e($comment->id); ?>)"></i>
        </div>
        <p class="text-gray-800"><?php echo e($comment->body); ?></p>
        <?php if($comment->image): ?>
        <img src="<?php echo e($comment->imagePath); ?>" />
        <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($comments->links('pagination-links')); ?>

</div>

<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);

    })
</script><?php /**PATH C:\xampp\htdocs\sebi\Laravel72CRUD\resources\views/livewire/comments.blade.php ENDPATH**/ ?>