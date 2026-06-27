<x-filament-widgets::widget>
    <style>
        .as-wrap { padding: 0.5rem 0; background: var(--theme-surface-card); }

        .as-header-icon { width: 18px; height: 18px; color: var(--theme-brass); }
        .as-header-title {
            font-size: 0.8125rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--theme-slate);
        }

        .as-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .as-card {
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            gap: 8px; padding: 1.1rem 0.75rem;
            border-radius: var(--theme-radius);
            border: 1px solid var(--theme-border-mid);
            border-top: 2px solid var(--theme-border-heavy);
            background: var(--theme-surface-card);
            text-decoration: none; cursor: pointer;
            transition: all var(--theme-transition);
            position: relative;
        }
        .as-card:hover {
            border-top-color: var(--theme-brass);
            box-shadow: var(--theme-shadow-md);
            background: var(--theme-surface-card);
        }
        .as-card.active {
            border-top-color: var(--theme-brass);
            background: var(--theme-brass-dim);
            box-shadow: inset 0 0 0 1px var(--theme-border-ornate);
        }

        .as-icon-wrap {
            width: 48px; height: 48px;
            border-radius: 50%;
            background: var(--theme-brass-dim);
            border: 1px solid var(--theme-border-ornate);
            display: flex; align-items: center;
            justify-content: center; flex-shrink: 0;
        }
        .as-icon-wrap svg { width: 22px; height: 22px; color: var(--theme-brass); }

        .as-label {
            font-size: 0.75rem; font-weight: 700;
            color: var(--theme-slate);
            text-align: center; line-height: 1.3;
        }
        .as-desc {
            font-size: 0.68rem;
            color: var(--theme-slate-muted);
            text-align: center; line-height: 1.3;
        }

        .dark .as-card {
            background: var(--theme-surface-card);
            border-color: var(--theme-border-mid);
        }
        .dark .as-card:hover {
            background: var(--theme-surface-card);
        }
        .dark .as-card.active {
            background: var(--theme-brass-dim);
        }
    </style>

    <div class="as-wrap">

        {{-- Header --}}
        <div style="display:flex; align-items:center; gap:8px; margin-bottom:1rem;
                    padding-bottom:0.625rem; border-bottom:1px solid var(--theme-border-ornate);">
            <x-heroicon-o-squares-2x2 class="as-header-icon" />
            <span class="as-header-title">All Services</span>
        </div>

        {{-- Grid --}}
        <div class="as-grid">
            @foreach ($this->getServices() as $service)
                <a href="{{ $service['route'] }}"
                   class="as-card {{ isset($service['active']) && $service['active'] ? 'active' : '' }}"
                >
                    <div class="as-icon-wrap">
                        <x-dynamic-component :component="$service['icon']" />
                    </div>
                    <span class="as-label">{{ $service['label'] }}</span>
                    <span class="as-desc">{{ $service['desc'] }}</span>
                </a>
            @endforeach
        </div>

    </div>
</x-filament-widgets::widget>
