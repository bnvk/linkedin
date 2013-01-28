<div id="linkedin-top">
	<div id="linkedin-profile">
		<h1><?= $profile['first-name'].' '.$profile['last-name'] ?></h1>
		<h3>Is a <?= $profile['headline'] ?> who lives in <?= $profile['location']['name'] ?>!</h3>
		<h3><?= $profile['summary'] ?></h3>
	</div>
	<div id="linkedin-image">
		<img src="<?= $this->social_igniter->profile_image($user->user_id, $user->image, $user->gravatar, 'large', 'themes_site_theme'); ?>"></p>
	</div>
	<div class="clear"></div>
</div>

<h2>Experience</h2>
<?php foreach($profile['positions']['position'] as $position): ?>
	<h4><?= $position['company']['name'] ?></h4>
	<em><?= $position['title'] ?></em><br>
	<strong><?= date('M, Y', mysql_to_unix($position['start-date']['year'].'-'.$position['start-date']['month'].'-00')) ?> - <?php if ($position['is-current'] == 'true'): echo 'Present'; else: echo date('M, Y', mysql_to_unix($position['end-date']['year'].'-'.$position['end-date']['month'].'-00')); endif; ?></strong><br>
	<?= $position['summary'] ?>
	<br><br>
<?php endforeach; ?>

<h2>Education</h2>
<?php foreach($profile['educations']['education'] as $education): ?>
	<h4><?= $education['school-name'] ?></h4>
	<?php if (isset($education['degree'])): ?><em><?= $education['degree'] ?></em><br><?php endif; ?>
	<strong><?= $education['start-date']['year'] ?> - <?= $education['end-date']['year']; ?></strong><br>
<?php endforeach; ?>

<h2>Skills</h2>
<h4>
<?php foreach($profile['skills']['skill'] as $skill): ?>
	<a href="http://en.wikipedia.org/wiki/<?= $skill['skill']['name'] ?>" target="_blank"><?= $skill['skill']['name'] ?></a>, 
<?php endforeach; ?>
</h4>

<h2>Websites</h2>
<h4>
<?php foreach($profile['member-url-resources']['member-url'] as $member_url): ?>
	<a href="<?= $member_url['url'] ?>" target="_blank"><?= $member_url['url'] ?></a><br>
<?php endforeach; ?>
</h4>

<p><strong>You can also view <?= $profile['first-name'].' '.$profile['last-name'] ?>'s profile on <a href="<?= $profile['public-profile-url'] ?>" target="_blank">LinkedIn</a></strong></p>