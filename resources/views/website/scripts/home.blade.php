
(function(){
 var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

 /* loader + load reveal */
 window.addEventListener('load', function(){
  document.body.classList.add('loaded');
  setTimeout(function(){ document.getElementById('loader').classList.add('gone'); }, reduce?0:900);
  var h1=document.querySelector('.hero h1');
  setTimeout(function(){ if(h1) h1.classList.add('done'); }, reduce?0:1400);
 });
 // fallback
 setTimeout(function(){ document.body.classList.add('loaded'); document.getElementById('loader').classList.add('gone'); }, 2600);

 /* nav scroll state */
 var nav=document.getElementById('nav');
 onScroll();
 function onScroll(){
  if(window.scrollY>40) nav.classList.add('scrolled'); else nav.classList.remove('scrolled');
  if(!reduce){
   var y=window.scrollY;
   document.querySelectorAll('[data-par]').forEach(function(el){
    var s=parseFloat(el.getAttribute('data-par'));
    el.style.transform='translateY('+(y*s)+'px)';
   });
  }
 }
 window.addEventListener('scroll', onScroll, {passive:true});

 /* mobile menu */
 var burger=document.getElementById('burger'), links=document.getElementById('links');
 burger.addEventListener('click', function(){ links.classList.toggle('open'); burger.classList.toggle('open'); });
 links.querySelectorAll('a').forEach(function(a){a.addEventListener('click',function(){links.classList.remove('open');burger.classList.remove('open');});});

 /* reveal on scroll */
 var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target);}});},{threshold:.16});
 document.querySelectorAll('.reveal').forEach(function(el){io.observe(el);});

 /* count up */
 var cio=new IntersectionObserver(function(es){es.forEach(function(e){
  if(!e.isIntersecting) return; cio.unobserve(e.target);
  var el=e.target, end=parseFloat(el.getAttribute('data-count')), suf=el.getAttribute('data-suffix')||'', t0=null;
  if(reduce){el.textContent=end+suf;return;}
  function step(ts){if(!t0)t0=ts;var p=Math.min((ts-t0)/1100,1);el.textContent=Math.round(end*(1-Math.pow(1-p,3)))+suf;if(p<1)requestAnimationFrame(step);}
  requestAnimationFrame(step);
 });},{threshold:.5});
 document.querySelectorAll('[data-count]').forEach(function(el){cio.observe(el);});

 /* ---------- SPORTS (the real list) ---------- */
 var sports=['Baseball','Basketball','BMX','Cross-country','Disc Golf','Field Hockey','Flag Football','Football','Golf','Hockey','Lacrosse','MMA','Rugby','Running','Soccer','Softball','Swim','Tennis','Track and Field','Volleyball','Yoga'];
 var live={'Volleyball':1};

 /* club logo banner (swap the .lb-name span for <img> when real logos arrive) */
 (function(){
  var lt=document.getElementById('logoTrack');
  if(!lt) return;
  var clubs=['Redwood Lacrosse','Baytown Baddies','San Rafael Blue Jays','Corte Madera FC','Metta Yoga','San Rafael Soccer Club','FC Nova','24/8 Basketball'];
  function seg(){ return clubs.map(function(n){return '<span class="lb-item"><span class="lb-name">'+n+'</span></span>';}).join('<span class="lb-d">◆</span>')+'<span class="lb-d">◆</span>'; }
  lt.innerHTML=seg()+seg();
 })();

 /* sport index */
 var grid=document.getElementById('sportsGrid');
 sports.forEach(function(n,idx){
  var a=document.createElement('a');a.className='sitem';a.setAttribute('data-sport',n);
  a.href=(n==='Volleyball')?'#/volleyball':'#sports';
  var no=('0'+(idx+1)).slice(-2);
  a.innerHTML='<span class="no">'+no+'</span><span class="nm">'+n+'</span>'+(live[n]?'<span class="live">Live</span>':'')+'<span class="ar">View →</span>';
  grid.appendChild(a);
 });

 /* ---------- PROOF SLIDER ---------- */
 var proofBg=document.getElementById('proofBg');
 var proofImgs=proofBg?[].slice.call(proofBg.querySelectorAll('img')):[];
 function syncProofBg(){ proofImgs.forEach(function(im){ im.classList.toggle('on', +im.getAttribute('data-q')===qi); }); }
 (function(){
  var sec=proofBg?proofBg.parentNode:null; if(!sec||reduce) return;
  var t=false;
  function upd(){ t=false; var r=sec.getBoundingClientRect(), vh=window.innerHeight;
   var p=(vh - r.top)/(vh + r.height); p=Math.max(0,Math.min(1,p));
   var y=(p-0.5)*56;
   proofImgs.forEach(function(im){ im.style.transform='translateY('+y.toFixed(1)+'px)'; });
  }
  function q(){ if(!t){ t=true; requestAnimationFrame(upd); } }
  window.addEventListener('scroll',q,{passive:true});
  window.addEventListener('resize',q); upd();
 })();
 var quotes=[].slice.call(document.querySelectorAll('.quote')),qi=0,timer;
 var dotsWrap=document.getElementById('proofDots');
 quotes.forEach(function(_,i){var b=document.createElement('i');if(i===0)b.classList.add('on');b.addEventListener('click',function(){go(i);});dotsWrap.appendChild(b);});
 var dots=[].slice.call(dotsWrap.children);
 syncProofBg();
 function go(i){quotes[qi].classList.remove('on');dots[qi].classList.remove('on');qi=(i+quotes.length)%quotes.length;quotes[qi].classList.add('on');dots[qi].classList.add('on');syncProofBg();fitQuote();restart();}
 function restart(){if(reduce)return;clearInterval(timer);timer=setInterval(function(){go(qi+1);},5200);}
 document.getElementById('pNext').addEventListener('click',function(){go(qi+1);});
 document.getElementById('pPrev').addEventListener('click',function(){go(qi-1);});
 var pTrack=document.getElementById('proofTrack');
 /* measure where a cut-out image's actual pixels begin (fraction of its width) */
 function contentLeftFrac(img){
   if(img._clf!=null) return img._clf;
   try{
     var nw=img.naturalWidth, nh=img.naturalHeight; if(!nw||!nh) return null;
     var cw=160, ch=Math.max(1,Math.round(nh*cw/nw));
     var cv=document.createElement('canvas'); cv.width=cw; cv.height=ch;
     var cx=cv.getContext('2d'); cx.drawImage(img,0,0,cw,ch);
     var d=cx.getImageData(0,0,cw,ch).data, need=Math.max(1,Math.round(ch*0.03)), frac=0;
     for(var x=0;x<cw;x++){ var c=0; for(var y=0;y<ch;y++){ if(d[(y*cw+x)*4+3]>40) c++; } if(c>=need){ frac=x/cw; break; } }
     img._clf=frac; return frac;
   }catch(e){ img._clf=0; return 0; }
 }
 /* keep the quote text just clear of the right-side image's real silhouette */
 function fitQuote(){
   if(!pTrack) return;
   var img = proofBg ? (proofBg.querySelector('img.on')||proofBg.querySelector('img')) : null;
   var visible = img && getComputedStyle(proofBg).display!=='none' && proofBg.offsetWidth>0;
   if(!visible){ pTrack.style.removeProperty('--quoteW'); return; }
   var frac=contentLeftFrac(img); if(frac==null) return;
   var ib=proofBg.getBoundingClientRect(), tb=pTrack.getBoundingClientRect();
   var figureLeft = ib.left + ib.width*frac;
   var w = Math.max(300, Math.round(figureLeft - tb.left - 26));
   pTrack.style.setProperty('--quoteW', w+'px');
 }
 function sizeProof(){ fitQuote(); var m=0; quotes.forEach(function(q){ if(q.offsetHeight>m) m=q.offsetHeight; }); if(pTrack) pTrack.style.height=m+'px'; }
 sizeProof();
 window.addEventListener('resize', sizeProof);
 if(document.fonts && document.fonts.ready) document.fonts.ready.then(sizeProof);
 proofImgs.forEach(function(im){ im.addEventListener('load', sizeProof); });
 setTimeout(sizeProof, 400);
 restart();

 /* HERO: facts type in on first scroll; the pin releases the instant they finish */
 (function(){
  var box=document.getElementById('heroStats'), pin=document.getElementById('heroPin');
  if(!box||!pin) return;
  var cells=[].slice.call(box.querySelectorAll('[data-t]'));
  var total=cells.reduce(function(n,c){return n+c.getAttribute('data-t').length;},0);
  function paint(chars){
   var left=chars;
   cells.forEach(function(c){
    var t=c.getAttribute('data-t'), take=Math.max(0,Math.min(t.length,left));
    c.textContent=t.slice(0,take);
    c.classList.toggle('typing', take>0 && take<t.length);
    left-=t.length;
   });
  }
  paint(0);
  if(reduce || window.matchMedia('(max-width:860px)').matches){ paint(total); pin.style.height='auto'; return; }
  function release(){
   var s=Math.max(0,-pin.getBoundingClientRect().top);
   pin.style.height=(s+window.innerHeight)+'px';
  }
  var started=false;
  function play(){
   if(started) return; started=true;
   var t0=null, dur=1150;
   function step(now){
    if(t0===null) t0=now;
    var p=Math.min(1,(now-t0)/dur);
    paint(Math.round(p*total));
    if(p<1) requestAnimationFrame(step);
    else { paint(total); release(); }
   }
   requestAnimationFrame(step);
  }
  window.addEventListener('scroll',function(){ if(window.scrollY>80) play(); },{passive:true});
 })();

 /* HERO: slow crossfade slideshow */
 (function(){
  var slides=[].slice.call(document.querySelectorAll('.hero-slides .hslide'));
  if(slides.length<2 || reduce) return;
  var i=0;
  setInterval(function(){
   slides[i].classList.remove('on');
   i=(i+1)%slides.length;
   slides[i].classList.add('on');
  }, 5000);
 })();

 /* FAQ accordion */
 document.querySelectorAll('.faq-q').forEach(function(q){
  q.addEventListener('click',function(){
   var item=q.parentElement, a=item.querySelector('.faq-a');
   var open=item.classList.toggle('open');
   a.style.maxHeight = open ? a.scrollHeight+'px' : '0';
  });
 });

 /* ---------- PROCESS: pinned horizontal scroll ---------- */
 (function(){
  var pin=document.getElementById('process'), track=document.getElementById('procTrack');
  if(!pin||!track) return;
  var mq=window.matchMedia('(max-width:900px)'), maxX=0;
  function measure(){
   if(mq.matches || reduce){ pin.style.height=''; track.style.transform=''; maxX=0; return; }
   maxX=Math.max(0, track.scrollWidth - window.innerWidth + 40);
   pin.style.height=(window.innerHeight + maxX)+'px';
   onScrollP();
  }
  function onScrollP(){
   if(mq.matches || reduce || maxX<=0) return;
   var top=pin.getBoundingClientRect().top, total=pin.offsetHeight - window.innerHeight;
   var p=total>0 ? Math.min(1, Math.max(0, (-top)/total)) : 0;
   track.style.transform='translate3d('+(-p*maxX)+'px,0,0)';
  }
  window.addEventListener('scroll', onScrollP, {passive:true});
  window.addEventListener('resize', measure);
  if(document.fonts && document.fonts.ready) document.fonts.ready.then(measure);
  setTimeout(measure, 300);
  measure();
 })();

 /* magnetic buttons */
 if(!reduce){
  document.querySelectorAll('.btn').forEach(function(b){
   b.addEventListener('mousemove',function(e){var r=b.getBoundingClientRect();b.style.transform='translate('+((e.clientX-r.left-r.width/2)*.18)+'px,'+((e.clientY-r.top-r.height/2)*.28)+'px)';});
   b.addEventListener('mouseleave',function(){b.style.transform='';});
  });
 }

 /* stub links (external areas / builder) show a small toast */
 document.querySelectorAll('[data-stub]').forEach(function(el){
  el.addEventListener('click',function(ev){
   ev.preventDefault(); ev.stopPropagation();
   var t=document.getElementById('toast'); if(!t) return;
   var ds=el.getAttribute('data-stub'); var msg = ds==='builder' ? 'Opens the live builder (add the tool URL)' : ds==='catalog' ? 'Opens the catalog (add the URL)' : 'Shop links to your online store (add the URL)';
   t.textContent=msg; t.classList.add('show'); clearTimeout(window.__st); window.__st=setTimeout(function(){t.classList.remove('show');},2500);
  });
 });
})();
