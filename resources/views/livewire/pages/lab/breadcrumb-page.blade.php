<div class="container">
    <livewire:ui.lab.breadcrumbs.breadcrumb :trails="[
        [
            'url' => route('products.list'),
            'label' => 'Products',
        ],
        [
            'url' => route('products.list'),
            'label' => 'Item',
        ],
        [
            'url' => null,
            'label' => 'Item2',
        ],
    ]" />
</div>
