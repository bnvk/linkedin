<form name="settings_update" id="settings_update" method="post" action="<?= base_url() ?>api/settings/modify" enctype="multipart/form-data">
<div class="content_wrap_inner">

	<div class="content_inner_top_right">
		<h3>App</h3>
		<p><?= form_dropdown('enabled', config_item('enable_disable'), $settings['linkedin']['enabled']) ?></p>
		<p><a href="<?= base_url() ?>api/<?= $this_module ?>/reinstall" id="app_reinstall" class="button_action">Reinstall</a>
		<a href="<?= base_url() ?>api/<?= $this_module ?>/uninstall" id="app_uninstall" class="button_delete">Uninstall</a></p>
	</div>
	
	<h3>Application Keys</h3>

	<p>LinkedIn requires <a href="https://www.linkedin.com/secure/developer" target="_blank">registering your application</a></p>
				
	<p><input type="text" name="consumer_key" value="<?= $settings['linkedin']['consumer_key'] ?>"> Consumer Key </p> 
	<p><input type="text" name="consumer_secret" value="<?= $settings['linkedin']['consumer_secret'] ?>"> Consumer Secret</p>

</div>

<span class="item_separator"></span>

<div class="content_wrap_inner">

	<h3>Social</h3>

	<p>Login
	<?= form_dropdown('social_login', config_item('yes_or_no'), $settings['linkedin']['social_login']) ?>
	</p>

	<p>Login Redirect<br>
	<?= base_url() ?> <input type="text" size="30" name="login_redirect" value="<?= $settings['linkedin']['login_redirect'] ?>" />
	</p>	
	
	<p>Connections 
	<?= form_dropdown('social_connection', config_item('yes_or_no'), $settings['linkedin']['social_connection']) ?>
	</p>

	<p>Connections Redirect<br>
	<?= base_url() ?> <input type="text" size="30" name="connections_redirect" value="<?= $settings['linkedin']['connections_redirect'] ?>" />
	</p>

</div>

<span class="item_separator"></span>

<div class="content_wrap_inner">

	<h3>Show Profile</h3>
	<p>User must connect their LinkedIn account)<br>
	<select name="profile_user_id">
	<?php foreach ($this->social_auth->get_users('active', 1) as $user): ?>
		<option value="<?= $user->user_id ?>" <?php if ($user->user_id == config_item('linkedin_profile_user_id')) echo 'selected'; ?>><?= $user->name ?></option>
	<?php endforeach; ?>
	</select>

	<input type="hidden" name="module" value="<?= $this_module ?>">

	<p><input type="submit" name="save" value="Save" /></p>

</div>

</form>

<?= $shared_ajax ?>