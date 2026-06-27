<x-filament-widgets::widget>
    <div class="rounded-2xl p-5 flex items-center justify-between"
         style="background-color: #F97316;">

        {{-- Left: Label + Value --}}
        <div class="flex flex-col gap-1">
            <span class="text-sm font-semibold text-white opacity-80">
                Total Balance
            </span>
            <span class="text-4xl font-bold text-white">
                ₦{{ number_format(443, 2) }}
            </span>
        </div>

        {{-- Right: Icon + Buttons --}}
        <div class="flex flex-col items-end gap-3">

            {{-- Top-right icon --}}
            <x-heroicon-o-credit-card class="w-6 h-6 text-white opacity-70" />

            {{-- Action Buttons --}}
            <div class="flex gap-2">
                <a href="#"
                   class="flex items-center gap-1 bg-white text-orange-500 font-semibold text-sm px-4 py-2 rounded-full hover:bg-orange-50 transition">
                    <x-heroicon-o-plus-circle class="w-4 h-4" />
                    Fund Wallet
                </a>

                <a href="#"
                   class="flex items-center gap-1 bg-white text-orange-500 font-semibold text-sm px-4 py-2 rounded-full hover:bg-orange-50 transition">
                    <x-heroicon-o-arrow-trending-down class="w-4 h-4" />
                    Expenses
                </a>
            </div>
        </div>

    </div>
</x-filament-widgets::widget>
