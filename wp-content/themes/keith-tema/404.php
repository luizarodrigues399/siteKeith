<style>
  body{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100vh;
    background-image: url('<?php echo wp_upload_dir()['baseurl']; ?>/2025/09/Captura-de-tela-2025-09-25-214443-1024x251.png'); /* caminho da imagem */
    background-size: cover;      /* cobre toda a tela */
    background-repeat: no-repeat; /* não repete */
    background-position: center; /* centraliza */
  }
</style>

<?php get_header(); ?>

<div class="error-page text-center">
  <h1 class='text-danger display-1 fw-bold'>404</h1>
  <h2>Oops! Página não encontrada.</h2>
  <p>A página que você procura não existe ou foi movida.</p>
  <button onclick="window.location.href='<?php echo home_url('/'); ?>'" class='btn btn-primary mt-4 px-5 py-3'>
     ← Voltar para a página inicial
  </button>
</div>

<?php get_footer(); ?>