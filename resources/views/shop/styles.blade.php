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
.ec-shop-footer{background:#f8f8f8;border-top:1px solid #e4e7e9;padding:36px max(5vw,25px);display:grid;grid-template-columns:1fr 1.6fr 1fr;gap:22px;align-items:start}
.ec-shop-footer-col{display:flex;flex-direction:column;align-items:flex-start;gap:10px;color:#657483;font-size:13px}
.ec-shop-footer-col h3{font-size:19px;color:#33414a;font-weight:500;margin:0 0 3px}
.ec-shop-footer-col a{color:#657483;text-decoration:none}
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

/* Shopping navbar: original four-link sport navbar over a brand gradient. */
.ec-shell{padding-top:80px}
.ec-shell>.ec-shop-nav{background:linear-gradient(112deg,#30483f 0%,#354d47 42%,#34434d 100%);box-shadow:0 2px 12px rgba(22,46,39,.08)}
.ec-shell>.ec-shop-nav.scrolled{background:linear-gradient(112deg,rgba(44,66,59,.95),rgba(51,63,72,.95));box-shadow:0 8px 28px rgba(20,42,36,.19)}
.ec-shell>.ec-shop-nav .rt{display:flex;gap:26px;align-items:center}
.ec-shell>.ec-shop-nav .rt a.nl{font-family:var(--mono);font-size:12px;letter-spacing:.14em;text-transform:uppercase;color:var(--paper);opacity:.8;position:relative;padding:6px 0;text-decoration:none}
.ec-shell>.ec-shop-nav .rt a.nl:hover{opacity:1}
.ec-shell>.ec-shop-nav .rt a.nl::after{content:"";position:absolute;left:0;bottom:0;height:2px;width:0;background:var(--red);transition:width .3s var(--ease)}
.ec-shell>.ec-shop-nav .rt a.nl:hover::after{width:100%}
.ec-shell>.ec-shop-nav .btn.catalog{background:#414E59;border-color:#414E59}
.ec-shell>.ec-shop-nav .btn.catalog:hover{background:#4C5A67;box-shadow:none}
.ec-shell>.ec-shop-nav .btn:not(.catalog){background:var(--red);border-color:var(--red)}
.ec-shell>.ec-shop-nav .btn:not(.catalog):hover{background:var(--red-deep)}
@media(max-width:900px){
 .ec-shell>.ec-shop-nav .rt{position:fixed;inset:0;display:flex;flex-direction:column;justify-content:center;gap:26px;background:linear-gradient(145deg,#30483f,#34434d);transform:translateY(-100%);transition:transform .5s var(--ease);z-index:39}
 .ec-shell>.ec-shop-nav .rt.open{transform:translateY(0)}
 .ec-shell>.ec-shop-nav .rt a.nl{font-size:16px}
 .ec-shell>.ec-shop-nav .burger{display:flex;z-index:41}
}
@media(prefers-reduced-motion:reduce){.ec-shell>.ec-shop-nav .rt{transition:none}}

/* Catalog masthead: green-to-slate gradient behind the search, title and filters. */
.ec-shell:has(.ec-store-reference){--ec-catalog-green:#29463e;--ec-catalog-slate:#333f48}
.ec-shell:has(.ec-store-reference) .ec-main{padding-top:0}
.ec-shell .ec-store-top.ec-store-reference{
 position:relative;isolation:isolate;
 background:linear-gradient(113deg,#253e36 0%,#315348 35%,#344b47 62%,#333f48 100%);
 color:#f4f7f5;
 border-bottom:1px solid rgba(255,255,255,.12);
 box-shadow:0 14px 36px rgba(30,49,43,.13);
 padding-top:14px;padding-bottom:16px;
}
.ec-shell .ec-store-reference .ec-catalog-toolbar{border-bottom:1px solid rgba(255,255,255,.19)}
.ec-shell .ec-store-reference .ec-catalog-toolbar-title{color:#fff;text-shadow:0 1px 7px rgba(0,0,0,.09)}
.ec-shell .ec-store-reference .ec-store-breadcrumb,
.ec-shell .ec-store-reference .ec-store-breadcrumb a{color:#d9e7df}
.ec-shell .ec-store-reference .ec-store-breadcrumb a:hover{color:#fff}
.ec-shell .ec-store-reference .ec-store-filters .ec-field label{color:#e5eee8}
.ec-shell .ec-store-reference .ec-store-filters .ec-select{
 background:rgba(255,255,255,.96);color:#34434d;border-color:rgba(255,255,255,.3);
}
.ec-shell .ec-store-reference .ec-catalog-results{color:#e1ede7}
.ec-shell .ec-store-reference .ec-catalog-results a{color:#e4efe9}
.ec-shell .ec-store-reference .ec-catalog-results a:hover{color:#fff}
.ec-shell .ec-store-reference .ec-catalog-search{background:#fff;border-color:rgba(255,255,255,.42)}
.ec-shell .ec-store-reference .ec-catalog-search button{background:#e70033;color:#fff}
.ec-shell .ec-store-reference .ec-catalog-search button:hover{background:#b4002a}
.ec-shell .ec-store-reference .ec-filter-apply{background:#e70033;color:#fff}
.ec-shell .ec-store-reference .ec-filter-apply:hover{background:#b4002a}
/* The one fixed sport-style navigation remains visible at top and bottom. */
.ec-shell>.nav.ec-shop-nav{
 position:fixed;inset:0 0 auto;top:0;left:0;right:0;width:100%;z-index:1100;
 padding:20px var(--pad);
 background:linear-gradient(113deg,#253e36 0%,#315348 35%,#344b47 62%,#333f48 100%);
 border-bottom:1px solid rgba(255,255,255,.08);
 box-shadow:none;
 transition:padding .35s var(--ease),background .35s var(--ease),border-color .35s var(--ease),box-shadow .35s var(--ease);
}
.ec-shell>.nav.ec-shop-nav.scrolled{
 position:fixed;top:0;left:0;right:0;
 padding:11px var(--pad);
 background:linear-gradient(113deg,rgba(37,62,54,.96),rgba(51,63,72,.96));
 backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);
 box-shadow:0 8px 26px rgba(21,38,35,.19);
 border-bottom:1px solid rgba(255,255,255,.14);
}
.ec-shell>.nav.ec-shop-nav .logo{height:28px;transition:height .35s var(--ease)}
.ec-shell>.nav.ec-shop-nav.scrolled .logo{height:22px}
.ec-shell>.nav.ec-shop-nav .rt{gap:26px}
.ec-shell>.nav.ec-shop-nav .rt a.nl{font-size:12px;letter-spacing:.14em}
.ec-shell>.nav.ec-shop-nav .btn{border-radius:9px;padding:13px 22px;letter-spacing:.14em}
.ec-shell>.nav.ec-shop-nav .rt a.nl::after{background:#e70033}
.ec-shell>.nav.ec-shop-nav .rt a.btn:hover{transform:translateY(-1px)}
@media(max-width:900px){
 .ec-shell>.nav.ec-shop-nav .rt{position:fixed;inset:0;background:linear-gradient(145deg,#29463e,#333f48);overflow-y:auto;z-index:39}
 .ec-shell>.nav.ec-shop-nav .rt.open{transform:translateY(0)}
 .ec-shell>.nav.ec-shop-nav .burger{z-index:41}
}
@media(max-width:650px){
 .ec-shell .ec-store-top.ec-store-reference{padding-top:10px;padding-bottom:14px}
 .ec-shell .ec-store-reference .ec-catalog-toolbar{min-height:62px}
}
@media(prefers-reduced-motion:reduce){
 .ec-shell>.nav.ec-shop-nav,.ec-shell>.nav.ec-shop-nav .logo{transition:none}
}
