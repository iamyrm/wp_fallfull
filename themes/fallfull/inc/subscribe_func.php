<?php
// ============================================
// 1. CREATE SUBSCRIBER TABLE ON THEME ACTIVATION
// ============================================
function ff_create_subscriber_table()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'ffsubscriber';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id int(11) NOT NULL AUTO_INCREMENT,
        email varchar(100) NOT NULL,
        status tinyint(1) DEFAULT 1,
        unsubscribe_token varchar(255) DEFAULT NULL,
        subscribed_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY email (email)
    ) $charset_collate;";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}
add_action('after_switch_theme', 'ff_create_subscriber_table');

// ============================================
// 2. HANDLE SUBSCRIPTION FORM SUBMISSION
// ============================================
function ff_handle_subscription()
{
	if (isset($_POST['ff_subscribe_email']) && !empty($_POST['ff_subscribe_email'])) {
		$email = sanitize_email($_POST['ff_subscribe_email']);

		if (!is_email($email)) {
			wp_redirect(add_query_arg('subscription', 'invalid', wp_get_referer()));
			exit;
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'ffsubscriber';

		// Check if email exists
		$existing = $wpdb->get_var($wpdb->prepare(
			"SELECT id FROM $table_name WHERE email = %s",
			$email
		));

		if ($existing) {
			// Update status if unsubscribed
			$wpdb->update(
				$table_name,
				array('status' => 1, 'unsubscribe_token' => null),
				array('email' => $email)
			);
		} else {
			// Generate unique token for unsubscribe
			$token = wp_generate_password(32, false);
			$wpdb->insert(
				$table_name,
				array(
					'email' => $email,
					'status' => 1,
					'unsubscribe_token' => $token,
					'subscribed_at' => current_time('mysql')
				)
			);
		}

		wp_redirect(add_query_arg('subscription', 'success', wp_get_referer()));
		exit;
	}
}
add_action('init', 'ff_handle_subscription');

// ============================================
// 3. SUBSCRIBE FORM SHORTCODE
// ============================================
function ff_subscribe_form_shortcode()
{
	ob_start();
?>
	<div class="ff-subscribe-wrapper">
		<?php if (isset($_GET['subscription'])) : ?>
			<div class="ff-subscribe-message">
				<?php if ($_GET['subscription'] == 'success') : ?>
					<p class="success" style="color: green;">Thank you for subscribing!</p>
				<?php elseif ($_GET['subscription'] == 'invalid') : ?>
					<p class="error" style="color: red;">Please enter a valid email address.</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<form method="post" action="">
			<input type="email" name="ff_subscribe_email" placeholder="Email" required>
			<button type="submit"><i class="fas fa-paper-plane"></i></button>
		</form>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode('ff_subscribe', 'ff_subscribe_form_shortcode');

// ============================================
// 4. HANDLE UNSUBSCRIBE VIA EMAIL LINK
// ============================================
function ff_handle_unsubscribe_link()
{
	if (isset($_GET['unsubscribe']) && $_GET['unsubscribe'] == 'true' && isset($_GET['email']) && isset($_GET['token'])) {
		$email = sanitize_email($_GET['email']);
		$token = sanitize_text_field($_GET['token']);

		global $wpdb;
		$table_name = $wpdb->prefix . 'ffsubscriber';

		// Verify token matches
		$valid = $wpdb->get_var($wpdb->prepare(
			"SELECT id FROM $table_name WHERE email = %s AND unsubscribe_token = %s AND status = 1",
			$email,
			$token
		));

		if ($valid) {
			$wpdb->update(
				$table_name,
				array('status' => 0),
				array('email' => $email)
			);

			// Show confirmation message
	?>
			<!DOCTYPE html>
			<html>

			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Unsubscribed</title>
				<style>
					body {
						font-family: Arial, sans-serif;
						background: #f4f4f4;
						display: flex;
						justify-content: center;
						align-items: center;
						height: 100vh;
						margin: 0;
					}

					.container {
						background: #fff;
						padding: 40px;
						border-radius: 10px;
						box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
						text-align: center;
						max-width: 500px;
					}

					h1 {
						color: #6b8b3e;
					}

					p {
						color: #555;
						line-height: 1.6;
					}

					.btn {
						display: inline-block;
						background: #6b8b3e;
						color: #fff;
						padding: 10px 30px;
						text-decoration: none;
						border-radius: 5px;
						margin-top: 20px;
					}

					.btn:hover {
						background: #4a6b2e;
					}
				</style>
			</head>

			<body>
				<div class="container">
					<h1>✅ Unsubscribed Successfully</h1>
					<p>You have been successfully unsubscribed from <strong><?php echo get_bloginfo('name'); ?></strong> notifications.</p>
					<p>You will no longer receive email updates from us.</p>
					<a href="<?php echo home_url(); ?>" class="btn">Return to Website</a>
				</div>
			</body>

			</html>
		<?php
			exit;
		} else {
		?>
			<!DOCTYPE html>
			<html>

			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Invalid Link</title>
				<style>
					body {
						font-family: Arial, sans-serif;
						background: #f4f4f4;
						display: flex;
						justify-content: center;
						align-items: center;
						height: 100vh;
						margin: 0;
					}

					.container {
						background: #fff;
						padding: 40px;
						border-radius: 10px;
						box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
						text-align: center;
						max-width: 500px;
					}

					h1 {
						color: #dc3545;
					}

					p {
						color: #555;
						line-height: 1.6;
					}

					.btn {
						display: inline-block;
						background: #6b8b3e;
						color: #fff;
						padding: 10px 30px;
						text-decoration: none;
						border-radius: 5px;
						margin-top: 20px;
					}
				</style>
			</head>

			<body>
				<div class="container">
					<h1>❌ Invalid Unsubscribe Link</h1>
					<p>This unsubscribe link is invalid or you have already unsubscribed.</p>
					<a href="<?php echo home_url(); ?>" class="btn">Return to Website</a>
				</div>
			</body>

			</html>
	<?php
			exit;
		}
	}
}
add_action('init', 'ff_handle_unsubscribe_link');

// ============================================
// 5. EMAIL TEMPLATE FUNCTION
// ============================================
function ff_get_email_template($title, $excerpt, $link, $image, $type, $site_name, $unsubscribe_link)
{
	$image_html = '';
	if ($image) {
		$image_html = '
        <div style="text-align:center; margin: 20px 0;">
            <img src="' . esc_url($image) . '" alt="' . esc_attr($title) . '" style="max-width:100%; height:auto; border-radius:8px;">
        </div>';
	}

	return '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New ' . esc_html($type) . ' Alert</title>
    </head>
    <body style="margin:0; padding:0; font-family: Arial, Helvetica, sans-serif; background-color:#f4f4f4;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px; background-color:#ffffff; margin:20px auto; border-radius:10px; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
            <!-- Header -->
            <tr>
                <td style="background: linear-gradient(135deg, #6b8b3e, #4a6b2e); padding: 30px 20px; border-radius:10px 10px 0 0;">
                    <h2 style="color:#ffffff; margin:0; text-align:center;">' . esc_html($site_name) . '</h2>
                    <p style="color:#d4edda; text-align:center; margin:10px 0 0; font-size:14px;">New ' . esc_html($type) . ' Alert</p>
                </td>
            </tr>
            
            <!-- Body -->
            <tr>
                <td style="padding:30px 25px;">
                    <h2 style="color:#333; margin:0 0 10px;">New ' . esc_html($type) . ' Published</h2>
                    <div style="border-bottom:3px solid #6b8b3e; width:50px; margin-bottom:20px;"></div>
                    
                    <h3 style="color:#444; margin:10px 0 15px;">
                        <a href="' . esc_url($link) . '" style="color:#6b8b3e; text-decoration:none;">' . esc_html($title) . '</a>
                    </h3>
                    
                    ' . $image_html . '
                    
                    <div style="color:#555; line-height:1.8; margin:15px 0;">
                        <p>' . wp_kses_post($excerpt) . '</p>
                    </div>
                    
                    <div style="text-align:center; margin:30px 0 20px;">
                        <a href="' . esc_url($link) . '" style="display:inline-block; background:#6b8b3e; color:#ffffff; padding:12px 35px; text-decoration:none; border-radius:5px; font-weight:bold; font-size:16px;">Read More →</a>
                    </div>
                    
                    <div style="border-top:1px solid #e0e0e0; padding-top:15px; margin-top:10px;">
                        <p style="font-size:12px; color:#888; margin:0;">
                            You are receiving this email because you subscribed to updates from ' . esc_html($site_name) . '.
                        </p>
                        <p style="font-size:12px; color:#888; margin:5px 0 0;">
                            <a href="' . esc_url($unsubscribe_link) . '" style="color:#6b8b3e; text-decoration:underline;">Unsubscribe</a> at any time.
                        </p>
                    </div>
                </td>
            </tr>
            
            <!-- Footer -->
            <tr>
                <td style="background:#f8f9fa; padding:15px 25px; border-radius:0 0 10px 10px; text-align:center;">
                    <p style="font-size:12px; color:#888; margin:0;">
                        &copy; ' . date('Y') . ' ' . esc_html($site_name) . ' | All Rights Reserved
                    </p>
                    <p style="font-size:12px; color:#888; margin:5px 0 0;">
                        <a href="' . esc_url(home_url()) . '" style="color:#6b8b3e; text-decoration:none;">Visit Website</a>
                    </p>
                </td>
            </tr>
        </table>
    </body>
    </html>
    ';
}

// ============================================
// 6. SEND EMAIL NOTIFICATION FOR NEW POSTS/PRODUCTS
// ============================================
function ff_send_new_post_notification($post_id, $post, $update)
{
	// Only send for new posts (not updates)
	if ($update) return;

	// Only for posts and products
	if (!in_array($post->post_type, array('post', 'product'))) return;

	if ($post->post_status != 'publish') return;

	global $wpdb;
	$table_name = $wpdb->prefix . 'ffsubscriber';

	// Get all active subscribers
	$subscribers = $wpdb->get_results(
		"SELECT email, unsubscribe_token FROM $table_name WHERE status = 1"
	);

	if (empty($subscribers)) return;

	// Get post details
	$post_title = get_the_title($post_id);
	$post_excerpt = wp_trim_words(get_the_excerpt($post_id), 30, '...');
	$post_permalink = get_permalink($post_id);
	$post_image = get_the_post_thumbnail_url($post_id, 'medium');
	$post_type = ($post->post_type == 'product') ? 'Product' : 'Post';

	// Site details
	$site_name = get_bloginfo('name');
	$admin_email = get_option('admin_email');

	// Email subject
	$subject = sprintf('[%s] New %s: %s', $site_name, $post_type, $post_title);

	// Email headers
	$headers = array(
		'Content-Type: text/html; charset=UTF-8',
		'From: ' . $site_name . ' <' . $admin_email . '>'
	);

	// Send email to each subscriber
	foreach ($subscribers as $subscriber) {
		$unsubscribe_link = add_query_arg(
			array(
				'unsubscribe' => 'true',
				'token' => $subscriber->unsubscribe_token,
				'email' => $subscriber->email
			),
			home_url()
		);

		// Build email template
		$message = ff_get_email_template(
			$post_title,
			$post_excerpt,
			$post_permalink,
			$post_image,
			$post_type,
			$site_name,
			$unsubscribe_link
		);

		wp_mail($subscriber->email, $subject, $message, $headers);
	}
}
add_action('wp_insert_post', 'ff_send_new_post_notification', 10, 3);

// ============================================
// 7. ADMIN OPTIONS PAGE - SUBSCRIBER MANAGEMENT
// ============================================
// Add admin menu
function ff_add_admin_menu()
{
	add_menu_page(
		'Subscriber Management',
		'Subscribers',
		'manage_options',
		'ff-subscribers',
		'ff_subscribers_page',
		'dashicons-email-alt',
		20
	);
}
add_action('admin_menu', 'ff_add_admin_menu');

// Admin page content
function ff_subscribers_page()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'ffsubscriber';

	// Handle delete action
	if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
		$id = intval($_GET['id']);
		$wpdb->delete($table_name, array('id' => $id));
		echo '<div class="notice notice-success"><p>Subscriber deleted successfully!</p></div>';
	}

	// Handle status toggle
	if (isset($_GET['action']) && in_array($_GET['action'], array('activate', 'deactivate')) && isset($_GET['id'])) {
		$id = intval($_GET['id']);
		$status = ($_GET['action'] == 'activate') ? 1 : 0;
		$wpdb->update($table_name, array('status' => $status), array('id' => $id));
		$status_text = ($status == 1) ? 'activated' : 'deactivated';
		echo '<div class="notice notice-success"><p>Subscriber ' . $status_text . ' successfully!</p></div>';
	}

	// Get all subscribers
	$subscribers = $wpdb->get_results("SELECT * FROM $table_name ORDER BY subscribed_at DESC");
	$total = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
	$active = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE status = 1");
	$inactive = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE status = 0");
	?>

	<div class="wrap">
		<h1 class="wp-heading-inline">Subscriber Management</h1>
		<hr class="wp-header-end">

		<!-- Stats -->
		<div style="display: flex; gap: 20px; margin: 20px 0; flex-wrap: wrap;">
			<div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); min-width: 150px;">
				<h3 style="margin: 0; color: #6b8b3e;">Total</h3>
				<p style="font-size: 24px; margin: 5px 0 0; font-weight: bold;"><?php echo $total; ?></p>
			</div>
			<div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); min-width: 150px;">
				<h3 style="margin: 0; color: #28a745;">Active</h3>
				<p style="font-size: 24px; margin: 5px 0 0; font-weight: bold; color: #28a745;"><?php echo $active; ?></p>
			</div>
			<div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); min-width: 150px;">
				<h3 style="margin: 0; color: #dc3545;">Inactive</h3>
				<p style="font-size: 24px; margin: 5px 0 0; font-weight: bold; color: #dc3545;"><?php echo $inactive; ?></p>
			</div>
		</div>

		<!-- Export Button -->
		<div style="margin: 20px 0;">
			<a href="<?php echo admin_url('admin-post.php?action=ff_export_subscribers'); ?>" class="button button-primary">
				Export CSV
			</a>
			<button onclick="if(confirm('Are you sure you want to delete all subscribers?')){window.location.href='<?php echo admin_url('admin-post.php?action=ff_delete_all_subscribers'); ?>';}" class="button button-danger" style="background: #dc3545; color: #fff; border-color: #dc3545;">
				Delete All
			</button>
		</div>

		<!-- Subscribers Table -->
		<table class="wp-list-table widefat fixed striped">
			<thead>
				<tr>
					<th width="50">ID</th>
					<th>Email</th>
					<th>Status</th>
					<th>Subscribed Date</th>
					<th width="200">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($subscribers) : ?>
					<?php foreach ($subscribers as $subscriber) : ?>
						<tr>
							<td><?php echo $subscriber->id; ?></td>
							<td>
								<strong><?php echo esc_html($subscriber->email); ?></strong>
								<br>
								<small style="color: #888;">Token: <?php echo substr($subscriber->unsubscribe_token, 0, 10); ?>...</small>
							</td>
							<td>
								<?php if ($subscriber->status == 1) : ?>
									<span style="color: #28a745; font-weight: bold;">● Active</span>
								<?php else : ?>
									<span style="color: #dc3545; font-weight: bold;">● Inactive</span>
								<?php endif; ?>
							</td>
							<td><?php echo date('M j, Y g:i A', strtotime($subscriber->subscribed_at)); ?></td>
							<td>
								<?php if ($subscriber->status == 1) : ?>
									<a href="<?php echo add_query_arg(array('page' => 'ff-subscribers', 'action' => 'deactivate', 'id' => $subscriber->id)); ?>" class="button button-small" style="background: #ffc107; color: #000; border-color: #ffc107;">Deactivate</a>
								<?php else : ?>
									<a href="<?php echo add_query_arg(array('page' => 'ff-subscribers', 'action' => 'activate', 'id' => $subscriber->id)); ?>" class="button button-small button-primary">Activate</a>
								<?php endif; ?>
								<a href="<?php echo add_query_arg(array('page' => 'ff-subscribers', 'action' => 'delete', 'id' => $subscriber->id)); ?>" class="button button-small" style="background: #dc3545; color: #fff; border-color: #dc3545;" onclick="return confirm('Are you sure you want to delete this subscriber?')">Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="5" style="text-align: center; padding: 30px;">
							<p style="color: #888;">No subscribers yet.</p>
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
	<?php
}

// ============================================
// 8. EXPORT SUBSCRIBERS AS CSV
// ============================================
function ff_export_subscribers()
{
	if (!current_user_can('manage_options')) {
		wp_die('Unauthorized access');
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'ffsubscriber';
	$subscribers = $wpdb->get_results("SELECT * FROM $table_name ORDER BY subscribed_at DESC");

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="subscribers-' . date('Y-m-d') . '.csv"');

	$output = fopen('php://output', 'w');
	fputcsv($output, array('ID', 'Email', 'Status', 'Subscribed Date'));

	foreach ($subscribers as $subscriber) {
		fputcsv($output, array(
			$subscriber->id,
			$subscriber->email,
			($subscriber->status == 1) ? 'Active' : 'Inactive',
			$subscriber->subscribed_at
		));
	}

	fclose($output);
	exit;
}
add_action('admin_post_ff_export_subscribers', 'ff_export_subscribers');

// ============================================
// 9. DELETE ALL SUBSCRIBERS
// ============================================
function ff_delete_all_subscribers()
{
	if (!current_user_can('manage_options')) {
		wp_die('Unauthorized access');
	}

	global $wpdb;
	$table_name = $wpdb->prefix . 'ffsubscriber';
	$wpdb->query("TRUNCATE TABLE $table_name");

	wp_redirect(add_query_arg('page', 'ff-subscribers', admin_url('admin.php')));
	exit;
}
add_action('admin_post_ff_delete_all_subscribers', 'ff_delete_all_subscribers');

// ============================================
// 10. ADD SEARCH FUNCTIONALITY TO ADMIN
// ============================================
function ff_admin_search_subscribers()
{
	if (isset($_GET['page']) && $_GET['page'] == 'ff-subscribers' && isset($_GET['s'])) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'ffsubscriber';
		$search = sanitize_text_field($_GET['s']);

		// Modify the query to search emails
		add_action('admin_footer', function () use ($search) {
	?>
			<script>
				document.addEventListener('DOMContentLoaded', function() {
					var table = document.querySelector('.wp-list-table tbody');
					if (table) {
						var rows = table.querySelectorAll('tr');
						rows.forEach(function(row) {
							var emailCell = row.querySelector('td:nth-child(2)');
							if (emailCell) {
								var emailText = emailCell.textContent.toLowerCase();
								if (!emailText.includes('<?php echo strtolower($search); ?>')) {
									row.style.display = 'none';
								}
							}
						});
					}
				});
			</script>
	<?php
		});
	}
}
add_action('admin_init', 'ff_admin_search_subscribers');

// ============================================
// 11. ADD STYLES FOR ADMIN PAGE
// ============================================
function ff_admin_styles()
{
	?>
	<style>
		.button-danger:hover {
			background: #c82333 !important;
			border-color: #bd2130 !important;
		}

		.wp-list-table th {
			font-weight: bold;
		}

		.wp-list-table .button-small {
			margin: 0 2px;
		}
	</style>
<?php
}
add_action('admin_head', 'ff_admin_styles');
