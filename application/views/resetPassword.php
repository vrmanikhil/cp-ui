<form class="change-password__form form" method="post" action="<?php echo base_url('web/resetPassword'); ?>">
<label for="newPassword" class="form__label">New Password</label>
<input type="password" id="newPassword" name="newPassword" placeholder="New Password" class="form__input">
<label for="confirmNewPassword" class="form__label">Confirm New Password</label>
<input type="password" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm New Password" class="form__input">
<input type="hidden" name="email" value="<?php echo $this->input->get('email'); ?>">
<input type="hidden" name="token" value="<?php echo $this->input->get('token'); ?>">
<input type="submit" value="Reset Password" class="btn btn--primary change-password__form-submit">
</form>
