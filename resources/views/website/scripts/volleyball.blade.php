
(function(){
 var reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 window.addEventListener('load',function(){document.body.classList.add('loaded');setTimeout(function(){document.getElementById('loader').classList.add('gone');},reduce?0:800);});
 setTimeout(function(){document.body.classList.add('loaded');document.getElementById('loader').classList.add('gone');},2600);

 var nav=document.getElementById('nav'),sw=document.getElementById('switch'),lastY=0;
 window.addEventListener('scroll',function(){
  var y=window.scrollY;
  nav.classList.toggle('scrolled',y>40);
  // show sport switcher after leaving hero, when scrolling up OR deep in page
  if(y>window.innerHeight*0.7){ sw.classList.add('show'); } else { sw.classList.remove('show'); }
  lastY=y;
 },{passive:true});

 var burger=document.getElementById('burger');
 burger.addEventListener('click',function(){ sw.classList.toggle('show'); });

 var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target);}});},{threshold:.16});
 document.querySelectorAll('.reveal').forEach(function(el){io.observe(el);});

 /* volleyball club logo banner (swap .lb-name for <img> when logos arrive) */
 (function(){
  var lt=document.getElementById('logoTrack');
  if(!lt) return;
  var clubs=['Marin Volleyball','Woodcreek High School','Infinite Training Volleyball Club','Endless Beach Volleyball','High Impact Volleyball','Kingtide Volleyball Club','Evolve Volleyball Club','Amplify Volleyball','Holy Angels School','Antelope Volleyball Club'];
  function seg(){ return clubs.map(function(n){return '<span class="lb-item"><span class="lb-name">'+n+'</span></span>';}).join('<span class="lb-d">◆</span>')+'<span class="lb-d">◆</span>'; }
  lt.innerHTML=seg()+seg();
 })();

 /* hero slideshow: slow crossfade */
 (function(){
  var slides=[].slice.call(document.querySelectorAll('.hslide'));
  if(slides.length<2 || reduce) return;
  var i=0;
  setInterval(function(){
   slides[i].classList.remove('on');
   i=(i+1)%slides.length;
   slides[i].classList.add('on');
  }, 5000);
 })();

 /* fabric cards: play the fabric video on hover when one is present */
 document.querySelectorAll('.fabc').forEach(function(c){
  var v=c.querySelector('.media video');
  if(!v) return;
  c.addEventListener('mouseenter',function(){ var p=v.play&&v.play(); if(p&&p.catch)p.catch(function(){}); });
  c.addEventListener('mouseleave',function(){ if(v.pause)v.pause(); });
 });

 /* fabric: reserve the hover-expand height so nothing below the grid moves */
 (function(){
  var grid=document.querySelector('.fab-grid'); if(!grid) return;
  var mq=window.matchMedia('(max-width:900px)');
  function reserve(){
   grid.style.minHeight='';
   if(mq.matches) return;
   var max=0;
   grid.querySelectorAll('.fabc').forEach(function(c){
    var more=c.querySelector('.fab-more');
    var h=c.offsetHeight + (more?more.scrollHeight+14:0);
    if(h>max) max=h;
   });
   if(max) grid.style.minHeight=max+'px';
  }
  reserve();
  window.addEventListener('resize',reserve);
  if(document.fonts&&document.fonts.ready) document.fonts.ready.then(reserve);
  setTimeout(reserve,400);
 })();
 if(!reduce){
  document.querySelectorAll('.btn').forEach(function(b){
   b.addEventListener('mousemove',function(e){var r=b.getBoundingClientRect();b.style.transform='translate('+((e.clientX-r.left-r.width/2)*.18)+'px,'+((e.clientY-r.top-r.height/2)*.28)+'px)';});
   b.addEventListener('mouseleave',function(){b.style.transform='';});
  });
 }
 document.querySelectorAll('.switch a:not(.active)').forEach(function(a){a.addEventListener('click',function(e){e.preventDefault();});});

 /* logo returns to the home page (closes the overlay when embedded) */
 function goHome(){ if(window.parent!==window){ window.parent.postMessage('encore:home','*'); } else { window.location.href=@json(route('home')); } }
 var homeLink=document.getElementById('homeLink');
 if(homeLink) homeLink.addEventListener('click',function(e){ e.preventDefault(); goHome(); });

 /* start-a-kit chooser modal */
 var modal=document.getElementById('kitModal'), toast=document.getElementById('toast'), tT;
 function openKit(){ modal.classList.add('on'); modal.setAttribute('aria-hidden','false'); }
 function closeKit(){ modal.classList.remove('on'); modal.setAttribute('aria-hidden','true'); }
 document.querySelectorAll('[data-openkit]').forEach(function(el){ el.addEventListener('click',function(e){ e.preventDefault(); openKit(); }); });
 modal.querySelectorAll('[data-close]').forEach(function(el){ el.addEventListener('click',function(){ closeKit(); }); });
 document.addEventListener('keydown',function(e){
  if(e.key!=='Escape') return;
  if(modal.classList.contains('on')){ closeKit(); }
  else { goHome(); }
 });
 document.querySelectorAll('[data-stub]').forEach(function(el){
  el.addEventListener('click',function(e){ e.preventDefault();
   if(toast){ var ds=el.getAttribute('data-stub'); toast.textContent = ds==='catalog' ? 'Opens the catalog (add the URL)' : 'Opens the live builder (add the tool URL)'; toast.classList.add('show'); clearTimeout(tT); tT=setTimeout(function(){toast.classList.remove('show');},2500); }
  });
 });

  /* THE KIT: seamless looping rail, driven by your own scroll */
  (function(){
    var rail=document.getElementById('kitRail'); if(!rail) return;
    var originals=[].slice.call(rail.querySelectorAll('.kitcard'));
    var N=originals.length; if(!N) return;
    originals.map(function(c){return c.cloneNode(true);}).reverse().forEach(function(c){ rail.insertBefore(c, rail.firstChild); });
    originals.map(function(c){return c.cloneNode(true);}).forEach(function(c){ rail.appendChild(c); });
    var cards=[].slice.call(rail.querySelectorAll('.kitcard'));
    cards.forEach(function(card){
      var sl=card.querySelectorAll('.kslide'); if(sl.length<2||reduce) return;
      var k=0; setInterval(function(){ sl[k].classList.remove('on'); k=(k+1)%sl.length; sl[k].classList.add('on'); }, 3200);
    });
    var setW=0, ticking=false;
    function measure(){ setW=rail.scrollWidth/3; }
    function focus(){
      ticking=false;
      var rb=rail.getBoundingClientRect(), vc=rb.left+rb.width/2, plate=rb.width*0.30, fade=rb.width*0.56;
      cards.forEach(function(c){
        var r=c.getBoundingClientRect(), d=Math.abs((r.left+r.width/2)-vc);
        var t=Math.min(1,Math.max(0,(d-plate)/(fade-plate))); if(reduce) t=0;
        c.style.filter = 'blur('+(t*4).toFixed(2)+'px) brightness('+(1-t*0.34).toFixed(3)+')';
        c.style.transform='scale('+(1-t*0.08).toFixed(3)+')';
      });
    }
    function wrapAround(){
      if(!setW) return;
      if(rail.scrollLeft < setW*0.5) rail.scrollLeft += setW;
      else if(rail.scrollLeft > setW*1.5) rail.scrollLeft -= setW;
    }
    var navT=null,wrapEl=rail.closest(".kitrail-wrap"),programmatic=false;
    function showNav(on){ if(wrapEl) wrapEl.classList.toggle("show-nav", on); }
    /* arrows hide the moment you click/swipe/scroll, and only come back once the rail settles on a centered piece */
    function settleNav(){ showNav(false); clearTimeout(navT); navT=setTimeout(function(){ showNav(true); }, 240); }
    function onScroll(){ wrapAround(); if(!programmatic) settleNav(); if(!ticking){ ticking=true; requestAnimationFrame(focus); } }
    function center(){
      measure();
      var cw=cards[N].getBoundingClientRect().width, step=setW/N;
      programmatic=true;
      rail.scrollLeft = N*step + cw/2 - rail.clientWidth/2;
      focus(); showNav(true);
      requestAnimationFrame(function(){ programmatic=false; });
    }
    [].slice.call(rail.querySelectorAll('.kspecbtn')).forEach(function(b){
      b.addEventListener('click',function(e){ e.stopPropagation(); var card=b.closest('.kitcard'); var sp=card.querySelector('.kspecs'); if(sp){ card.style.setProperty('--sh',(sp.offsetHeight+18)+'px'); } card.classList.toggle('open'); });
    });
    [].slice.call(document.querySelectorAll('.kitnav [data-kdir]')).forEach(function(b){
      b.addEventListener('click',function(){
        showNav(false);
        var step=(cards[1].getBoundingClientRect().left-cards[0].getBoundingClientRect().left)||rail.clientWidth*0.8;
        rail.scrollBy({left:step*parseInt(b.getAttribute('data-kdir'),10),behavior:'smooth'});
      });
    });
    rail.addEventListener('scroll', onScroll, {passive:true});
    if(wrapEl){
      wrapEl.addEventListener('pointerdown', function(e){ if(e.target.closest('.kitnav button')) return; showNav(false); }, {passive:true});
      wrapEl.addEventListener('touchstart', function(e){ if(e.target.closest('.kitnav button')) return; showNav(false); }, {passive:true});
    }
    window.addEventListener('resize', center);
    if(document.fonts&&document.fonts.ready) document.fonts.ready.then(center);
    setTimeout(center,60); center();
  })();

  /* LIBERO: palette inversion — intro sweep on arrival, then follows the pointer */
  (function(){
    var band=document.getElementById('libero'), inv=document.getElementById('libInv'), seam=document.getElementById('libSeam');
    if(!band||!inv||!seam) return;
    var REST=80, START=80, LEFT=60, playing=false;
    function set(p){ p=Math.max(0,Math.min(100,p)); inv.style.clipPath='inset(0 0 0 '+p+'%)'; seam.style.left=p+'%'; }
    function ease(t){ return t<0.5 ? 4*t*t*t : 1-Math.pow(-2*t+2,3)/2; }
    function at(e){
      if(playing) return;
      var r=band.getBoundingClientRect(), cx=(e.touches&&e.touches[0])?e.touches[0].clientX:e.clientX;
      set((cx-r.left)/r.width*100);
    }
    band.addEventListener('pointermove', at);
    band.addEventListener('touchmove', function(e){ at(e); }, {passive:true});
    var legs=[[START,LEFT,920],[LEFT,LEFT,500],[LEFT,REST,780]];
    function intro(){
      playing=true;
      var t0=null;
      function step(ts){
        if(t0===null) t0=ts;
        var el=ts-t0, acc=0;
        for(var k=0;k<legs.length;k++){
          var L=legs[k];
          if(el < acc+L[2]){ set(L[0]+(L[1]-L[0])*ease((el-acc)/L[2])); requestAnimationFrame(step); return; }
          acc+=L[2];
        }
        set(REST); playing=false;
      }
      requestAnimationFrame(step);
    }
    set(START);
    if(reduce){ set(REST); return; }
    if('IntersectionObserver' in window){
      var lio=new IntersectionObserver(function(es){ es.forEach(function(e){
        if(e.isIntersecting){ lio.disconnect(); intro(); }
      }); },{threshold:.35});
      lio.observe(band);
    } else { intro(); }
  })();

  /* CATALOG: grouped volleyball products + expand in place */
  (function(){
    var wrap=document.getElementById('catCats'); if(!wrap) return;
    var G=[{"cat":"Game Uniforms","items":[{"n":"Women's Dive Long Sleeve Volleyball Jersey","p":"$42.00","img":"https://encr.co/assets//Product%20Master/PRO-214/Sub%20Products/PRO-214.3/mockup_images/front_6a1e65d090f1a.jpg","u":"https://encr.co/productDetails/567?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's Dig Short Sleeve Jersey","p":"$34.00","img":"https://encr.co/assets//Product%20Master/PRO-108/mockup/front.jpg","u":"https://encr.co/productDetails/108?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's Dig Sleeveless Volleyball Jersey","p":"$33.00","img":"https://encr.co/assets//Product%20Master/PRO-216/Sub%20Products/PRO-216.2/mockup_images/front_6a03ace0a8885.jpg","u":"https://encr.co/productDetails/523?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's Dig Long Sleeve Volleyball Jersey","p":"$36.00","img":"https://encr.co/assets//Product%20Master/PRO-172/mockup/front.jpg","u":"https://encr.co/productDetails/172?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's Dig Volleyball Jersey","p":"$34.00","img":"https://encr.co/assets//Product%20Master/PRO-110/mockup/front.jpg","u":"https://encr.co/productDetails/110?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Shorts","items":[{"n":"Men's WarpTek Legacy Shorts 7\"","p":"$38.00","img":"https://encr.co/assets//Product%20Master/PRO-225/Sub%20Products/PRO-225.1/mockup_images/front_6901f37a70830.jpg","u":"https://encr.co/productDetails/439?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's Mach Legacy Shorts 7\" Inseam","p":"$38.00","img":"https://encr.co/assets//Product%20Master/PRO-225/Sub%20Products/PRO-225.5/mockup_images/front_69afa62af2421.jpg","u":"https://encr.co/productDetails/690?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"MJ Spandex Shorts 5\" Inseam","p":"$32.00","img":"https://encr.co/assets//Product%20Master/PRO-264/Sub%20Products/PRO-264.1/mockup_images/front_69efa9ab0f5d7.png","u":"https://encr.co/productDetails/635?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's Laser Shorts","p":"$34.00","img":"https://encr.co/assets//Product%20Master/PRO-162/mockup/front.jpg","u":"https://encr.co/productDetails/162?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's Amp Shorts","p":"$30.00","img":"https://encr.co/assets//Product%20Master/PRO-113/mockup/front.jpg","u":"https://encr.co/productDetails/113?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Tops","items":[{"n":"Women's DezTek Pro Long Sleeve Shooter Performance Tee","p":"$34.00","img":"https://encr.co/assets//Product%20Master/PRO-19/mockup/front.jpg","u":"https://encr.co/productDetails/19?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's DezTek Pro Shooter Performance Tee","p":"$30.00","img":"https://encr.co/assets//Product%20Master/PRO-1/mockup/front.jpg","u":"https://encr.co/productDetails/1?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's Vortex Apex Long Sleeve Performance Tee Slim Fit","p":"$34.00","img":"https://encr.co/assets//Product%20Master/PRO-274/Sub%20Products/PRO-274.6/mockup_images/front_6a4c95ff0b824.jpg","u":"https://encr.co/productDetails/716?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's Pindot Apex Performance Tee","p":"$32.00","img":"https://encr.co/assets//Product%20Master/PRO-258/Sub%20Products/PRO-258.4/mockup_images/front_6a4c97e0daf55.jpg","u":"https://encr.co/productDetails/642?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's DezTek Training Racerback","p":"$28.00","img":"https://encr.co/assets//Product%20Master/PRO-70/mockup/front.jpg","u":"https://encr.co/productDetails/70?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's DezTek Collegiate Long Sleeve Shooter Performanc","p":"$34.00","img":"https://encr.co/assets//Product%20Master/PRO-99/mockup/front.jpg","u":"https://encr.co/productDetails/99?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Socks","items":[{"n":"Airport Sock","p":"$11.00","img":"https://encr.co/assets//Product%20Master/PRO-46/mockup/front.jpg","u":"https://encr.co/productDetails/46?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Triple Threat Sock","p":"$11.00","img":"https://encr.co/assets//Product%20Master/PRO-125/mockup/front.jpg","u":"https://encr.co/productDetails/125?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Spartan Sock","p":"$12.00","img":"https://encr.co/assets//Product%20Master/PRO-231/mockup/front.jpg","u":"https://encr.co/productDetails/231?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Impact Sock","p":"$11.00","img":"https://encr.co/assets//Product%20Master/PRO-47/mockup/front.jpg","u":"https://encr.co/productDetails/47?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Pants & Sweats","items":[{"n":"Women’s Bamboo Tall Wide Leg Sweatpants","p":"$38.00","img":"https://encr.co/assets//Product%20Master/PRO-243/Sub%20Products/PRO-243.5/mockup_images/front_69f34ee302a50.jpg","u":"https://encr.co/productDetails/634?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's WarpTek High Rise Jogger","p":"$48.00","img":"https://encr.co/assets//Product%20Master/PRO-222/Sub%20Products/PRO-222.2/mockup_images/front_6926ec77b3872.jpg","u":"https://encr.co/productDetails/472?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's WarpTek Zip Up Jogger","p":"$46.00","img":"https://encr.co/assets//Product%20Master/PRO-232/Sub%20Products/PRO-232.1/mockup_images/front_69afc5bb09e58.jpg","u":"https://encr.co/productDetails/484?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's WarpTek Base Jogger","p":"$48.00","img":"https://encr.co/assets//Product%20Master/PRO-135/Sub%20Products/PRO-135.2/mockup_images/front_695f8bc4bd19f.jpg","u":"https://encr.co/productDetails/473?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's French Terry High Rise Jogger","p":"$45.00","img":"https://encr.co/assets//Product%20Master/PRO-222/Sub%20Products/PRO-222.1/mockup_images/front_6901c3ce05da9.jpg","u":"https://encr.co/productDetails/444?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Hoodies & Fleece","items":[{"n":"Men's DezTek BSE Hoodie","p":"$37.00","img":"https://encr.co/assets//Product%20Master/PRO-35/Sub%20Products/PRO-35.2/mockup_images/front_6951fb691b3b3.jpg","u":"https://encr.co/productDetails/67?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's WaffleJack Sleeveless Hoodie","p":"$45.00","img":"https://encr.co/assets//Product%20Master/PRO-194/Sub%20Products/PRO-194.4/mockup_images/front_693050a5754ed.jpg","u":"https://encr.co/productDetails/629?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's WaffleJack BSE Hoodie","p":"$45.00","img":"https://encr.co/assets//Product%20Master/PRO-35/Sub%20Products/PRO-35.6/mockup_images/front_69131b18a3237.jpg","u":"https://encr.co/productDetails/601?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's WaffleJack Oversized Hoodie","p":"$52.00","img":"https://encr.co/assets//Product%20Master/PRO-262/Sub%20Products/PRO-262.1/mockup_images/front_69cb65892feeb.jpg","u":"https://encr.co/productDetails/621?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Fleece Crewneck Sweatshirt","p":"$42.00","img":"https://encr.co/assets//Product%20Master/PRO-195/Sub%20Products/PRO-195.1/mockup_images/front_69f2852710013.jpg","u":"https://encr.co/productDetails/209?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Bags","items":[{"n":"Revelation Backpack","p":"$65.00","img":"https://encr.co/assets//Product%20Master/PRO-98/Sub%20Products/PRO-98.1/mockup_images/front_6abe7fbff3526.jpg","u":"https://encr.co/productDetails/118?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Drawstring Backpack","p":"$25.00","img":"https://encr.co/assets//Product%20Master/PRO-278/Sub%20Products/PRO-278.1/mockup_images/front_69f4e4479c8f1.jpg","u":"https://encr.co/productDetails/679?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Outerwear","items":[{"n":"Men's WarpTek Warm Up Jacket","p":"$70.00","img":"https://encr.co/assets//Product%20Master/PRO-223/Sub%20Products/PRO-223.2/mockup_images/front_6a15ed5fa2402.jpg","u":"https://encr.co/productDetails/516?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Underwear & Bras","items":[{"n":"Women's Sports Bra - Scoop Neck","p":"$38.00","img":"https://encr.co/assets//Product%20Master/PRO-176/mockup/front.jpg","u":"https://encr.co/productDetails/176?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's Sport Bra V-Neck","p":"$38.00","img":"https://encr.co/assets//Product%20Master/PRO-191/mockup/front.jpg","u":"https://encr.co/productDetails/191?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Compression Bottoms","items":[{"n":"Men's Deztek Collegiate Compression Pants - 3/4 Length*","p":"$34.00","img":"https://encr.co/assets//Product%20Master/PRO-128/mockup/front.jpg","u":"https://encr.co/productDetails/128?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Element Energy Legging","p":"$52.00","img":"https://encr.co/assets//Product%20Master/PRO-244/Sub%20Products/PRO-244.1/mockup_images/front_69f292343237d.png","u":"https://encr.co/productDetails/528?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's DezTek Collegiate Compression Pants - Full Length*","p":"$36.00","img":"https://encr.co/assets//Product%20Master/PRO-127/mockup/front.jpg","u":"https://encr.co/productDetails/127?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's DezTek Pro Compression Pants - 3/4 Length*","p":"$34.00","img":"https://encr.co/assets//Product%20Master/PRO-68/mockup/front.jpg","u":"https://encr.co/productDetails/68?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's DezTek Collegiate Compression Shorts*","p":"$32.00","img":"https://encr.co/assets//Product%20Master/PRO-129/mockup/front.jpg","u":"https://encr.co/productDetails/129?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]},{"cat":"Compression Tops","items":[{"n":"Men's DezTek Sleeveless Compression Tee","p":"$32.00","img":"https://encr.co/assets//Product%20Master/PRO-255/Sub%20Products/PRO-255.1/mockup_images/front_6a04d4b9e4d58.jpg","u":"https://encr.co/productDetails/585?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Women's DezTek Sleeveless Compression Tee","p":"$32.00","img":"https://encr.co/assets//Product%20Master/PRO-276/Sub%20Products/PRO-276.1/mockup_images/front_6a988ceea6e64.jpg","u":"https://encr.co/productDetails/677?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Men's DezTek Pro Short Sleeve Compression Tee","p":"$30.00","img":"https://encr.co/assets//Product%20Master/PRO-254/Sub%20Products/PRO-254.1/mockup_images/front_6a04d831422ae.jpg","u":"https://encr.co/productDetails/584?type=sub_product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"},{"n":"Compression Arm Sleeves","p":"$15.00","img":"https://encr.co/assets//Product%20Master/PRO-234/mockup/front.jpg","u":"https://encr.co/productDetails/234?type=product&selectedGender=All&selectedCategory=5&selectedSport=11&selectedStyle=0"}]}];
    wrap.innerHTML=G.map(function(g){
      var cards=g.items.map(function(p){
        var nm=p.n.replace(/&/g,'&amp;').replace(/</g,'&lt;'); var alt=p.n.replace(/"/g,'&quot;');
        return '<a class="catcard" href="'+p.u+'" target="_blank" rel="noopener"><span class="im"><img loading="lazy" src="'+p.img+'" alt="'+alt+'"></span><span class="meta"><span class="nm">'+nm+'</span><span class="pr">'+p.p+'</span></span></a>';
      }).join('');
      var cat=g.cat.replace(/&/g,'&amp;');
      return '<div class="catcat"><div class="catcat-h"><h3>'+cat+'</h3><span class="rule"></span></div><div class="rowwrap"><button class="rowarrow prev" type="button" aria-label="Scroll left"><svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg></button><div class="catrow">'+cards+'</div><button class="rowarrow next" type="button" aria-label="Scroll right"><svg class="chev" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></button></div></div>';
    }).join('');
    var rows=[].slice.call(wrap.querySelectorAll('.rowwrap'));
    function endState(rw){
      var r=rw.querySelector('.catrow'); if(!r) return;
      var scrollable=(r.scrollWidth-r.clientWidth)>8;
      var atEnd=(r.scrollLeft+r.clientWidth)>=(r.scrollWidth-6);
      var atStart=r.scrollLeft<=6;
      rw.classList.toggle('ended', !scrollable||atEnd);
      rw.classList.toggle('atstart', !scrollable||atStart);
    }
    var qd=false;
    function pick(){
      qd=false;
      var vc=window.innerHeight/2, best=null, bd=1e9;
      rows.forEach(function(rw){
        var b=rw.getBoundingClientRect();
        if(b.height===0||b.bottom<60||b.top>window.innerHeight-60) return;
        var d=Math.abs((b.top+b.bottom)/2-vc);
        if(d<bd){ bd=d; best=rw; }
      });
      rows.forEach(function(rw){ rw.classList.toggle('inview', rw===best); });
      if(best) endState(best);
    }
    function queue(){ if(!qd){ qd=true; requestAnimationFrame(pick); } }
    rows.forEach(function(rw){
      var r=rw.querySelector('.catrow');
      if(r) r.addEventListener('scroll', function(){ endState(rw); }, {passive:true});
      function nudge(dir){ if(r) r.scrollBy({left:dir*Math.max(240,r.clientWidth*0.9), behavior:'smooth'}); }
      var pv=rw.querySelector('.rowarrow.prev'), nx=rw.querySelector('.rowarrow.next');
      if(pv) pv.addEventListener('click',function(){ nudge(-1); });
      if(nx) nx.addEventListener('click',function(){ nudge(1); });
      endState(rw);
    });
    window.addEventListener('scroll', queue, {passive:true});
    window.addEventListener('resize', queue);
    setTimeout(pick,80); pick();
    var btn=document.getElementById('catMore'), lab=document.getElementById('catMoreLabel');
    var hidden=Math.max(0,G.length-3), moreTxt=hidden+' more categor'+(hidden===1?'y':'ies');
    if(btn){
      if(!hidden){ btn.style.display='none'; }
      if(lab) lab.textContent=moreTxt;
      btn.addEventListener('click',function(){ var open=wrap.classList.toggle('open'); btn.classList.toggle('exp',open); if(lab) lab.textContent=open?'Show less':moreTxt; setTimeout(pick,60); });
    }
  })();
})();
