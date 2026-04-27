<!DOCTYPE html>
<!--
  ╔══════════════════════════════════════════════════════════════╗
  ║  TESTE-NAVBAR.PHP — Demonstração da navbar funcionando       ║
  ║                                                                ║
  ║  Salve este arquivo como TESTE-NAVBAR.PHP (não .html)        ║
  ║  Abra pelo seu servidor (com PHP) ex: localhost/seu-projeto/ ║
  ║                                                                ║
  ║  ✓ Hamburguer abre menu mobile (telas < 768px)               ║
  ║  ✓ Botão MENU também abre (telas ≥ 768px)                    ║
  ║  ✓ Botão lua/sol troca tema (lembra na próxima visita)       ║
  ║  ✓ Dropdown de bandeira troca idioma                         ║
  ║  ✓ Sombra aparece ao rolar                                   ║
  ╚══════════════════════════════════════════════════════════════╝
-->
<html lang="pt-BR" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#080808">
  <title>Teste — Navbar</title>

  <!-- Fontes Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome (ícones) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- ⭐ Único CSS -->
  <link rel="stylesheet" href="./css/main.css">
</head>
<body>

  <!-- ════════════════════════════════════════
       AGE BANNER (do utilities.css)
       ════════════════════════════════════════ -->
  <div class="age-banner">
    <span class="age-pill">18+</span>
    <span data-pt="Conteúdo adulto exclusivo para maiores de 18 anos"
          data-en="Adult content for 18+ only"
          data-es="Contenido para mayores de 18 años">
      Conteúdo adulto exclusivo para maiores de 18 anos
    </span>
  </div>


  <!-- ════════════════════════════════════════
       ⭐ NAVBAR — uma linha PHP carrega tudo
       ════════════════════════════════════════ -->
  <?php include 'partials/navbar.php'; ?>


  <!-- ════════════════════════════════════════
       Conteúdo de teste
       ════════════════════════════════════════ -->
  <main>

    <!-- Seção 1 — Hero falso só pra mostrar o tamanho -->
    <section class="section-fullscreen">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">⭐ Bloco 2 ok</span>
          <h1>NAVBAR <span class="accent-gradient">FUNCIONANDO</span></h1>
          <p class="section-sub">Teste todos os controles acima</p>
        </div>

        <div class="container-narrow text-center" style="margin-top:2rem;">
          <h3>Coisas pra testar:</h3>
          <p style="margin-top:1rem;">
            🍔 No <strong>celular</strong>: o hamburguer abre o menu lateral<br>
            🖱️ No <strong>desktop</strong>: clique no botão rosa <strong>MENU</strong><br>
            🌙 Clique na <strong>lua</strong> pra trocar tema<br>
            🌍 Clique na <strong>bandeira 🇧🇷</strong> pra trocar idioma<br>
            📜 <strong>Role a página</strong> e veja a sombra na navbar
          </p>
        </div>
      </div>
    </section>

    <!-- Seção 2 — só pra ter o que rolar -->
    <section class="section section-alt">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">📜 Role pra cima e pra baixo</span>
          <h2 class="section-title">VEJA A <span class="accent">SOMBRA</span></h2>
          <p class="section-sub">A navbar ganha uma sombra ao rolar</p>
        </div>

        <p style="text-align:center; max-width:600px; margin:0 auto;">
          Esta seção existe só pra dar conteúdo suficiente pra você poder rolar
          a página e ver o efeito de sombra na navbar acontecendo.
        </p>
      </div>
    </section>

    <!-- Seção 3 — testar troca de idioma -->
    <section class="section-fullscreen">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">🌍 Multi-idioma</span>
          <h2 class="section-title">
            <span data-pt="TESTE O" data-en="TEST THE" data-es="PRUEBA EL">TESTE O</span>
            <span class="accent" data-pt="IDIOMA" data-en="LANGUAGE" data-es="IDIOMA">IDIOMA</span>
          </h2>
          <p class="section-sub"
             data-pt="Clique na bandeira no canto superior direito"
             data-en="Click the flag in the top right corner"
             data-es="Haz clic en la bandera arriba a la derecha">
            Clique na bandeira no canto superior direito
          </p>
        </div>

        <p style="text-align:center; max-width:600px; margin:0 auto;"
           data-pt="Este texto está em português. Quando você muda o idioma na navbar, este texto, os menus e tudo que tiver atributos data-pt/data-en/data-es muda automaticamente. A escolha fica salva pra próxima visita."
           data-en="This text is in English. When you change the language in the navbar, this text, the menus, and everything with data-pt/data-en/data-es attributes change automatically. Your choice is saved for the next visit."
           data-es="Este texto está en español. Cuando cambias el idioma en la navbar, este texto, los menús y todo lo que tenga atributos data-pt/data-en/data-es cambia automáticamente. Tu elección queda guardada para la próxima visita.">
          Este texto está em português...
        </p>
      </div>
    </section>

  </main>

  <!-- ⭐ Único JavaScript -->
  <script src="./js/core.js" defer></script>
</body>
</html>
