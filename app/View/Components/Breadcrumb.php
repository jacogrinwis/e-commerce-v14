<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

class Breadcrumb extends Component
{
    public array $segments;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $currentRoute = Route::current();
        $routeName = $currentRoute->getName();

        $this->segments = match ($routeName) {
            'home' => [],
            'blog' => [[
                'label' => 'Blog',
                'url' => null
            ]],
            'about' => [[
                'label' => 'About',
                'url' => null
            ]],
            'contact' => [[
                'label' => 'Contact',
                'url' => null
            ]],
            // 'products.list' => [[
            //     'label' => 'Products',
            //     'url' => null
            // ]],
            'products.list' => array_merge(
                [[
                    'label' => 'Products',
                    'url' => route('products.list')
                ]],
                request()->has('category') ? [[
                    'label' => ucfirst(request()->query('category')),
                    'url' => route('products.list', ['category' => request()->query('category')])
                ]] : []
            ),
            'products.detail' => [
                [
                    'label' => 'Products',
                    'url' => route('products.list')
                ],
                [
                    'label' => $currentRoute->parameter('category')->name,
                    'url' => route('products.list', ['category' => $currentRoute->parameter('category')->slug])
                ],
                [
                    'label' => $currentRoute->parameter('product')->name,
                    'url' => null
                ]
            ],
            'account.dashboard' => [
                [
                    'label' => 'Account',
                    'url' => route('account.dashboard')
                ],
                [
                    'label' => 'Overzicht',
                    'url' => null
                ]
            ],
            'account.favorites' => [
                [
                    'label' => 'Account',
                    'url' => route('account.dashboard')
                ],
                [
                    'label' => 'Favorites',
                    'url' => null
                ]
            ],
            'account.orders' => [
                [
                    'label' => 'Account',
                    'url' => route('account.dashboard')
                ],
                [
                    'label' => 'Orders',
                    'url' => null
                ]
            ],
            'account.reviews' => [
                [
                    'label' => 'Account',
                    'url' => route('account.dashboard')
                ],
                [
                    'label' => 'Reviews',
                    'url' => null
                ]
            ],
            'account.details' => [
                [
                    'label' => 'Account',
                    'url' => route('account.dashboard')
                ],
                [
                    'label' => 'Details',
                    'url' => null
                ]
            ],
            default => []
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
