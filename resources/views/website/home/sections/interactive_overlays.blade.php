

<!-- Embedded Volleyball sport page (isolated in an iframe) -->
<div id="vbHost" aria-hidden="true">
 <iframe id="vbFrame" title="Volleyball sport page"></iframe>
</div>
<div class="toast" id="toast"></div>

<!-- START-A-KIT CHOOSER -->
<div class="kitmodal" id="kitModal" aria-hidden="true">
 <div class="kitmodal-back" data-close></div>
 <div class="kitmodal-panel" role="dialog" aria-label="Start a kit">
  <button class="kitmodal-x" data-close aria-label="Close">✕</button>
  <div class="kitmodal-head">
   <h3 class="mh">Two ways to <em>start.</em></h3>
   <p class="msub">Pick the path that fits how you want to work.</p>
  </div>
  <div class="pickgrid">
   <a class="pickcard" href="{{ config('site.builder_url') }}">
    <svg class="pic" viewBox="0 0 256 256" fill="currentColor"><path d="M48,64a8,8,0,0,1,8-8H72V40a8,8,0,0,1,16,0V56h16a8,8,0,0,1,0,16H88V88a8,8,0,0,1-16,0V72H56A8,8,0,0,1,48,64ZM184,192h-8v-8a8,8,0,0,0-16,0v8h-8a8,8,0,0,0,0,16h8v8a8,8,0,0,0,16,0v-8h8a8,8,0,0,0,0-16Zm56-48H224V128a8,8,0,0,0-16,0v16H192a8,8,0,0,0,0,16h16v16a8,8,0,0,0,16,0V160h16a8,8,0,0,0,0-16ZM219.31,80,80,219.31a16,16,0,0,1-22.62,0L36.68,198.63a16,16,0,0,1,0-22.63L176,36.69a16,16,0,0,1,22.63,0l20.68,20.68A16,16,0,0,1,219.31,80Zm-54.63,32L144,91.31l-96,96L68.68,208ZM208,68.69,187.31,48l-32,32L176,100.69Z"/></svg>
    <h3>Design it yourself</h3>
    <p>Design it live in our online tool with instant previews. Share or order when it's ready.</p>
    <span class="go">Open the builder <span class="ar">→</span></span>
   </a>
   <a class="pickcard" href="{{ config('site.team_url') }}">
    <svg class="pic" viewBox="0 0 256 256" fill="currentColor"><path d="M201.89,54.66A103.43,103.43,0,0,0,128.79,24H128A104,104,0,0,0,24,128v56a24,24,0,0,0,24,24H64a24,24,0,0,0,24-24V144a24,24,0,0,0-24-24H40.36A88.12,88.12,0,0,1,190.54,65.93,87.39,87.39,0,0,1,215.65,120H192a24,24,0,0,0-24,24v40a24,24,0,0,0,24,24h24a24,24,0,0,1-24,24H136a8,8,0,0,0,0,16h56a40,40,0,0,0,40-40V128A103.41,103.41,0,0,0,201.89,54.66ZM64,136a8,8,0,0,1,8,8v40a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V136Zm128,56a8,8,0,0,1-8-8V144a8,8,0,0,1,8-8h24v56Z"/></svg>
    <h3>Work with our team</h3>
    <p>Our designers build your mockups with you. Best for full programs and bulk orders.</p>
    <span class="go">Talk to our team <span class="ar">→</span></span>
   </a>
  </div>
 </div>
</div>

