<h2><?php echo __( 'Form Settings', 'mailchimp-for-wp' ); ?></h2>

<div class="medium-margin"></div>

<h3><?php echo __( 'MailChimp specific settings', 'mailchimp-for-wp' ); ?></h3>

<table class="form-table" style="table-layout: fixed;">
	<tr valign="top">
		<th scope="row" style="width: 250px;"><?php _e( 'Lists this form subscribes to', 'mailchimp-for-wp' ); ?></th>
		<?php // loop through lists
		if( empty( $lists ) ) {
			?><td colspan="2"><?php printf( __( 'No lists found, <a href="%s">are you connected to MailChimp</a>?', 'mailchimp-for-wp' ), admin_url( 'admin.php?page=mailchimp-for-wp' ) ); ?></td><?php
		} else { ?>
			<td>

				<ul id="mc4wp-lists" style="margin-bottom: 20px;">
					<?php foreach( $lists as $list ) { ?>
						<li>
							<label>
								<input class="mc4wp-list-input" type="checkbox" name="mc4wp_form[settings][lists][]" value="<?php echo esc_attr( $list->id ); ?>" <?php  checked( in_array( $list->id, $opts['lists'] ), true ); ?>> <?php echo esc_html( $list->name ); ?>
							</label>
						</li>
					<?php } ?>
				</ul>

				<p class="help"><?php _e( 'Select the list(s) to which people who submit this form should be subscribed.' ,'mailchimp-for-wp' ); ?></p>
			</td>
		<?php } ?>

	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Use double opt-in?', 'mailchimp-for-wp' ); ?></th>
		<td class="nowrap">
			<label>
				<input type="radio"  name="mc4wp_form[settings][double_optin]" value="1" <?php checked( $opts['double_optin'], 1 ); ?> />
				<?php _e( 'Yes', 'mailchimp-for-wp' ); ?>
			</label> &nbsp;
			<label>
				<input type="radio" name="mc4wp_form[settings][double_optin]" value="0" <?php checked( $opts['double_optin'], 0 ); ?> />
				<?php _e( 'No', 'mailchimp-for-wp' ); ?>
			</label>
			<p class="help"><?php _e( 'Select "yes" if you want people to confirm their email address before being subscribed (recommended)', 'mailchimp-for-wp' ); ?></p>
		</td>
	</tr>
	<?php $enabled = ! $opts['double_optin']; ?>
	<tr id="mc4wp-send-welcome" valign="top" <?php if( ! $enabled ) { ?>class="hidden"<?php } ?>>
		<th scope="row"><?php _e( 'Send final welcome email?', 'mailchimp-for-wp' ); ?></th>
		<td class="nowrap">
			<label>
				<input type="radio"  name="mc4wp_form[settings][send_welcome]" value="1" <?php if( $enabled ) { checked( $opts['send_welcome'], 1 ); } else { echo 'disabled'; } ?> />
				<?php _e( 'Yes', 'mailchimp-for-wp' ); ?>
			</label> &nbsp;
			<label>
				<input type="radio" name="mc4wp_form[settings][send_welcome]" value="0" <?php if( $enabled ) { checked( $opts['send_welcome'], 0 ); } else { echo 'disabled'; } ?> />
				<?php _e( 'No', 'mailchimp-for-wp' ); ?>
			</label>
			<p class="help"><?php _e( 'Select "yes" if you want to send your lists Welcome Email if a subscribe succeeds (only when double opt-in is disabled).' ,'mailchimp-for-wp' ); ?></p>
		</td>
	</tr>
	<tr class="pro-feature" valign="top">
		<th scope="row"><?php _e( 'Update existing subscribers?', 'mailchimp-for-wp' ); ?></th>
		<td class="nowrap">
			<input type="radio" readonly />
			<label><?php _e( 'Yes', 'mailchimp-for-wp' ); ?></label> &nbsp;
			<input type="radio" checked readonly />
			<label><?php _e( 'No', 'mailchimp-for-wp' ); ?></label> &nbsp;
			<p class="help">
				<?php _e( 'Select "yes" if you want to update existing subscribers (instead of showing the "already subscribed" message).', 'mailchimp-for-wp' ); ?>
			</p>
		</td>
	</tr>
	<tr class="pro-feature" valign="top">
		<th scope="row"><?php _e( 'Replace interest groups?', 'mailchimp-for-wp' ); ?></th>
		<td class="nowrap">
			<label>
				<input type="radio" checked readonly />
				<?php _e( 'Yes', 'mailchimp-for-wp' ); ?>
			</label> &nbsp;
			<label>
				<input type="radio" readonly />
				<?php _e( 'No', 'mailchimp-for-wp' ); ?>
			</label>
			<p class="help">
				<?php _e( 'Select "yes" if you want to replace the interest groups with the groups provided instead of adding the provided groups to the member\'s interest groups (only when updating a subscriber).', 'mailchimp-for-wp' ); ?>
			</p>
		</td>
	</tr>
</table>

<div class="medium-margin"></div>

<h3><?php _e( 'Form behaviour', 'mailchimp-for-wp' ); ?></h3>
<table class="form-table" style="table-layout: fixed;">
	<tr valign="top" class="pro-feature">
		<th scope="row" style="width: 250px;"><?php _e( 'Enable AJAX form submission?', 'mailchimp-for-wp' ); ?></th>
		<td class="nowrap">
			<label>
				<input type="radio" disabled />
				<?php _e( 'Yes', 'mailchimp-for-wp' ); ?>
			</label> &nbsp;
			<label>
				<input type="radio" checked disabled />
				<?php _e( 'No', 'mailchimp-for-wp' ); ?>
			</label>
			<p class="help">
				<?php _e( 'Select "yes" if you want to use AJAX (JavaScript) to submit forms.', 'mailchimp-for-wp' ); ?> <a href="https://mc4wp.com/demo/#utm_source=wp-plugin&utm_medium=mailchimp-for-wp&utm_campaign=settings-demo-link">(demo)</a>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Hide form after a successful sign-up?', 'mailchimp-for-wp' ); ?></th>
		<td class="nowrap">
			<label>
				<input type="radio" name="mc4wp_form[settings][hide_after_success]" value="1" <?php checked( $opts['hide_after_success'], 1 ); ?> />
				<?php _e( 'Yes', 'mailchimp-for-wp' ); ?>
			</label> &nbsp;
			<label>
				<input type="radio" name="mc4wp_form[settings][hide_after_success]" value="0" <?php checked( $opts['hide_after_success'], 0 ); ?> />
				<?php _e( 'No', 'mailchimp-for-wp' ); ?>
			</label>
			<p class="help">
				<?php _e( 'Select "yes" to hide the form fields after a successful sign-up.', 'mailchimp-for-wp' ); ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for="mc4wp_form_redirect"><?php _e( 'Redirect to URL after successful sign-ups', 'mailchimp-for-wp' ); ?></label></th>
		<td>
			<input type="text" class="widefat" name="mc4wp_form[settings][redirect]" id="mc4wp_form_redirect" placeholder="<?php printf( __( 'Example: %s', 'mailchimp-for-wp' ), esc_attr( site_url( '/thank-you/' ) ) ); ?>" value="<?php echo esc_attr( $opts['redirect'] ); ?>" />
			<p class="help"><?php _e( 'Leave empty or enter <code>0</code> for no redirect. Otherwise, use complete (absolute) URLs, including <code>http://</code>.', 'mailchimp-for-wp' ); ?></p>
		</td>
	</tr>
</table>

<?php submit_button(); ?>