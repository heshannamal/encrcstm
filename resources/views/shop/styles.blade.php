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
.ec-shop-banner:before{content:"";position:absolute;inset:0;z-index:-2;background:linear-gradient(95deg,#1b2b37 0%,rgba(25,39,50,.96) 48%,rgba(25,39,50,.65) 100%),url('{{ asset('assets/reference/0ca88fee07db45bfe5f9.jpg') }}') right 40%/cover no-repeat}
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
