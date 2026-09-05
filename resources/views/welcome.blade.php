<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ReVibe - Seconda vita, prima scelta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body { margin: 0; padding: 0; background: #f7f8f5; overflow: hidden; font-family: 'Manrope', Helvetica, Arial, sans-serif; }
        * { box-sizing: border-box; }
        a { color: #0f5132; text-decoration: none; }
        a:hover { color: #146b42; }
        @keyframes rv-tile {
            0%   { opacity: 0; transform: translate3d(0,26px,0) scale(0.86); filter: blur(6px); }
            70%  { opacity: 1; filter: blur(0); }
            100% { opacity: 1; transform: translate3d(0,0,0) scale(1); filter: blur(0); }
        }
        @keyframes rv-wall {
            0%   { transform: scale(1.14) rotate(0.6deg); }
            100% { transform: scale(1) rotate(0deg); }
        }
        @keyframes rv-scrim { from { opacity: 0; } to { opacity: 1; } }
        @keyframes rv-mark {
            0%   { opacity: 0; transform: scale(1.28); }
            100% { opacity: 1; transform: scale(1); }
        }
        @keyframes rv-wave { from { clip-path: inset(0 100% 0 0); } to { clip-path: inset(0 0 0 0); } }
        @keyframes rv-up {
            from { opacity: 0; transform: translate3d(0,16px,0); }
            to   { opacity: 1; transform: translate3d(0,0,0); }
        }
        @keyframes rv-float {
            0%, 100% { transform: translate3d(0,0,0); }
            50%      { transform: translate3d(0,-7px,0); }
        }
        .rv-a { opacity: 0; animation-fill-mode: forwards; }
        @media (prefers-reduced-motion: reduce) {
            .rv-a, .rv-wall, .rv-float { animation: none !important; opacity: 1 !important; transform: none !important; filter: none !important; clip-path: none !important; }
        }
        
        .btn-cta {
            margin-top:38px;display:inline-flex;align-items:center;justify-content:center;height:58px;padding:0 clamp(28px,4vw,42px);background:#0f7a57;color:#ffffff;font-size:16.5px;font-weight:700;white-space:nowrap;border-radius:999px;box-shadow:0 10px 30px rgba(15,122,87,0.24);pointer-events:auto;transition:background 180ms ease,box-shadow 180ms ease,transform 180ms ease;animation:rv-up 700ms cubic-bezier(0.22,0.7,0.2,1) 2180ms forwards;
        }
        .btn-cta:hover {
            background:#0a5a40;color:#ffffff;transform:translateY(-2px);box-shadow:0 16px 40px rgba(10,90,64,0.34);
        }

        .btn-icon {
            display:inline-flex;align-items:center;justify-content:center;width:38px;height:38px;border:1px solid rgba(15,122,87,0.28);border-radius:999px;background:rgba(255,255,255,0.78);color:#3f4d45;font-family:Manrope,Helvetica,Arial,sans-serif;font-size:14px;cursor:pointer;transition:border-color 160ms ease,color 160ms ease;
        }
        .btn-icon:hover { border-color:#0f7a57;color:#0f7a57; }

        .btn-text {
            display:inline-flex;align-items:center;height:38px;padding:0 20px;border:1px solid rgba(15,122,87,0.28);border-radius:999px;background:rgba(255,255,255,0.78);font-family:Manrope,Helvetica,Arial,sans-serif;font-size:11.5px;font-weight:700;letter-spacing:0.18em;text-transform:uppercase;color:#3f4d45;cursor:pointer;transition:border-color 160ms ease,color 160ms ease;
        }
        .btn-text:hover { border-color:#0f7a57;color:#0f7a57; }
    </style>
</head>
<body>

@php
    $cells = [
      [1, 1, 1, 1, 'Poltrona', 'photo-1567538096630-e0c55bd6374c'],
      [2, 1, 1, 1, 'Sgabello', 'photo-1503602642458-232111445657'],
      [3, 1, 2, 1, 'Divano', 'photo-1540574163026-643ea20ade25'],
      [5, 1, 1, 1, 'Macchina fotografica', 'photo-1526170375885-4d8ecf77b99f'],
      [6, 1, 1, 1, 'Cornici', 'photo-1513519245088-0e12902e5a38'],
      [1, 2, 1, 2, 'Vaso e pianta', 'photo-1533090161767-e6ffed986c88'],
      [2, 2, 1, 1, 'Cuffie', 'photo-1505740420928-5e560c06d30e'],
      [3, 2, 1, 1, 'Sneaker', 'photo-1549298916-b41d501d3772'],
      [4, 2, 1, 1, 'Borsa in pelle', 'photo-1584917865442-de89df76afd3'],
      [5, 2, 2, 1, 'Divano con quadro', 'photo-1484101403633-562f891dc89a'],
      [2, 3, 2, 1, 'Divano verde', 'photo-1555041469-a586c61ea9bc'],
      [4, 3, 1, 1, 'Occhiali da sole', 'photo-1508296695146-257a814070b4'],
      [5, 3, 1, 1, 'Orologio', 'photo-1512436991641-6745cdb1723f'],
      [6, 3, 1, 2, 'Tavolino', 'photo-1519710164239-da123dc03ef4'],
      [1, 4, 1, 1, 'Console portatile', 'photo-1531525645387-7f14be1bdbbd'],
      [2, 4, 1, 1, 'Scarpe', 'photo-1560343090-f0409e92791a'],
      [3, 4, 1, 1, 'Sveglia', 'photo-1499933374294-4584851497cc'],
      [4, 4, 2, 1, 'Smartwatch', 'photo-1523275335684-37898b6baf30']
    ];
    $order = [8, 3, 12, 0, 15, 6, 17, 1, 10, 4, 13, 7, 16, 2, 11, 5, 14, 9];
@endphp

<div id="rv-root" style="position:relative;width:100%;height:100vh;overflow:hidden;background:#f7f8f5;color:#2f3a34;">

    <div class="rv-wall" style="position:absolute;inset:-2.5%;animation:rv-wall 2600ms cubic-bezier(0.16,0.8,0.14,1) 120ms both;transform-origin:50% 50%">
        <div style="position:absolute;inset:0;display:grid;grid-template-columns:repeat(6,1fr);grid-template-rows:repeat(4,1fr);gap:14px">
            @foreach($cells as $i => $c)
                @php
                    $step = array_search($i, $order);
                    $inDelay = 140 + $step * 62;
                    $anim = "rv-tile 820ms cubic-bezier(0.16,0.85,0.12,1) {$inDelay}ms forwards, rv-float " . (7 + ($i % 5)) . "s ease-in-out " . (2600 + $i * 130) . "ms infinite";
                @endphp
                <div class="rv-a rv-float" style="position:relative;grid-column:{{ $c[0] }} / span {{ $c[2] }};grid-row:{{ $c[1] }} / span {{ $c[3] }};border-radius:8px;overflow:hidden;box-shadow:0 6px 22px rgba(20,45,32,0.09);background:#e6ebe4 center/cover no-repeat;background-image:url('https://images.unsplash.com/{{ $c[5] }}?w=900&h=700&fit=crop&q=80');animation:{{ $anim }}">
                </div>
            @endforeach
        </div>
    </div>

    <div class="rv-a" style="position:absolute;inset:0;background:radial-gradient(ellipse 46% 44% at 50% 50%,rgba(247,248,245,0.99) 0%,rgba(247,248,245,0.96) 44%,rgba(247,248,245,0.62) 72%,rgba(247,248,245,0.24) 100%);animation:rv-scrim 900ms ease 900ms forwards;pointer-events:none"></div>
    <div class="rv-a" style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(247,248,245,0.9) 0%,rgba(247,248,245,0) 24%,rgba(247,248,245,0) 76%,rgba(247,248,245,0.9) 100%);animation:rv-scrim 900ms ease 900ms forwards;pointer-events:none"></div>

    <div style="position:relative;z-index:2;height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:0 32px;text-align:center;pointer-events:none">
        <div class="rv-a" style="font-size:12px;letter-spacing:0.28em;text-transform:uppercase;font-weight:700;color:#3f4d45;animation:rv-up 700ms cubic-bezier(0.22,0.7,0.2,1) 1500ms forwards">Seconda vita, prima scelta</div>
        <div style="margin-top:22px;display:flex;flex-direction:column;align-items:center;gap:10px">
            <div class="rv-a" style="display:flex;align-items:baseline;font-size:clamp(64px,11vw,148px);line-height:0.86;font-weight:800;letter-spacing:-0.05em;text-shadow:0 2px 30px rgba(247,248,245,0.9);animation:rv-mark 1000ms cubic-bezier(0.16,0.85,0.12,1) 1120ms forwards">
                <span style="color:#000000">Re</span><span style="color:#0f7a57">Vibe</span>
            </div>
            <svg class="rv-a" viewBox="-6 -14 252 44" style="width:clamp(190px,32vw,360px);height:auto;display:block;overflow:visible;opacity:1;animation:rv-wave 850ms cubic-bezier(0.3,0.8,0.2,1) 1780ms both" aria-hidden="true">
                <path d="M2 8 C 22 -2, 42 18, 62 8 S 102 -2, 122 8 S 162 18, 182 8 S 222 -2, 238 8" fill="none" stroke="#0f7a57" stroke-width="7" stroke-linecap="round"></path>
            </svg>
        </div>

        <p class="rv-a" style="margin:30px 0 0;max-width:520px;font-size:clamp(17px,1.55vw,21px);line-height:1.5;font-weight:600;color:#26312b;text-wrap:balance;animation:rv-up 700ms cubic-bezier(0.22,0.7,0.2,1) 1980ms forwards">Compra e vendi quello che non usi più</p>

        <!-- Re-route this to the actual homepage (now mapped to /home) -->
        <a class="rv-a btn-cta" href="{{ route('homepage') }}">Scopri gli annunci</a>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const root = document.getElementById('rv-root');

    function replayAnim() {
        if (!root) return;
        const nodes = Array.from(root.querySelectorAll('.rv-a, .rv-wall, .rv-float'));
        nodes.forEach(el => {
            if (el.dataset.rvAnim === undefined) {
                el.dataset.rvAnim = el.style.animation || getComputedStyle(el).animation || '';
            }
            el.style.animation = 'none';
        });
        // trigger reflow
        void root.offsetWidth;
        nodes.forEach(el => {
            el.style.animation = el.dataset.rvAnim;
        });
    }

    // Ricarica le animazioni se la pagina viene caricata dalla back/forward cache
    window.addEventListener('pageshow', (e) => {
        if (e.persisted) {
            replayAnim();
        }
    });
</script>

</body>
</html>
