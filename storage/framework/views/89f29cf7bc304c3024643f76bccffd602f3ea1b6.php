<div class="w-10/12 my-10 flex">
    <div class="w-5/12 rounded border p-2 mx-16">
        <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('tickets', [])->dom;
} elseif ($_instance->childHasBeenRendered('RVBtrpt')) {
    $componentId = $_instance->getRenderedChildComponentId('RVBtrpt');
    $componentTag = $_instance->getRenderedChildComponentTagName('RVBtrpt');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('RVBtrpt');
} else {
    $response = \Livewire\Livewire::mount('tickets', []);
    $dom = $response->dom;
    $_instance->logRenderedChild('RVBtrpt', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
    </div>
    <div class="w-7/12 mx-2 rounded border p-2">
        <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('comments', [])->dom;
} elseif ($_instance->childHasBeenRendered('K9mv3ph')) {
    $componentId = $_instance->getRenderedChildComponentId('K9mv3ph');
    $componentTag = $_instance->getRenderedChildComponentTagName('K9mv3ph');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('K9mv3ph');
} else {
    $response = \Livewire\Livewire::mount('comments', []);
    $dom = $response->dom;
    $_instance->logRenderedChild('K9mv3ph', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\sebi\Laravel72CRUD\resources\views/livewire/home.blade.php ENDPATH**/ ?>