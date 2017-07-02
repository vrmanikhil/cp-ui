<header class="primary-header flex__item">
  <div class="globalContainer flex">
    <a href="<?php echo base_url(); ?>" class="flex__item">
      <img alt="logo" src="<?php echo base_url('/assets/img/logo-white.png'); ?>" class="logo">
    </a>
    <div class="login-form-container flex">
      <form method="post" action="<?php echo base_url('web/doLogin'); ?>" class="flex login-form form">
        <div class="form-group">
          <label class="form__label" for="email">Email</label>
          <input type="email" id="email" required name="email" class="form__input form__input--tiny" placeholder="E-Mail Address">
        </div>
        <div class="form-group">
          <label class="form__label" for="password">Password</label>
          <input type="password" id="password" required class="form__input form__input--tiny" name="password" placeholder="Password">
          <a href="javascript:" class="forgot-psswd js-forgot-password">Forgot Password?</a>
        </div>
        <div class="from-group flex">
          <input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
          <button type="submit" class="btn btn--primary">LOGIN</button>
        </div>
      </form>
    </div>
  </div>
</header>
<div class="remodal forgot-psswd-modal" data-remodal-id="forgotPassword">
  <button data-remodal-action="close" class="remodal-close"></button>
  <div class="modal-body">
    <div class="forgot-psswd-form-container">
      <h2>Forgot your Password?</h2>
      <form method="get" class="form forgot-psswd-form" action="<?php echo base_url('web/forgotPassword'); ?>">
        <div class="form-group">
          <label for="forgot-psswd-email" class="form__label">Registered E-Mail</label>
          <input type="email" class="form__input" id="forgot-psswd-email" name="email" placeholder="E-Mail Address" required>
        </div>
        <div class="form-group">
          <input type="hidden" name="<?php echo $csrf_token_name; ?>" value="<?php echo $csrf_token; ?>">
          <input type="submit" value="Send Me Instructions" class="btn btn--primary">
        </div>
      </form>
    </div>
  </div>
</div>
