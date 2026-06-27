<x-filament-widgets::widget>
    <style>
        .cc-card {
            width: 100%; max-width: 420px;
            height: 210px;
            border-radius: var(--theme-radius);
            background: var(--theme-slate);
            padding: 24px 28px 22px;
            display: flex; flex-direction: column;
            justify-content: space-between;
            position: relative; overflow: hidden;
            border-top: 3px solid var(--theme-brass);
            box-shadow: var(--theme-shadow-lg);
            margin: 0 auto;
        }
        .dark .cc-card { background: var(--theme-surface-deep); }

        .cc-circle1 {
            position: absolute; width: 200px; height: 200px;
            border-radius: 50%; background: rgba(168,135,42,0.07);
            top: -70px; right: -50px; pointer-events: none;
        }
        .cc-circle2 {
            position: absolute; width: 150px; height: 150px;
            border-radius: 50%; background: rgba(168,135,42,0.04);
            bottom: -50px; right: 60px; pointer-events: none;
        }

        .cc-chip {
            width: 36px; height: 26px;
            border-radius: 3px;
            background: linear-gradient(135deg, var(--theme-brass-light), var(--theme-brass));
            display: flex; align-items: center; justify-content: center;
        }
        .cc-chip-inner { display: flex; flex-direction: column; gap: 3px; }
        .cc-chip-line { width: 20px; height: 1.5px; background: rgba(0,0,0,0.25); border-radius: 1px; }

        .cc-meta { font-size: 9px; color: rgba(255,255,255,0.45); letter-spacing: 0.12em; text-transform: uppercase; }
        .cc-balance { font-size: 28px; font-weight: 800; color: #fff; letter-spacing: 0.01em; margin-top: 2px; }
        .cc-number { font-size: 12px; color: rgba(255,255,255,0.6); letter-spacing: 0.18em; font-family: monospace; margin-top: 2px; }
        .cc-holder { font-size: 11px; color: rgba(255,255,255,0.8); letter-spacing: 0.06em; margin-top: 2px; font-weight: 600; }

        .cc-actions {
            display: flex; gap: 10px;
            justify-content: center;
            margin-top: 14px;
        }
        .cc-btn {
            display: inline-flex; align-items: center; gap: 5px;
            background: var(--theme-brass);
            color: #fff; font-size: 0.78rem; font-weight: 700;
            padding: 7px 16px; border-radius: var(--theme-radius);
            text-decoration: none; border: 1px solid var(--theme-brass-hover);
            letter-spacing: 0.02em;
            box-shadow: 0 1px 3px rgba(0,0,0,0.15), inset 0 1px 0 rgba(255,255,255,0.15);
            transition: all var(--theme-transition);
        }
        .cc-btn:hover { background: var(--theme-brass-hover); }
        .cc-btn svg { width: 13px; height: 13px; }

        .cc-btn-outline {
            background: transparent;
            border: 1px solid var(--theme-border-ornate);
            color: var(--theme-brass-light);
            box-shadow: none;
        }
        .cc-btn-outline:hover {
            background: var(--theme-brass-dim);
            border-color: var(--theme-brass);
        }
    </style>

    {{-- Credit Card --}}
    <div class="cc-card">
        <div class="cc-circle1"></div>
        <div class="cc-circle2"></div>

        {{-- Top: brand + chip --}}
        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
            <span style="font-size:12px; font-weight:800; color:var(--theme-brass);
                         letter-spacing:0.1em; text-transform:uppercase;">
                Ufus Data
            </span>
            <div class="cc-chip">
                <div class="cc-chip-inner">
                    <div class="cc-chip-line"></div>
                    <div class="cc-chip-line"></div>
                    <div class="cc-chip-line"></div>
                </div>
            </div>
        </div>

        {{-- Middle: balance --}}
        <div>
            <div class="cc-meta">Total Balance</div>
            <div class="cc-balance">
                ₦{{ number_format(auth()->user()->balance ?? 443, 2) }}
            </div>
        </div>

        {{-- Bottom: number + holder --}}
        <div style="display:flex; justify-content:space-between; align-items:flex-end;">
            <div>
                <div class="cc-meta">Card Number</div>
                <div class="cc-number">**** **** **** 4291</div>
            </div>
            <div style="text-align:right;">
                <div class="cc-meta">Card Holder</div>
                <div class="cc-holder">
                    {{ strtoupper(auth()->user()->name ?? 'USER') }}
                </div>
            </div>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="cc-actions">
        <a href="#" class="cc-btn">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
            </svg>
            Fund Wallet
        </a>
        <a href="#" class="cc-btn cc-btn-outline">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0
                         0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
            </svg>
            Expenses
        </a>
    </div>

</x-filament-widgets::widget>
