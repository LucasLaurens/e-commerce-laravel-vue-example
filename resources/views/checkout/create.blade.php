<x-app-layout>
    <x-slot name="header">
        Checkout
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl flex justify-center mx-auto sm:px-6 lg:px-8">
            <stripe-checkout></stripe-checkout>
        </div>
    </div>
</x-app-layout>
