<h2 class="content_title"><img src="<?= $modules_assets ?>linkedin_32.png"> LinkedIn</h2>
<ul class="content_navigation">
	<?= navigation_list_btn('home/linkedin', 'Recent') ?>
	<?= navigation_list_btn('home/linkedin/custom', 'Custom') ?>
	<?php if ($logged_user_level_id <= 2) echo navigation_list_btn('home/linkedin/manage', 'Manage', $this->uri->segment(4)) ?>
</ul>