<style>
#encoreFlashToast{position:fixed;left:50%;bottom:30px;max-width:min(560px,calc(100vw - 32px));width:max-content;z-index:99999;opacity:0;pointer-events:none;transform:translate(-50%,22px);transition:opacity .27s ease,transform .27s ease;background:#fff;color:#34434d;box-shadow:0 12px 35px rgba(27,39,46,.18);border-left:3px solid #e70033;padding:15px 20px;font-family:'Space Mono',monospace;font-size:11px;line-height:1.6;letter-spacing:.065em;text-transform:uppercase}
#encoreFlashToast.is-visible{opacity:1;transform:translate(-50%,0);pointer-events:auto}
#encoreFlashToast[data-type="success"]{border-color:#258966}
#encoreFlashToast[data-type="warning"]{border-color:#df9a29}
#encoreFlashToast button{margin-left:18px;background:none;border:0;color:#64717b;cursor:pointer;font-size:18px;vertical-align:middle}
@media(prefers-reduced-motion:reduce){#encoreFlashToast{transition:none}}
</style>
<div id="encoreFlashToast" role="status" aria-live="polite" aria-atomic="true"><span id="encoreFlashText"></span><button type="button" id="encoreFlashClose" aria-label="Dismiss notification">×</button></div>
<script>
(function(){
 const toast=document.getElementById('encoreFlashToast');
 const message=document.getElementById('encoreFlashText');
 const close=document.getElementById('encoreFlashClose');
 if(!toast||!message)return;
 let timer=null;
 const queue=[];
 let active=false;
 function next(){
  if(!queue.length){active=false;return;}
  active=true;
  const item=queue.shift();
  message.textContent=String(item.message||'');
  toast.dataset.type=item.type||'info';
  toast.classList.add('is-visible');
  clearTimeout(timer);
  timer=setTimeout(hide,item.duration||4200);
 }
 function hide(){
  clearTimeout(timer);
  toast.classList.remove('is-visible');
  setTimeout(next,300);
 }
 window.EncoreToast=function(value,type,duration){
  if(!value)return;
  queue.push({message:String(value),type:type||'info',duration:duration||4200});
  if(!active)next();
 };
 close.addEventListener('click',hide);
 const initial=@json([
   ['message'=>session('success'),'type'=>'success'],
   ['message'=>session('warning'),'type'=>'warning'],
   ['message'=>session('error'),'type'=>'error'],
   ['message'=>session('status'),'type'=>'info'],
   ['message'=>$errors->first(),'type'=>'error'],
 ]);
 initial.forEach(function(item){if(item.message)window.EncoreToast(item.message,item.type)});
})();
</script>
