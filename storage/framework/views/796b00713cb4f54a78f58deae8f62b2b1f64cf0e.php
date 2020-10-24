<?php $__env->startSection($section); ?>
    <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount($component, $componentParameters)->dom;
} elseif ($_instance->childHasBeenRendered('Qiis8cT')) {
    $componentId = $_instance->getRenderedChildComponentId('Qiis8cT');
    $componentTag = $_instance->getRenderedChildComponentTagName('Qiis8cT');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Qiis8cT');
} else {
    $response = \Livewire\Livewire::mount($component, $componentParameters);
    $dom = $response->dom;
    $_instance->logRenderedChild('Qiis8cT', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sebi\Laravel72CRUD\vendor\livewire\livewire\src\Macros/livewire-view.blade.php ENDPATH**/ ?>