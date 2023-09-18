<?php

return [
	/**
	 * Taken from your apps SSO configuration screen, the field called "Issuer URL"
	 */
	'issuer_url' => 'https://app.onelogin.com/saml/metadata/b98b9e1e-147a-4ff9-b44b-010c4fdccfbe',

	/**
	 * Taken from your apps SSO configuration screen, the field called "SAML 2.0 Endpoint (HTTP)",
	 * this is your "single sign on url"
	 */
	'sso_url' => 'https://asean-awp.onelogin.com/trust/saml2/http-post/sso/b98b9e1e-147a-4ff9-b44b-010c4fdccfbe',

	/**
	 * Taken from your apps SSO configuration screen, the field called "SLO Endpoint (HTTP)"
	 */
	'slo_url' => 'https://asean-awp.onelogin.com/trust/saml2/http-redirect/slo/1459023',

	/**
	 * Taken from your apps SSO configuration screen, to get this value, click on "View Details"
	 * of the X.509 certificate on the SSO page.  Once you see the certificate, paste its value
	 * (with or without newlines) inside the quoted value below. (This will be the textarea where
	 * the contents start with -----BEGIN CERTIFICATE-----
	 */
	'x509_cert' => 'MIID4jCCAsqgAwIBAgIUSQ6k1fdihBnR4T4MgpFQoVp9V9MwDQYJKoZIhvcNAQEF
	BQAwRzESMBAGA1UECgwJYXNlYW4tYXdwMRUwEwYDVQQLDAxPbmVMb2dpbiBJZFAx
	GjAYBgNVBAMMEU9uZUxvZ2luIEFjY291bnQgMB4XDTIxMDUyODA0MDIxN1oXDTI2
	MDUyODA0MDIxN1owRzESMBAGA1UECgwJYXNlYW4tYXdwMRUwEwYDVQQLDAxPbmVM
	b2dpbiBJZFAxGjAYBgNVBAMMEU9uZUxvZ2luIEFjY291bnQgMIIBIjANBgkqhkiG
	9w0BAQEFAAOCAQ8AMIIBCgKCAQEA3yPNshad7VjMz1qLzUC+JoEi4xxoiJZZ0KmM
	XmqvyHhOa+ARXObJrQ86PeCGkbJjeT33Hj0e75jfUlW1W2G+48ayer6NMRkn0YTV
	pWmJ2bul4v9yAvVBnZotnTHsADD5PHjIrnLZ+cIHI1b/iy/mcpRau+nhQTAef6/y
	PwjD8CcaJ3Q4zxI5YaBDXB3rg3Dst779LDhJ4rWcJt4XfyxRmcl/ZNvR570eLOfu
	HyVBVQl7ZbpG8iDDDZn5Q1O9ZLVvwbktfJnUhy4WQfrgglSX4b+oKwtlAVhMEGuV
	/FEVdR/rf0iazgCWmnjQzS0AeXEvoqXksGssMjq7FoVcEmMmUQIDAQABo4HFMIHC
	MAwGA1UdEwEB/wQCMAAwHQYDVR0OBBYEFAVKliz0uct87EzqrkogfPpguoFnMIGC
	BgNVHSMEezB5gBQFSpYs9LnLfOxM6q5KIHz6YLqBZ6FLpEkwRzESMBAGA1UECgwJ
	YXNlYW4tYXdwMRUwEwYDVQQLDAxPbmVMb2dpbiBJZFAxGjAYBgNVBAMMEU9uZUxv
	Z2luIEFjY291bnQgghRJDqTV92KEGdHhPgyCkVChWn1X0zAOBgNVHQ8BAf8EBAMC
	B4AwDQYJKoZIhvcNAQEFBQADggEBAK2GN1gmr+OI+WvkX0BapEw5+bFN2khjsuXM
	wqUWkAHGkNzxv8PvjHHyPYMFezqlXMOzLmXA66zTuK3av/rLJPg54RpslsYYa8bS
	C/sr659/XXQPvt8gh2vYHdG0LwKq9iKPl/fKECMItuJkz79if1bB5VzoQrgLXqxU
	l4RFtkmQOg3XRQDUMEDsku93BASSeU/TZwRp9Eh2chzWro2n9NVc7mGA3x0ZZt2Y
	+aktmbaSg0I231fkjs373ZdMk7jilzEmJZeNqDxGGShusQ+6gxaXQAzR5i+L/8SU
	AYEHCL7lQvk82TVBqnfW2Ktvm2xJZtCD9DlX1OB6Lyn4+jOFd+Q=',

	/**
	 * These values affect how the appliaction behaves with regards to setting up urls and redirecting
	 */
	'routing' => [

		/**
		 * By default, use the 'web' middleware for the onelogin.* route group, as well as the
		 * root routes /login and /logout if they are enabled
		 */
		'middleware' => 'web',

		/**
		 * The domain to attach just the onelogin.* routes to
		 */
		'domain' => null,

		/**
		 * The url that will be used when no "redirect back"/"previous" url can be determined in
		 * a workflow
		 */
		'fallback_redirect' => '/',

		/**
		 * This plugin can provide /login and /logout routes to your application if they are enabled (which
		 * they are by default).  Do this instead of using `artisan make:auth`
		 */
		'root_routes' => [

			/**
			 * enable?
			 */
			'enable' => true,

			/**
			 * Autologin (with enabled root routes) will not present a login button on the /login screen,
			 * instead it will automatically redirect to the onelogin.login route. The actual behavior here
			 * is that when a ->middleware('auth') route is hit by an unauthenticated user, the Error/Exception
			 * handler will attempt to redirect to /auth, which the laravel-onelogin package can now handle for you.
			 */
			'autologin' => false,
		],

		/**
		 * In certain circumstances (such as using cloudflare edge auth), the initial ACS POST request is
		 * inadvertantly turned into a GET request to the ACS route. Enabling this will make sure that GET
		 * requests are also redirected back to the onelogin SAML flow
		 */
		'enable_acs_redirect_for_get' => false,
	],

	/**
	 * By default, the onelogin package will use the auth.defaults.guard as the guard to setup the user.
	 * For applications with multiple guards (admin users vs. site users), configure this to use the guard
	 * for the set of users you with to authenticate against one login.
	 *
	 * Note: the guard's provider must have a auth.providers.{provider}.model option
	 */
	'guard' => null,

	// 'local_user' => [
	// 	'enable' => true,

	// 	'attributes' => [
	// 		'email' => 'ridowan@karyaalenta.com',
	// 		'name' => 'Software Developer'
	// 	]
	// ]
];
