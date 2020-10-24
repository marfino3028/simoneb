<div class="my-10 flex justify-center w-full">
    <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
        <h1 class="text-center text-3xl my-5">Login Time</h1>
        <hr>
        <form class="my-4" wire:submit.prevent="submit">
            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <input type="email" class="p-2 rounded border shadow-sm w-full" placeholder="Email"
                        wire:model="form.email" />
                    <?php $__errorArgs = ['form.email'];
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
                    <input type="password" class="p-2 rounded border shadow-sm w-full" placeholder="Password"
                        wire:model="form.password" />
                    <?php $__errorArgs = ['form.password'];
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
                    <input type="submit" value="Login"
                        class="p-2 bg-gray-800 text-white w-full rounded tracking-wider cursor-pointer" />
                </div>
            </div>
        </form>
    </section>
</div><?php /**PATH C:\xampp\htdocs\sebi\Laravel72CRUD\resources\views/livewire/login.blade.php ENDPATH**/ ?>