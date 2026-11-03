
(function(){
 var host=document.getElementById('vbHost'),frame=document.getElementById('vbFrame'),
   toast=document.getElementById('toast'),tT,loaded=false;
 function openVB(){
  if(!loaded){ frame.src = @json(route('sports.volleyball')); loaded=true; }
  host.classList.add('on'); host.setAttribute('aria-hidden','false'); document.body.style.overflow='hidden';
  try{ if(location.hash!=='#/volleyball') history.pushState(null,'','#/volleyball'); }catch(e){}
 }
 function closeVB(push){
  host.classList.remove('on'); host.setAttribute('aria-hidden','true'); document.body.style.overflow='';
  try{ if(push && location.hash==='#/volleyball') history.pushState(null,'','#/'); }catch(e){}
 }
 function showToast(m){ toast.textContent=m; toast.classList.add('show'); clearTimeout(tT); tT=setTimeout(function(){toast.classList.remove('show');},2600); }
 document.addEventListener('keydown',function(e){ if(e.key==='Escape'&&host.classList.contains('on')) closeVB(true); });
 // embedded sport page asks to return home (its logo / Esc)
 window.addEventListener('message',function(e){ if(e.data==='encore:home') closeVB(true); });
 function route(){ if(location.hash==='#/volleyball') openVB(); else closeVB(false); }
 window.addEventListener('hashchange',route);
 var grid=document.getElementById('sportsGrid');
 if(grid) grid.addEventListener('click',function(e){
  var card=e.target.closest('.sitem'); if(!card) return;
  e.preventDefault(); e.stopPropagation();
  if(card.getAttribute('data-sport')==='Volleyball') openVB();
  else showToast(card.getAttribute('data-sport')+' page is coming soon. Volleyball is the live demo.');
 });
 document.addEventListener('click',function(e){
  var a=e.target.closest('a[href="#/volleyball"]'); if(a){ e.preventDefault(); openVB(); }
 });
 route();

 /* start-a-kit chooser modal */
 var modal=document.getElementById('kitModal');
 if(modal){
  var openKit=function(){ modal.classList.add('on'); modal.setAttribute('aria-hidden','false'); };
  var closeKit=function(){ modal.classList.remove('on'); modal.setAttribute('aria-hidden','true'); };
  document.querySelectorAll('[data-openkit]').forEach(function(el){ el.addEventListener('click',function(e){ e.preventDefault(); openKit(); }); });
  modal.querySelectorAll('[data-close]').forEach(function(el){ el.addEventListener('click',function(){ closeKit(); }); });
  document.addEventListener('keydown',function(e){ if(e.key==='Escape'&&modal.classList.contains('on')) closeKit(); });
  modal.querySelectorAll('[data-stub]').forEach(function(el){
   el.addEventListener('click',function(e){ e.preventDefault(); closeKit(); showToast('Opens the live builder (add the tool URL)'); });
  });
 }
})();
