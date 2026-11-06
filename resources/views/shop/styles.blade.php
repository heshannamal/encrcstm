:root{--ec-navy:#33414a;--ec-red:#e70033;--ec-bg:#f5f6f7;--ec-line:#e1e5e8;--ec-text:#263640}
*{box-sizing:border-box}.ec-shell{font-family:'Hanken Grotesk',Arial,sans-serif;background:var(--ec-bg);color:var(--ec-text);min-height:100vh;display:flex;flex-direction:column}
.ec-header{position:sticky;top:0;z-index:100;background:var(--ec-navy);height:72px;display:flex;align-items:center;justify-content:space-between;padding:12px max(28px,5.2vw);gap:20px;box-shadow:0 5px 20px rgba(0,0,0,.08)}
.ec-brand img{width:175px;max-height:51px;object-fit:contain;filter:brightness(0) invert(1)}.ec-nav{display:flex;align-items:center;gap:24px;flex-wrap:wrap}
.ec-nav a,.ec-nav button{font-family:'Space Mono',monospace;letter-spacing:.07em;font-size:11px;color:#fff;text-transform:uppercase;text-decoration:none;background:none;border:0;cursor:pointer}.ec-nav .active,.ec-nav a:hover,.ec-nav button:hover{color:#ff6e89}
.ec-main{width:min(1240px,94%);margin:0 auto;padding:36px 0 75px;flex:1}.ec-title{font-family:Archivo,sans-serif;font-weight:900;text-transform:uppercase;font-size:clamp(30px,4.5vw,53px);letter-spacing:-.045em;margin:0 0 12px;color:var(--ec-navy)}
.ec-sub{color:#64717b;margin:0 0 30px}.ec-panel{background:white;border:1px solid var(--ec-line);border-radius:10px;padding:25px;box-shadow:0 10px 28px rgba(32,50,62,.035)}
.ec-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px}.ec-card{overflow:hidden;border:1px solid var(--ec-line);border-radius:9px;background:#fff;text-decoration:none;color:inherit;transition:transform .2s,box-shadow .2s}
.ec-card:hover{transform:translateY(-4px);box-shadow:0 14px 34px rgba(0,0,0,.09)}.ec-thumb{width:100%;aspect-ratio:3/4;object-fit:cover;object-position:center top;background:#eff1f2;display:block}
.ec-cardbody{padding:16px;min-height:105px;display:flex;flex-direction:column;gap:8px}.ec-cardname{font-size:15px;font-weight:650}.ec-price{font-family:'Space Mono',monospace;color:var(--ec-red);font-size:14px;font-weight:700}
.ec-category{margin:38px 0 16px;text-transform:uppercase;font-weight:850;font-family:Archivo,sans-serif;font-size:22px;border-bottom:1px solid var(--ec-line);padding-bottom:12px}
.ec-filters{display:grid;grid-template-columns:1.6fr repeat(4,1fr) auto;gap:12px;align-items:end;padding:20px;background:#fff;border:1px solid var(--ec-line);border-radius:10px;margin-bottom:25px}
.ec-filters label,.ec-field label{font-size:12px;color:#52616e;font-weight:700;display:block;margin-bottom:6px}.ec-input,.ec-select{width:100%;min-height:43px;padding:10px 12px;border:1px solid #cfd6db;border-radius:5px;background:#fff;color:var(--ec-text);font:inherit}
.ec-btn{display:inline-flex;align-items:center;justify-content:center;border:0;border-radius:5px;background:var(--ec-red);color:#fff;font-family:'Space Mono',monospace;font-weight:700;text-transform:uppercase;letter-spacing:.04em;font-size:12px;text-decoration:none;cursor:pointer;min-height:44px;padding:11px 19px}
.ec-btn:hover{filter:brightness(.92)}.ec-btn.dark{background:var(--ec-navy)}.ec-btn.light{background:#e8eaec;color:var(--ec-text)}.ec-btn:disabled{opacity:.55;cursor:not-allowed}
.ec-product{display:grid;grid-template-columns:46% 1fr;gap:35px;align-items:start}.ec-gallery{display:grid;grid-template-columns:70px minmax(0,1fr);gap:12px}.ec-gallery-main{width:100%;aspect-ratio:4/5;object-fit:contain;background:#f0f1f2;border-radius:8px}
.ec-thumbs{display:flex;flex-direction:column;gap:10px}.ec-thumbs button{border:1px solid #dedede;background:#fff;padding:2px;border-radius:5px;cursor:pointer}.ec-thumbs img{width:100%;aspect-ratio:1;object-fit:cover;display:block}
.ec-details h1{font-size:clamp(28px,3vw,40px);font-weight:600;line-height:1.16;margin:0 0 12px}.ec-details .ec-price{font-size:23px;margin:12px 0 22px}
.ec-field{margin-bottom:18px}.ec-fieldset{display:grid;grid-template-columns:1fr 1fr;gap:16px}.ec-two{display:grid;grid-template-columns:1.4fr 1fr;gap:24px}.ec-row{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:15px 0;border-bottom:1px solid var(--ec-line)}.ec-row:last-child{border-bottom:0}
.ec-cart-item{display:grid;grid-template-columns:90px 1fr auto;gap:18px;align-items:center}.ec-cart-item img{width:90px;height:100px;object-fit:cover;border-radius:6px;background:#f1f2f3}
.ec-flex{display:flex;gap:12px;align-items:center;flex-wrap:wrap}.ec-stack{display:flex;flex-direction:column;gap:16px}.ec-alert{padding:13px 16px;background:#fff3dd;border-left:4px solid #d68b16;margin:0 0 18px}.ec-alert.bad{background:#ffe9ed;border-color:#e70033}.ec-alert.good{background:#e9f7ec;border-color:#2a8a49}
.ec-muted{color:#697986}.ec-copy{line-height:1.8;color:#3b4c59}.ec-copy p{margin:8px 0}.ec-copy ul{padding-left:21px}
.ec-footer{background:var(--ec-navy);color:#fff;padding:24px max(25px,5vw);display:flex;align-items:center;justify-content:space-between;gap:15px;font-size:12px}.ec-footer a{color:#fff;text-decoration:none}
.ec-auth{max-width:510px;margin:30px auto}.ec-auth h1{margin-bottom:22px}.ec-summary{position:sticky;top:95px}.ec-empty{padding:45px 20px;text-align:center;background:#fff;border:1px solid var(--ec-line);border-radius:8px}
.ec-pill{font-family:'Space Mono',monospace;display:inline-flex;background:#edf0f2;color:#455861;padding:5px 8px;border-radius:4px;font-size:11px}
.ec-qty{width:82px!important}.ec-hide{display:none}
@media(max-width:980px){.ec-grid{grid-template-columns:repeat(3,minmax(0,1fr))}.ec-filters{grid-template-columns:repeat(3,1fr)}.ec-nav{gap:12px}}
@media(max-width:700px){.ec-header{height:auto;min-height:70px;flex-wrap:wrap;padding:12px 18px}.ec-brand img{width:145px}.ec-nav{gap:10px}.ec-nav a,.ec-nav button{font-size:10px}.ec-main{padding:24px 0 55px}.ec-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}.ec-filters{grid-template-columns:repeat(2,1fr)}.ec-product,.ec-two{grid-template-columns:1fr}.ec-gallery{grid-template-columns:54px minmax(0,1fr)}.ec-panel{padding:18px}.ec-fieldset{grid-template-columns:1fr}.ec-cart-item{grid-template-columns:70px 1fr;gap:10px}.ec-cart-item img{width:70px;height:88px}.ec-footer{flex-wrap:wrap}.ec-summary{position:static}}

/* Shopping navigation follows the approved Encore sport/home header. */
.ec-shell{--ec-navy:#34434d;--ec-red:#ed0036;--ec-bg:#f3f4f6}
.ec-header{height:70px;min-height:70px;padding:0 max(5.9vw,24px);background:#34434d;box-shadow:none;border-radius:0;z-index:500;gap:20px}
.ec-brand{display:flex;align-items:center;flex:0 0 auto}
.ec-brand img{width:142px;max-height:52px;filter:none}
.ec-nav{display:flex;align-items:center;justify-content:flex-end;gap:26px;flex-wrap:nowrap}
.ec-nav .ec-navlink,.ec-nav .ec-signout{font:700 11px/1 'Space Mono',monospace;letter-spacing:.12em;color:#eee;text-transform:uppercase;text-decoration:none;background:none;border:0;padding:9px 0;white-space:nowrap;cursor:pointer}
.ec-nav .ec-navlink:hover,.ec-nav .ec-navlink.active,.ec-nav .ec-signout:hover{color:#fff}
.ec-nav form{display:flex;margin:0}
.ec-nav .ec-navbtn{min-height:47px;padding:0 20px;border-radius:9px;display:inline-flex;align-items:center;justify-content:center;gap:12px;white-space:nowrap;text-decoration:none;text-transform:uppercase;font:700 11px/1 'Space Mono',monospace;letter-spacing:.12em;color:#fff;background:#405362;transition:background .18s}
.ec-nav .ec-navbtn:hover,.ec-nav .ec-navbtn.active{background:#506473;color:#fff}
.ec-nav .ec-start{background:#ed0036;padding:0 22px}
.ec-nav .ec-start:hover{background:#ca002d}
.ec-burger{display:none;width:42px;height:42px;border:1px solid #65717a;border-radius:6px;background:transparent;cursor:pointer;padding:10px}
.ec-burger span{display:block;height:2px;background:#fff;margin:5px 0}
@media(max-width:1150px){
 .ec-nav{gap:14px}
 .ec-nav .ec-navbtn{padding:0 12px}
 .ec-nav .ec-navlink,.ec-nav .ec-signout{font-size:10px}
}
@media(max-width:950px){
 .ec-header{height:70px;padding:0 24px;flex-wrap:nowrap}
 .ec-burger{display:block;margin-left:auto;flex:0 0 auto}
 .ec-nav{display:none;position:absolute;top:70px;left:0;right:0;background:#34434d;padding:18px 24px 24px;align-items:stretch;flex-direction:column;gap:10px;box-shadow:0 15px 22px rgba(0,0,0,.18)}
 .ec-nav.ec-open{display:flex}
 .ec-nav .ec-navlink,.ec-nav .ec-signout{display:block;padding:12px 4px;text-align:left}
 .ec-nav .ec-navbtn{justify-content:space-between;min-height:48px}
}

.ec-catalog-title{display:flex;align-items:center;gap:10px;flex-wrap:wrap;font-size:clamp(40px,5vw,67px);line-height:1.1}
.ec-catalog-script{font-family:'Allura',cursive;font-size:1.26em;font-weight:400;letter-spacing:-.015em;color:var(--ec-red);text-transform:none;line-height:.8}
.ec-card{border-radius:8px;box-shadow:none}
.ec-card:hover{border-color:var(--ec-red);transform:translateY(-2px)}
.ec-cardbody{padding:14px 16px;min-height:94px;gap:7px}
.ec-thumb{background:#f1f2f4;object-position:center top;object-fit:cover}
.ec-category{margin-top:42px;font-size:23px;color:#34434d}
.ec-filters{border-radius:7px}
.ec-panel{border-radius:8px}
@media(max-width:700px){.ec-catalog-title{font-size:clamp(34px,7vw,48px)}}

/* Reference-inspired catalog and product detail UI, scoped to new shop pages. */
.ec-store-top{padding:18px 0 14px}
.ec-store-heading{display:flex;align-items:center;justify-content:space-between;gap:18px;padding:6px 0 20px;border-bottom:1px solid var(--ec-line)}
.ec-store-heading>span:first-child{font-family:Archivo,sans-serif;font-weight:900;font-size:clamp(20px,2.5vw,29px);letter-spacing:-.05em}
.ec-store-heading em{font-family:Allura,cursive;font-size:1.45em;color:var(--ec-red);letter-spacing:0;font-weight:400}
.ec-store-heading>span:last-child{font:500 clamp(17px,2vw,23px)/1.2 'Hanken Grotesk',sans-serif;text-transform:uppercase;letter-spacing:.04em}
.ec-store-breadcrumb{font-size:12px;color:#5d6c76;padding:14px 0 4px}
.ec-store-breadcrumb a,.ec-product-breadcrumb a{color:#34434d;text-decoration:none}
.ec-store-filters{display:grid;grid-template-columns:minmax(160px,1.7fr) repeat(4,minmax(98px,1fr)) minmax(100px,1fr) auto;align-items:end;gap:12px;padding:14px 0 12px}
.ec-store-filters label{font-size:12px;font-weight:500;color:#6c7681}
.ec-store-filters .ec-input,.ec-store-filters .ec-select{min-height:39px;background:#fff;border:1px solid #e0e3e5;font-size:13px;padding:8px 10px}
.ec-store-filters .ec-btn{min-height:39px;padding:9px 15px}
.ec-catalog-results{display:flex;justify-content:flex-end;gap:20px;font-size:13px;color:#687783;border-top:1px solid var(--ec-line);padding:12px 0}
.ec-catalog-results a{color:#8c97a0;text-decoration:none}
.ec-catalog-section{margin:16px 0 30px}
.ec-category-toggle{width:100%;display:flex;justify-content:space-between;align-items:center;text-align:left;background:none;border:none;color:#34434d;border-bottom:1px solid #e4e7e9;font-family:'Hanken Grotesk',sans-serif;font-size:22px;font-weight:700;padding:9px 0 16px;cursor:pointer}
.ec-category-chevron{font-size:31px;line-height:.7;transition:transform .2s}
.ec-category-toggle[aria-expanded=false] .ec-category-chevron{transform:rotate(-90deg)}
.ec-product-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:14px;margin-top:16px}
.ec-product-grid[hidden]{display:none}
.ec-product-card{display:block;background:#fff;border:1px solid #e5e8eb;border-radius:8px;overflow:hidden;color:#263640;text-decoration:none;transition:border-color .2s,transform .2s}
.ec-product-card:hover{border-color:var(--ec-red);transform:translateY(-2px)}
.ec-product-photo{aspect-ratio:3/4;background:#f1f2f4;overflow:hidden}
.ec-product-photo img{display:block;width:100%;height:100%;object-fit:cover;object-position:center top}
.ec-product-caption{display:flex;align-items:flex-start;justify-content:space-between;gap:6px;padding:12px 13px 0}
.ec-product-name{font-size:15px;line-height:1.4;font-weight:500;flex:1}
.ec-product-cost{font-size:14px;color:#ed0036;font-weight:700;white-space:nowrap}
.ec-product-info{margin:5px 13px 15px;color:#98a1aa;font-size:10px;line-height:1.4}
.ec-product-breadcrumb{font-size:13px;padding:12px 0 20px;border-bottom:1px solid var(--ec-line);margin-bottom:25px;color:#626f79}
.ec-product-detail-wrap{display:grid;grid-template-columns:minmax(0,42%) minmax(0,1fr);gap:24px;align-items:start}
.ec-product-media{min-width:0}
.ec-product-gallery{display:grid;grid-template-columns:74px minmax(0,1fr);gap:16px}
.ec-gallery-thumbnails{display:flex;flex-direction:column;gap:10px}
.ec-thumb-button{background:#f0f1f2;border:3px solid transparent;border-radius:5px;padding:1px;cursor:pointer;overflow:hidden}
.ec-thumb-button.selected{border-color:#dfe4e7}
.ec-thumb-button img{display:block;width:100%;aspect-ratio:3/4;object-fit:cover;object-position:center top}
.ec-gallery-feature{background:#f2f3f4;border-radius:5px;overflow:hidden}
.ec-gallery-feature img{width:100%;aspect-ratio:4/5;object-fit:contain;object-position:center;display:block}
.ec-gallery-additional{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px;margin-top:14px}
.ec-gallery-additional button{border:0;background:#f2f3f4;padding:0;border-radius:5px;overflow:hidden;cursor:pointer}
.ec-gallery-additional img{width:100%;aspect-ratio:4/4.5;object-fit:cover;display:block}
.ec-detail-panel{background:white;border-radius:11px;padding:25px 24px 32px}
.ec-detail-panel h1{font-family:'Hanken Grotesk',sans-serif;font-size:clamp(27px,3vw,39px);line-height:1.1;font-weight:500;color:#161f44;margin:0 0 10px}
.ec-detail-number{font-size:16px;color:#45566a;margin:0 0 16px}
.ec-detail-price{font-size:23px;color:#172447;margin:0 0 19px}
.ec-detail-choice{margin:19px 0}
.ec-detail-choice strong{display:block;font-weight:500;font-size:14px;margin-bottom:9px;color:#5f6a76}
.ec-detail-choice strong:before{content:'•';color:#222;margin-right:7px}
.ec-chip-list{display:flex;gap:8px;flex-wrap:wrap}
.ec-chip{font-size:13px;border:1px solid #d5d9dc;border-radius:5px;padding:7px 11px;color:#263640}
.ec-inquire-btn{display:block;background:#34434d;color:#fff;text-decoration:none;text-align:center;font-size:16px;padding:12px 15px;border-radius:5px;box-shadow:0 2px 6px rgba(0,0,0,.14);margin:24px 0}
.ec-inquire-btn:hover{background:#405665;color:#fff}
.ec-detail-buy{border-top:1px solid #eef0f2;padding-top:18px}
.ec-detail-buy h2,.ec-fit-panel h2,.ec-detail-copy h2{font-size:15px;font-weight:600;color:#1c2844;margin:12px 0}
.ec-size-display{display:flex;flex-wrap:wrap;gap:10px;color:#71808d;font-size:12px;margin:9px 0 20px}
.ec-detail-buy .ec-fieldset{margin-bottom:12px}
.ec-stock-label{margin:6px 0;min-height:30px;font-size:13px;color:#70808c}
.ec-fit-panel{margin-top:23px;border-top:1px solid #edf0f2;padding-top:15px}
.ec-fit-track{height:7px;background:#e8e9ea;border-radius:9px;position:relative;margin:20px 8px 8px}
.ec-fit-indicator{position:absolute;left:48%;top:-2px;width:12%;height:11px;background:#171717;border-radius:9px}
.ec-fit-labels{display:flex;justify-content:space-between;gap:10px;color:#8995a0;font-size:12px}
.ec-detail-copy{border-top:1px solid #edf0f2;margin-top:26px;padding-top:18px;color:#243342;font-size:14px;line-height:1.85}
.ec-detail-copy h2{margin:15px 0 6px}
.ec-detail-copy div{overflow-wrap:anywhere;white-space:normal}
@media(max-width:1060px){.ec-store-filters{grid-template-columns:repeat(3,minmax(0,1fr))}.ec-filter-search{grid-column:span 2}.ec-product-detail-wrap{grid-template-columns:45% 1fr}}
@media(max-width:760px){.ec-product-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.ec-product-detail-wrap{grid-template-columns:1fr}.ec-detail-panel{padding:20px 16px}.ec-product-gallery{grid-template-columns:62px 1fr}}
@media(max-width:520px){.ec-store-heading{align-items:flex-start;flex-direction:column;gap:5px}.ec-store-filters{grid-template-columns:repeat(2,minmax(0,1fr))}.ec-filter-search{grid-column:span 2}.ec-product-grid{gap:9px}.ec-product-caption{padding:10px 9px 0}.ec-product-name,.ec-product-cost{font-size:12px}.ec-product-info{font-size:9px;margin:5px 9px 12px}.ec-category-toggle{font-size:19px}}
