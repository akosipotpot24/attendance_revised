<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Hermogenes S. Tongco IV — Portfolio</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Mono:wght@400;500&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#0d0f14;
  --surface:#161921;
  --surface2:#1e2230;
  --accent:#5dcaa5;
  --accent2:#1d9e75;
  --text:#e8eaf0;
  --muted:#8b90a0;
  --border:rgba(255,255,255,0.07);
  --tag-bg:rgba(29,158,117,0.15);
  --tag-color:#5dcaa5;
}
html{scroll-behavior:smooth}
body{
  background:var(--bg);
  color:var(--text);
  font-family:'Outfit',sans-serif;
  font-weight:400;
  line-height:1.7;
  min-height:100vh;
}
nav{
  position:sticky;top:0;z-index:100;
  background:rgba(13,15,20,0.85);
  backdrop-filter:blur(12px);
  border-bottom:1px solid var(--border);
  padding:0 2rem;
  display:flex;align-items:center;justify-content:space-between;
  height:56px;
}
.nav-logo{font-family:'DM Mono',monospace;font-size:13px;color:var(--accent);letter-spacing:0.08em}
.nav-links{display:flex;gap:2rem}
.nav-links a{color:var(--muted);text-decoration:none;font-size:13px;letter-spacing:0.04em;transition:color .2s}
.nav-links a:hover{color:var(--text)}

/* HERO */
.hero{
  min-height:92vh;
  display:flex;flex-direction:column;justify-content:center;
  padding:4rem 2rem 3rem;
  max-width:900px;margin:0 auto;
}
.hero-inner{
  display:flex;
  align-items:center;
  gap:3.5rem;
  flex-wrap:wrap;
}
.hero-photo-wrap{
  flex-shrink:0;
  position:relative;
}
.hero-photo-wrap::before{
  content:'';
  position:absolute;
  inset:-4px;
  border-radius:50%;
  background:linear-gradient(135deg, var(--accent), transparent 60%);
  z-index:0;
}
.hero-photo{
  position:relative;z-index:1;
  width:280px;height:280px;
  border-radius:50%;
  object-fit:cover;object-position:top center;
  border:3px solid var(--bg);
  display:block;
}
.hero-text{flex:1;min-width:260px}
.hero-eyebrow{
  font-family:'DM Mono',monospace;font-size:12px;
  color:var(--accent);letter-spacing:0.12em;text-transform:uppercase;
  margin-bottom:1.2rem;
  display:flex;align-items:center;gap:10px;
}
.hero-eyebrow::before{content:'';display:block;width:32px;height:1px;background:var(--accent)}
.hero h1{
  font-family:'DM Serif Display',serif;
  font-size:clamp(2.4rem,5vw,4.2rem);
  line-height:1.08;
  letter-spacing:-0.02em;
  color:#fff;
  margin-bottom:0.2em;
}
.hero h1 em{color:var(--accent);font-style:italic;}
.hero-subtitle{
  font-size:1rem;color:var(--muted);
  max-width:480px;margin:1.2rem 0 2rem;line-height:1.75;
}
.hero-actions{display:flex;gap:1rem;flex-wrap:wrap}
.btn{
  display:inline-flex;align-items:center;gap:8px;
  padding:0.65rem 1.4rem;border-radius:6px;
  font-family:'Outfit',sans-serif;font-size:14px;font-weight:500;
  text-decoration:none;cursor:pointer;border:none;
  transition:all .2s;letter-spacing:0.02em;
}
.btn-primary{background:var(--accent);color:#0d0f14}
.btn-primary:hover{background:#4db893}
.btn-ghost{background:transparent;color:var(--text);border:1px solid var(--border)}
.btn-ghost:hover{border-color:rgba(255,255,255,0.25);background:var(--surface)}
.hero-meta{
  margin-top:3rem;padding-top:2rem;border-top:1px solid var(--border);
  display:flex;gap:2.5rem;flex-wrap:wrap;
}
.hero-meta-item{display:flex;flex-direction:column;gap:2px}
.hero-meta-label{font-family:'DM Mono',monospace;font-size:10px;color:var(--muted);letter-spacing:0.1em;text-transform:uppercase}
.hero-meta-value{font-size:14px;color:var(--text)}
.hero-meta-value a{color:var(--accent);text-decoration:none}
.hero-meta-value a:hover{text-decoration:underline}

section{padding:5rem 2rem;max-width:900px;margin:0 auto}
.section-label{
  font-family:'DM Mono',monospace;font-size:11px;
  color:var(--accent);letter-spacing:0.12em;text-transform:uppercase;
  margin-bottom:2.5rem;display:flex;align-items:center;gap:10px;
}
.section-label::after{content:'';flex:1;height:1px;background:var(--border)}
.skills-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:1px;background:var(--border);border:1px solid var(--border);border-radius:10px;overflow:hidden}
.skill-cell{background:var(--surface);padding:1.25rem 1.5rem;transition:background .2s}
.skill-cell:hover{background:var(--surface2)}
.skill-cell-label{font-family:'DM Mono',monospace;font-size:10px;color:var(--muted);letter-spacing:0.1em;text-transform:uppercase;margin-bottom:0.6rem}
.skill-tags{display:flex;flex-wrap:wrap;gap:6px}
.tag{background:var(--tag-bg);color:var(--tag-color);font-size:12px;padding:3px 10px;border-radius:4px;font-family:'DM Mono',monospace;}
.project-card{
  background:var(--surface);border:1px solid var(--border);border-radius:12px;
  padding:2rem;margin-bottom:1rem;transition:border-color .2s,background .2s;
  position:relative;overflow:hidden;
}
.project-card::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background:linear-gradient(90deg,var(--accent),transparent);opacity:0;transition:opacity .2s}
.project-card:hover{border-color:rgba(93,202,165,0.25);background:var(--surface2)}
.project-card:hover::before{opacity:1}
.project-title{font-family:'DM Serif Display',serif;font-size:1.35rem;color:#fff;line-height:1.3}
.project-stack{display:flex;flex-wrap:wrap;gap:6px;margin-top:0.75rem}
.project-desc{color:var(--muted);font-size:0.95rem;margin:1rem 0 1.25rem;line-height:1.7}
.project-features{list-style:none;display:flex;flex-direction:column;gap:6px}
.project-features li{font-size:13px;color:var(--muted);display:flex;align-items:flex-start;gap:8px}
.project-features li::before{content:'→';color:var(--accent);flex-shrink:0;margin-top:1px}
.exp-card{border-left:2px solid var(--accent2);padding:0 0 2rem 1.75rem;position:relative}
.exp-card::before{content:'';position:absolute;left:-5px;top:4px;width:8px;height:8px;border-radius:50%;background:var(--accent);border:2px solid var(--bg)}
.exp-role{font-size:1.05rem;font-weight:500;color:#fff;margin-bottom:2px}
.exp-org{font-family:'DM Mono',monospace;font-size:12px;color:var(--accent);margin-bottom:0.3rem}
.exp-date{font-family:'DM Mono',monospace;font-size:11px;color:var(--muted);margin-bottom:0.75rem}
.exp-list{list-style:none;display:flex;flex-direction:column;gap:5px}
.exp-list li{font-size:13px;color:var(--muted);display:flex;gap:8px;align-items:flex-start}
.exp-list li::before{content:'·';color:var(--accent);flex-shrink:0;font-size:16px;line-height:1.4}
.contact-block{
  background:var(--surface);border:1px solid var(--border);border-radius:12px;
  padding:2.5rem;display:grid;grid-template-columns:1fr 1fr;gap:2rem;
}
.contact-item{display:flex;flex-direction:column;gap:4px}
.contact-label{font-family:'DM Mono',monospace;font-size:10px;color:var(--muted);letter-spacing:0.1em;text-transform:uppercase}
.contact-value{font-size:14px;color:var(--text)}
.contact-value a{color:var(--accent);text-decoration:none}
.contact-value a:hover{text-decoration:underline}
footer{border-top:1px solid var(--border);padding:2rem;text-align:center;font-family:'DM Mono',monospace;font-size:11px;color:var(--muted);letter-spacing:0.06em}
.reveal{opacity:0;transform:translateY(24px);transition:opacity .55s ease,transform .55s ease}
.reveal.visible{opacity:1;transform:none}
</style>
</head>
<body>

<nav>
  <span class="nav-logo">hst.dev</span>
  <div class="nav-links">
    <a href="#skills">Skills</a>
    <a href="#projects">Projects</a>
    <a href="#experience">Experience</a>
    <a href="#contact">Contact</a>
  </div>
</nav>

<div class="hero">
  <div class="hero-inner reveal">
    <div class="hero-photo-wrap">
      <img
        src="{{ asset('images/profile.png') }}"
        alt="Hermogenes S. Tongco IV"
        class="hero-photo"
      />
    </div>
    <div class="hero-text">
      <div class="hero-eyebrow">Available for junior roles</div>
      <h1>Hi, I'm<br><em>Hermogenes.</em></h1>
      <p class="hero-subtitle">
        Junior software developer specialising in PHP &amp; Laravel, with hands-on experience building full-stack systems and supporting IT operations in an academic environment.
      </p>
      <div class="hero-actions">
        <a href="#projects" class="btn btn-primary">View my work</a>
        <a href="#contact" class="btn btn-ghost">Get in touch</a>
      </div>
    </div>
  </div>
  <div class="hero-meta">
    <div class="hero-meta-item">
      <span class="hero-meta-label">Location</span>
      <span class="hero-meta-value">Antipolo City, Rizal 🇵🇭</span>
    </div>
    <div class="hero-meta-item">
      <span class="hero-meta-label">Education</span>
      <span class="hero-meta-value">BS Information Technology · PLMar · 2023</span>
    </div>
    <div class="hero-meta-item">
      <span class="hero-meta-label">GitHub</span>
      <span class="hero-meta-value"><a href="https://github.com/akosipotpot24" target="_blank">@akosipotpot24</a></span>
    </div>
    <div class="hero-meta-item">
      <span class="hero-meta-label">LinkedIn</span>
      <span class="hero-meta-value"><a href="https://linkedin.com/in/hermogenes-tongco-iv-68557a27a" target="_blank">hermogenes-tongco-iv</a></span>
    </div>
  </div>
</div>

<section id="skills">
  <div class="section-label">Technical skills</div>
  <div class="skills-grid reveal">
    <div class="skill-cell">
      <div class="skill-cell-label">Back-end</div>
      <div class="skill-tags">
        <span class="tag">PHP</span><span class="tag">Laravel</span><span class="tag">MVC</span><span class="tag">Blade</span><span class="tag">CRUD</span>
      </div>
    </div>
    <div class="skill-cell">
      <div class="skill-cell-label">Database</div>
      <div class="skill-tags">
        <span class="tag">MySQL</span><span class="tag">Joins</span><span class="tag">Aggregation</span><span class="tag">DB Design</span>
      </div>
    </div>
    <div class="skill-cell">
      <div class="skill-cell-label">Version Control</div>
      <div class="skill-tags"><span class="tag">Git</span></div>
    </div>
    <div class="skill-cell">
      <div class="skill-cell-label">IT Support</div>
      <div class="skill-tags">
        <span class="tag">Troubleshooting</span><span class="tag">Networking</span><span class="tag">Lab Maintenance</span>
      </div>
    </div>
    <div class="skill-cell">
      <div class="skill-cell-label">Core strengths</div>
      <div class="skill-tags">
        <span class="tag">Problem-solving</span><span class="tag">Independent</span><span class="tag">Team player</span>
      </div>
    </div>
  </div>
</section>

<section id="projects">
  <div class="section-label">Featured project</div>
  <div class="project-card reveal">
    <div class="project-title">Student Attendance System for Library</div>
    <div class="project-stack">
      <span class="tag">PHP</span><span class="tag">Laravel</span><span class="tag">MySQL</span><span class="tag">Barcode Integration</span>
    </div>
    <p class="project-desc">
      A full-stack library attendance management system built with Laravel's MVC architecture. Students scan barcodes to log in, with real-time information display and centralised monitoring across multiple library locations.
    </p>
    <ul class="project-features">
      <li>Barcode-based student login with real-time info display</li>
      <li>Relational database schema designed for efficient record storage</li>
      <li>Multi-location support with centralised monitoring dashboard</li>
      <li>Student registration module with image upload functionality</li>
      <li>Full CRUD operations for student records and data integrity</li>
    </ul>
    <div style="margin-top:1.5rem">
      <a href="{{ route('attendance') }}" class="btn btn-primary" target="_blank">
        View Project →
      </a>
    </div>
  </div>
</section>

<section id="experience">
  <div class="section-label">Experience</div>
  <div class="exp-card reveal">
    <div class="exp-role">IT Assistant</div>
    <div class="exp-org">Our Lady of Perpetual Succor College Marikina</div>
    <div class="exp-date">2024 – Present</div>
    <ul class="exp-list">
      <li>Technical support for computer systems, printers, and school management software</li>
      <li>Assisted users with Schoolista (School Management System), ensuring accurate data usage</li>
      <li>Troubleshot hardware, software, and network issues to minimise downtime</li>
      <li>Maintained and configured computer laboratories for academic readiness</li>
      <li>Supported data accuracy and system reliability across all IT resources</li>
    </ul>
  </div>
</section>

<section id="contact">
  <div class="section-label">Get in touch</div>
  <div class="contact-block reveal">
    <div class="contact-item">
      <span class="contact-label">Email</span>
      <span class="contact-value"><a href="mailto:tongcohermogenes@gmail.com">tongcohermogenes@gmail.com</a></span>
    </div>
    <div class="contact-item">
      <span class="contact-label">Phone</span>
      <span class="contact-value">0985-561-4474 / 0992-950-4572</span>
    </div>
    <div class="contact-item">
      <span class="contact-label">GitHub</span>
      <span class="contact-value"><a href="https://github.com/akosipotpot24" target="_blank">github.com/akosipotpot24</a></span>
    </div>
    <div class="contact-item">
      <span class="contact-label">LinkedIn</span>
      <span class="contact-value"><a href="https://linkedin.com/in/hermogenes-tongco-iv-68557a27a" target="_blank">linkedin.com/in/hermogenes-tongco-iv</a></span>
    </div>
  </div>
</section>

<footer>
  © 2026 Hermogenes S. Tongco IV — Built with care
</footer>

<script>
const els = document.querySelectorAll('.reveal');
const io = new IntersectionObserver((entries) => {
  entries.forEach(e => { if(e.isIntersecting){ e.target.classList.add('visible'); io.unobserve(e.target); } });
}, {threshold:0.12});
els.forEach(el => io.observe(el));
</script>
</body>
</html>