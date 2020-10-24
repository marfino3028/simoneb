<div class="my-10 flex justify-center w-full">
    <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
        <h1 class="text-center text-3xl my-5">Contact Us</h1>
        <hr>
    <div>
        <?php if(session()->has('message')): ?>
        <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
            <?php echo e(session('message')); ?>

        </div>
        <?php endif; ?>
    </div>
    <form wire:submit.prevent="submit">
         
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="name" class="p-2 rounded border shadow-sm w-full" wire:model="name"
                        placeholder="Name" />
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>        

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="email" class="p-2 rounded border shadow-sm w-full" wire:model="email"
                        placeholder="Please Enter Your Email" />
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div> 

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <textarea class="p-2 rounded border shadow-sm w-full" wire:model="body"
                        placeholder="How can i help you?" ></textarea>
                    <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

           <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <button type="submit" class="p-2 bg-green-800 text-white w-full rounded tracking-wider cursor-pointer">Submit</button>
                 </div>
             </div> 
</form>
</section>
</div>
<?php /**PATH C:\xampp\htdocs\sebi\Laravel72CRUD\resources\views/livewire/contact-us.blade.php ENDPATH**/ ?>