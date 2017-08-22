<div class="tblwrapper">
  <div class="logo">
    <?php $upload_base = wp_upload_dir(); ?>
    <a href="#"><img src="<?=$upload_base['baseurl']?>/2017/08/logo_rubinszki_white.svg" alt="<?=get_option('blogname')?>"></a>
  </div>
  <div class="infos">
    <div class="tblwrapper center-contents">
      <div class="menu">
        <?php wp_nav_menu('Lábléc'); ?>
      </div>
      <div class="contact">
        <div class="">
          <strong>Rubinszki Reklámstúdió Bt.</strong>
        </div>
        <div class="">
          Mobil: <a href="tel:+36209360050">+36 20 936 0050</a>
        </div>
        <div class="">
          Tel: <a href="tel:+3672517240">+36 72 517 240</a>
        </div>
        <div class="">
          Cím: Pécs, Somogyi Béla u. 3.
        </div>
        <div class="">
          E-mail: <a href="/kapcsolat">info@rubinszki.hu</a>
        </div>
      </div>
      <div class="social">
        social
      </div>
      <div class="copyright">
        <?php echo Avada()->settings->get('footer_text'); ?>
      </div>
    </div>
  </div>
  <div class="facebook">
    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FRubinszki-Rekl%25C3%25A1mst%25C3%25BAdi%25C3%25B3-190410294320720%2F&tabs&width=320&height=190&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=575679279233915" width="320" height="190" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
  </div>
</div>
