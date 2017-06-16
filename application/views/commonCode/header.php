<header class="primary-header flex__item">
	<div class="globalContainer flex">
		<a href="<?php echo base_url(); ?>" class="flex__item">
			<img alt="logo" src="<?php echo base_url('/assets/img/logo-white.png'); ?>" class="logo">
		</a>
		<div class="search-bar flex__item">
			<form action="" method="GET" class="flex">
				<button type="submit" class="search-bar__submit-btn">
					<img src="<?php echo base_url('/assets/img/icons/magnifying-glass.png'); ?>" alt="search-icon" class="icoen icon--sm">
				</button>
				<input type="search" name="q" placeholder="Search" class="form-control">
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
                  <a class="flex media notification" href="javascript:">
                    <img src="https://scontent.fdel1-2.fna.fbcdn.net/v/t1.0-1/p160x160/15871847_1187641447950420_5590639677209919525_n.jpg?oh=d4d88d54889e7a4e3546dc6701c0bfe0&amp;oe=5942A6DD" alt="user" class="media-figure notification__feature-img">
                    <span class="media-body flex flex--col">
                      <span class="notification__message"><strong>Nikhil Verma</strong></span>
                      <span class="notification__message">This is a Test message for you.</span>
                      <span class="notification__info">
                        <span class="notification__date">19 April 2017</span>
                      </span>
                    </span>
                  </a>
                  <a class="flex media notification" href="javascript:">
                    <img src="https://scontent.fdel1-1.fna.fbcdn.net/v/t1.0-1/p50x50/17626408_935294396507025_1452685277211461461_n.png?oh=167c40084cee66601fa97c302098fd03&oe=598CB4FB" alt="user" class="media-figure notification__feature-img">
                    <span class="media-body flex flex--col">
                      <span class="notification__message"><strong>Motorola Inc</strong></span>
                      <span class="notification__message">This is a Campus Puppy Test Message for you.</span>
                      <span class="notification__info">
                        <span class="notification__date">14 April 2017</span>
                      </span>
                    </span>
                  </a>
                  <a class="flex media notification" href="javascript:">
                    <img src="https://scontent.fdel1-1.fna.fbcdn.net/v/t1.0-1/p50x50/13892348_1753977728147689_6287852477235695370_n.jpg?oh=4b8af9537d9b9665b2c61c418d4637c5&oe=598E66EF" alt="user" class="media-figure notification__feature-img">
                    <span class="media-body flex flex--col">
                      <span class="notification__message"><strong>Riders Music Festival</strong></span>
                      <span class="notification__message">This is a Test Message.</span>
                      <span class="notification__info">
                        <span class="notification__date">5 April 2017</span>
                      </span>
                    </span>
                  </a>
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
									<a class="flex media notification" href="javascript:">
										<img src="https://scontent.fdel1-2.fna.fbcdn.net/v/t1.0-1/p160x160/15871847_1187641447950420_5590639677209919525_n.jpg?oh=d4d88d54889e7a4e3546dc6701c0bfe0&amp;oe=5942A6DD" alt="user" class="media-figure notification__feature-img">
										<span class="media-body flex flex--col">
											<span class="notification__message"><strong>Nikhil</strong> commented on a post that you're tagged in. </span>
											<span class="notification__info">
												<span class="notification__date">19 April 2017</span>
											</span>
										</span>
									</a>
									<a class="flex media notification" href="javascript:">
										<img src="https://scontent.fdel1-1.fna.fbcdn.net/v/t1.0-1/p50x50/17626408_935294396507025_1452685277211461461_n.png?oh=167c40084cee66601fa97c302098fd03&oe=598CB4FB" alt="user" class="media-figure notification__feature-img">
										<span class="media-body flex flex--col">
											<span class="notification__message"><strong>Moto</strong> added a new event near you: <strong>Moto G5 Plus - Launch Event | 15th March</strong></span>
											<span class="notification__info">
												<span class="notification__date">14 April 2017</span>
											</span>
										</span>
									</a>
									<a class="flex media notification" href="javascript:">
										<img src="https://scontent.fdel1-1.fna.fbcdn.net/v/t1.0-1/p50x50/13892348_1753977728147689_6287852477235695370_n.jpg?oh=4b8af9537d9b9665b2c61c418d4637c5&oe=598E66EF" alt="user" class="media-figure notification__feature-img">
										<span class="media-body flex flex--col">
											<span class="notification__message"><strong>Riders Music Festival</strong> posted in <strong>Riders Music Festival 2017</strong></span>
											<span class="notification__info">
												<span class="notification__date">5 April 2017</span>
											</span>
										</span>
									</a>
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
							<a href="<?php echo base_url('user-profile'); ?>" class="user-settings__link"><i class="fa fa-user" aria-hidden="true"></i> User Profile</a>
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
