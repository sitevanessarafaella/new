<?php
/* ╔══════════════════════════════════════════════════════════════╗
   ║  partials/NAVBAR.PHP — Navbar reutilizável                   ║
   ║                                                                ║
   ║  ⭐ Como usar em qualquer página:                              ║
   ║     <?php include 'partials/navbar.php'; ?>                   ║
   ║                                                                ║
   ║  Mude UMA vez aqui = muda em TODAS as páginas.                ║
   ║                                                                ║
   ║  📌 PARA EDITAR:                                              ║
   ║     • Logo (foto)        → <img src="..." na linha da .nav-logo-photo
   ║     • Nome do site       → "VANESSA RAFAELLA"                 ║
   ║     • Subtítulo          → "Site Oficial"                     ║
   ║     • Links              → bloco <ul class="nav-links">       ║
   ║     • Idiomas            → bloco .lang-dropdown               ║
   ╚══════════════════════════════════════════════════════════════╝ */

/* Detecta a página atual pra marcar o link ativo */
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- ════════════════════════════════════════════════════
     OVERLAY do menu mobile (fica escondido até abrir)
     ════════════════════════════════════════════════════ -->
<div class="mob-overlay" id="mobOverlay" aria-hidden="true"></div>


<!-- ════════════════════════════════════════════════════
     NAVBAR — barra do topo
     ════════════════════════════════════════════════════ -->
<header>
  <nav class="nav" id="mainNav" aria-label="Navegação principal">
    <div class="nav-inner">

      <!-- 🎨 LOGO -->
      <a class="nav-logo" href="index.html" aria-label="Vanessa Rafaella — página inicial">
        <div class="nav-logo-photo">
          <img
            src="./img/pics/vanessa-rafaella-logo-nav-primary.svg"
            alt="Vanessa Rafaella"
            width="42" height="42"
            loading="eager" decoding="async">
          <div class="verified-badge" aria-hidden="true">
            <i class="fas fa-check"></i>
          </div>
        </div>
        <div class="nav-logo-text">
          <span class="nav-logo-name">
            VANESSA&nbsp;<span class="accent">RAFAELLA</span>
          </span>
          <span class="nav-logo-sub"
                data-pt="Site Oficial"
                data-en="Official Website"
                data-es="Sitio Oficial">
            Site Oficial
          </span>
        </div>
      </a>


      <!-- 🔗 LINKS DESKTOP (≥ 768px)
           A classe "active-link" é adicionada via PHP comparando o nome do arquivo.
           ⭐ Pra adicionar/remover links: edite os <li> abaixo. -->
      <ul class="nav-links">

        <li>
          <a href="links-oficiais.html"
             class="<?= $current_page === 'links-oficiais.html' ? 'active-link' : '' ?>"
             data-pt="Links Oficiais"
             data-en="Official Links"
             data-es="Links Oficiales">
            Links Oficiais
          </a>
        </li>

        <li>
          <a href="index.html#about"
             class="<?= $current_page === 'index.html' ? 'active-link' : '' ?>"
             data-pt="Sobre Mim"
             data-en="About Me"
             data-es="Sobre Mí">
            Sobre Mim
          </a>
        </li>

        <li>
          <a href="galleria.html"
             class="<?= $current_page === 'galleria.html' ? 'active-link' : '' ?>"
             data-pt="Fotos"
             data-en="Photos"
             data-es="Fotos">
            Fotos
          </a>
        </li>

        <li>
          <a href="videos.html"
             class="<?= $current_page === 'videos.html' ? 'active-link' : '' ?>"
             data-pt="Vídeos"
             data-en="Videos"
             data-es="Videos">
            Vídeos
          </a>
        </li>

        <li>
          <a href="getintouch.html"
             class="<?= $current_page === 'getintouch.html' ? 'active-link' : '' ?>"
             data-pt="Contato"
             data-en="Contact"
             data-es="Contacto">
            Contato
          </a>
        </li>

      </ul>


      <!-- 🎛️ CONTROLES (tema, idioma, menu) -->
      <div class="nav-controls">

        <!-- Botão alternar tema (lua/sol) -->
        <button class="icon-btn" id="themeToggle" aria-label="Alternar tema claro/escuro">
          <i class="fas fa-moon" id="themeIcon" aria-hidden="true"></i>
        </button>

        <!-- Seletor de idioma -->
        <div class="lang-sel" id="langSel">
          <button class="lang-trigger" id="langTrigger"
                  aria-haspopup="listbox" aria-expanded="false"
                  aria-label="Selecionar idioma">
            <span class="lang-flag" id="langFlag" aria-hidden="true">🇧🇷</span>
            <span class="lang-code" id="langCode">PT</span>
            <span class="lang-arrow" aria-hidden="true">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2.5" d="M19 9l-7 7-7-7"/>
              </svg>
            </span>
          </button>

          <div class="lang-dropdown" role="listbox">
            <p>Idioma / Language</p>
            <button class="lang-opt" role="option" data-lang="pt" aria-selected="true">
              <span aria-hidden="true">🇧🇷</span><span>Português</span>
            </button>
            <button class="lang-opt" role="option" data-lang="en" aria-selected="false">
              <span aria-hidden="true">🇺🇸</span><span>English</span>
            </button>
            <button class="lang-opt" role="option" data-lang="es" aria-selected="false">
              <span aria-hidden="true">🇪🇸</span><span>Español</span>
            </button>
          </div>
        </div>

        <!-- Botão MENU rosa (desktop ≥ 768px) -->
        <button class="btn-menu-desktop" id="btnMenuDesktop"
                aria-label="Abrir menu" aria-expanded="false" aria-controls="mobMenu">
          MENU
        </button>

        <!-- Hamburguer (mobile < 768px) -->
        <button class="hamburger" id="hamburger"
                aria-label="Abrir menu" aria-expanded="false" aria-controls="mobMenu">
          <span></span><span></span><span></span>
        </button>

      </div>
    </div>
  </nav>
</header>


<!-- ════════════════════════════════════════════════════
     PAINEL LATERAL MOBILE
     ⭐ Aqui vão os mesmos links de cima + redes sociais
     ════════════════════════════════════════════════════ -->
<nav class="mob-menu" id="mobMenu" role="dialog" aria-modal="true"
     aria-label="Menu mobile" hidden>

  <!-- Cabeçalho com logo + botão fechar -->
  <div class="mob-menu-hdr">
    <span class="mob-menu-brand">
      VANESSA <span class="accent">RAFAELLA</span>
    </span>
    <button class="mob-close" id="mobClose" aria-label="Fechar menu">
      <i class="fas fa-times" aria-hidden="true"></i>
    </button>
  </div>

  <!-- Lista de links -->
  <ul class="mob-nav">

    <li>
      <a href="index.html">
        <i class="fas fa-home" aria-hidden="true"></i>
        <span data-pt="Início" data-en="Home" data-es="Inicio">Início</span>
      </a>
    </li>

    <li>
      <a href="links-oficiais.html">
        <i class="fas fa-link" aria-hidden="true"></i>
        <span data-pt="Links Oficiais" data-en="Official Links" data-es="Links Oficiales">
          Links Oficiais
        </span>
      </a>
    </li>

    <li>
      <a href="index.html#about">
        <i class="fas fa-user" aria-hidden="true"></i>
        <span data-pt="Sobre Mim" data-en="About Me" data-es="Sobre Mí">Sobre Mim</span>
      </a>
    </li>

    <li>
      <a href="galleria.html">
        <i class="fas fa-images" aria-hidden="true"></i>
        <span data-pt="Fotos" data-en="Photos" data-es="Fotos">Fotos</span>
      </a>
    </li>

    <li>
      <a href="videos.html">
        <i class="fas fa-play-circle" aria-hidden="true"></i>
        <span data-pt="Vídeos" data-en="Videos" data-es="Videos">Vídeos</span>
      </a>
    </li>

    <li>
      <a href="getintouch.html">
        <i class="fas fa-envelope" aria-hidden="true"></i>
        <span data-pt="Contato" data-en="Contact" data-es="Contacto">Contato</span>
      </a>
    </li>

  </ul>

  <!-- Rodapé do menu: redes sociais + botão de tema -->
  <div class="mob-menu-footer">
    <div class="mob-socials">
      <a href="#" class="mob-soc-btn" aria-label="Twitter/X">
        <i class="fab fa-x-twitter" aria-hidden="true"></i>
      </a>
      <a href="#" class="mob-soc-btn" aria-label="Instagram">
        <i class="fab fa-instagram" aria-hidden="true"></i>
      </a>
      <a href="https://wa.me/5581995469947"
         target="_blank" rel="noopener noreferrer"
         class="mob-soc-btn" aria-label="WhatsApp">
        <i class="fab fa-whatsapp" aria-hidden="true"></i>
      </a>
    </div>

    <button class="mob-theme-btn" id="mobThemeToggle">
      <span>
        <i class="fas fa-adjust" aria-hidden="true"></i>&nbsp;
        <span data-pt="Alterar Tema" data-en="Toggle Theme" data-es="Cambiar Tema">
          Alterar Tema
        </span>
      </span>
      <span id="mobThemeLabel">Escuro</span>
    </button>
  </div>
</nav>
