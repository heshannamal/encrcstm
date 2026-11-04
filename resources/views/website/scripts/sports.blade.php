(function(){
 const reduce=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
 document.body.classList.add('loaded');
 const nav=document.getElementById('nav'),switcher=document.getElementById('switch'),burger=document.getElementById('burger');
 const onScroll=()=>{nav.classList.toggle('scrolled',window.scrollY>40);if(window.scrollY>window.innerHeight*.7)switcher.classList.add('show');else if(!switcher.dataset.pinned)switcher.classList.remove('show')};
 window.addEventListener('scroll',onScroll,{passive:true});onScroll();
 burger.addEventListener('click',()=>{switcher.dataset.pinned=switcher.dataset.pinned?'':'1';switcher.classList.toggle('show')});
 const observer=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');observer.unobserve(e.target)}}),{threshold:.1});
 document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));
 const slides=[...document.querySelectorAll('#heroSlides .hslide')];
 if(slides.length>1&&!reduce){let i=0;setInterval(()=>{slides[i].classList.remove('on');i=(i+1)%slides.length;slides[i].classList.add('on')},5500)}
})();
