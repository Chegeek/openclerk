<?php

function get_site_config($key = null) {
	if ($key !== null) {
		$k = get_site_config(null);
		return $k[$key];
	}

	return array(
		// framework-specific
		"site_name" => "Openclerk",
		"site_email" => "support@example.com",
		"openid_host" => "localhost",
		"absolute_url" => "http://localhost/clerk/",

		"database_url" => "mysql:host=localhost;dbname=clerk",
		"database_username" => "clerk",
		"database_password" => "clerk",

		"phpmailer_host" => "mail.example.com",
		"phpmailer_username" => "sync",
		"phpmailer_password" => base64_decode("xxx"),
		"phpmailer_from" => "example@example.com",
		"phpmailer_from_name" => "example@example.com",
		"phpmailer_reply_to" => "example@example.com",

		"admin_email" => "example@gmail.com",
		"password_salt" => "abc123",
		"recaptcha_public_key" => "6L...1", // you got this from the signup page
		"recaptcha_private_key" => "6L...1", // you got this from the signup page
		"google_analytics_account" => "UA-12345678-1",	// _setAccount
		"google_analytics_domain" => "example.com",	// _setDomainName

		// site-specific config values go here
	);
}
