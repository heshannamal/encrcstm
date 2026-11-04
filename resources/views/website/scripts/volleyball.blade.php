
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

 /* Club marquee: data comes from Laravel, with original infinite animation. */
 (function(){
  var lt=document.getElementById('logoTrack'); if(!lt) return;
  var clubs=@json($clubList ?? []);
  function esc(t){return String(t||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');}
  function seg(){return clubs.map(function(c){
    var name=esc(c.name||c), logo=c.logo ? '<img src="'+esc(c.logo)+'" alt="'+name+'" loading="lazy">' : '<span class="lb-name">'+name+'</span>';
    return '<span class="lb-item">'+logo+'</span>';
  }).join('<span class="lb-d">◆</span>')+'<span class="lb-d">◆</span>';}
  if(clubs.length){lt.innerHTML=seg()+seg();}else{lt.closest('.logobar').hidden=true;}
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
    var G=@json($catalogGroups ?? []);
    if(!G.length){
      wrap.innerHTML='<div class="cat-empty"><h3>No matching products available.</h3></div>';
      var more=document.getElementById('catMore'); if(more) more.hidden=true;
      return;
    }
    wrap.innerHTML=G.map(function(g){
      var cards=g.items.map(function(p){
        var esc=function(v){return String(v||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');}; var nm=esc(p.n); var alt=esc(p.n);
        return '<a class="catcard" href="'+esc(p.u||'#')+'" target="_blank" rel="noopener"><span class="im">'+(p.img?'<img loading="lazy" src="'+esc(p.img)+'" alt="'+alt+'">':'')+'</span><span class="meta"><span class="nm">'+nm+'</span><span class="pr">'+esc(p.p)+'</span></span></a>';
      }).join('');
      var cat=String(g.cat||'Other Products').replace(/&/g,'&amp;').replace(/</g,'&lt;');
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
