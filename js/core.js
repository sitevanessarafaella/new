/* ╔══════════════════════════════════════════════════════════════╗
   ║  CORE.JS — JavaScript principal (TODA página usa)            ║
   ║                                                                ║
   ║  Faz funcionar:                                               ║
   ║    ✓ Botão de tema escuro/claro (lembra a escolha)            ║
   ║    ✓ Seletor de idioma (PT/EN/ES — lembra a escolha)          ║
   ║    ✓ Abrir/fechar menu mobile                                 ║
   ║    ✓ Sombra na navbar ao rolar                                ║
   ║    ✓ Animação [data-reveal] ao scrollar                       ║
   ║                                                                ║
   ║  ⭐ Como usar em qualquer página:                             ║
   ║     <script src="./js/core.js" defer></script>                ║
   ╚══════════════════════════════════════════════════════════════╝ */

'use strict';


/* ═══════════════════════════════════════════════════
   ⚙️ CONFIGURAÇÃO — edite estes valores se precisar
   ═══════════════════════════════════════════════════ */
const WA_NUMBER = '5581995469947';

const WA_MSG = {
  pt: 'Olá Vanessa! Vi seu site e gostaria de saber mais.',
  en: 'Hello Vanessa! I saw your website and would like to know more.',
  es: '¡Hola Vanessa! Vi tu sitio web y me gustaría saber más.'
};


/* ═══════════════════════════════════════════════════
   📦 ESTADO INICIAL — lê do localStorage (memória do browser)
   ═══════════════════════════════════════════════════ */
const html = document.documentElement;
let currentLang  = localStorage.getItem('vr-lang')  || 'pt';
let currentTheme = localStorage.getItem('vr-theme') || 'dark';


/* ═══════════════════════════════════════════════════
   🌙 TEMA ESCURO/CLARO
   ═══════════════════════════════════════════════════ */
function applyTheme(theme) {
  currentTheme = theme;
  html.setAttribute('data-theme', theme);
  localStorage.setItem('vr-theme', theme);

  const isDark = theme === 'dark';

  // Troca o ícone (lua ↔ sol)
  const icon = document.getElementById('themeIcon');
  if (icon) icon.className = isDark ? 'fas fa-moon' : 'fas fa-sun';

  // Atualiza label do botão mobile
  const lbl = document.getElementById('mobThemeLabel');
  if (lbl) {
    const labels = isDark
      ? { pt: 'Escuro', en: 'Dark',  es: 'Oscuro' }
      : { pt: 'Claro',  en: 'Light', es: 'Claro'  };
    lbl.textContent = labels[currentLang] || labels.pt;
  }

  // Atualiza meta theme-color (cor da barra do navegador no celular)
  const meta = document.querySelector('meta[name="theme-color"]');
  if (meta) meta.setAttribute('content', isDark ? '#080808' : '#ffffff');
}

// Liga os botões de alternar tema
document.getElementById('themeToggle')?.addEventListener('click', () => {
  applyTheme(currentTheme === 'dark' ? 'light' : 'dark');
});
document.getElementById('mobThemeToggle')?.addEventListener('click', () => {
  applyTheme(currentTheme === 'dark' ? 'light' : 'dark');
});


/* ═══════════════════════════════════════════════════
   🌍 IDIOMA — i18n simples baseado em data-pt/en/es

   Como funciona:
   No HTML você escreve:
     <span data-pt="Início" data-en="Home" data-es="Inicio">Início</span>
   E o JS troca o texto automaticamente.
   ═══════════════════════════════════════════════════ */
function setLang(lang) {
  currentLang = lang;
  localStorage.setItem('vr-lang', lang);
  html.lang = lang === 'en' ? 'en' : lang === 'es' ? 'es' : 'pt-BR';

  // Procura TODOS elementos com data-pt e troca o texto
  document.querySelectorAll('[data-pt],[data-en],[data-es]').forEach(el => {
    const txt = el.getAttribute('data-' + lang) || el.getAttribute('data-pt');
    if (!txt) return;

    if (txt.includes('<')) {
      el.innerHTML = txt;
    } else if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
      el.placeholder = txt;
    } else {
      el.textContent = txt;
    }
  });

  // Atualiza bandeira e código mostrados na navbar
  const flagMap = { pt: '🇧🇷', en: '🇺🇸', es: '🇪🇸' };
  const langCode = document.getElementById('langCode');
  const langFlag = document.getElementById('langFlag');
  if (langCode) langCode.textContent = lang.toUpperCase();
  if (langFlag) langFlag.textContent = flagMap[lang] || '🇧🇷';

  // Marca opção selecionada no dropdown
  document.querySelectorAll('.lang-opt').forEach(opt => {
    opt.setAttribute('aria-selected', opt.dataset.lang === lang ? 'true' : 'false');
  });

  updateWALinks();
  applyTheme(currentTheme);  // re-aplica pra atualizar label do botão
}

// Expõe pra HTML poder chamar inline (ex: onclick="setLang('en')")
window.setLang = setLang;

// Atualiza todos os links do WhatsApp com a mensagem no idioma certo
function updateWALinks() {
  const msg = encodeURIComponent(WA_MSG[currentLang] || WA_MSG.pt);
  const url = `https://wa.me/${WA_NUMBER}?text=${msg}`;
  document.querySelectorAll('a[href*="wa.me"]').forEach(a => {
    if (a.href.includes(WA_NUMBER)) a.href = url;
  });
}


/* ═══════════════════════════════════════════════════
   📂 DROPDOWN DE IDIOMA — abre/fecha
   ═══════════════════════════════════════════════════ */
const langSel     = document.getElementById('langSel');
const langTrigger = document.getElementById('langTrigger');

langTrigger?.addEventListener('click', e => {
  e.stopPropagation();
  const isOpen = langSel.classList.toggle('open');
  langTrigger.setAttribute('aria-expanded', String(isOpen));
});

document.querySelectorAll('.lang-opt').forEach(opt => {
  opt.addEventListener('click', () => {
    setLang(opt.dataset.lang);
    langSel.classList.remove('open');
    langTrigger.setAttribute('aria-expanded', 'false');
  });
});

// Fecha o dropdown ao clicar fora
document.addEventListener('click', () => {
  langSel?.classList.remove('open');
  langTrigger?.setAttribute('aria-expanded', 'false');
});


/* ═══════════════════════════════════════════════════
   🍔 MENU MOBILE — abrir/fechar painel lateral
   ═══════════════════════════════════════════════════ */
const hamburger      = document.getElementById('hamburger');
const btnMenuDesktop = document.getElementById('btnMenuDesktop');
const mobMenu        = document.getElementById('mobMenu');
const mobOverlay     = document.getElementById('mobOverlay');
const mobClose       = document.getElementById('mobClose');

function openMobMenu() {
  [hamburger, btnMenuDesktop].forEach(b => {
    b?.classList.add('active');
    b?.setAttribute('aria-expanded', 'true');
  });
  mobMenu.removeAttribute('hidden');
  // Pequeno delay pra animação funcionar
  requestAnimationFrame(() => {
    mobMenu.classList.add('active');
    mobOverlay.classList.add('active');
  });
  document.body.style.overflow = 'hidden';   // trava scroll da página
  mobClose?.focus();
}

function closeMobMenu() {
  [hamburger, btnMenuDesktop].forEach(b => {
    b?.classList.remove('active');
    b?.setAttribute('aria-expanded', 'false');
  });
  mobMenu.classList.remove('active');
  mobOverlay.classList.remove('active');
  document.body.style.overflow = '';

  // Esconde o painel só DEPOIS da animação acabar
  mobMenu.addEventListener('transitionend', () => {
    if (!mobMenu.classList.contains('active')) {
      mobMenu.setAttribute('hidden', '');
    }
  }, { once: true });

  hamburger?.focus();
}

hamburger?.addEventListener('click', openMobMenu);
btnMenuDesktop?.addEventListener('click', openMobMenu);
mobClose?.addEventListener('click', closeMobMenu);
mobOverlay?.addEventListener('click', closeMobMenu);

// Fecha menu ao clicar em qualquer link dentro dele
mobMenu?.querySelectorAll('a').forEach(a =>
  a.addEventListener('click', closeMobMenu)
);

// ESC fecha menu e dropdown de idioma
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') {
    langSel?.classList.remove('open');
    if (mobMenu?.classList.contains('active')) closeMobMenu();
  }
});


/* ═══════════════════════════════════════════════════
   📜 NAVBAR — sombra ao rolar a página
   Adiciona a classe .scrolled depois de rolar 20px
   ═══════════════════════════════════════════════════ */
const mainNav = document.getElementById('mainNav');

window.addEventListener('scroll', () => {
  if (mainNav) {
    mainNav.classList.toggle('scrolled', window.scrollY > 20);
  }
}, { passive: true });


/* ═══════════════════════════════════════════════════
   🎭 [data-reveal] — anima elementos ao scrollar
   Uso no HTML: <div data-reveal>aparece suavemente</div>
   ═══════════════════════════════════════════════════ */
const revealObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('is-visible');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.15 });

document.querySelectorAll('[data-reveal]').forEach(el =>
  revealObserver.observe(el)
);


/* ═══════════════════════════════════════════════════
   🚀 INICIALIZAÇÃO
   ═══════════════════════════════════════════════════ */
// Aplica tema sem animação na primeira carga
html.style.transition = 'none';
applyTheme(currentTheme);
requestAnimationFrame(() => { html.style.transition = ''; });

// Aplica idioma salvo
setLang(currentLang);

console.log('✨ core.js carregado');
