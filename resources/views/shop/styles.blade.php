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

.ec-store-heading h1{margin:0;color:#34434d;font-family:Archivo,sans-serif;font-weight:900;font-size:clamp(27px,3.5vw,45px);letter-spacing:-.045em}
.ec-store-heading h1 em{font:400 1.25em/.9 Allura,cursive;text-transform:none;letter-spacing:0;color:#ed0036}
.ec-store-heading>span:last-child{font:700 11px/1.4 'Space Mono',monospace;letter-spacing:.12em;color:#64717b}
.ec-shop-footer{background:rgba(51, 63, 72, .9);border-top:1px solid #e4e7e9;padding:36px max(5vw,25px);display:grid;grid-template-columns:1fr 1.6fr 1fr;gap:22px;align-items:start}
.ec-shop-footer-col{display:flex;flex-direction:column;align-items:flex-start;gap:10px;color:White;font-size:13px}
.ec-shop-footer-col h3{font-size:19px;color:#33414a;font-weight:500;margin:0 0 3px}
.ec-shop-footer-col a{color:White;text-decoration:none}
.ec-shop-footer-col a:hover{color:#ed0036}
.ec-shop-footer-col p{margin:0;line-height:1.7}
.ec-shop-footer-center{text-align:center;border-inline:1px solid #e4e7e9;padding:0 22px;color:#657483}
.ec-shop-footer-center img{width:min(230px,90%);height:45px;object-fit:contain}
.ec-shop-footer-center p{margin:9px 0 17px}
.ec-shop-footer-center small{color:#a4aeb7}
@media(max-width:700px){.ec-shop-footer{grid-template-columns:1fr 1fr}.ec-shop-footer-center{grid-column:1 / -1;grid-row:2;border:0;border-top:1px solid #e4e7e9;padding-top:23px}.ec-store-heading>span:last-child{font-size:9px}}

/* Compact reference-inspired apparel catalog, retaining the approved dark navigation. */
.ec-shell:has(.ec-store-reference){background:#f7f8f9}
.ec-shell:has(.ec-store-reference) .ec-main{width:min(1370px,96%);padding-top:0}
.ec-store-reference{background:#fff;margin:0 calc(-2.08%);padding:0 2.08% 8px;border-bottom:1px solid #e5e9ec}
.ec-catalog-toolbar{min-height:82px;display:flex;align-items:center;justify-content:space-between;gap:20px;border-bottom:1px solid #e7e9ed}
.ec-catalog-toolbar-brand{font:900 24px/1.15 Archivo,Arial,sans-serif;letter-spacing:-.05em;color:#26343d}
.ec-catalog-toolbar-brand span{font:400 1.55em/.75 Allura,cursive;letter-spacing:0;color:#e70033}
.ec-catalog-toolbar-title{font-size:21px;letter-spacing:.08em;color:#34434d;font-weight:500;white-space:nowrap}
.ec-catalog-filterbar{display:grid;grid-template-columns:130px 1fr;align-items:start;column-gap:23px;padding-top:10px}
.ec-store-reference .ec-store-breadcrumb{font-size:12px;white-space:nowrap;padding:21px 0 0}
.ec-store-reference .ec-store-filters{display:grid;grid-template-columns:minmax(115px,1.15fr) repeat(4,minmax(100px,1fr)) minmax(90px,.8fr) auto;column-gap:12px;row-gap:8px;padding:0;align-items:end}
.ec-store-reference .ec-store-filters .ec-field label{font-size:12px;color:#6c7681;margin-bottom:5px;font-weight:500}
.ec-store-reference .ec-store-filters .ec-input,.ec-store-reference .ec-store-filters .ec-select{background:#f6f7f8;border:1px solid #e5e8eb;box-shadow:none;min-height:36px;border-radius:4px;font-size:12px;color:#475660;padding:7px 9px}
.ec-store-reference .ec-store-filters .ec-input:focus,.ec-store-reference .ec-store-filters .ec-select:focus{outline:2px solid rgba(231,0,51,.25);outline-offset:1px}
.ec-filter-apply{background:#34434d;color:#fff;border:0;border-radius:5px;padding:0 14px;height:36px;font:700 11px 'Space Mono',monospace;letter-spacing:.07em;text-transform:uppercase;cursor:pointer}
.ec-filter-apply:hover{background:#475b68}
.ec-store-reference .ec-catalog-results{grid-column:2;justify-content:flex-end;gap:22px;border:0;padding:5px 0 2px;font-size:12px}
.ec-catalog-section{margin:8px 0 31px}
.ec-category-toggle{font-size:21px;padding:14px 0;line-height:1.3}
.ec-product-grid{gap:13px;margin-top:13px}
.ec-product-card{border-radius:7px;border:1px solid #e9ecee;background:#fff;transition:box-shadow .2s,transform .2s,border-color .2s;box-shadow:0 2px 8px rgba(28,46,56,.035)}
.ec-product-card:hover{transform:translateY(-2px);border-color:#c9d3da;box-shadow:0 10px 28px rgba(30,42,52,.09)}
.ec-product-photo{aspect-ratio:3/4;background:#f1f2f4}
.ec-product-photo img{object-fit:cover;object-position:center top}
.ec-product-caption{padding:12px 14px 0;gap:12px}
.ec-product-name{font-size:16px;font-weight:500;line-height:1.35;color:#142b42}
.ec-product-cost{font-size:16px;color:#26343d;font-weight:500}
.ec-product-info{font-size:10px;color:#8f9ba4;margin:6px 14px 15px}
.ec-detail-buy .ec-add-to-cart{display:flex;width:100%;align-items:center;justify-content:center;gap:10px;margin:20px 0 10px;border:0;font-family:'Hanken Grotesk',Arial,sans-serif;font-weight:650;font-size:16px;cursor:pointer;min-height:48px;background:#34434d;color:#fff}
.ec-detail-buy .ec-add-to-cart:hover:not(:disabled){background:#475b68;box-shadow:0 6px 22px rgba(44,60,70,.2)}
.ec-detail-buy .ec-add-to-cart:disabled{opacity:.5;cursor:not-allowed;box-shadow:none}
.ec-detail-buy .ec-add-to-cart svg{flex-shrink:0}
.ec-nav-cart{gap:9px!important}
.ec-nav-cart .ec-cart-icon{display:block;flex:0 0 auto}
@media(max-width:1100px){
 .ec-store-reference .ec-catalog-filterbar{grid-template-columns:1fr}
 .ec-store-reference .ec-store-breadcrumb{padding:8px 0 12px}
 .ec-store-reference .ec-store-filters{grid-template-columns:repeat(3,minmax(0,1fr)) auto}
 .ec-store-reference .ec-catalog-results{grid-column:1}
}
@media(max-width:700px){
 .ec-catalog-toolbar{min-height:70px}
 .ec-catalog-toolbar-title{font-size:14px}
 .ec-catalog-toolbar-brand{font-size:19px}
 .ec-store-reference .ec-store-filters{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}
 .ec-store-reference .ec-filter-search{grid-column:span 2}
 .ec-store-reference .ec-filter-apply{grid-column:span 2}
 .ec-store-reference{margin:0 -2.08%;padding:0 2.08% 10px}
 .ec-product-caption{padding:10px 10px 0;gap:5px}
 .ec-product-name,.ec-product-cost{font-size:12px}
 .ec-product-info{margin:6px 10px 12px}
}

/* Fixed header and sport-page scroll transition across shopping screens. */
.ec-shell{padding-top:72px}
.ec-header{position:fixed;top:0;left:0;right:0;width:100%;height:72px;min-height:72px;z-index:1000;transition:height .3s ease,min-height .3s ease,background .3s ease,box-shadow .3s ease,padding .3s ease;background:#34434d}
.ec-header.scrolled{height:62px;min-height:62px;background:rgba(51,63,72,.94);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);box-shadow:0 6px 22px rgba(16,24,30,.18);border-bottom:1px solid rgba(255,255,255,.09)}
.ec-header .ec-brand img{transition:height .3s ease,width .3s ease}
.ec-header.scrolled .ec-brand img{height:37px;width:125px}
.ec-header .ec-nav .ec-navbtn{transition:background .2s ease,min-height .3s ease,transform .2s ease}
.ec-header.scrolled .ec-nav .ec-navbtn{min-height:42px}
.ec-header .ec-nav .ec-navbtn:hover{transform:translateY(-1px)}
.ec-header .ec-nav-cart{display:inline-flex;align-items:center;gap:9px}
.ec-header .ec-nav-cart svg{display:block;flex:none}
.ec-catalog-toolbar{display:grid;grid-template-columns:minmax(0,1fr) minmax(220px,390px) minmax(0,1fr);align-items:center;gap:26px;min-height:84px}
.ec-catalog-toolbar-title{justify-self:end;margin:0;font-family:'Hanken Grotesk',sans-serif;font-weight:500;font-size:21px;letter-spacing:.025em;color:#33414a;white-space:nowrap}
.ec-catalog-search{grid-column:2;display:flex;align-items:stretch;min-width:0;background:#fff;border:1px solid #ced4d9;border-radius:6px;overflow:hidden;height:39px;box-shadow:0 3px 17px rgba(25,42,52,.035)}
.ec-catalog-search:focus-within{outline:2px solid rgba(231,0,51,.22);outline-offset:1px}
.ec-catalog-search input{width:100%;min-width:0;flex:1;border:0;outline:0;background:transparent;font-family:'Hanken Grotesk',sans-serif;font-size:13px;padding:0 8px;color:#33414a}
.ec-catalog-search .ec-search-lens{display:flex;align-items:center;color:#63717c;padding:0 0 0 12px}
.ec-catalog-search button{border:0;background:#34434d;color:#fff;cursor:pointer;min-width:82px;padding:0 15px;font:700 11px 'Space Mono',monospace;text-transform:uppercase;letter-spacing:.04em}
.ec-catalog-search button:hover{background:#e70033}
.ec-catalog-toolbar-spacer{grid-column:1}
.ec-visually-hidden{position:absolute!important;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap}
.ec-store-reference .ec-catalog-filterbar{grid-template-columns:140px minmax(0,1fr)}
.ec-store-reference .ec-store-filters{grid-template-columns:repeat(4,minmax(110px,1fr)) minmax(90px,.8fr) auto;gap:11px}
.ec-store-reference .ec-catalog-results{padding-top:5px}
.ec-store-reference .ec-filter-search{display:none}
.ec-product-grid .ec-product-extra{display:none}
.ec-product-grid.ec-show-all .ec-product-extra{display:block}
.ec-show-more-wrap{text-align:center;padding:14px 0 7px}
.ec-show-more{display:inline-flex;align-items:center;gap:8px;justify-content:center;background:#fff;border:1px solid #e70033;border-radius:5px;color:#e70033;cursor:pointer;padding:10px 15px;font:700 11px 'Space Mono',monospace}
.ec-show-more:hover{background:#fff2f5}
.ec-category-toggle[aria-expanded="false"]+.ec-product-grid+.ec-show-more-wrap{display:none}
.ec-main .ec-auth{max-width:570px;margin:45px auto}
.ec-main .ec-auth .ec-panel{padding:33px}
.ec-main .ec-auth h1{font-size:clamp(31px,3.5vw,44px)}
.ec-main .ec-auth .ec-btn{width:100%;margin-top:3px}
.ec-main .ec-auth .ec-field{margin-bottom:0}
.ec-main .ec-auth input:focus,.ec-main .ec-panel input:focus,.ec-main .ec-panel select:focus{outline:2px solid rgba(231,0,51,.19);border-color:#a5afb6;outline-offset:1px}
.ec-main .ec-panel{box-shadow:0 10px 32px rgba(27,39,50,.035);border-color:#e4e8ec}
.ec-main .ec-panel h2{color:#34434d;font-size:21px}
.ec-main .ec-btn{border-radius:6px}
.ec-main .ec-btn:focus-visible,.ec-main .ec-input:focus-visible,.ec-main .ec-select:focus-visible{outline:2px solid #e70033;outline-offset:2px}
.ec-main .ec-two{gap:27px}
.ec-main .ec-summary{top:90px}
.ec-main .ec-cart-item h3{color:#283c48}
.ec-main .ec-cart-item .ec-price{color:#e70033}
.ec-main .ec-row strong{font-weight:650}
.ec-main .ec-panel .ec-stack>.ec-btn{margin-top:6px}
.ec-main .ec-empty{box-shadow:0 9px 26px rgba(30,42,52,.045)}
.ec-main .ec-auth a:not(.ec-btn),.ec-main .ec-panel a:not(.ec-btn){color:#345366}
.ec-main .ec-auth a:not(.ec-btn):hover,.ec-main .ec-panel a:not(.ec-btn):hover{color:#e70033}
@media(max-width:1100px){
 .ec-catalog-toolbar{grid-template-columns:minmax(0,1fr) minmax(210px,380px) minmax(0,1fr);gap:14px}
 .ec-catalog-toolbar-title{font-size:17px}
 .ec-store-reference .ec-store-filters{grid-template-columns:repeat(3,minmax(0,1fr)) auto}
}
@media(max-width:950px){
 .ec-header{height:70px;min-height:70px}
 .ec-header.scrolled{height:62px;min-height:62px}
 .ec-nav{top:70px;transition:top .3s ease}
 .ec-header.scrolled .ec-nav{top:62px}
 .ec-catalog-toolbar{grid-template-columns:1fr minmax(190px,1.4fr) auto;gap:13px}
 .ec-catalog-toolbar-title{font-size:15px}
}
@media(max-width:650px){
 .ec-catalog-toolbar{grid-template-columns:1fr auto;gap:8px;padding:13px 0}
 .ec-catalog-toolbar-spacer{display:none}
 .ec-catalog-search{grid-column:1;min-width:0}
 .ec-catalog-toolbar-title{grid-column:2;font-size:11px;max-width:110px;white-space:normal;text-align:right}
 .ec-catalog-search button{min-width:64px;padding:0 9px;font-size:10px}
 .ec-store-reference .ec-store-filters{grid-template-columns:repeat(2,minmax(0,1fr))}
 .ec-store-reference .ec-filter-apply{grid-column:span 2}
 .ec-main .ec-auth{margin:15px auto}
 .ec-main .ec-auth .ec-panel{padding:22px}
 .ec-main .ec-summary{top:76px}
}
@media(prefers-reduced-motion:reduce){.ec-header,.ec-header .ec-brand img,.ec-header .ec-nav .ec-navbtn{transition:none}}

/* Exact approved homepage navigation, reused from its Blade partial. */
.ec-shell{padding-top:77px;--ink:#333F48;--paper:#F4F5F6;--red:#E70033;--red-deep:#B4002A;--edge:rgba(255,255,255,.10);--mono:"Space Mono",monospace;--ease:cubic-bezier(.2,.8,.2,1);--pad:clamp(20px,6vw,120px)}
.ec-shell>.nav{position:fixed;top:0;left:0;right:0;z-index:1050;display:flex;align-items:center;justify-content:space-between;padding:22px var(--pad);border-bottom:1px solid transparent;background:#333F48;transition:padding .35s var(--ease),background .35s var(--ease),border-color .35s var(--ease),box-shadow .35s var(--ease)}
.ec-shell>.nav.scrolled{padding:11px var(--pad);background:rgba(51,63,72,.9);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border-bottom:1px solid var(--edge);box-shadow:0 7px 28px rgba(18,26,33,.14)}
.ec-shell>.nav .logo{height:30px;width:auto;max-width:none;display:block;transition:height .35s var(--ease)}
.ec-shell>.nav.scrolled .logo{height:24px}
.ec-shell>.nav .links{display:flex;gap:30px;align-items:center}
.ec-shell>.nav .links>a.navlink{font-family:var(--mono);font-size:12px;letter-spacing:.16em;text-transform:uppercase;color:var(--paper);opacity:.8;position:relative;padding:6px 0;text-decoration:none;white-space:nowrap}
.ec-shell>.nav .links>a.navlink::after{content:"";position:absolute;left:0;bottom:0;height:2px;width:0;background:var(--red);transition:width .3s var(--ease)}
.ec-shell>.nav .links>a.navlink:hover{opacity:1}
.ec-shell>.nav .links>a.navlink:hover::after{width:100%}
.ec-shell>.nav .links .nav-cta{display:inline-flex;gap:10px;align-items:center}
.ec-shell>.nav .btn{font-family:var(--mono);text-transform:uppercase;letter-spacing:.14em;font-size:12px;font-weight:700;padding:13px 22px;border:1px solid var(--red);border-radius:8px;background:var(--red);color:#fff;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;gap:9px;transition:transform .25s var(--ease),background .25s,box-shadow .25s;will-change:transform}
.ec-shell>.nav .btn:hover{background:var(--red-deep);box-shadow:0 10px 30px -8px rgba(231,0,51,.5)}
.ec-shell>.nav .btn.shop,.ec-shell>.nav .btn.catalog{background:#414E59;border-color:#414E59;color:var(--paper)}
.ec-shell>.nav .btn.shop:hover,.ec-shell>.nav .btn.catalog:hover{background:#4C5A67;box-shadow:none}
.ec-shell>.nav .btn .ar{transition:transform .25s var(--ease)}
.ec-shell>.nav .btn:hover .ar{transform:translateX(4px)}
.ec-shell>.nav .ec-nav-cart{display:inline-flex;align-items:center;justify-content:center;gap:9px}
.ec-shell>.nav .ec-nav-cart .ec-cart-icon{display:block;flex:none}
.ec-shell>.nav .burger{display:none;flex-direction:column;gap:5px;background:none;border:0;cursor:pointer;padding:8px}
.ec-shell>.nav .burger span{display:block;width:26px;height:2px;background:var(--paper);transition:transform .3s,opacity .3s}
@media(min-width:901px) and (max-width:1160px){
 .ec-shell>.nav .links{gap:12px}
 .ec-shell>.nav .links .nav-cta{gap:7px}
 .ec-shell>.nav .links .nav-cta .btn{font-size:10px;padding:12px 13px}
}
@media(max-width:900px){
 .ec-shell>.nav .links{position:fixed;inset:0;background:var(--ink);flex-direction:column;justify-content:center;gap:26px;transform:translateY(-100%);transition:transform .5s var(--ease);z-index:39}
 .ec-shell>.nav .links.open{transform:translateY(0)}
 .ec-shell>.nav .links>a.navlink{font-size:16px}
 .ec-shell>.nav .burger{display:flex;z-index:41}
 .ec-shell>.nav .burger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
 .ec-shell>.nav .burger.open span:nth-child(2){opacity:0}
 .ec-shell>.nav .burger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
}
@media(prefers-reduced-motion:no-preference){
 .ec-catalog-section.ec-reveal-ready:not(.ec-in-view),.ec-product-detail-wrap.ec-reveal-ready:not(.ec-in-view),.ec-panel.ec-reveal-ready:not(.ec-in-view){opacity:0;transform:translateY(22px)}
 .ec-catalog-section.ec-reveal-ready,.ec-product-detail-wrap.ec-reveal-ready,.ec-panel.ec-reveal-ready{transition:opacity .55s ease,transform .55s cubic-bezier(.2,.8,.2,1)}
}
@media(prefers-reduced-motion:reduce){
 .ec-shell>.nav,.ec-shell>.nav .logo,.ec-shell>.nav .btn,.ec-shell>.nav .btn .ar,.ec-shell>.nav .links{transition:none}
}

/* Shopping header matches the approved sport-page navigation. */
.ec-shell{padding-top:80px}
.ec-shell>.nav.ec-shop-nav{
 position:fixed;top:0;left:0;right:0;width:100%;z-index:1100;
 padding:20px var(--pad);
 background:#333f48;
 border-bottom:1px solid transparent;
 box-shadow:none;
 transition:padding .35s var(--ease),background .35s var(--ease),border-color .35s var(--ease),box-shadow .35s var(--ease);
}
.ec-shell>.nav.ec-shop-nav.scrolled{
 padding:11px var(--pad);
 background:rgba(51,63,72,.85);
 backdrop-filter:blur(14px);
 -webkit-backdrop-filter:blur(14px);
 border-bottom:1px solid var(--edge);
 box-shadow:none;
}
.ec-shell>.nav.ec-shop-nav .logo{height:28px;transition:height .35s var(--ease)}
.ec-shell>.nav.ec-shop-nav.scrolled .logo{height:22px}
.ec-shell>.nav.ec-shop-nav .rt{display:flex;align-items:center;gap:26px}
.ec-shell>.nav.ec-shop-nav .rt a.nl{
 font-family:var(--mono);font-size:12px;letter-spacing:.14em;
 text-transform:uppercase;color:var(--paper);opacity:.8;
 position:relative;padding:6px 0;text-decoration:none;
}
.ec-shell>.nav.ec-shop-nav .rt a.nl:hover{opacity:1}
.ec-shell>.nav.ec-shop-nav .rt a.nl::after{
 content:"";position:absolute;left:0;bottom:0;height:2px;width:0;
 background:var(--red);transition:width .3s var(--ease);
}
.ec-shell>.nav.ec-shop-nav .rt a.nl:hover::after{width:100%}
.ec-shell>.nav.ec-shop-nav .btn{padding:13px 22px;letter-spacing:.13em}
.ec-shell>.nav.ec-shop-nav .btn.catalog{
 background:#414e59;border-color:#414e59;color:var(--paper);
}
.ec-shell>.nav.ec-shop-nav .btn.catalog:hover{
 background:#4c5a67;box-shadow:none;
}
.ec-shell>.nav.ec-shop-nav .btn:not(.catalog){
 background:var(--red);border-color:var(--red);
}
.ec-shell>.nav.ec-shop-nav .btn:not(.catalog):hover{background:var(--red-deep)}

/* Catalog masthead remains light, with readable search and filter controls. */
.ec-shell:has(.ec-store-reference) .ec-main{padding-top:0}
.ec-shell .ec-store-top.ec-store-reference{
 position:relative;
 background:#fff;
 color:#33414a;
 border-bottom:1px solid #e5e9ec;
 box-shadow:none;
 padding-top:14px;padding-bottom:16px;
}
.ec-shell .ec-store-reference .ec-catalog-toolbar{
 border-bottom:1px solid #e7e9ed;
}
.ec-shell .ec-store-reference .ec-catalog-toolbar-title{
 color:#33414a;text-shadow:none;
}
.ec-shell .ec-store-reference .ec-store-breadcrumb,
.ec-shell .ec-store-reference .ec-store-breadcrumb a{color:#667581}
.ec-shell .ec-store-reference .ec-store-breadcrumb a:hover{color:var(--red)}
.ec-shell .ec-store-reference .ec-store-filters .ec-field label{color:#6c7681}
.ec-shell .ec-store-reference .ec-store-filters .ec-select{
 background:#f6f7f8;color:#34434d;border-color:#e5e8eb;
}
.ec-shell .ec-store-reference .ec-catalog-results{color:#687783}
.ec-shell .ec-store-reference .ec-catalog-results a{color:#8c97a0}
.ec-shell .ec-store-reference .ec-catalog-results a:hover{color:var(--red)}
.ec-shell .ec-store-reference .ec-catalog-search{
 background:#fff;border-color:#ced4d9;
}
.ec-shell .ec-store-reference .ec-catalog-search button{
 background:#34434d;color:#fff;
}
.ec-shell .ec-store-reference .ec-catalog-search button:hover{background:var(--red)}
.ec-shell .ec-store-reference .ec-filter-apply{
 background:#34434d;color:#fff;
}
.ec-shell .ec-store-reference .ec-filter-apply:hover{background:#475b68}
@media(max-width:900px){
 .ec-shell>.nav.ec-shop-nav .rt{
  position:fixed;inset:0;display:flex;flex-direction:column;
  justify-content:center;gap:26px;background:#333f48;
  overflow-y:auto;z-index:39;transform:translateY(-100%);
  transition:transform .5s var(--ease);
 }
 .ec-shell>.nav.ec-shop-nav .rt.open{transform:translateY(0)}
 .ec-shell>.nav.ec-shop-nav .rt a.nl{font-size:16px}
 .ec-shell>.nav.ec-shop-nav .burger{display:flex;z-index:41}
}
@media(max-width:650px){
 .ec-shell .ec-store-top.ec-store-reference{padding-top:10px;padding-bottom:14px}
 .ec-shell .ec-store-reference .ec-catalog-toolbar{min-height:62px}
}
@media(prefers-reduced-motion:reduce){
 .ec-shell>.nav.ec-shop-nav,.ec-shell>.nav.ec-shop-nav .logo,
 .ec-shell>.nav.ec-shop-nav .rt{transition:none}
}

/* Encore loading treatment reused from the approved homepage. */
.ec-shop-loader{
 position:fixed;inset:0;z-index:9998;display:grid;place-items:center;
 background:#f6f7f8;opacity:1;visibility:visible;
 transition:opacity .38s cubic-bezier(.2,.8,.2,1),visibility .38s;
}
.ec-shop-loader.gone{opacity:0;visibility:hidden;pointer-events:none}
.ec-shop-loader-mark{width:56px;height:56px;object-fit:contain;animation:ec-shop-spin 2.4s linear infinite}
.ec-shop-loader #ecShopLoaderLabel{
 position:absolute;bottom:14%;left:20px;right:20px;text-align:center;
 color:#64717b;font:400 11px/1.5 'Space Mono',monospace;
 letter-spacing:.34em;text-transform:uppercase
}
body.ec-shop-busy{cursor:progress}
@keyframes ec-shop-spin{to{transform:rotate(360deg)}}
/* Compact auto-submitting filters and actual API color selections. */
.ec-store-reference .ec-store-filters{grid-template-columns:repeat(4,minmax(110px,1fr)) minmax(90px,.8fr)}
.ec-product-available-colors{display:flex;align-items:center;gap:5px;flex-wrap:wrap;margin:7px 14px 14px;min-height:17px}
.ec-product-available-colors>span:first-child{font-size:10px;color:#84909c;margin-right:2px}
.ec-color-swatch{width:12px;height:12px;flex:none;border-radius:50%;background:var(--swatch);border:1px solid rgba(20,35,45,.14);box-shadow:0 0 0 1px rgba(255,255,255,.55)}
@media(max-width:1100px){.ec-store-reference .ec-store-filters{grid-template-columns:repeat(3,minmax(0,1fr))}}
@media(max-width:650px){.ec-store-reference .ec-store-filters{grid-template-columns:repeat(2,minmax(0,1fr))}.ec-product-available-colors{margin:6px 9px 12px}}
@media(prefers-reduced-motion:reduce){.ec-shop-loader{transition:none}.ec-shop-loader-mark{animation:none}}

/* Auth-aware shopping navbar controls share the approved sport-page theme. */
.ec-shell>.nav.ec-shop-nav .ec-shop-cart-link{
 display:inline-flex;align-items:center;justify-content:center;
 width:45px;height:45px;flex:none;border-radius:9px;
 background:#414e59;border:1px solid #414e59;color:#fff;text-decoration:none;
 transition:background .25s ease,transform .25s ease;
}
.ec-shell>.nav.ec-shop-nav .ec-shop-cart-link:hover{background:#4c5a67;transform:translateY(-1px)}
.ec-shop-mobile-label{display:none}
.ec-shell>.nav.ec-shop-nav .ec-shop-account{position:relative;flex:none}
.ec-shell>.nav.ec-shop-nav .ec-shop-account-trigger{
 display:flex;align-items:center;gap:8px;color:#f4f5f6;cursor:pointer;
 padding:5px 2px;list-style:none;user-select:none;
}
.ec-shell>.nav.ec-shop-nav .ec-shop-account-trigger::-webkit-details-marker{display:none}
.ec-shell>.nav.ec-shop-nav .ec-shop-account-trigger::marker{content:""}
.ec-shell>.nav.ec-shop-nav .ec-shop-avatar{
 width:39px;height:39px;display:grid;place-items:center;
 background:#4a5a66;border:1px solid rgba(255,255,255,.25);
 border-radius:50%;color:#fff;font:700 16px 'Hanken Grotesk',sans-serif;
 transition:background .25s,border-color .25s;
}
.ec-shell>.nav.ec-shop-nav .ec-shop-account-trigger:hover .ec-shop-avatar,
.ec-shell>.nav.ec-shop-nav .ec-shop-account[open] .ec-shop-avatar{
 background:#617380;border-color:#e70033;
}
.ec-shell>.nav.ec-shop-nav .ec-shop-account-dropdown{
 position:absolute;right:0;top:calc(100% + 12px);z-index:1200;
 width:195px;padding:9px;background:#fff;border:1px solid #e3e7ea;
 border-radius:9px;box-shadow:0 15px 38px rgba(13,29,40,.18);color:#34434d;
}
.ec-shell>.nav.ec-shop-nav .ec-shop-account-label{
 display:block;padding:9px 11px 12px;margin-bottom:5px;border-bottom:1px solid #e7eaed;
 font:700 12px 'Hanken Grotesk',sans-serif;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;
}
.ec-shell>.nav.ec-shop-nav .ec-shop-account-dropdown a,
.ec-shell>.nav.ec-shop-nav .ec-shop-account-dropdown button{
 display:block;width:100%;border:0;border-radius:5px;background:transparent;
 padding:11px;font:600 12px 'Hanken Grotesk',sans-serif;
 color:#34434d;text-align:left;text-decoration:none;cursor:pointer;
}
.ec-shell>.nav.ec-shop-nav .ec-shop-account-dropdown a:hover,
.ec-shell>.nav.ec-shop-nav .ec-shop-account-dropdown button:hover{background:#f1f3f5;color:#e70033}
.ec-shell>.nav.ec-shop-nav .ec-shop-account-dropdown form{margin:0}
.ec-shell>.nav.ec-shop-nav .ec-shop-signin{background:#414e59;border-color:#414e59}
.ec-shell>.nav.ec-shop-nav .ec-shop-signin:hover{background:#4c5a67;box-shadow:none}
@media(max-width:1150px) and (min-width:901px){
 .ec-shell>.nav.ec-shop-nav .rt{gap:13px}
 .ec-shell>.nav.ec-shop-nav .btn{padding:12px 14px;font-size:10px}
}
@media(max-width:900px){
 .ec-shell>.nav.ec-shop-nav .rt{gap:20px;padding:72px 20px 32px}
 .ec-shell>.nav.ec-shop-nav .ec-shop-cart-link{width:auto;min-width:130px;gap:10px;padding:0 16px}
 .ec-shop-mobile-label{display:inline;font:700 12px 'Space Mono',monospace;text-transform:uppercase;letter-spacing:.1em}
 .ec-shell>.nav.ec-shop-nav .ec-shop-account{width:min(260px,85vw);text-align:center}
 .ec-shell>.nav.ec-shop-nav .ec-shop-account-trigger{justify-content:center}
 .ec-shell>.nav.ec-shop-nav .ec-shop-account-dropdown{
  position:static;margin:8px auto 0;width:100%;box-shadow:0 9px 24px rgba(0,0,0,.13);
 }
}

/* Encore storefront redesign: original sport-page palette and editorial sports theme. */
.ec-shop-banner{position:relative;isolation:isolate;overflow:hidden;margin:-36px calc((min(1240px,94vw) - 100vw)/2) 28px;padding:38px max(3%,calc((100vw - 1240px)/2));background:#25343e;color:white}
.ec-shop-banner:before{content:"";position:absolute;inset:0;z-index:-2;background:linear-gradient(95deg,#1b2b37 0%,rgba(25,39,50,.96) 48%,rgba(25,39,50,.65) 100%),url('{{ asset('assets/reference/fe710de5b7de040d2fab.jpg') }}') right 40%/cover no-repeat}
.ec-shop-banner:after{content:"";position:absolute;inset:auto -3% -50% auto;width:18%;height:200%;transform:skew(-35deg);background:rgba(231,0,51,.18);z-index:-1}
.ec-banner-inner{max-width:1240px;margin:auto}
.ec-shop-banner h1{font:900 clamp(34px,5vw,66px)/1.02 Archivo,Arial,sans-serif;letter-spacing:-.05em;text-transform:uppercase;color:white;margin:0 0 12px}
.ec-shop-banner h1 span{color:#e70033}
.ec-shop-banner p{font-size:15px;line-height:1.55;color:#e0e7ec;max-width:710px;margin:0}
.ec-modern-card{background:#fff;border:1px solid #e3e8ed;box-shadow:0 12px 28px rgba(27,42,56,.07);border-radius:14px;padding:27px;min-width:0}
.ec-modern-card h2{font:700 22px/1.25 'Hanken Grotesk',Arial,sans-serif;color:#17273a;margin:0 0 20px}
.ec-card-heading{display:flex;justify-content:space-between;align-items:center;gap:12px;border-bottom:1px solid #e5e9ed;padding:0 0 18px;margin-bottom:8px}
.ec-card-heading h2{margin:0}
.ec-card-heading>a{font-size:12px;color:#e70033;text-decoration:none}
.ec-checkout-grid{display:grid;grid-template-columns:minmax(0,1.7fr) minmax(310px,1fr);align-items:start;gap:24px}
.ec-modern-summary{position:sticky;top:85px}
.ec-summary-line{display:flex;align-items:center;justify-content:space-between;gap:12px;padding:15px 0;border-bottom:1px solid #e6eaed;color:#304457}
.ec-summary-total{font-size:21px;color:#15273a;font-weight:700}
.ec-summary-note{font-size:13px;line-height:1.6;color:#70808b;margin:15px 0 20px}
.ec-proceed{width:100%;display:flex;align-items:center;justify-content:center;min-height:48px;margin-top:16px;background:#e70033!important;color:white!important;text-align:center;text-decoration:none;font:700 12px 'Space Mono',monospace!important;letter-spacing:.06em;border-radius:8px!important}
.ec-proceed:hover{background:#be002b!important}
.ec-outline-action{display:flex;align-items:center;justify-content:center;min-height:43px;margin-top:12px;color:#34434d;text-decoration:none;border:1px solid #cbd4dc;border-radius:8px;padding:12px;font:700 11px 'Space Mono',monospace}
.ec-outline-action:hover{border-color:#34434d;color:#e70033}
.ec-trust-row{display:flex;justify-content:space-evenly;gap:12px;margin-top:25px;color:#6a7a87;font-size:12px;flex-wrap:wrap}
.ec-cart-list{padding:24px 27px}
.ec-modern-cart-item{display:grid;grid-template-columns:120px minmax(0,1fr) auto;gap:20px;padding:19px 0;border-bottom:1px solid #e7ecf0;align-items:start}
.ec-modern-cart-item:last-child{border-bottom:0}
.ec-cart-product-image{width:120px;min-height:135px;border-radius:9px;overflow:hidden;background:#f1f3f5}
.ec-cart-product-image img{width:100%;height:135px;object-fit:cover;object-position:top}
.ec-cart-product-body h3{font-size:17px;line-height:1.35;color:#14243a;margin:2px 0 9px}
.ec-cart-product-body p{font-size:13px;color:#758391;margin:0 0 13px}
.ec-cart-unit-price,.ec-cart-line-price{color:#e70033;font-size:15px;font-weight:700}
.ec-cart-line-price{white-space:nowrap}
.ec-cart-actions{display:flex;flex-wrap:wrap;align-items:end;gap:16px;margin-top:13px}
.ec-quantity-form{display:flex;align-items:center;gap:9px;flex-wrap:wrap}
.ec-quantity-form label{font-size:12px;color:#667786}
.ec-qty-control{display:flex;align-items:center;border:1px solid #ccd5dd;border-radius:7px;overflow:hidden;height:36px}
.ec-qty-control button{border:0;background:#f5f7f8;color:#34434d;font-size:19px;width:31px;height:100%;cursor:pointer}
.ec-qty-control input{width:45px;max-width:45px;height:100%;text-align:center;border:0;background:#fff;font-size:14px;appearance:textfield}
.ec-qty-control input::-webkit-inner-spin-button,.ec-qty-control input::-webkit-outer-spin-button{-webkit-appearance:none;margin:0}
.ec-update-cart{padding:9px 13px;background:#34434d;color:white;border:0;border-radius:6px;cursor:pointer;font:700 11px 'Space Mono',monospace}
.ec-remove-cart{border:0;background:transparent;color:#e70033;font-size:12px;cursor:pointer;padding:10px 0}
.ec-fresh-empty{padding:70px 25px}
.ec-auth-hero{margin-top:-36px;margin-bottom:-75px;min-height:calc(100vh - 77px);display:grid;place-items:center;padding:60px 24px 90px}
.ec-auth-hero:before{background:linear-gradient(95deg,rgba(16,32,44,.95),rgba(28,46,59,.8)),url('{{ asset('assets/reference/b46204161d649c9f879a.jpg') }}') center/cover no-repeat}
.ec-auth-wrap{width:100%;max-width:630px;margin:auto}
.ec-auth-card{background:rgba(255,255,255,.98);border:1px solid rgba(255,255,255,.8);border-radius:17px;box-shadow:0 28px 70px rgba(0,0,0,.24);padding:clamp(25px,4vw,47px);color:#233340}
.ec-auth-logo{width:220px;max-width:100%;height:55px;object-fit:contain;display:block;margin:0 auto 25px;filter:brightness(.2)}
.ec-auth-title{text-align:center;margin:0 0 7px;font:900 clamp(32px,4vw,48px)/1.1 Archivo,sans-serif;text-transform:uppercase;letter-spacing:-.045em;color:#34434d}
.ec-auth-title span{color:#e70033}
.ec-auth-subtitle{text-align:center;color:#6b7985;font-size:14px;line-height:1.6;margin:0 0 30px}
.ec-shop-form{display:flex;flex-direction:column;gap:14px}
.ec-shop-form .ec-field{margin:0;min-width:0}
.ec-shop-form label,.ec-shipping-form .ec-field label{display:block;color:#314252;font-weight:650;font-size:12px;margin:0 0 8px}
.ec-shop-form .ec-input,.ec-shipping-form .ec-input,.ec-shipping-form .ec-select{width:100%;min-height:46px;border:1px solid #d1dae1;background:white;border-radius:7px;padding:10px 13px}
.ec-password-wrap{display:flex;align-items:center;position:relative}
.ec-password-wrap input{padding-right:70px!important}
.ec-password-toggle{position:absolute;right:11px;background:transparent;border:0;color:#536e80;font-size:12px;cursor:pointer;padding:9px}
.ec-auth-submit{width:100%;min-height:50px;display:flex;align-items:center;justify-content:center;gap:12px;background:#e70033!important;margin-top:7px;font:700 12px 'Space Mono',monospace!important}
.ec-auth-submit:hover{background:#c3002e!important}
.ec-auth-bottom{display:flex;justify-content:center;align-items:center;gap:9px;flex-wrap:wrap;text-align:center;margin-top:23px;border-top:1px solid #e7eaee;padding-top:23px;font-size:14px;color:#667786}
.ec-auth-bottom a{color:#e70033;text-decoration:none;font-weight:700}
.ec-account-grid{display:grid;grid-template-columns:245px minmax(0,1fr);gap:22px;align-items:start}
.ec-account-sidebar{position:sticky;top:90px;display:flex;flex-direction:column;gap:7px;padding:17px}
.ec-account-sidebar a,.ec-account-sidebar button{display:block;width:100%;text-align:left;padding:14px 15px;border:0;border-radius:7px;background:none;text-decoration:none;color:#33495a;font:650 14px 'Hanken Grotesk',sans-serif;cursor:pointer}
.ec-account-sidebar a:hover,.ec-account-sidebar button:hover{background:#f4f6f8}
.ec-account-sidebar a.active{background:#e70033;color:#fff}
.ec-account-sidebar form{margin:13px 0 0;border-top:1px solid #edf0f3;padding-top:10px}
.ec-account-main{display:flex;flex-direction:column;gap:19px;min-width:0}
.ec-account-intro{display:flex;align-items:center;gap:20px}
.ec-account-avatar{width:76px;height:76px;border-radius:50%;display:grid;place-items:center;background:#34434d;color:#fff;font:800 35px Archivo,sans-serif;flex:none}
.ec-account-intro h2{margin:0 0 4px;font-size:25px}
.ec-account-intro p{margin:0 0 9px;color:#71808c}
.ec-account-intro span{display:inline-block;background:#eff2f4;border-radius:7px;padding:5px 10px;font-size:11px;color:#405361}
.ec-account-columns{display:grid;grid-template-columns:1.05fr .95fr;gap:19px}
.ec-account-overview .ec-stats-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:11px}
.ec-stats-grid>div{background:#f4f6f8;padding:15px 8px;text-align:center;border-radius:9px}
.ec-stats-grid>div:nth-child(1){background:#fff0f3}.ec-stats-grid>div:nth-child(2){background:#eef5ff}.ec-stats-grid>div:nth-child(3){background:#edf8f0}
.ec-stats-grid strong{display:block;font:850 27px Archivo,sans-serif;color:#213346}.ec-stats-grid span{display:block;font-size:12px;margin-top:6px;color:#546776}
.ec-account-address h2{margin-bottom:8px}.ec-account-address p{color:#697a87;font-size:13px}
.ec-account-address-line{color:#34434d;padding:12px 0;font-size:14px}
.ec-shipping-form .ec-modern-card{padding:28px}
.ec-shipping-form .ec-stack{gap:14px}
.ec-shipping-form .ec-field{margin:0}
.ec-shipping-form .ec-fieldset{gap:15px}
.ec-shipping-form .ec-flex:has(#ecSameAddress){font-weight:600;color:#354a5a;padding:14px 0}
.ec-checkout-mini-item{display:grid;grid-template-columns:65px 1fr auto;gap:10px;padding:12px 0;border-bottom:1px solid #e9edf0;align-items:center}
.ec-checkout-mini-item img{width:65px;height:75px;object-fit:cover;border-radius:6px;background:#f3f4f6}
.ec-checkout-mini-item strong{font-size:13px;color:#253547;line-height:1.3}
.ec-checkout-mini-item small{display:block;font-size:11px;color:#778894;margin-top:4px}
.ec-checkout-mini-item span{font-size:13px;white-space:nowrap}
.ec-modern-payment .ec-field{margin:0}
.ec-modern-payment .ec-field label{font-weight:650;font-size:13px}
.ec-modern-payment .ec-input,.ec-modern-payment .ec-select{border-radius:7px;min-height:45px}
.ec-card-type-field{border:0;padding:0;margin:0}
.ec-card-type-field legend{font-weight:650;font-size:13px;margin-bottom:12px}
.ec-card-type-options{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:9px}
.ec-card-type-options label{cursor:pointer;position:relative;min-width:0}
.ec-card-type-options input{position:absolute;opacity:0;inset:0}
.ec-card-type-options span{display:flex;align-items:center;justify-content:center;padding:15px 6px;background:#f8f9fa;border:1px solid #d6dfe5;border-radius:8px;font-weight:750;font-size:13px;text-align:center;min-height:52px}
.ec-card-type-options input:checked+span{border:2px solid #e70033;background:#fff4f6;color:#d50031}
.ec-card-type-options input:focus-visible+span{outline:3px solid rgba(231,0,51,.25);outline-offset:1px}
.ec-modern-payment .ec-muted{font-size:13px;line-height:1.7;margin:0}
.ec-modern-summary .ec-row{font-size:13px}
.ec-modern-summary .ec-row:last-of-type{border-top:1px solid #d5dde4;margin-top:10px;font-size:17px}
.ec-success-card{max-width:680px;margin:30px auto 70px;text-align:center;padding:60px 35px}
.ec-success-check{display:grid;place-items:center;margin:0 auto 24px;width:86px;height:86px;background:#e7f7ed;border-radius:50%;font-size:45px;font-weight:700;color:#25965a}
.ec-success-card h2{font-size:29px;margin:0 0 12px}
.ec-success-card p{font-size:15px;color:#647783;line-height:1.7}
.ec-success-actions{max-width:370px;margin:24px auto}
@media(max-width:1050px){.ec-account-columns{grid-template-columns:1fr}.ec-checkout-grid{grid-template-columns:minmax(0,1.4fr) minmax(280px,1fr)}}
@media(max-width:800px){.ec-checkout-grid,.ec-account-grid{grid-template-columns:1fr}.ec-modern-summary,.ec-account-sidebar{position:static}.ec-account-sidebar{flex-direction:row;flex-wrap:wrap;gap:6px}.ec-account-sidebar a,.ec-account-sidebar button{width:auto}.ec-account-sidebar form{border:0;padding:0;margin:0}.ec-shop-banner{padding:38px 4%;margin-left:-3vw;margin-right:-3vw}.ec-account-columns{grid-template-columns:1fr 1fr}}
@media(max-width:650px){.ec-account-columns{grid-template-columns:1fr}.ec-modern-card{padding:19px}.ec-modern-cart-item{grid-template-columns:85px minmax(0,1fr);gap:12px}.ec-cart-product-image{width:85px;min-height:100px}.ec-cart-product-image img{height:100px}.ec-cart-line-price{grid-column:2}.ec-card-heading h2{font-size:18px}.ec-auth-hero{padding:30px 13px 65px}.ec-auth-card{padding:24px 18px}.ec-shop-banner h1{font-size:40px}.ec-card-type-options{grid-template-columns:1fr}.ec-account-intro{gap:12px}.ec-account-avatar{width:54px;height:54px;font-size:25px}}
@media(prefers-reduced-motion:reduce){.ec-shop-banner:after{display:none}}

.ec-account-address-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px;margin:18px 0}
.ec-address-tile{border:1px solid #e0e6eb;border-radius:10px;padding:20px;background:#fafbfc;min-width:0}
.ec-address-tile h3{font-size:15px;color:#263747;margin:0 0 14px}
.ec-address-tile strong{display:block;color:#213443;font-size:14px;margin:0 0 7px}
.ec-address-tile p{margin:4px 0;line-height:1.55;font-size:13px;color:#697986;overflow-wrap:anywhere}
@media(max-width:650px){.ec-account-address-grid{grid-template-columns:1fr}}

/* 2026 Encore editorial storefront: reference-matched full-page sports backdrop. */
.ec-shell:has(.ec-shop-banner),.ec-shell:has(.ec-auth-hero){background:#182b38}
.ec-shell:has(.ec-shop-banner) .ec-main{
 width:100%;max-width:none;margin:0;padding:0 max(3.2vw,18px) 80px;
 background:
 linear-gradient(120deg,rgba(15,30,41,.93),rgba(21,38,51,.8) 52%,rgba(15,28,40,.92)),
 url('{{ asset('assets/reference/fe710de5b7de040d2fab.jpg') }}') center top/cover fixed;
 position:relative;isolation:isolate;
}
.ec-shell:has(.ec-shop-banner) .ec-main:before{
 content:"";position:absolute;inset:0;pointer-events:none;z-index:-1;
 background:
 linear-gradient(130deg,transparent 5%,rgba(255,255,255,.04) 5.1%,transparent 24%),
 linear-gradient(130deg,transparent 84%,rgba(231,0,51,.24) 84.2%,rgba(231,0,51,.24) 87%,transparent 87.2%);
}
.ec-shop-banner,.ec-account-banner{background:transparent!important;box-shadow:none!important;border:0!important;overflow:visible!important;margin:0 auto 20px!important;padding:33px 0 18px!important;max-width:1420px}
.ec-shop-banner:before,.ec-shop-banner:after{display:none!important}
.ec-shop-banner h1{font-style:italic;font-size:clamp(38px,4.7vw,64px);text-shadow:0 5px 18px rgba(0,0,0,.18)}
.ec-shop-banner p{color:#e0e7ed;font-size:16px}
.ec-checkout-grid,.ec-account-grid,.ec-success-card{max-width:1420px;margin-left:auto;margin-right:auto}
.ec-checkout-grid{grid-template-columns:minmax(0,1.72fr) minmax(340px,1fr);gap:20px}
.ec-modern-card{border-radius:16px;box-shadow:0 15px 38px rgba(0,0,0,.17);border-color:rgba(240,243,246,.95)}
.ec-modern-card h2{color:#0d1d2d;font-size:23px;font-weight:800}
.ec-modern-summary{top:100px}
.ec-card-heading{padding-bottom:18px}
.ec-proceed{min-height:54px;font-size:13px!important;letter-spacing:.035em}
.ec-cart-list{padding:26px 28px}
.ec-modern-cart-item{grid-template-columns:150px minmax(0,1fr) auto;gap:20px;padding:17px 0}
.ec-cart-product-image{width:150px;min-height:145px}
.ec-cart-product-image img{height:145px;object-fit:contain;background:#f1f3f5}
.ec-cart-product-body h3{font-size:17px;font-weight:750}
.ec-cart-unit-price,.ec-cart-line-price{font-size:17px}
.ec-cart-product-body p{color:#405364}
.ec-cart-actions{margin-top:12px}
.ec-account-grid{grid-template-columns:280px minmax(0,1fr);gap:20px}
.ec-account-sidebar{padding:19px 17px;min-height:490px;top:95px;gap:8px}
.ec-account-sidebar a,.ec-account-sidebar button{display:flex;align-items:center;gap:14px;font-size:16px;font-weight:600;padding:15px 13px}
.ec-sidebar-icon{display:grid;place-items:center;width:21px;font-size:22px;line-height:1;flex:none}
.ec-account-sidebar a.active{background:#e70033;color:white;box-shadow:0 7px 19px rgba(231,0,51,.14)}
.ec-account-sidebar form{margin-top:18px}
.ec-account-intro{position:relative;overflow:hidden;isolation:isolate;min-height:148px;padding:20px 28px}
.ec-account-intro-details{position:relative;z-index:2;min-width:0}
.ec-account-intro h2{font-size:27px;font-weight:800}
.ec-account-intro-art{
 position:absolute;z-index:0;right:0;top:0;bottom:0;width:36%;pointer-events:none;
 background:
 linear-gradient(120deg,transparent 10%,rgba(231,0,51,.95) 10.4%,rgba(231,0,51,.95) 15%,transparent 15.4%),
 linear-gradient(90deg,rgba(22,35,46,.02),rgba(22,35,46,.36)),
 url('{{ asset('assets/reference/b46204161d649c9f879a.jpg') }}') center/cover;
 clip-path:polygon(19% 0,100% 0,100% 100%,0 100%);
}
.ec-account-avatar{position:relative;z-index:1;width:84px;height:84px;font-size:37px;background:#34434d}
.ec-account-columns{grid-template-columns:1fr 1fr;gap:18px}
.ec-profile-details{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:21px 15px}
.ec-profile-details>div{min-width:0}
.ec-profile-details span{font-size:12px;font-weight:700;display:block;margin-bottom:7px;color:#253647}
.ec-profile-details strong{
 display:block;min-height:42px;background:#f0f3f6;border:1px solid #e4e9ed;
 border-radius:7px;padding:12px 13px;color:#1e2b3b;font-size:14px;
 font-weight:500;overflow-wrap:anywhere
}
.ec-account-overview .ec-stats-grid{grid-template-columns:repeat(4,minmax(0,1fr));gap:8px;margin-top:26px}
.ec-account-overview .ec-stats-grid>div{padding:15px 4px}
.ec-account-overview .ec-stats-grid strong{font-size:28px}
.ec-account-overview .ec-stats-grid span{font-size:10px;line-height:1.3}
.ec-account-overview .ec-proceed{margin-top:22px}
.ec-account-address{padding:24px}
.ec-account-address .ec-card-heading{margin-bottom:17px}
.ec-account-address strong{color:#142337;font-size:14px}
.ec-account-address p{line-height:1.35;margin:5px 0;color:#223345;font-size:14px}
.ec-edit-btn{display:inline-flex;align-items:center;justify-content:center;padding:8px 13px!important;border:1px solid #cbd4db;border-radius:8px;text-decoration:none!important;color:#253747!important;font-size:12px!important;font-weight:700}
.ec-edit-btn:hover{border-color:#e70033!important;color:#e70033!important}
.ec-address-tag{display:inline-flex;margin-top:16px;background:#ffe4e9;color:#cc0030;border-radius:6px;padding:8px 12px;font-size:12px;font-weight:750}
.ec-account-settings{max-width:820px;padding:30px}
.ec-account-settings .ec-fieldset{gap:18px}
.ec-settings-info{color:#667887;font-size:14px;line-height:1.6;margin:-5px 0 24px}
.ec-account-settings .ec-proceed{max-width:370px;margin-top:13px}
.ec-account-settings small{display:block;color:#7b8a94;font-size:11px;margin-top:6px}
.ec-orders-panel{min-height:410px}
.ec-order-history-row{display:grid;grid-template-columns:minmax(0,1.5fr) auto auto auto;align-items:center;gap:16px;border-bottom:1px solid #e6ebee;padding:18px 0}
.ec-order-history-row:last-child{border-bottom:none}
.ec-order-history-row>div span{display:block;font-size:12px;color:#8796a1;margin-top:5px}
.ec-order-status{font-size:12px;font-weight:700;padding:7px 11px;border-radius:8px;background:#f4f6f8;color:#385266}
.ec-orders-panel .ec-empty{border:0;padding:55px 20px}
.ec-orders-panel .ec-empty .ec-proceed{max-width:230px;margin:15px auto}
.ec-auth-hero{
 min-height:calc(100vh - 75px);padding:48px 20px 90px;
 background:
 linear-gradient(112deg,rgba(15,27,37,.90),rgba(19,32,45,.75),rgba(15,26,38,.9)),
 url('{{ asset('assets/reference/b46204161d649c9f879a.jpg') }}') center center/cover no-repeat!important;
}
.ec-auth-hero:before{background:none!important}
.ec-auth-card{background:rgba(255,255,255,.98);border-radius:21px;box-shadow:0 28px 72px rgba(0,0,0,.28)}
.ec-auth-title{font-style:normal}
.ec-auth-logo{margin-bottom:25px}
.ec-auth-bottom a{font-weight:800}
.ec-auth-card .ec-shop-form .ec-input{min-height:49px}
.ec-auth-card .ec-auth-submit{min-height:54px}
.ec-shipping-form .ec-modern-card,.ec-modern-payment{padding:30px}
.ec-checkout-mini-item img{height:80px;object-fit:contain}
.ec-modern-summary .ec-summary-note{border-top:1px solid #e6eaee;padding-top:18px}
@media(max-width:1150px){.ec-account-grid{grid-template-columns:240px minmax(0,1fr)}.ec-account-columns{grid-template-columns:1fr}.ec-checkout-grid{grid-template-columns:1.4fr .9fr}}
@media(max-width:880px){.ec-account-grid,.ec-checkout-grid{grid-template-columns:1fr}.ec-account-sidebar{min-height:0;position:static;flex-direction:row;flex-wrap:wrap}.ec-account-sidebar form{margin:0;padding:0;border:0}.ec-account-columns{grid-template-columns:1fr 1fr}.ec-modern-summary{position:static}}
@media(max-width:640px){.ec-shell:has(.ec-shop-banner) .ec-main{padding:0 14px 52px;background-attachment:scroll}.ec-account-columns{grid-template-columns:1fr}.ec-account-intro-art{width:32%;opacity:.56}.ec-account-intro h2{font-size:20px}.ec-account-intro{padding:18px 15px}.ec-profile-details{grid-template-columns:1fr}.ec-account-overview .ec-stats-grid{grid-template-columns:repeat(2,1fr)}.ec-modern-cart-item{grid-template-columns:85px minmax(0,1fr)}.ec-cart-product-image{width:85px;min-height:100px}.ec-cart-product-image img{height:100px}.ec-order-history-row{grid-template-columns:1fr auto}.ec-account-sidebar a,.ec-account-sidebar button{padding:9px;font-size:13px}.ec-sidebar-icon{font-size:18px}.ec-modern-card{padding:18px}.ec-shop-banner{padding-top:26px!important}.ec-account-settings .ec-fieldset{grid-template-columns:1fr}}

/* Checkout structure: separate responsive contact, billing and shipping cards. */
.ec-checkout-contact-stack{display:flex;flex-direction:column;gap:20px;min-width:0}
.ec-checkout-contact-stack>.ec-contact-card{padding:27px}
.ec-checkout-contact-stack .ec-summary-note{border:none;padding:0;margin:0 0 19px}
.ec-checkout-addresses{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:15px}
.ec-address-form-card{padding:23px;min-width:0}
.ec-address-form-card .ec-fieldset{grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
.ec-address-form-card .ec-field label,.ec-contact-card .ec-field label{font-size:12px;font-weight:700;color:#182a3b}
.ec-address-form-card .ec-field,.ec-contact-card .ec-field{margin:0}
.ec-address-form-card .ec-stack{gap:12px}
.ec-address-form-card .ec-input,.ec-address-form-card .ec-select,.ec-contact-card .ec-input{min-width:0;min-height:44px;padding:10px;border-radius:7px;border:1px solid #cdd7e0;color:#1c2e40}
.ec-address-form-card .ec-card-heading,.ec-contact-card .ec-card-heading{margin-bottom:15px}
.ec-address-form-card h2,.ec-contact-card h2{font-size:20px}
.ec-shipping-checkbox{display:flex;align-items:center;gap:12px;margin:13px 0;font-size:13px;font-weight:700;color:#263c4d;cursor:pointer}
.ec-shipping-checkbox input{width:20px;height:20px;flex:none;accent-color:#e70033;cursor:pointer}
.ec-shipping-conditional[hidden]{display:none!important}
.ec-shipping-conditional{padding-top:10px;border-top:1px solid #e5eaee}
.ec-checkout-summary .ec-card-heading{margin-bottom:0}
.ec-item-count{border-radius:7px;background:#edf1f4;color:#33414a;padding:7px 12px;font-size:12px;font-weight:800;white-space:nowrap}
.ec-checkout-mini-item{grid-template-columns:68px minmax(0,1fr) auto}
.ec-checkout-mini-item img{background:#f3f4f6;object-fit:contain}
.ec-checkout-mini-item span{font-weight:800}
.ec-checkout-summary .ec-summary-total{padding-top:23px}
.ec-checkout-summary .ec-summary-note{line-height:1.55}
.ec-account-settings .ec-shop-form .ec-field{margin:0}
.ec-modern-card .ec-fieldset{min-width:0}
@media(max-width:1200px){.ec-checkout-addresses{grid-template-columns:1fr}}
@media(max-width:900px){.ec-checkout-grid{grid-template-columns:1fr}.ec-checkout-summary{position:static}}
@media(max-width:640px){.ec-checkout-contact-stack>.ec-contact-card,.ec-address-form-card{padding:19px}.ec-contact-card .ec-fieldset,.ec-address-form-card .ec-fieldset{grid-template-columns:1fr}.ec-checkout-mini-item{grid-template-columns:60px minmax(0,1fr) auto}.ec-checkout-mini-item span{font-size:12px}}

.ec-clear-cart{border:0;background:none;color:#33414a;font-weight:700;cursor:pointer;font-size:13px;padding:9px 4px}
.ec-clear-cart:before{content:"⌫";margin-right:8px;font-size:18px;color:#e70033}
.ec-clear-cart:hover{color:#e70033}
.ec-clear-dialog{width:min(420px,calc(100vw - 32px));padding:30px;background:#fff;border:1px solid #e0e6eb;border-radius:14px;box-shadow:0 28px 90px rgba(0,0,0,.3);color:#203344}
.ec-clear-dialog::backdrop{background:rgba(11,23,33,.65);backdrop-filter:blur(4px)}
.ec-clear-dialog h2{font-size:23px;margin:0 0 10px}
.ec-clear-dialog p{font-size:14px;line-height:1.6;color:#607381}
.ec-clear-close{position:absolute;right:16px;top:10px;font-size:25px;background:none;border:0;color:#72818d;cursor:pointer}
.ec-clear-actions{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:22px}
.ec-clear-actions .ec-proceed,.ec-clear-actions .ec-outline-action{margin:0;width:100%;min-height:47px;font-size:11px!important}
.ec-clear-actions form{margin:0}

/* Keep billing and shipping address cards stacked in the checkout column. */
.ec-shell .ec-shipping-form .ec-checkout-addresses{
 display:flex;
 flex-direction:column;
 gap:20px;
 width:100%;
 min-width:0;
}
.ec-shell .ec-shipping-form .ec-checkout-addresses>.ec-address-form-card{
 width:100%;
 min-width:0;
}
/* Same transitions and arrow movement as the approved homepage CTA buttons. */
.ec-shell .ec-main .ec-btn,
.ec-shell .ec-main a.ec-outline-action,
.ec-shell .ec-main button.ec-outline-action,
.ec-shell .ec-main .ec-update-cart{
 transition:background-color .25s cubic-bezier(.2,.8,.2,1),color .25s,box-shadow .25s,transform .25s cubic-bezier(.2,.8,.2,1),border-color .25s;
}
.ec-shell .ec-main .ec-btn:hover:not(:disabled),
.ec-shell .ec-main .ec-update-cart:hover:not(:disabled){
 transform:translateY(-2px);
 background-color:#b4002a;
 box-shadow:0 10px 30px -8px rgba(231,0,51,.5);
}
.ec-shell .ec-main .ec-proceed:hover:not(:disabled),
.ec-shell .ec-main .ec-auth-submit:hover:not(:disabled){
 background:#b4002a!important;
 box-shadow:0 10px 30px -8px rgba(231,0,51,.5);
}
.ec-shell .ec-main a.ec-outline-action:hover,
.ec-shell .ec-main button.ec-outline-action:hover{
 transform:translateY(-2px);
 border-color:#34434d;
 box-shadow:0 6px 18px rgba(20,35,45,.1);
}
.ec-shell .ec-main .ec-btn .ar,
.ec-shell .ec-main .ec-btn .ec-arrow{
 display:inline-block;
 transition:transform .25s cubic-bezier(.2,.8,.2,1);
}
.ec-shell .ec-main .ec-btn:hover .ar,
.ec-shell .ec-main .ec-btn:hover .ec-arrow{transform:translateX(4px)}
@media(prefers-reduced-motion:reduce){
 .ec-shell .ec-main .ec-btn,
 .ec-shell .ec-main a.ec-outline-action,
 .ec-shell .ec-main button.ec-outline-action,
 .ec-shell .ec-main .ec-update-cart,
 .ec-shell .ec-main .ec-btn .ar,
 .ec-shell .ec-main .ec-btn .ec-arrow{transition:none}
 .ec-shell .ec-main .ec-btn:hover,
 .ec-shell .ec-main a.ec-outline-action:hover{transform:none}
}

/* Match the approved sport-page headings and fully animate navbar CTAs. */
.ec-shell>.nav.ec-shop-nav .btn{
 font-family:var(--mono),"Space Mono",monospace;
 font-weight:700;
 font-size:12px;
 text-transform:uppercase;
 letter-spacing:.13em;
 transition:transform .25s var(--ease),background-color .25s var(--ease),box-shadow .25s var(--ease),border-color .25s var(--ease);
}
.ec-shell>.nav.ec-shop-nav .btn .ar{
 display:inline-block;
 transform:translateX(0);
 transition:transform .25s var(--ease);
 will-change:transform;
}
.ec-shell>.nav.ec-shop-nav .btn:hover .ar{transform:translateX(5px)}
.ec-shell>.nav.ec-shop-nav .btn:focus-visible{
 outline:2px solid #fff;outline-offset:3px;
}
.ec-shell .ec-shop-banner h1{
 font-family:Archivo,"Arial Black",sans-serif;
 font-weight:900;
 font-style:normal;
 text-transform:uppercase;
 letter-spacing:-.045em;
 line-height:1;
}
.ec-shell .ec-shop-banner h1 span{color:#e70033}
@media(prefers-reduced-motion:reduce){
 .ec-shell>.nav.ec-shop-nav .btn,
 .ec-shell>.nav.ec-shop-nav .btn .ar{transition:none}
 .ec-shell>.nav.ec-shop-nav .btn:hover .ar{transform:none}
}

/* Shared storefront account controls: visible guest cart, signed-in avatar. */
.nav .links{margin-left:auto;justify-content:flex-end}
.nav .links .nav-cta{display:inline-flex;align-items:center;gap:10px}
.nav .links .ec-shop-cart-link{display:inline-flex;align-items:center;justify-content:center;flex:none;gap:8px;min-width:46px;height:46px;padding:0 10px;border:1px solid rgba(255,255,255,.15);border-radius:8px;background:#414e59;color:#fff;text-decoration:none;transition:background .25s ease,transform .25s ease}
.nav .links .ec-shop-cart-link:hover{background:#4c5a67;transform:translateY(-2px)}
.nav .links .ec-shop-account{position:relative;flex:none}
.nav .links .ec-shop-account-trigger{display:flex;align-items:center;justify-content:center;cursor:pointer;list-style:none;user-select:none}
.nav .links .ec-shop-account-trigger::-webkit-details-marker{display:none}
.nav .links .ec-shop-account-trigger::marker{content:''}
.nav .links .ec-shop-avatar{display:grid;place-items:center;width:44px;height:44px;border:1px solid rgba(255,255,255,.55);border-radius:50%;background:rgba(255,255,255,.09);color:#fff;font:700 17px/1 'Hanken Grotesk',Arial,sans-serif;transition:border-color .2s,background .2s,transform .2s}
.nav .links .ec-shop-account-trigger:hover .ec-shop-avatar,.nav .links .ec-shop-account[open] .ec-shop-avatar{background:#536675;border-color:#e70033;transform:translateY(-2px)}
.nav .links .ec-shop-account-dropdown{position:absolute;right:0;top:calc(100% + 14px);z-index:1300;width:238px;padding:9px;background:#fff;border:1px solid #e4e8ed;border-radius:12px;box-shadow:0 20px 48px rgba(16,28,39,.22);color:#2e414f}
.nav .links .ec-shop-account-head{padding:10px 12px 13px;border-bottom:1px solid #e7ebef;margin-bottom:5px}
.nav .links .ec-shop-account-label{display:block;font:800 14px 'Hanken Grotesk',Arial,sans-serif;color:#293d4c;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.nav .links .ec-shop-account-head small{display:block;margin-top:3px;color:#738391;font-size:11px;overflow-wrap:anywhere}
.nav .links .ec-shop-account-dropdown a,.nav .links .ec-shop-account-dropdown button{width:100%;display:flex;align-items:center;gap:11px;padding:12px 11px;color:#34434d;border:0;border-radius:7px;background:transparent;font:700 13px 'Hanken Grotesk',Arial,sans-serif;text-align:left;text-decoration:none;cursor:pointer;transition:background .2s,color .2s}
.nav .links .ec-shop-account-dropdown a:hover,.nav .links .ec-shop-account-dropdown button:hover{background:#f1f4f6;color:#e70033}
.nav .links .ec-shop-account-dropdown form{margin:0;padding:4px 0 0;border-top:1px solid #edf0f2}
.nav .links .ec-shop-mobile-label{display:none}
@media(min-width:901px) and (max-width:1240px){
 .nav .links{gap:14px}
 .nav .links .nav-cta{gap:8px}
 .nav .links .nav-cta .btn{font-size:10px;padding:12px 14px}
}
@media(max-width:900px){
 .nav .links .nav-cta{flex-direction:column;gap:12px}
 .nav .links .ec-shop-mobile-label{display:inline;font:700 11px 'Space Mono',monospace;text-transform:uppercase}
 .nav .links .ec-shop-cart-link{width:150px}
 .nav .links .ec-shop-account-dropdown{position:static;width:min(270px,85vw);margin-top:10px;box-shadow:0 10px 25px rgba(0,0,0,.15)}
 .nav .links .ec-shop-account{display:flex;flex-direction:column;align-items:center}
 .nav .links .ec-shop-account-trigger{align-self:center}
}
@media(prefers-reduced-motion:reduce){.nav .links .ec-shop-cart-link,.nav .links .ec-shop-avatar{transition:none}}

/* Catalog filters and category header, matching the white/ash reference. */
.ec-shell .ec-store-top.ec-store-reference{background:#fff;padding-top:13px;padding-bottom:12px}
.ec-shell .ec-store-reference .ec-catalog-filterbar{display:grid;grid-template-columns:115px minmax(0,1fr);column-gap:20px;padding-top:0}
.ec-shell .ec-store-reference .ec-store-breadcrumb{padding-top:33px}
.ec-shell .ec-store-reference .ec-store-filters{display:grid;grid-template-columns:repeat(5,minmax(85px,1fr)) minmax(205px,1.5fr);gap:12px;align-items:end;min-width:0}
.ec-shell .ec-store-reference .ec-filter-inline-search{min-width:0}
.ec-shell .ec-store-reference .ec-filter-search-wrap{display:flex;align-items:stretch;height:37px;border:1px solid #dce3e8;background:#fff;border-radius:5px;overflow:hidden}
.ec-shell .ec-store-reference .ec-filter-search-wrap:focus-within{outline:2px solid rgba(231,0,51,.18)}
.ec-shell .ec-store-reference .ec-filter-search-wrap input{flex:1;min-width:0;width:100%;height:100%;border:0;background:transparent;outline:0;padding:0 10px;font-size:12px}
.ec-shell .ec-store-reference .ec-filter-search-btn{width:42px;min-width:42px;background:#34434d;border:0;color:#fff;display:grid;place-items:center;cursor:pointer;transition:background .2s}
.ec-shell .ec-store-reference .ec-filter-search-btn:hover{background:#e70033}
.ec-shell .ec-catalog-section{margin:10px 0 19px}
.ec-shell .ec-category-toggle{background:#eceef0;border:0;border-radius:4px;padding:12px 14px;margin:0 0 13px;display:flex;align-items:center;justify-content:space-between;color:#34434d;font-size:21px;cursor:pointer;transition:background-color .2s}
.ec-shell .ec-category-toggle:hover{background:#e3e6e9}
.ec-shell .ec-category-chevron{display:grid;place-items:center;width:32px;height:32px;border-radius:7px;background:#dfe3e6;color:#34434d;transition:transform .25s,background-color .25s}
.ec-shell .ec-category-toggle:hover .ec-category-chevron{background:#d4d9de}
.ec-shell .ec-category-toggle[aria-expanded=false] .ec-category-chevron{transform:rotate(-90deg)}
.ec-shell .ec-category-chevron svg{width:18px;height:18px}
.ec-shell .ec-category-toggle[aria-expanded=false] + .ec-product-grid{display:none}
.ec-shell .ec-category-toggle[aria-expanded=false] ~ .ec-show-more-wrap{display:none}
@media(max-width:1140px){.ec-shell .ec-store-reference .ec-catalog-filterbar{grid-template-columns:1fr}.ec-shell .ec-store-reference .ec-store-breadcrumb{padding:0 0 10px}.ec-shell .ec-store-reference .ec-store-filters{grid-template-columns:repeat(3,minmax(0,1fr))}}
@media(max-width:650px){.ec-shell .ec-store-reference .ec-store-filters{grid-template-columns:repeat(2,minmax(0,1fr));gap:9px}.ec-shell .ec-store-reference .ec-filter-inline-search{grid-column:1/-1}.ec-shell .ec-catalog-section{padding:7px 9px 14px}.ec-shell .ec-category-toggle{font-size:17px}}

/* Shop and Catalog retain the approved homepage slate actions. */
.ec-shell>.nav.ec-shop-nav .nav-cta .btn.shop,
.ec-shell>.nav.ec-shop-nav .nav-cta .btn.catalog{background:#414e59;border-color:#414e59;color:#f4f5f6}
.ec-shell>.nav.ec-shop-nav .nav-cta .btn.shop:hover,
.ec-shell>.nav.ec-shop-nav .nav-cta .btn.catalog:hover{background:#4c5a67;box-shadow:none}
.ec-shell>.nav.ec-shop-nav .nav-cta .btn:not(.shop):not(.catalog){background:#e70033;border-color:#e70033}
.ec-shell>.nav.ec-shop-nav .nav-cta .btn:not(.shop):not(.catalog):hover{background:#b4002a}
.ec-shell>.nav.ec-shop-nav .links{margin-left:auto;gap:20px;display:flex;align-items:center}
.ec-shell>.nav.ec-shop-nav .nav-cta{display:inline-flex;align-items:center;gap:10px}
.ec-shell>.nav.ec-shop-nav .nav-cta .btn .ar{display:inline-block;transition:transform .25s cubic-bezier(.2,.8,.2,1)}
.ec-shell>.nav.ec-shop-nav .nav-cta .btn:hover .ar{transform:translateX(5px)}
@media(max-width:1100px){.ec-shell>.nav.ec-shop-nav .links{gap:12px}.ec-shell>.nav.ec-shop-nav .nav-cta .btn{padding:12px 12px;font-size:10px}}
@media(max-width:900px){.ec-shell>.nav.ec-shop-nav .links{position:fixed;inset:0;background:#333f48;flex-direction:column;justify-content:center;gap:22px;transform:translateY(-100%);transition:transform .5s cubic-bezier(.2,.8,.2,1);z-index:39;overflow-y:auto;padding:95px 20px 35px}.ec-shell>.nav.ec-shop-nav .links.open{transform:translateY(0)}.ec-shell>.nav.ec-shop-nav .nav-cta{flex-direction:column}}

/* Keep the shared account dropdown identical on homepage and shopping pages. */
.ec-shell>.nav.ec-shop-nav .links .ec-shop-account-dropdown{width:238px;padding:9px;border-radius:12px;box-shadow:0 20px 48px rgba(16,28,39,.22)}
.ec-shell>.nav.ec-shop-nav .links .ec-shop-account-head{padding:10px 12px 13px;margin-bottom:5px;border-bottom:1px solid #e7ebef}
.ec-shell>.nav.ec-shop-nav .links .ec-shop-account-label{padding:0;margin:0;border:0;font-weight:800;font-size:14px}
.ec-shell>.nav.ec-shop-nav .links .ec-shop-account-dropdown a,.ec-shell>.nav.ec-shop-nav .links .ec-shop-account-dropdown button{display:flex;align-items:center;gap:11px;padding:12px 11px;font-weight:700;font-size:13px}
.ec-shell>.nav.ec-shop-nav .links .ec-shop-account-dropdown form{padding-top:4px;border-top:1px solid #edf0f2}
@media(max-width:900px){.ec-shell>.nav.ec-shop-nav .links .ec-shop-account-dropdown{position:static;width:min(270px,85vw);margin-top:10px}}

/* Mirror the homepage navbar's shrink, glass, and magnetic button motion. */
.ec-shell>.nav.ec-shop-nav.scrolled{
 background:rgba(51,63,72,.9);
 border-bottom:1px solid var(--edge);
 box-shadow:0 7px 28px rgba(18,26,33,.14);
}
.ec-shell>.nav.ec-shop-nav .logo{height:30px;transition:height .35s var(--ease)}
.ec-shell>.nav.ec-shop-nav.scrolled .logo{height:24px}
.ec-shell>.nav.ec-shop-nav .nav-cta .btn{
 transition:transform .25s var(--ease),background .25s var(--ease),box-shadow .25s var(--ease),border-color .25s var(--ease);
 will-change:transform;
}
@media(prefers-reduced-motion:reduce){
 .ec-shell>.nav.ec-shop-nav .nav-cta .btn{transition:none;will-change:auto}
}

/* ENCORE APPROVED DARK STOREFRONT — account, orders, cart and checkout */
.ec-shell:has(.ec-shop-banner) .ec-main{
 background:
 linear-gradient(105deg,rgba(18,35,49,.96),rgba(24,41,55,.87) 53%,rgba(16,31,44,.96)),
 url('{{ asset('assets/reference/fe710de5b7de040d2fab.jpg') }}') center top / cover fixed!important;
 color:#f5f7fa;
}
.ec-shell:has(.ec-shop-banner){background:#172a39}
.ec-shell:has(.ec-shop-banner) .ec-main:before{
 background:linear-gradient(112deg,transparent 75%,rgba(226,0,48,.11) 75.15%,transparent 84%)!important;
}
.ec-shell .ec-shop-banner{max-width:1440px!important;padding:34px 0 18px!important}
.ec-shell .ec-shop-banner h1{font:900 clamp(37px,4.8vw,68px)/1.04 Archivo,"Arial Black",sans-serif!important;letter-spacing:-.035em!important;color:#fff!important;text-shadow:0 3px 15px rgba(0,0,0,.12)}
.ec-shell .ec-shop-banner h1 span{color:#f00038!important}
.ec-shell .ec-shop-banner p{font-size:16px;color:#d5e0e7}
.ec-shell:has(.ec-shop-banner) .ec-modern-card{
 color:#f1f6f9;
 background:linear-gradient(130deg,rgba(76,94,109,.46),rgba(35,56,72,.72) 76%);
 border:1px solid rgba(214,231,241,.23);
 box-shadow:0 16px 40px rgba(9,21,30,.18),inset 0 1px rgba(255,255,255,.06);
 backdrop-filter:blur(17px);
 -webkit-backdrop-filter:blur(17px);
 border-radius:12px;
}
.ec-shell:has(.ec-shop-banner) .ec-modern-card h2,
.ec-shell:has(.ec-shop-banner) .ec-modern-card h3{color:#f5f7fa;font-family:Archivo,'Arial Black',sans-serif;font-weight:800;text-transform:uppercase;letter-spacing:.005em}
.ec-shell:has(.ec-shop-banner) .ec-modern-card h2{font-size:21px}
.ec-shell:has(.ec-shop-banner) .ec-card-heading{border-bottom-color:rgba(226,237,243,.22)}
.ec-shell:has(.ec-shop-banner) .ec-card-heading>a{color:#f1f5f9}
.ec-shell:has(.ec-shop-banner) .ec-modern-card p,
.ec-shell:has(.ec-shop-banner) .ec-summary-note,
.ec-shell:has(.ec-shop-banner) .ec-settings-info{color:#c3d0da}
.ec-shell:has(.ec-shop-banner) .ec-edit-btn{
 color:#f4f7f8!important;border-color:rgba(229,242,249,.38)!important;
 background:rgba(255,255,255,.035);
}
.ec-shell:has(.ec-shop-banner) .ec-edit-btn:hover{border-color:#e70033!important;color:#fff!important;background:rgba(231,0,51,.16)}
.ec-shell:has(.ec-shop-banner) .ec-outline-action{
 background:rgba(255,255,255,.025);
 border-color:rgba(237,247,250,.67);color:#eff7fb;
}
.ec-shell:has(.ec-shop-banner) .ec-outline-action:hover{background:rgba(255,255,255,.13);color:#fff}
.ec-shell:has(.ec-shop-banner) .ec-proceed{background:#ed0036!important;border:0;color:#fff!important}
.ec-shell:has(.ec-shop-banner) .ec-proceed:hover{background:#bb002c!important}
.ec-shell:has(.ec-shop-banner) .ec-modern-card .ec-input,
.ec-shell:has(.ec-shop-banner) .ec-modern-card .ec-select,
.ec-shell:has(.ec-shop-banner) .ec-modern-card input:not([type=checkbox]):not([type=radio]):not([type=hidden]){
 background:rgba(241,248,251,.075);border:1px solid rgba(222,239,247,.32);
 color:#f7fbfe;box-shadow:none;
}
.ec-shell:has(.ec-shop-banner) .ec-modern-card input::placeholder{color:#a8b9c5}
.ec-shell:has(.ec-shop-banner) .ec-modern-card select option{color:#203747;background:#e9eef3}
.ec-shell:has(.ec-shop-banner) .ec-modern-card label,
.ec-shell:has(.ec-shop-banner) .ec-profile-details span{color:#cfdbe4}
.ec-shell:has(.ec-shop-banner) .ec-summary-line,
.ec-shell:has(.ec-shop-banner) .ec-modern-summary .ec-row,
.ec-shell:has(.ec-shop-banner) .ec-order-history-row,
.ec-shell:has(.ec-shop-banner) .ec-checkout-mini-item{border-color:rgba(223,238,246,.23);color:#f1f6f9}
.ec-shell:has(.ec-shop-banner) .ec-modern-summary .ec-price,.ec-shell:has(.ec-shop-banner) .ec-cart-unit-price,.ec-shell:has(.ec-shop-banner) .ec-cart-line-price{color:#ff315b}
.ec-shell .ec-account-grid{grid-template-columns:270px minmax(0,1fr);gap:23px}
.ec-shell .ec-account-sidebar{min-height:320px;padding:14px;gap:4px}
.ec-shell .ec-account-sidebar a,.ec-shell .ec-account-sidebar button{
 color:#edf5fa;padding:17px 16px;text-transform:uppercase;letter-spacing:.07em;font:700 12px 'Space Mono',monospace;
 border-radius:8px;
}
.ec-shell .ec-account-sidebar a:hover,.ec-shell .ec-account-sidebar button:hover{background:rgba(255,255,255,.13);color:#fff}
.ec-shell .ec-account-sidebar a.active{background:#e70033;color:#fff}
.ec-shell .ec-account-sidebar form{border-color:rgba(237,247,250,.22)}
.ec-shell .ec-account-intro{min-height:150px}
.ec-shell .ec-account-intro h2{font-size:27px}
.ec-shell .ec-account-intro p{color:#d8e3eb}
.ec-shell .ec-account-intro span{border:1px solid rgba(235,247,252,.25);background:rgba(255,255,255,.07);color:#dbe8f1}
.ec-shell .ec-account-avatar{background:#e5ecf0;color:#2b4150;border:1px solid rgba(255,255,255,.5)}
.ec-shell .ec-account-intro-art{opacity:.58}
.ec-shell .ec-account-columns{gap:17px}
.ec-shell .ec-profile-details strong{
 color:#f4f9fb;background:rgba(225,242,250,.065);border:1px solid rgba(232,245,251,.19);
}
.ec-shell .ec-stats-grid>div:nth-child(n){
 border:1px solid rgba(255,255,255,.17);
 background:rgba(204,222,232,.1);
}
.ec-shell .ec-stats-grid>div:nth-child(2){background:rgba(246,190,71,.16)}
.ec-shell .ec-stats-grid>div:nth-child(3){background:rgba(59,202,134,.17)}
.ec-shell .ec-stats-grid>div:nth-child(4){background:rgba(232,90,113,.18)}
.ec-shell .ec-stats-grid strong{color:#fff}
.ec-shell .ec-stats-grid span{color:#dae5ec;text-transform:uppercase;letter-spacing:.02em}
.ec-shell .ec-account-address strong{color:#fff}
.ec-shell .ec-account-address p{color:#dce8f0}
.ec-shell .ec-address-tag{background:rgba(231,0,51,.2);color:#ffcbd5}
.ec-shell .ec-orders-panel{min-height:480px}
.ec-shell .ec-order-filters{display:flex;gap:7px;flex-wrap:wrap;padding:17px 0 21px}
.ec-shell .ec-order-filters button{
 border:1px solid rgba(218,238,247,.21);border-radius:7px;
 background:rgba(223,241,251,.065);color:#e6eff4;padding:11px 13px;
 cursor:pointer;font:700 11px 'Space Mono',monospace;
 transition:background .22s,border-color .22s,transform .22s;
}
.ec-shell .ec-order-filters button:hover{background:rgba(232,243,249,.17);transform:translateY(-1px)}
.ec-shell .ec-order-filters button.is-active{background:#e70033;border-color:#e70033}
.ec-shell .ec-order-history-row{grid-template-columns:minmax(0,1.5fr) auto auto auto;min-height:96px;padding:20px 5px}
.ec-shell .ec-order-history-row[hidden]{display:none!important}
.ec-shell .ec-order-row-main strong{display:block;font-size:18px;color:#fff}
.ec-shell .ec-order-row-main span{display:block;color:#b8cbd6;font-size:12px}
.ec-shell .ec-order-row-kicker{font:700 10px 'Space Mono',monospace!important;letter-spacing:.12em;margin-bottom:7px}
.ec-shell .ec-order-status{border:1px solid rgba(244,236,210,.19);background:rgba(228,169,56,.16);color:#fce2a6}
.ec-shell .ec-order-amount{color:#fff;font-size:16px}
.ec-shell .ec-order-filter-empty{padding:35px;text-align:center;color:#d5e1e8}
.ec-shell .ec-modern-cart-item{grid-template-columns:130px minmax(0,1fr) auto;align-items:center;border-color:rgba(223,237,246,.23)}
.ec-shell .ec-cart-product-image{width:130px;min-height:130px;background:rgba(255,255,255,.08)}
.ec-shell .ec-cart-product-image img{height:130px;object-fit:contain}
.ec-shell .ec-cart-product-body h3{font:800 18px Archivo,sans-serif;color:#fff}
.ec-shell .ec-cart-product-body p{color:#cbd9e3}
.ec-shell .ec-qty-control{border-color:rgba(233,243,249,.4)}
.ec-shell .ec-qty-control button{background:rgba(231,241,248,.15);color:#fff}
.ec-shell .ec-qty-control input{background:rgba(231,241,248,.06);color:#fff}
.ec-shell .ec-update-cart{border:1px solid rgba(255,255,255,.3);background:rgba(255,255,255,.08)}
.ec-shell .ec-remove-cart,.ec-shell .ec-clear-cart{color:#ff557a}
.ec-shell .ec-trust-row{color:#d7e6ef}
.ec-shell .ec-shipping-form .ec-checkout-addresses{display:flex;flex-direction:column;gap:18px}
.ec-shell .ec-shipping-form .ec-checkout-addresses>.ec-address-form-card{width:100%}
.ec-shell .ec-checkout-mini-item{grid-template-columns:65px minmax(0,1fr) auto}
.ec-shell .ec-checkout-mini-item strong,.ec-shell .ec-checkout-mini-item span{color:#fff}
.ec-shell .ec-checkout-mini-item small{color:#c3d0d9}
.ec-shell .ec-checkout-mini-item img{background:rgba(255,255,255,.1)}
.ec-shell .ec-item-count{background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);color:#eaf2f7}
.ec-shell .ec-card-type-options span{background:rgba(255,255,255,.07);border-color:rgba(235,245,250,.24);color:#fff}
.ec-shell .ec-card-type-options input:checked+span{background:rgba(6,125,78,.23);border-color:#63cd94;color:#fff}
.ec-shell .ec-modern-payment .ec-muted{color:#cbdce6}
.ec-shell .ec-modern-payment .ec-field label{color:#e4edf3}
.ec-shell .ec-success-card{max-width:920px}
.ec-shell .ec-success-check{background:rgba(75,213,125,.14);border:2px solid #7ce7a8;color:#83f0ad}
.ec-shell .ec-empty h2{color:#fff}
.ec-shell .ec-success-card p{color:#c8d9e4}
.ec-shell .ec-clear-dialog{background:#263b4c;color:#f3f8fb;border:1px solid rgba(220,240,250,.3)}
.ec-shell .ec-clear-dialog p{color:#cfdae2}
@media(max-width:1100px){.ec-shell .ec-account-grid{grid-template-columns:225px minmax(0,1fr)}.ec-shell .ec-order-history-row{grid-template-columns:1fr auto}}
@media(max-width:850px){.ec-shell .ec-account-grid,.ec-shell .ec-checkout-grid{grid-template-columns:1fr}.ec-shell .ec-account-sidebar{position:static;min-height:0;flex-direction:row;flex-wrap:wrap}.ec-shell .ec-account-columns{grid-template-columns:1fr 1fr}}
@media(max-width:640px){.ec-shell:has(.ec-shop-banner) .ec-main{background-attachment:scroll!important}.ec-shell .ec-account-columns{grid-template-columns:1fr}.ec-shell .ec-modern-cart-item{grid-template-columns:85px minmax(0,1fr)}.ec-shell .ec-cart-product-image{width:85px;min-height:95px}.ec-shell .ec-cart-product-image img{height:95px}.ec-shell .ec-order-history-row{grid-template-columns:1fr 1fr}.ec-shell .ec-order-history-row .ec-edit-btn{grid-column:1/-1}.ec-shell .ec-account-sidebar a,.ec-shell .ec-account-sidebar button{font-size:10px;padding:10px}}

/* Payment and confirmation reference compositions. */
.ec-shell .ec-modern-payment{padding:30px;gap:17px}
.ec-shell .ec-modern-payment .ec-card-heading{margin-bottom:0}
.ec-shell .ec-secure-inline{font:700 11px 'Space Mono',monospace;color:#83dfb4;white-space:nowrap}
.ec-shell .ec-payment-fieldlist{display:flex;flex-direction:column;gap:16px;padding:12px 0 0;border-top:1px solid rgba(235,247,253,.2)}
.ec-shell .ec-modern-payment .ec-field{display:flex;flex-direction:column;gap:7px}
.ec-shell .ec-modern-payment .ec-field label{font:700 12px 'Space Mono',monospace;text-transform:uppercase;letter-spacing:.06em}
.ec-shell .ec-modern-payment .ec-field .ec-input,.ec-shell .ec-modern-payment .ec-field .ec-select{min-height:45px}
.ec-shell .ec-payment-expiry{display:grid;grid-template-columns:1fr 1fr 1fr;gap:14px}
.ec-shell .ec-card-type-field legend{font:700 13px 'Space Mono',monospace;text-transform:uppercase;letter-spacing:.08em;padding-bottom:10px}
.ec-shell .ec-card-type-options span{font-weight:800;font-size:14px;min-height:55px}
.ec-shell .ec-payment-note{display:flex;align-items:center;gap:15px;padding:17px;background:rgba(125,217,170,.09);border:1px solid rgba(123,219,166,.24);border-radius:8px}
.ec-shell .ec-payment-note>span{color:#8ee3b1;font-size:26px}
.ec-shell .ec-payment-note p{margin:0;color:#d8e7ed;font-size:12px;line-height:1.65}
.ec-shell .ec-payment-summary .ec-summary-total{margin-top:10px;padding-top:18px;font-size:21px}
.ec-shell .ec-payment-summary .ec-price{color:#ff3a62;font-weight:900;font-size:27px}
.ec-shell .ec-payment-trust{display:flex;align-items:center;gap:26px;justify-content:space-between;margin:22px auto 0;max-width:1420px;border:1px solid rgba(234,248,253,.22);border-radius:11px;padding:21px 29px;background:rgba(225,239,249,.075);color:#dbe9f0;backdrop-filter:blur(13px)}
.ec-shell .ec-payment-trust strong{font:800 16px Archivo,sans-serif;white-space:nowrap}
.ec-shell .ec-payment-trust span{font-size:13px;color:#c5d6df}
.ec-shell .ec-confirmation-wrap{max-width:1320px;margin:0 auto;display:flex;flex-direction:column;gap:18px}
.ec-shell .ec-confirmation-banner{display:flex;align-items:center;gap:35px;padding:29px 35px}
.ec-shell .ec-confirmation-banner .ec-success-check{margin:0;flex:none}
.ec-shell .ec-confirmation-copy h2{font-size:29px;margin:0 0 9px}
.ec-shell .ec-confirmation-copy p{font-size:15px;line-height:1.65;margin:0}
.ec-shell .ec-confirmation-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}
.ec-shell .ec-confirmation-detail{padding:27px}
.ec-shell .ec-confirmation-detail h2{margin:0 0 14px}
.ec-shell .ec-confirmation-detail p{font-size:14px;line-height:1.7}
.ec-shell .ec-confirmation-detail .ec-outline-action{margin-top:22px}
.ec-shell .ec-confirmation-actions{display:flex;align-items:center;justify-content:center;gap:18px;padding:8px 0}
.ec-shell .ec-confirmation-actions>a{width:min(300px,100%);margin:0;min-height:50px}
.ec-shell .ec-confirmation-support{margin:5px auto 30px;text-align:center;color:#c5d8e1;font-size:13px}
.ec-shell .ec-confirmation-support a{color:#fff}
.ec-shell .ec-account-settings{max-width:none}
.ec-shell .ec-account-settings .ec-shop-form{gap:23px}
.ec-shell .ec-account-settings .ec-fieldset{grid-template-columns:1fr 1fr}
.ec-shell .ec-account-settings .ec-input{min-height:48px}
.ec-shell .ec-account-settings small{color:#c5d8e0}
.ec-shell .ec-account-settings .ec-proceed{max-width:360px}
.ec-shell .ec-modern-card .ec-row{border-color:rgba(232,244,250,.2);color:#eaf3f8}
.ec-shell .ec-modern-card .ec-row strong{color:#fff}
.ec-shell .ec-modern-card .ec-summary-line strong{color:#fff}
.ec-shell .ec-cart-product-body .ec-qty-control input{background:rgba(222,239,249,.08)}
.ec-shell .ec-account-overview .ec-proceed{box-shadow:none}
.ec-shell .ec-clear-cart{color:#f2c8d0}
.ec-shell .ec-clear-cart:hover{color:#ff5277}
@media(max-width:900px){.ec-shell .ec-payment-expiry{grid-template-columns:repeat(3,minmax(0,1fr))}.ec-shell .ec-confirmation-grid{grid-template-columns:1fr}.ec-shell .ec-confirmation-banner{gap:20px}}
@media(max-width:640px){.ec-shell .ec-payment-expiry{grid-template-columns:1fr 1fr}.ec-shell .ec-payment-expiry>.ec-field:last-child{grid-column:1/-1}.ec-shell .ec-confirmation-banner{flex-direction:column;text-align:center}.ec-shell .ec-confirmation-actions{flex-direction:column}.ec-shell .ec-confirmation-actions>a{width:100%}.ec-shell .ec-payment-trust{flex-direction:column;align-items:flex-start}.ec-shell .ec-account-settings .ec-fieldset{grid-template-columns:1fr}.ec-shell .ec-order-filters button{flex:1 1 40%}}

/* Continue the approved slate theme through the footer on redesigned routes. */
.ec-shell:has(.ec-shop-banner) .ec-shop-footer{
 background:#1b2c39!important;
 color:#e1ebf1;
 border-top:1px solid rgba(227,241,249,.19);
}
.ec-shell:has(.ec-shop-banner) .ec-shop-footer h3{color:#f1f6f9}
.ec-shell:has(.ec-shop-banner) .ec-shop-footer a,
.ec-shell:has(.ec-shop-banner) .ec-shop-footer p{color:#c1d2de}
.ec-shell:has(.ec-shop-banner) .ec-shop-footer a:hover{color:#fff}
.ec-shell:has(.ec-shop-banner) .ec-shop-footer-center small{color:#9db3c1}
.ec-shell:has(.ec-shop-banner) .ec-shop-footer-center img{filter:none}
.ec-shell:has(.ec-shop-banner) .ec-cart-list .ec-card-heading,
.ec-shell:has(.ec-shop-banner) .ec-checkout-summary .ec-card-heading{margin-bottom:14px}
@media(max-width:640px){
 .ec-shell:has(.ec-shop-banner) .ec-modern-summary{position:static}
 .ec-shell:has(.ec-shop-banner) .ec-modern-card h2{font-size:18px}
}

/* Encore Custom athletic sign-in and registration — approved visual direction. */
.ec-shell:has(.ec-auth-hero){background:#132634}
.ec-shell:has(.ec-auth-hero) .ec-main{
 width:100%;max-width:none;margin:0;flex:1;
 padding:0!important;background:#152738;
}
.ec-shell .ec-auth-hero{
 position:relative;isolation:isolate;
 display:flex;align-items:center;justify-content:center;
 min-height:calc(100svh - 78px);
 margin:0!important;padding:65px 20px 80px!important;
 background:linear-gradient(100deg,rgba(11,27,43,.83),rgba(20,38,56,.71) 46%,rgba(10,24,39,.9)),url('{{ asset('assets/reference/b46204161d649c9f879a.jpg') }}') center 39%/cover no-repeat!important;
 overflow:hidden;
}
.ec-shell .ec-auth-hero:before{content:none!important}
.ec-shell .ec-auth-hero:after{
 content:"";position:absolute;z-index:-1;pointer-events:none;
 inset:0;background:
 linear-gradient(116deg,transparent 4%,rgba(236,0,53,.62) 4.2%,rgba(236,0,53,.62) 6.8%,transparent 7%),
 linear-gradient(116deg,transparent 89%,rgba(236,0,53,.65) 89.2%,rgba(236,0,53,.65) 92%,transparent 92.2%);
}
.ec-shell .ec-auth-scene{
 position:absolute;inset:0;z-index:-1;pointer-events:none;
 background:radial-gradient(ellipse 60% 70% at 50% 40%,transparent 0%,rgba(8,18,29,.35) 95%);
}
.ec-shell .ec-auth-wrap{width:100%;max-width:680px;margin:auto;position:relative;z-index:1}
.ec-shell .ec-auth-card{
 padding:clamp(27px,4.5vw,54px);
 border-radius:22px;
 background:linear-gradient(130deg,#fff,#f8faff 68%,#f2f6fc);
 border:1px solid rgba(255,255,255,.95);
 box-shadow:0 28px 85px rgba(0,0,0,.35);
 color:#1c2e3d;
}
.ec-shell .ec-auth-brand{display:block;width:max-content;max-width:100%;margin:0 auto 30px}
.ec-shell .ec-auth-logo{width:255px;max-width:100%;height:auto;max-height:72px;object-fit:contain;margin:0;filter:brightness(0)}
.ec-shell .ec-auth-title{
 font:900 clamp(35px,4.3vw,58px)/1.04 Archivo,"Arial Black",sans-serif;
 color:#243645;text-align:center;letter-spacing:-.045em;
 margin:0 0 10px;
}
.ec-shell .ec-auth-title span{color:#e70033}
.ec-shell .ec-auth-subtitle{font-size:15px;line-height:1.55;text-align:center;margin:0 0 31px;color:#647485}
.ec-shell .ec-auth-form{gap:18px}
.ec-shell .ec-auth-form .ec-field{margin:0;min-width:0}
.ec-shell .ec-auth-form .ec-field>label{
 display:block;font:700 13px/1.3 'Hanken Grotesk',Arial,sans-serif;
 color:#263846;margin-bottom:9px;
}
.ec-shell .ec-auth-required{color:#e70033}
.ec-shell .ec-auth-name-row{display:grid;grid-template-columns:1fr 1fr;gap:15px}
.ec-shell .ec-auth-control{position:relative;display:flex;align-items:center;min-width:0}
.ec-shell .ec-auth-control .ec-auth-field-icon{
 position:absolute;z-index:1;left:15px;display:flex;align-items:center;
 color:#485d70;pointer-events:none;
}
.ec-shell .ec-auth-field-icon svg{width:21px;height:21px;display:block}
.ec-shell .ec-auth-control .ec-input{
 width:100%;min-width:0;min-height:54px;
 padding:13px 15px 13px 48px;
 color:#142b3c;font:500 15px 'Hanken Grotesk',Arial,sans-serif;
 border:1px solid #c4d1e1;border-radius:8px;
 background:linear-gradient(95deg,#edf2fc,#e6eefb)!important;
 outline:none;box-shadow:none;
 transition:border-color .2s ease,box-shadow .2s ease,background .2s ease;
}
.ec-shell .ec-auth-control .ec-input::placeholder{color:#79889b;opacity:1}
.ec-shell .ec-auth-control .ec-input:hover{border-color:#aabdd0}
.ec-shell .ec-auth-control .ec-input:focus{border-color:#e70033;box-shadow:0 0 0 3px rgba(231,0,51,.12)}
.ec-shell .ec-auth-control.ec-password-wrap .ec-input{padding-right:91px!important}
.ec-shell .ec-auth-control .ec-password-toggle{
 position:absolute;right:8px;top:50%;transform:translateY(-50%);
 display:flex;align-items:center;gap:6px;
 background:transparent;color:#3a5367;
 border:0;border-left:1px solid #bfccdc;border-radius:0;
 font-size:12px;padding:7px 9px;cursor:pointer;
}
.ec-shell .ec-auth-control .ec-password-toggle svg{width:19px;height:19px}
.ec-shell .ec-auth-control .ec-password-toggle:hover{color:#e70033}
.ec-shell .ec-auth-control .ec-password-toggle:focus-visible{outline:2px solid #e70033;outline-offset:2px;border-radius:4px}
.ec-shell .ec-auth-form .ec-auth-submit{
 min-height:57px;margin:10px 0 0;padding:15px 22px;
 background:#e70033!important;border:0;border-radius:8px;
 color:#fff;font:800 15px 'Space Mono',monospace!important;
 letter-spacing:.04em;
 display:flex;align-items:center;justify-content:center;gap:16px;
 transition:background .25s ease,box-shadow .25s ease,transform .25s ease;
}
.ec-shell .ec-auth-form .ec-auth-submit:hover{background:#c0002e!important;transform:translateY(-2px);box-shadow:0 12px 23px rgba(231,0,51,.25)}
.ec-shell .ec-auth-form .ec-auth-submit .ec-auth-cta-arrow{display:inline-block;transition:transform .25s ease}
.ec-shell .ec-auth-form .ec-auth-submit:hover .ec-auth-cta-arrow{transform:translateX(5px)}
.ec-shell .ec-auth-bottom{
 display:flex;align-items:center;justify-content:center;flex-wrap:wrap;
 border-top:1px solid #d9e0e8;padding-top:24px;margin-top:27px;gap:10px;
 color:#617384;font-size:15px;
}
.ec-shell .ec-auth-bottom a{display:inline-flex;align-items:center;gap:6px;color:#e70033;font-weight:800;text-decoration:none;transition:gap .2s ease}
.ec-shell .ec-auth-bottom a:hover{gap:11px;text-decoration:underline}
.ec-shell .ec-auth-errors{margin:0 0 22px;padding:13px 17px;border-left:3px solid #e70033;background:#fff1f4;border-radius:5px;color:#a30a2d;font-size:13px;line-height:1.5}
.ec-shell .ec-auth-errors p{margin:4px 0}
.ec-shell:has(.ec-auth-hero) .ec-shop-footer{background:#1c2d3c;color:#dee8f0;border-top:1px solid rgba(255,255,255,.13)}
.ec-shell:has(.ec-auth-hero) .ec-shop-footer a,.ec-shell:has(.ec-auth-hero) .ec-shop-footer p{color:#c7d8e4}
.ec-shell:has(.ec-auth-hero) .ec-shop-footer h3{color:#fff}
@media(max-width:650px){
 .ec-shell .ec-auth-hero{min-height:calc(100svh - 68px);padding:25px 13px 45px!important}
 .ec-shell .ec-auth-card{border-radius:15px;padding:29px 20px}
 .ec-shell .ec-auth-brand{margin-bottom:23px}
 .ec-shell .ec-auth-logo{width:210px}
 .ec-shell .ec-auth-name-row{grid-template-columns:1fr;gap:15px}
 .ec-shell .ec-auth-title{font-size:clamp(32px,9vw,43px)}
 .ec-shell .ec-auth-subtitle{font-size:13px;margin-bottom:25px}
 .ec-shell .ec-auth-form{gap:14px}
 .ec-shell .ec-auth-control .ec-input{min-height:50px}
}
@media(prefers-reduced-motion:reduce){
 .ec-shell .ec-auth-control .ec-input,.ec-shell .ec-auth-form .ec-auth-submit,.ec-shell .ec-auth-form .ec-auth-submit .ec-auth-cta-arrow{transition:none}
 .ec-shell .ec-auth-form .ec-auth-submit:hover,.ec-shell .ec-auth-form .ec-auth-submit:hover .ec-auth-cta-arrow{transform:none}
}
