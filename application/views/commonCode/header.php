<header class="primary-header flex__item">
	<div class="globalContainer flex">
		<a href="<?php echo base_url(); ?>" class="flex__item">
			<img alt="logo" src="<?php echo base_url('/assets/img/logo-white.png'); ?>" class="logo">
		</a>
		<div class="search-bar flex__item">
			<form method="get" class="flex" action="<?php echo base_url('home/search'); ?>">
				<button type="submit" class="search-bar__submit-btn">
					<img src="<?php echo base_url('/assets/img/icons/magnifying-glass.png'); ?>" alt="search-icon" class="icoen icon--sm">
				</button>
				<input type="search" name="query" id="inputSearch" placeholder="Search" class="form-control">
			</form>


		</div>
		<div class="primary-menu flex__item flex">
			<div class="primary-menu__item dropdown__container js-dropdown__container">
				<div class="menu-link__container">
					<a href="/" class="menu-link dropdown__item">
						<img src="<?php echo base_url('/assets/img/icons/home.png'); ?>" alt="home" class="icon">
					</a>
				</div>
				<div class="menu-link__container">
          <a href="javascript:" class="menu-link dropdown__item js-dropdown__item">
            <img src="<?php echo base_url('/assets/img/icons/envelope.png'); ?>" alt="envelope" class="icon">
          </a>
          <div class="dropdown__html hidden">
            <div class="dropdown__content">
              <div class="dropdown__content-head">
                <p class="dropdown__content-title"><b>Messages</b></p>
              </div>
              <div class="dropdown__content-body">
                <div class="notifications">
                <?php 
                foreach($messages as $text) {
                	$cls = '';
					if ($text['read'] != 1 && $_SESSION['userData']['userID'] !== $text['sender'] ) 
						$cls = 'unread';
					?>
                  <a class="flex media notification <?= $cls?>" href="<?= base_url('messages/chats/'.$text['chatter_id']) ?>">
                    <img src="<?=$text['profile_image']?>" alt="user" class="media-figure notification__feature-img">
                    <span class="media-body flex flex--col">
                      <span class="notification__message"><strong><?= $text['chatter']?></strong></span>
                      	<?php if($text['chatter_id'] !== $text['sender']) {?>
							<span class="notification__message"><?php echo $text['message'];?></span>
						<?php } else { ?>
							<span class="notification__message"><i class = "fa fa-reply"></i> <?php echo $text['message']; ?> </span>
						<?php	}	?>
                      <span class="notification__info">
                        <span class="notification__date"><?= $text['timestamp']?></span>
                      </span>
                    </span>
                  </a>
                  <?php }?>
                  <a class="flex media notification" href="<?php echo base_url('messages'); ?>" style="font-size: 13px;"><b>See All</b></a>
                </div>
              </div>
            </div>
          </div>
        </div>
				<div class="menu-link__container">
					<a href="javascript:" class="menu-link dropdown__item js-dropdown__item">
						<img src="<?php echo base_url('/assets/img/icons/world.png'); ?>" alt="world" class="icon">
					</a>
					<div class="dropdown__html hidden">
						<div class="dropdown__content">
							<div class="dropdown__content-head">
								<p class="dropdown__content-title"><b>Notifications</b></p>
							</div>
							<div class="dropdown__content-body">
								<div class="notifications">
								<?php foreach($notification as $new) {?>
									<a class="flex media notification" href="<?=$new['link']?>">
										<img src="<?= $new['image']?>" alt="user" class="media-figure notification__feature-img">
										<span class="media-body flex flex--col">
											<span class="notification__message"><?= $new['notification']?></span>
											<span class="notification__info">
												<span class="notification__date"><?= $new['timestamp']?></span>
											</span>
										</span>
									</a>
									<?php } ?>
									<a class="flex media notification" href="<?php echo base_url('notifications'); ?>" style="font-size: 13px;"><b>See All</b></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="dropdown__pane card hidden js-dropdown__pane">
				</div>
			</div>
			<div class="primary-menu__item dropdown__container js-dropdown__container">
				<a href="javascript:" class="menu-link dropdown__item js-dropdown__item">
					<div class="flex media media--reverse align-center">
						<img src="<?php echo $_SESSION['profileImage']; ?>" alt="user" class="media-figure img-30">
						<span class="media-body"><b><?php echo $_SESSION['userData']['name']; ?></b></span>
					</div>
				</a>
				<div class="dropdown__html hidden">
					<div class="dropdown__content-head">
						<p class="dropdown__content-title"><b>My Account</b></p>
					</div>
					<div class="dropdown__content">
						<!-- <div class="dropdown__content-head"></div> -->
						<div class="dropdown__content-body">
							<a href="<?php echo base_url('user-profile/').$_SESSION['userData']['userID']; ?>" class="user-settings__link"><i class="fa fa-user" aria-hidden="true"></i> User Profile</a>
							<a href="<?php echo base_url('change-password'); ?>" class="user-settings__link"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a>
							<a href="<?php echo base_url('settings'); ?>" class="user-settings__link"><i class="fa fa-gear" aria-hidden="true"></i> Settings</a>
							<a href="<?php echo base_url('web/logout'); ?>" class="user-settings__link"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a>
						</div>
					</div>
				</div>
				<div class="dropdown__pane user-settings card hidden js-dropdown__pane"></div>
			</div>
		</div>
	</div>
</header>
