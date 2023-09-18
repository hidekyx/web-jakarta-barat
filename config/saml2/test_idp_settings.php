<?php

// If you choose to use ENV vars to define these values, give this IdP its own env var names
// so you can define different values for each IdP, all starting with 'SAML2_'.$this_idp_env_id
$this_idp_env_id = 'TEST';

//This is variable is for simplesaml example only.
// For real IdP, you must set the url values in the 'idp' config to conform to the IdP's real urls.
$idp_host = env('SAML2_'.$this_idp_env_id.'_IDP_HOST', 'http://localhost:8000/simplesaml');

return $settings = array(

	/*****
	 * One Login Settings
	 */

	// If 'strict' is True, then the PHP Toolkit will reject unsigned
	// or unencrypted messages if it expects them signed or encrypted
	// Also will reject the messages if not strictly follow the SAML
	// standard: Destination, NameId, Conditions ... are validated too.
	'strict' => true, //@todo: make this depend on laravel config

	// Enable debug mode (to print errors)
	'debug' => env('APP_DEBUG', false),

	// Service Provider Data that we are deploying
	'sp' => array(

		// Specifies constraints on the name identifier to be used to
		// represent the requested subject.
		// Take a look on lib/Saml2/Constants.php to see the NameIdFormat supported
		'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:persistent',

		// Usually x509cert and privateKey of the SP are provided by files placed at
		// the certs folder. But we can also provide them with the following parameters
		'x509cert' => env('SAML2_'.$this_idp_env_id.'_SP_x509',''),
		'privateKey' => env('SAML2_'.$this_idp_env_id.'_SP_PRIVATEKEY',''),

		// Identifier (URI) of the SP entity.
		// Leave blank to use the '{idpName}_metadata' route, e.g. 'test_metadata'.
		'entityId' => env('SAML2_'.$this_idp_env_id.'_SP_ENTITYID',''),

		// Specifies info about where and how the <AuthnResponse> message MUST be
		// returned to the requester, in this case our SP.
		'assertionConsumerService' => array(
			// URL Location where the <Response> from the IdP will be returned,
			// using HTTP-POST binding.
			// Leave blank to use the '{idpName}_acs' route, e.g. 'test_acs'
			'url' => '',
		),
		// Specifies info about where and how the <Logout Response> message MUST be
		// returned to the requester, in this case our SP.
		// Remove this part to not include any URL Location in the metadata.
		'singleLogoutService' => array(
			// URL Location where the <Response> from the IdP will be returned,
			// using HTTP-Redirect binding.
			// Leave blank to use the '{idpName}_sls' route, e.g. 'test_sls'
			'url' => '',
		),
	),

	// Identity Provider Data that we want connect with our SP
	'idp' => array(
		// Identifier of the IdP entity  (must be a URI)
		'entityId' => env('SAML2_'.$this_idp_env_id.'_IDP_ENTITYID', $idp_host . '/saml2/idp/metadata.php'),
		// SSO endpoint info of the IdP. (Authentication Request protocol)
		'singleSignOnService' => array(
			// URL Target of the IdP where the SP will send the Authentication Request Message,
			// using HTTP-Redirect binding.
			'url' => env('SAML2_'.$this_idp_env_id.'_IDP_SSO_URL', $idp_host . '/saml2/idp/SSOService.php'),
		),
		// SLO endpoint info of the IdP.
		'singleLogoutService' => array(
			// URL Location of the IdP where the SP will send the SLO Request,
			// using HTTP-Redirect binding.
			'url' => env('SAML2_'.$this_idp_env_id.'_IDP_SL_URL', $idp_host . '/saml2/idp/SingleLogoutService.php'),
		),
		// Public x509 certificate of the IdP
		'x509cert' => env('SAML2_'.$this_idp_env_id.'_IDP_x509', 'MIID4jCCAsqgAwIBAgIUSQ6k1fdihBnR4T4MgpFQoVp9V9MwDQYJKoZIhvcNAQEF
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
AYEHCL7lQvk82TVBqnfW2Ktvm2xJZtCD9DlX1OB6Lyn4+jOFd+Q='),
		/*
		 *  Instead of use the whole x509cert you can use a fingerprint
		 *  (openssl x509 -noout -fingerprint -in "idp.crt" to generate it)
		 */
		// 'certFingerprint' => '',
	),



	/***
	 *
	 *  OneLogin advanced settings
	 *
	 *
	 */
	// Security settings
	'security' => array(

		/** signatures and encryptions offered */

		// Indicates that the nameID of the <samlp:logoutRequest> sent by this SP
		// will be encrypted.
		'nameIdEncrypted' => false,

		// Indicates whether the <samlp:AuthnRequest> messages sent by this SP
		// will be signed.              [The Metadata of the SP will offer this info]
		'authnRequestsSigned' => false,

		// Indicates whether the <samlp:logoutRequest> messages sent by this SP
		// will be signed.
		'logoutRequestSigned' => false,

		// Indicates whether the <samlp:logoutResponse> messages sent by this SP
		// will be signed.
		'logoutResponseSigned' => false,

		/* Sign the Metadata
		 False || True (use sp certs) || array (
													keyFileName => 'metadata.key',
													certFileName => 'metadata.crt'
												)
		*/
		'signMetadata' => false,


		/** signatures and encryptions required **/

		// Indicates a requirement for the <samlp:Response>, <samlp:LogoutRequest> and
		// <samlp:LogoutResponse> elements received by this SP to be signed.
		'wantMessagesSigned' => false,

		// Indicates a requirement for the <saml:Assertion> elements received by
		// this SP to be signed.        [The Metadata of the SP will offer this info]
		'wantAssertionsSigned' => false,

		// Indicates a requirement for the NameID received by
		// this SP to be encrypted.
		'wantNameIdEncrypted' => false,

		// Authentication context.
		// Set to false and no AuthContext will be sent in the AuthNRequest,
		// Set true or don't present thi parameter and you will get an AuthContext 'exact' 'urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport'
		// Set an array with the possible auth context values: array ('urn:oasis:names:tc:SAML:2.0:ac:classes:Password', 'urn:oasis:names:tc:SAML:2.0:ac:classes:X509'),
		'requestedAuthnContext' => true,
	),

	// Contact information template, it is recommended to suply a technical and support contacts
	'contactPerson' => array(
		'technical' => array(
			'givenName' => 'name',
			'emailAddress' => 'no@reply.com'
		),
		'support' => array(
			'givenName' => 'Support',
			'emailAddress' => 'no@reply.com'
		),
	),

	// Organization information template, the info in en_US lang is recomended, add more if required
	'organization' => array(
		'en-US' => array(
			'name' => 'Name',
			'displayname' => 'Display Name',
			'url' => 'http://url'
		),
	),

/* Interoperable SAML 2.0 Web Browser SSO Profile [saml2int]   http://saml2int.org/profile/current

   'authnRequestsSigned' => false,    // SP SHOULD NOT sign the <samlp:AuthnRequest>,
									  // MUST NOT assume that the IdP validates the sign
   'wantAssertionsSigned' => true,
   'wantAssertionsEncrypted' => true, // MUST be enabled if SSL/HTTPs is disabled
   'wantNameIdEncrypted' => false,
*/

);
