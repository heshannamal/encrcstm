
/* Sport components extend the original Encore typography and colors. */
.sport-kit{background:#f6f7f8;color:#344049}
.sport-lead{font-size:clamp(16px,1.8vw,20px);max-width:700px;line-height:1.65;margin:10px 0 36px}
.sport-steps{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:20px;margin:34px 0 40px}
.sport-step{padding:30px;background:#fff;border:1px solid #e5e8eb;min-height:190px}
.sport-step>span{font-family:var(--mono);font-size:12px;color:#e70033;letter-spacing:.12em}
.sport-step h3{font-family:var(--disp);font-weight:800;font-size:clamp(20px,2vw,28px);margin:16px 0 10px}
.sport-step p{color:#65717a;line-height:1.6;margin:0}
.sport-catalog{background:#fff;color:#344049}
.sport-filters{display:flex;align-items:end;flex-wrap:wrap;gap:14px;margin:28px 0 36px}
.sport-filters label{display:flex;flex:1;min-width:150px;flex-direction:column;gap:8px;font:700 11px var(--mono);text-transform:uppercase;letter-spacing:.08em}
.sport-filters input,.sport-filters select{width:100%;font:500 14px var(--body);height:46px;padding:0 12px;border:1px solid #ccd1d6;border-radius:3px;background:#fff;color:#344049}
.sport-product-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px}
.sport-product{border:1px solid #e4e7e9;min-width:0;background:#fff;transition:transform .25s ease,box-shadow .25s ease}
.sport-product:hover{transform:translateY(-5px);box-shadow:0 18px 34px rgba(15,25,35,.08)}
.sport-product-link{display:block;color:inherit;text-decoration:none;height:100%}
.sport-product-image{height:280px;display:flex;justify-content:center;align-items:center;background:#f3f4f5;overflow:hidden}
.sport-product-image img{width:100%;height:100%;object-fit:contain;transition:transform .4s ease}
.sport-product:hover img{transform:scale(1.04)}
.sport-product-placeholder{font:700 12px var(--mono);letter-spacing:.18em;color:#84909b;text-transform:uppercase}
.sport-product-copy{padding:18px}
.sport-product-copy h3{font:800 19px/1.28 var(--disp);margin:0 0 10px}
.sport-product-copy>span{display:block;margin-top:8px}
.sport-product-view{font:700 11px var(--mono);color:#e70033;text-transform:uppercase;letter-spacing:.09em}
.sport-empty{padding:45px 25px;background:#f7f8f9;text-align:center}
.sport-empty h3{font:800 24px var(--disp);margin:0 0 10px}
.sport-empty p{font:400 15px/1.6 var(--body);color:#66717b}
@media(max-width:1000px){.sport-product-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
@media(max-width:720px){.sport-steps{grid-template-columns:1fr}.sport-product-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.sport-product-image{height:220px}.sport-filters label{min-width:100%}}
@media(max-width:420px){.sport-product-grid{grid-template-columns:1fr}.sport-product-image{height:300px}}
@media(prefers-reduced-motion:reduce){.sport-product,.sport-product-image img{transition:none}}
