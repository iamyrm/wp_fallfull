<?php
Redux::set_section(
	$opt_name,
	array(
		'title'            => esc_html__('FallFull Settings', FALLFULL_CORE_TEXTDOMAIN),
		'id'               => 'fallfull_settings',
		'desc'             => esc_html__('FallFull site settings!', FALLFULL_CORE_TEXTDOMAIN),
		'customizer_width' => '400px',
		'icon'             => 'el el-home',
	)
);
