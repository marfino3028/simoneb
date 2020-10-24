<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/lightbox.css')); ?>">
    
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo \Livewire\Livewire::scripts(); ?>


    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lightbox-plus-jquery.min.js')); ?>"></script>    
</head>

<body class="flex flex-wrap justify-center">
    <div class="flex w-full px-4 bg-blue-900 text-white fixed">
        <a class="mx-3 py-4" href="/">Home</a>
        <a class="mx-3 py-4" href="/about">About Us</a>
        <a class="mx-3 py-4" href="/services">Services</a>
        <a class="mx-3 py-4" href="/contact-us">Contact Us</a>       
        <?php if(auth()->guard()->check()): ?>
         <a class="mx-3 py-4" href="/userlist">User Lists</a>
         <a class="mx-3 py-4" href="/album">Album</a>
        <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('logout', [])->dom;
} elseif ($_instance->childHasBeenRendered('jcL3sFN')) {
    $componentId = $_instance->getRenderedChildComponentId('jcL3sFN');
    $componentTag = $_instance->getRenderedChildComponentTagName('jcL3sFN');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jcL3sFN');
} else {
    $response = \Livewire\Livewire::mount('logout', []);
    $dom = $response->dom;
    $_instance->logRenderedChild('jcL3sFN', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
        <div class="py-4">
            <a class="mx-3" href="/login">Login</a>
            <a class="mx-3" href="/register">Register</a>
        </div>
        <?php endif; ?>
    </div>
    <div class="my-10 w-full justify-center">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\sebi\Laravel72CRUD\resources\views/layouts/app.blade.php ENDPATH**/ ?>