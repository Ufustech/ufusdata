<x-filament-widgets::widget>
    <style>
        .as-wrap { padding: 0.5rem 0; background: var(--theme-surface-card); }

        .as-header-icon { width: 18px; height: 18px; color: var(--theme-brass); }
        .as-header-title {
            font-size: 0.8125rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 0.1em;
            color: var(--theme-slate);
        }

        /* ── Marquee ── */
        .as-marquee-wrap {
            overflow: hidden;
            width: 100%;
            background: var(--theme-brass-dim);
            border-top: 1px solid var(--theme-border-ornate);
            border-bottom: 1px solid var(--theme-border-ornate);
            padding: 7px 0;
            margin-bottom: 1.25rem;
            border-radius: var(--theme-radius);
        }

        .as-marquee-track {
            display: flex;
            width: max-content;
            animation: as-marquee 28s linear infinite;
        }

        .as-marquee-track:hover { animation-play-state: paused; }

        @keyframes as-marquee {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .as-marquee-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0 1.5rem;
            white-space: nowrap;
            font-size: 0.7rem;
            font-weight: bolder;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--theme-slate-dim);
        }

        .as-marquee-dot {
            width: 4px; height: 4px;
            border-radius: 50%;
            background: var(--theme-brass);
            flex-shrink: 0;
        }

        .as-marquee-icon {
            width: 13px; height: 13px;
            color: var(--theme-brass);
            flex-shrink: 0;
        }

        /* ── Account Summary Cards ── */
        .ac-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 640px) {
            .ac-grid { grid-template-columns: 1fr; }
        }

        .ac-card {
            border-radius: var(--theme-radius);
            padding: 20px 22px 18px;
            display: flex; flex-direction: column;
            justify-content: space-between;
            position: relative; overflow: hidden;
            min-height: 140px;
            box-shadow: var(--theme-shadow-md);
            border: 1px solid transparent;
        }

        .ac-card-primary {
            background: var(--theme-slate);
            border-top: 3px solid var(--theme-brass);
        }
        .dark .ac-card-primary { background: var(--theme-surface-deep); }

        .ac-card-gold {
            background: var(--theme-brass);
            border-top: 3px solid var(--theme-brass-light);
        }

        .ac-circle {
            position: absolute; border-radius: 50%; pointer-events: none;
        }
        .ac-circle-1 { width: 120px; height: 120px; top: -40px; right: -30px; }
        .ac-circle-2 { width: 80px; height: 80px; bottom: -25px; right: 50px; }

        .ac-card-primary .ac-circle { background: rgba(168,135,42,0.08); }
        .ac-card-gold    .ac-circle { background: rgba(255,255,255,0.08); }

        .ac-meta {
            font-size: 9px; letter-spacing: 0.12em;
            text-transform: uppercase; font-weight: 700;
        }
        .ac-card-primary .ac-meta { color: rgba(255,255,255,0.45); }
        .ac-card-gold    .ac-meta { color: rgba(255,255,255,0.55); }

        .ac-value {
            font-size: 1.4rem; font-weight: 800; letter-spacing: 0.01em; margin-top: 3px;
        }
        .ac-card-primary .ac-value { color: #ffffff; }
        .ac-card-gold    .ac-value { color: #ffffff; }

        .ac-acct {
            font-size: 11px; letter-spacing: 0.15em;
            font-family: monospace; font-weight: 600; margin-top: 2px;
        }
        .ac-card-primary .ac-acct { color: rgba(255,255,255,0.6); }
        .ac-card-gold    .ac-acct { color: rgba(255,255,255,0.7); }

        .ac-bank {
            font-size: 10px; font-weight: 700; letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .ac-card-primary .ac-bank { color: var(--theme-brass); }
        .ac-card-gold    .ac-bank { color: rgba(255,255,255,0.85); }

        .ac-chip {
            width: 30px; height: 22px; border-radius: 3px;
            display: flex; align-items: center; justify-content: center;
        }
        .ac-card-primary .ac-chip {
            background: linear-gradient(135deg, var(--theme-brass-light), var(--theme-brass));
        }
        .ac-card-gold .ac-chip {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
        }
        .ac-chip-inner { display: flex; flex-direction: column; gap: 3px; }
        .ac-chip-line { width: 18px; height: 1.5px; border-radius: 1px; }
        .ac-card-primary .ac-chip-line { background: rgba(0,0,0,0.25); }
        .ac-card-gold    .ac-chip-line { background: rgba(255,255,255,0.5); }

        /* ── Services Grid ── */
        .as-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        @media (max-width: 640px) {
            .as-grid { grid-template-columns: repeat(3, 1fr); gap: 8px; }
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
        }
        .as-card.active {
            border-top-color: var(--theme-brass);
            background: var(--theme-brass-dim);
            box-shadow: inset 0 0 0 1px var(--theme-border-ornate);
        }

        .as-icon-wrap {
            width: 48px; height: 48px; border-radius: 50%;
            background: var(--theme-brass-dim);
            border: 1px solid var(--theme-border-ornate);
            display: flex; align-items: center;
            justify-content: center; flex-shrink: 0;
        }
        .as-icon-wrap svg { width: 22px; height: 22px; color: var(--theme-brass); }

        @media (max-width: 640px) {
            .as-icon-wrap { width: 38px; height: 38px; }
            .as-icon-wrap svg { width: 18px; height: 18px; }
            .as-desc { display: none; }
            .as-label { font-size: 0.68rem; }
        }

        .as-label {
            font-size: 0.75rem; font-weight: 700;
            color: var(--theme-slate); text-align: center; line-height: 1.3;
        }
        .as-desc {
            font-size: 0.68rem; color: var(--theme-slate-muted);
            text-align: center; line-height: 1.3;
        }

        .dark .as-card { background: var(--theme-surface-card); border-color: var(--theme-border-mid); }
        .dark .as-card.active { background: var(--theme-brass-dim); }
    </style>
    {{-- ── Marquee ── --}}
    <div class="as-marquee-wrap">
        <div class="as-marquee-track">
            {{-- First copy --}}
            @foreach (\App\Filament\Data\ServiceList::all() as $service)
                <span class="as-marquee-item">
                        <x-dynamic-component
                            :component="$service['icon']"
                            class="as-marquee-icon"
                        />
                        {{ $service['label'] }}
                        <span class="as-marquee-dot"></span>
                    </span>
            @endforeach
            {{-- Duplicate for seamless loop --}}
            @foreach (\App\Filament\Data\ServiceList::all() as $service)
                <span class="as-marquee-item">
                        <x-dynamic-component
                            :component="$service['icon']"
                            class="as-marquee-icon"
                        />
                        {{ $service['label'] }}
                        <span class="as-marquee-dot"></span>
                    </span>
            @endforeach
        </div>
    </div>

    {{-- ── Account Cards ── --}}
    <div class="ac-grid">

        {{-- Card 1: Slate/Brass — Wallet --}}
        <div class="ac-card ac-card-primary">
            <div class="ac-circle ac-circle-1"></div>
            <div class="ac-circle ac-circle-2"></div>
            <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                <div class="ac-meta">Wallet Balance</div>
                <div class="ac-chip">
                    <div class="ac-chip-inner">
                        <div class="ac-chip-line"></div>
                        <div class="ac-chip-line"></div>
                        <div class="ac-chip-line"></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="ac-value">₦{{ number_format(auth()->user()->balance ?? 443, 2) }}</div>
                <div class="ac-acct">**** **** **** 4291</div>
            </div>
            <div class="ac-bank">Ufus Data — Main</div>
        </div>

        {{-- Card 2: Gold — Savings --}}
        <div class="ac-card ac-card-gold">
            <div class="ac-circle ac-circle-1"></div>
            <div class="ac-circle ac-circle-2"></div>
            <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                <div class="ac-meta">Savings Account</div>
                <div class="ac-chip">
                    <div class="ac-chip-inner">
                        <div class="ac-chip-line"></div>
                        <div class="ac-chip-line"></div>
                        <div class="ac-chip-line"></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="ac-value">₦0.00</div>
                <div class="ac-acct">3456 7890 1234 5678</div>
            </div>
            <div class="ac-bank">Ufus Data — Savings</div>
        </div>

    </div>

</x-filament-widgets::widget>
