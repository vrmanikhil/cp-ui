<div class="feed-actor-module card">
	<div class="feed-actor-module__featured-bg-image" style="background: url('/assets/img/cover-default.jpg') center no-repeat; background-size: cover;"></div>
	<div class="feed-actor-module__profile-image-container">
		<a href="javascript:">
			<img src="<?php echo $_SESSION['profileImage']; ?>" alt="" , class="feed-actor-module__profile-image">
		</a>
	</div>
	<div class=" feed-actor-module__actor-meta">
		<p class="text-center feed-actor-module__name"><?php echo $_SESSION['userData']['name']; ?> <?php if($_SESSION['userData']['accountApproved']=='1'){ ?><i class="fa fa-check-circle" aria-hidden="true" style="color: #2980b9;"></i><?php } ?></p>
		<?php if($_SESSION['userData']['accountApproved']!='1') { ?>
		<p><center><a style="font-size: 12px;"><b>Get your Profile Verified</b></a></center></p>
		<?php } ?>

		<div class="media flex">
			<img src="<?php if($_SESSION['userData']['accountType']=='1') { echo $_SESSION['userData']['collegeLogo']; } else { echo $_SESSION['userData']['companyLogo']; } ?>" alt="" class="media-figure img-50" style="<?php if($_SESSION['userData']['accountType']=='2') echo 'border-radius: 50%'; ?>">
			<p class="media-body text-center bold flex s-12 align-center margin-l-5"><?php if($_SESSION['userData']['accountType']=='1') { echo $_SESSION['userData']['collegeName']; } else { echo $_SESSION['userData']['companyName']; } ?></p>
		</div>
	</div>
	<div class="feed-actor-module__connections-card" style="background: url('/assets/img/connections.jpg') center no-repeat; background-size: cover;">
		<p class="feed-actor-module__connections-card-title"><b>Connections</b></p>
		<p class="feed-actor-module__connections-count"><b>101</b></p>
	</div>
</div>
