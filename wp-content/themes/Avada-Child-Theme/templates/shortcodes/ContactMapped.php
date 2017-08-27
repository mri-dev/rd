<div class="inside">
  <div class="map" id="map"></div>
  <div class="wrapper tblwrapper">
    <div class="c-left"></div>
    <div class="c-right contactform">
      <div class="wrapper" id="contact-form-wrapper">
        <h3><?php echo __('Írjon nekünk', TD); ?></h3>
        <div class="form tblwrapper">
          <div class="name">
            <input type="text" name="name" class="form-control" value="" placeholder="<?=__('Név', TD)?>">
          </div>
          <div class="email">
            <input type="email" name="email" class="form-control" value="" placeholder="<?=__('E-mail', TD)?>">
          </div>
          <div class="msg">
            <textarea name="msg" class="form-control" placeholder="<?=__('Üzenet', TD)?>"></textarea>
          </div>
          <div class="button">
            <button type="button" name="button"><?=__('Küldés', TD)?></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
