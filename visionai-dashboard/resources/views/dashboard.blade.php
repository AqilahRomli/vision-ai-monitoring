<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TM ONE VISION AI — Hari Sukan Negara 2026</title>
@vite(['resources/js/app.js'])
<style>
@verbatim
:root{
  --bg:#070b16; --panel:#0d1526; --panel2:#111b31; --border:#1c2946;
  --orange:#f5821f; --blue:#3aa0ff; --pink:#ff4d8d; --purple:#8a6bff;
  --green:#2ecc71; --red:#e6303f; --text:#eef2fb; --muted:#8996b3;
}
*{box-sizing:border-box;margin:0;padding:0}
body{
  background:radial-gradient(1200px 600px at 20% -10%, #10203f 0%, var(--bg) 55%);
  color:var(--text); font-family:'Segoe UI',Arial,sans-serif; padding:20px; min-height:100vh;
}
.wrap{max-width:1600px;margin:0 auto}

/* header */
header{display:flex;align-items:center;justify-content:space-between;background:var(--panel);
  border:1px solid var(--border);border-radius:14px;padding:16px 24px;margin-bottom:16px;flex-wrap:wrap;gap:12px}
.brand{display:flex;align-items:center;gap:14px}
.logo-mark{flex-shrink:0}
.logo-chip{display:flex;align-items:center;gap:12px;background:var(--panel2);border:1px solid var(--border);
  border-radius:10px;padding:8px 14px;box-shadow:0 4px 14px rgba(0,0,0,.4), inset 0 0 0 1px rgba(255,255,255,.04)}
.logo-divider{width:1px;height:38px;background:var(--border)}
.title-block h1{font-size:22px;letter-spacing:.5px}
.title-block h1 span{color:var(--orange)}
.title-block p{color:var(--muted);font-size:13px;margin-top:2px}
.status{display:flex;align-items:center;gap:18px;font-size:14px;color:var(--muted)}
.dot{width:9px;height:9px;border-radius:50%;background:var(--green);display:inline-block;
  box-shadow:0 0 8px var(--green);animation:pulse 1.6s infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.35}}
.status b{color:var(--text)}
button{font-family:inherit;cursor:pointer}

/* cameras */
.grid3{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:16px}
.cam{background:var(--panel);border:1px solid var(--border);border-radius:14px;overflow:hidden;
  transition:transform .15s, box-shadow .15s}
.cam:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(0,0,0,.35)}
.cam-head{display:flex;align-items:center;justify-content:space-between;padding:12px 16px}
.cam-head h3{font-size:14px}
.cam-head p{font-size:11px;color:var(--muted)}
.live-badge{display:flex;align-items:center;gap:6px;font-size:11px;font-weight:700;color:var(--green);
  background:rgba(46,204,113,.1);border:1px solid rgba(46,204,113,.35);padding:4px 10px;border-radius:20px}
.cam-body{position:relative;height:230px;background:linear-gradient(160deg,#15213d,#0a1122);
  display:flex;align-items:center;justify-content:center;cursor:zoom-in;border-top:1px solid var(--border)}
.cam-body svg{opacity:.55}
.cam-time{position:absolute;left:12px;bottom:10px;font-size:12px;background:rgba(0,0,0,.55);
  padding:3px 10px;border-radius:6px}
.cam-tag{position:absolute;right:12px;bottom:10px;font-size:11px;color:var(--muted);
  background:rgba(0,0,0,.55);padding:3px 10px;border-radius:6px}
.stream-input{position:absolute;inset:auto 10px 44px 10px;display:none;gap:6px}
.stream-input input{flex:1;font-size:11px;padding:6px 8px;border-radius:6px;border:1px solid var(--border);
  background:#0a1122;color:var(--text)}
.stream-input button{font-size:11px;padding:6px 10px;border-radius:6px;border:none;background:var(--orange);color:#111}
.cfg-btn{position:absolute;top:10px;right:10px;font-size:11px;background:rgba(255,255,255,.08);
  border:1px solid var(--border);color:var(--text);padding:5px 9px;border-radius:6px}
.cfg-btn:hover{background:rgba(255,255,255,.16)}

/* stats */
.grid3b{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:16px}
.stat{background:var(--panel);border:1px solid var(--border);border-radius:14px;padding:18px 20px;
  display:flex;align-items:center;gap:16px;text-align:left}
.stat.alert{border-color:rgba(230,48,63,.5);background:linear-gradient(120deg,rgba(230,48,63,.12),var(--panel))}
.icon-circle{width:48px;height:48px;border-radius:50%;background:rgba(58,160,255,.14);
  display:flex;align-items:center;justify-content:center;flex-shrink:0}
.alert .icon-circle{background:rgba(230,48,63,.18)}
.stat h4{font-size:12px;color:var(--muted);font-weight:600;letter-spacing:.3px}
.stat .num{font-size:30px;font-weight:800;margin:2px 0}
.stat .sub{font-size:12px;color:var(--muted)}
.stat .num.green{color:var(--green)}

/* trends */
.panel{background:var(--panel);border:1px solid var(--border);border-radius:14px;padding:16px 18px}
.panel-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px}
.panel-head h3{font-size:14px}
.panel-head span{font-size:11px;color:var(--muted)}
canvas{max-height:220px}

/* bottom row */
.grid3c{display:grid;grid-template-columns:1fr 1.3fr 1fr;gap:16px;margin:16px 0}
.donut-wrap{display:flex;align-items:center;gap:18px}
.donut-wrap canvas{max-width:150px;max-height:150px}
.legend-item{display:flex;align-items:center;gap:8px;font-size:13px;margin-bottom:6px}
.sw{width:10px;height:10px;border-radius:3px}
.legend-item b{margin-left:auto}
.total-line{margin-top:10px;font-size:12px;color:var(--muted)}
.total-line b{color:var(--text);font-size:16px;display:block}

.snap-row{display:flex;justify-content:space-between;font-size:12px;color:var(--muted);margin-bottom:10px}
.snap-row b{color:var(--text);display:block;font-size:14px;margin-top:2px}
.avatars{display:flex;align-items:center;gap:14px;margin-top:10px}
.avatars .num{font-size:26px;font-weight:800}

footer{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px;
  background:var(--panel);border:1px solid var(--border);border-radius:14px;padding:14px 20px;margin-top:6px;
  font-size:12px;color:var(--muted)}
.foot-links{display:flex;gap:22px;flex-wrap:wrap}
.foot-links button{background:none;border:none;color:var(--muted);font-size:12px;display:flex;gap:6px;align-items:center}
.foot-links button:hover{color:var(--text)}

/* modal */
.modal{position:fixed;inset:0;background:rgba(0,0,0,.75);display:none;align-items:center;justify-content:center;z-index:50}
.modal.open{display:flex}
.modal-card{background:var(--panel);border:1px solid var(--border);border-radius:14px;padding:20px;max-width:640px;width:90%}
.modal-card h3{margin-bottom:10px}
.modal-card p{color:var(--muted);font-size:13px;line-height:1.6;margin-bottom:14px}
.modal-card button{background:var(--orange);border:none;color:#111;padding:8px 16px;border-radius:8px;font-weight:700}

@media(max-width:1000px){.grid3,.grid3b,.grid3c{grid-template-columns:1fr}}
@endverbatim
</style>
</head>
<body>
<div class="wrap">

  <header>
    <div class="brand">
      <div class="logo-chip">
      <img class="logo-mark" src="data:image/png;base64,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" alt="TM One logo" style="height:42px;width:auto">
      </div>
      <div class="title-block">
        <h1>TM ONE VISION AI — <span>HARI SUKAN NEGARA 2026</span></h1>
        <p>Real-Time Event Intelligence & Crowd Analytics</p>
      </div>
    </div>
    <div class="status">
      <span><span class="dot"></span> LIVE <b id="clock">--:--:--</b></span>
      <span id="dateNow">— OCT 2026</span>
      <button class="cfg-btn" style="position:static" onclick="document.getElementById('helpModal').classList.add('open')">Camera setup help</button>
    </div>
  </header>

  <div class="grid3" id="cameraRow"></div>

  <div class="grid3b">
    <div class="stat" id="visitorsCard">
      <div class="icon-circle">👥</div>
      <div><h4>TOTAL VISITORS TODAY</h4><div class="num" id="visitorsNum">8,526</div><div class="sub">Unique visitors</div></div>
    </div>
    <div class="stat" id="peakCard">
      <div class="icon-circle">📈</div>
      <div><h4>PEAK COUNT DETECTED</h4><div class="num" id="peakNum">62</div><div class="sub">Highest count / minute</div></div>
    </div>
    <div class="stat alert" id="alertCard">
      <div class="icon-circle">⚠️</div>
      <div><h4>CROWD CONGESTION ALERT</h4><div class="num green" id="alertText">NORMAL</div><div class="sub">Threshold &gt; 50 person / minute</div></div>
    </div>
  </div>

  <div class="grid3" style="margin-bottom:16px">
    <div class="panel"><div class="panel-head"><h3>Camera 1 Trend</h3><span>Today (per hour)</span></div><canvas id="chart1"></canvas></div>
    <div class="panel"><div class="panel-head"><h3>Camera 2 Trend</h3><span>Today (per hour)</span></div><canvas id="chart2"></canvas></div>
    <div class="panel"><div class="panel-head"><h3>Camera 3 Trend</h3><span>Today (per hour)</span></div><canvas id="chart3"></canvas></div>
  </div>

  <div class="grid3c">
    <div class="panel">
      <div class="panel-head"><h3>Gender Analytics</h3></div>
      <div class="donut-wrap">
        <canvas id="genderChart"></canvas>
        <div style="flex:1">
          <div class="legend-item"><span class="sw" style="background:var(--blue)"></span>Male<b id="malePct">58%</b></div>
          <div class="legend-item"><span class="sw" style="background:var(--pink)"></span>Female<b id="femalePct">42%</b></div>
          <div class="total-line">Total detections<b id="genderTotal">8,526</b></div>
        </div>
      </div>
    </div>
    <div class="panel">
      <div class="panel-head"><h3>Age Distribution</h3></div>
      <canvas id="ageChart"></canvas>
    </div>
    <div class="panel">
      <div class="panel-head"><h3>Audience Snapshot</h3></div>
      <div class="snap-row"><span>Top age group<b id="topAge">30–39 years</b></span></div>
      <div class="snap-row"><span>Dominant audience<b id="dominant" style="color:var(--orange)">Adult participants</b></span></div>
      <div class="snap-row"><span>Gender ratio<b><span id="ratioM" style="color:var(--blue)">58%</span> : <span id="ratioF" style="color:var(--pink)">42%</span></b></span></div>
      <div class="avatars"><span style="font-size:26px">🧑‍🤝‍🧑</span><div><div class="num" id="snapTotal">8,526</div><div class="sub" style="color:var(--muted);font-size:12px">Total detections today</div></div></div>
    </div>
  </div>

  <footer>
    <div class="foot-links">
      <button onclick="alert('AI-powered video analytics: people counting, tracking and demographic inference run on every camera feed.')">🧠 AI powered video analytics</button>
      <button onclick="alert('Real-time crowd monitoring: live headcount per minute with congestion alerts.')">📷 Real-time crowd monitoring</button>
      <button onclick="alert('Demographic analytics: gender and age-band breakdown from anonymised detections.')">👥 Demographic analytics</button>
      <button onclick="alert('Smart event management: dashboards and alerts for organisers during the event.')">📊 Smart event management</button>
    </div>
    <div>Powered by <b style="color:var(--text)">TM</b></div>
  </footer>
</div>

<!-- Camera detail / help modal -->
<div class="modal" id="camModal"><div class="modal-card">
  <h3 id="camModalTitle">Camera</h3>
  <p id="camModalBody"></p>
  <button onclick="document.getElementById('camModal').classList.remove('open')">Close</button>
</div></div>

<div class="modal" id="helpModal"><div class="modal-card">
  <h3>Connecting your live camera (RTSP)</h3>
  <p>Your feed at <code>rtsp://175.140.166.217:28554/hcp_camera2</code> can't be played directly by any web browser — RTSP is not a browser-supported protocol, and it also won't cross this page's network boundary.</p>
  <p>To show it here, run a small restreaming gateway on the same network as the camera (e.g. <b>MediaMTX</b> or <b>go2rtc</b>, both free) that converts the RTSP feed into an HLS or MJPEG stream served over plain HTTP. Then click "Set stream URL" on Camera 2 and paste that HTTP address — the page will load it live.</p>
  <button onclick="document.getElementById('helpModal').classList.remove('open')">Got it</button>
</div></div>

<script>
// ---- clock ----
function tick(){
  const d=new Date();
  document.getElementById('clock').textContent=d.toLocaleTimeString('en-MY',{hour:'2-digit',minute:'2-digit',second:'2-digit'});
  document.getElementById('dateNow').textContent=d.toLocaleDateString('en-MY',{day:'numeric',month:'short',year:'numeric'}).toUpperCase();
}
tick(); setInterval(tick,1000);

// ---- camera panel builder ----
const cams=[
  {id:1,name:'Camera 1',loc:'Marquee Tent Entrance',type:'demo'},
  {id:2,name:'Camera 2',loc:'Flag-Off Arch (Front) — Live feed slot',type:'live'},
  {id:3,name:'Camera 3',loc:'Flag-Off Arch (Back / Finish)',type:'demo'}
];
const camRow=document.getElementById('cameraRow');
cams.forEach(c=>{
  const el=document.createElement('div');
  el.className='cam';
  el.innerHTML=`
    <div class="cam-head">
      <div><h3>${c.name}</h3><p>${c.loc}</p></div>
      <span class="live-badge"><span class="dot" style="width:6px;height:6px"></span>LIVE</span>
    </div>
    <div class="cam-body" id="camBody${c.id}" onclick="openCam(${c.id})">
      ${c.type==='live'
        ? `<video id="camStream${c.id}" muted playsinline style="width:100%;height:100%;object-fit:cover;display:none"></video>
           <img id="camImg${c.id}" style="width:100%;height:100%;object-fit:cover;display:none">
           <svg id="camPlaceholder${c.id}" width="90" height="90" viewBox="0 0 24 24" fill="none" stroke="#3aa0ff" stroke-width="1.4"><path d="M15 10l5-3v10l-5-3M4 6h9a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z"/></svg>`
        : `<svg width="90" height="90" viewBox="0 0 24 24" fill="none" stroke="#3aa0ff" stroke-width="1.4"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>`
      }
      <span class="cam-time">--:--:--</span>
      <span class="cam-tag" id="camTag${c.id}">${c.type==='live'?'awaiting stream URL':'demo snapshot'}</span>
      ${c.type==='live'?`<button class="cfg-btn" onclick="event.stopPropagation();toggleStreamInput(${c.id})">Set stream URL</button>
      <div class="stream-input" id="streamInput${c.id}">
        <input id="streamUrl${c.id}" placeholder="https://.../stream.m3u8 or .../stream.mjpg" value="https://test-streams.mux.dev/x36xhzz/x36xhzz.m3u8">
        <button onclick="event.stopPropagation();applyStream(${c.id})">Load</button>
      </div>`:''}
    </div>`;
  camRow.appendChild(el);
});
setInterval(()=>{
  const t=new Date().toLocaleTimeString('en-MY',{hour:'2-digit',minute:'2-digit',second:'2-digit'});
  document.querySelectorAll('.cam-time').forEach(e=>e.textContent=t);
},1000);

function toggleStreamInput(id){
  const box=document.getElementById('streamInput'+id);
  box.style.display=box.style.display==='flex'?'none':'flex';
}
function applyStream(id){
  const url=document.getElementById('streamUrl'+id).value.trim();
  if(!url) return;
  if(url.startsWith('rtsp://')){
    alert('That\'s the raw RTSP link — browsers can\'t play it directly. Run it through a gateway (MediaMTX/go2rtc) first and paste the resulting http(s):// HLS or MJPEG URL here instead.');
    return;
  }
  const placeholder=document.getElementById('camPlaceholder'+id);
  const tag=document.getElementById('camTag'+id);
  const showLive=()=>{ placeholder.style.display='none'; tag.textContent='live stream loaded'; };
  const showError=(msg)=>{ tag.textContent='stream failed to load'; alert(msg); };

  if(url.includes('.m3u8')){
    const video=document.getElementById('camStream'+id);
    document.getElementById('camImg'+id).style.display='none';
    if(window.Hls && Hls.isSupported()){
      const hls=new Hls();
      hls.loadSource(url);
      hls.attachMedia(video);
      hls.on(Hls.Events.MANIFEST_PARSED,()=>{ video.style.display='block'; video.play(); showLive(); });
      hls.on(Hls.Events.ERROR,(e,data)=>{ if(data.fatal) showError('HLS stream failed to load. Check the URL and that the gateway is reachable from this browser.'); });
    } else if(video.canPlayType('application/vnd.apple.mpegurl')){
      video.src=url;
      video.addEventListener('loadedmetadata',()=>{ video.style.display='block'; video.play(); showLive(); });
      video.onerror=()=>showError('HLS stream failed to load in this browser.');
    } else {
      showError('This browser cannot play HLS streams.');
    }
  } else {
    const img=document.getElementById('camImg'+id);
    document.getElementById('camStream'+id).style.display='none';
    img.onerror=()=>showError('Could not load that URL. Confirm it is a reachable HTTP(S) MJPEG address.');
    img.onload=()=>{ img.style.display='block'; showLive(); };
    img.src=url;
  }
}
function openCam(id){
  const c=cams.find(x=>x.id===id);
  document.getElementById('camModalTitle').textContent=c.name+' — '+c.loc;
  document.getElementById('camModalBody').textContent = c.type==='live'
    ? 'This tile is wired to hold your RTSP camera once converted to an HTTP stream (HLS/MJPEG). Click "Set stream URL" on the tile to plug in your gateway address.'
    : 'This tile shows a placeholder — connect a real camera source the same way as Camera 2 to bring it live.';
  document.getElementById('camModal').classList.add('open');
}

// ================= LIVE DATA FROM LARAVEL =================
const REFRESH_MS = 30000;          // full re-sync with the server every 30 s
let stats = @json($stats);         // first load: numbers rendered by Laravel
const charts = { cams: [] };

const $ = id => document.getElementById(id);
const fmt = n => Number(n || 0).toLocaleString();
const pct = (v, t) => t ? Math.round(v / t * 100) : 0;
const cap = s => s ? s.charAt(0).toUpperCase() + s.slice(1) : '';
const CAM_COLORS = ['#3aa0ff', '#8a6bff', '#f5821f'];
const labels24 = Array.from({length:24}, (_, i) => i===0 ? '12AM' : i<12 ? i+'AM' : i===12 ? '12PM' : (i-12)+'PM');

// ---- clickable stat cards (now show live numbers) ----
$('visitorsCard').onclick = () => alert(fmt(stats.totalVisitors) + ' detections recorded today across all cameras.');
$('peakCard').onclick = () => alert('Highest count in a single minute on any one camera: ' + fmt(stats.peakCount) + '.');
$('alertCard').onclick = () => alert('Congestion status: ' + stats.congestion.status + '. An alert triggers when any camera exceeds ' + stats.congestion.threshold + ' detections in the last minute (currently the busiest camera has ' + stats.congestion.current + ').');

// ---- draw everything from the `stats` object ----
function render(){
  const g = stats.gender || {}, a = stats.age || {};
  const male = g.male || 0, female = g.female || 0, gTotal = male + female;

  $('visitorsNum').textContent = fmt(stats.totalVisitors);
  $('peakNum').textContent = fmt(stats.peakCount);

  const alertOn = stats.congestion.status === 'ALERT';
  const t = $('alertText');
  t.textContent = alertOn ? 'CONGESTED' : 'NORMAL';
  t.classList.toggle('green', !alertOn);
  t.style.color = alertOn ? '#e6303f' : '';

  $('malePct').textContent = pct(male, gTotal) + '%';
  $('femalePct').textContent = pct(female, gTotal) + '%';
  $('ratioM').textContent = pct(male, gTotal) + '%';
  $('ratioF').textContent = pct(female, gTotal) + '%';
  $('genderTotal').textContent = fmt(gTotal);
  $('snapTotal').textContent = fmt(stats.totalVisitors);

  const ageKeys = Object.keys(a);
  const ageTotal = ageKeys.reduce((s, k) => s + a[k], 0);
  const top = ageKeys.sort((x, y) => a[y] - a[x])[0];
  $('topAge').textContent = top ? cap(top) : '—';
  $('dominant').textContent = top ? cap(top) + ' participants' : '—';

  if (!charts.gender) return;   // charts not created yet
  charts.gender.data.datasets[0].data = [male, female];
  charts.gender.update('none');

  const order = ['child', 'adult', 'old'];
  const keys = Object.keys(a).sort((x, y) => (order.indexOf(x) + 99) % 99 - (order.indexOf(y) + 99) % 99);
  charts.age.data.labels = keys.map(cap);
  charts.age.data.datasets[0].data = keys.map(k => pct(a[k], ageTotal));
  charts.age.update('none');

  charts.cams.forEach((c, i) => {
    c.data.datasets[0].data = (stats.hourly && stats.hourly[i + 1]) || new Array(24).fill(0);
    c.update('none');
  });
}

// several events can arrive in the same instant, so draw at most once per frame
let renderQueued = false;
function scheduleRender(){
  if (renderQueued) return;
  renderQueued = true;
  requestAnimationFrame(() => { renderQueued = false; render(); });
}

async function refresh(){
  try {
    const res = await fetch('/dashboard/stats', { headers: { Accept: 'application/json' } });
    stats = await res.json();
      render();

    // Auto-load Camera 2 with the URL pre-filled in its box
    applyStream(2);
  } catch (err) {
    console.error('Stats refresh failed:', err);
  }
}

document.addEventListener('DOMContentLoaded', () => {
  // ---- charts (Chart.js is bundled by Vite and exposed as window.Chart) ----
  if (typeof Chart === 'undefined') {
    document.querySelectorAll('canvas').forEach(c => {
      const msg = document.createElement('div');
      msg.style.cssText = 'color:#8996b3;font-size:12px;text-align:center;padding:30px 10px;border:1px dashed #1c2946;border-radius:8px';
      msg.textContent = 'Chart library not loaded — is "npm run dev" running?';
      c.replaceWith(msg);
    });
  } else {
    const lineOpts = color => ({
      type: 'line',
      data: { labels: labels24, datasets: [{ label: 'Footfall', data: new Array(24).fill(0), borderColor: color,
        backgroundColor: color + '33', fill: true, tension: .35, pointRadius: 0, borderWidth: 2 }] },
      options: { plugins: { legend: { labels: { color: '#8996b3', boxWidth: 10 } } },
        scales: { x: { ticks: { color: '#8996b3', maxTicksLimit: 7 }, grid: { color: '#1c2946' } },
                  y: { ticks: { color: '#8996b3' }, grid: { color: '#1c2946' }, beginAtZero: true } } }
    });
    [1, 2, 3].forEach((n, i) => { charts.cams.push(new Chart($('chart' + n), lineOpts(CAM_COLORS[i]))); });

    charts.gender = new Chart($('genderChart'), {
      type: 'doughnut',
      data: { labels: ['Male', 'Female'], datasets: [{ data: [1, 1], backgroundColor: ['#3aa0ff', '#ff4d8d'], borderWidth: 0 }] },
      options: { cutout: '70%', plugins: { legend: { display: false } } }
    });
    charts.age = new Chart($('ageChart'), {
      type: 'bar',
      data: { labels: [], datasets: [{ data: [], backgroundColor: '#8a6bff', borderRadius: 4 }] },
      options: { indexAxis: 'y', plugins: { legend: { display: false } },
        scales: { x: { ticks: { color: '#8996b3', callback: v => v + '%' }, grid: { color: '#1c2946' }, beginAtZero: true },
                  y: { ticks: { color: '#8996b3' }, grid: { display: false } } } }
    });
  }

  render();

  // ---- live: every detection pushed by Reverb ticks the numbers up instantly ----
  if (window.Echo) {
    window.Echo.channel('visionai-dashboard').listen('DetectionReceived', e => {
      stats.totalVisitors++;
      if (e.gender) stats.gender[e.gender] = (stats.gender[e.gender] || 0) + 1;
      if (e.age_bucket) stats.age[e.age_bucket] = (stats.age[e.age_bucket] || 0) + 1;
      const row = stats.hourly && stats.hourly[e.camera_id];
      if (row) row[new Date().getHours()]++;
      scheduleRender();
    });
  } else {
    console.warn('Echo not available — the page will still refresh every ' + (REFRESH_MS / 1000) + ' s.');
  }

  // ---- safety net: re-sync peak, congestion and all totals with the database ----
  setInterval(refresh, REFRESH_MS);
});
</script>
</body>
</html>