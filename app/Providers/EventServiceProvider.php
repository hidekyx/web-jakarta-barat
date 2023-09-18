<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Aacotroneo\Saml2\Events\Saml2LoginEvent;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		Registered::class => [
			SendEmailVerificationNotification::class,
		],
		'Aacotroneo\Saml2\Events\Saml2LoginEvent' => [
			'App\Listeners\Saml2LoginListener',
		],
		'Aacotroneo\Saml2\Events\Saml2LogoutEvent' => [
			'App\Listeners\Saml2LogoutListener',
		],
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot()
	{
		//parent::boot();

		// assuming: use ZiffMedia\Laravel\Onelogin\Events\OneloginLoginEvent;
		// Event::listen(OneloginLoginEvent::class, function (OneloginLoginEvent $event) {
		// 	$user = User::firstOrNew(['email' => $event->userAttributes['User.email'][0]]);

		// 	if (isset($event->userAttributes['User.FirstName'][0]) && isset($event->userAttributes['User.LastName'][0])) {
		// 		$user->name = "{$event->userAttributes['User.FirstName'][0]} {$event->userAttributes['User.LastName'][0]}";
		// 	}

		// 	// other custom logic here

		// 	$user->save();

		// 	return $user;
		// });

		//Library Aacotroneo
		Event::listen('Aacotroneo\Saml2\Events\Saml2LoginEvent', function (Saml2LoginEvent $event) {
			$messageId = $event->getSaml2Auth()->getLastMessageId();
			// Add your own code preventing reuse of a $messageId to stop replay attacks

			$user = $event->getSaml2User();
			$userData = [
				'id' => $user->getUserId(),
				'attributes' => $user->getAttributes(),
				'assertion' => $user->getRawSamlAssertion()
			];

			dd($userData);
			//check the user email is exist in our application or not
			// $user = User::where('email',$userData['id'])->first();
			// if($user){
			// 	Auth::loginUsingId($user->id);	
			// }else{
			// 	$user = new User;
			// 	$user->email = $userData['id'];
			// }
			

			// $laravelUser = //find user by ID or attribute
			// //if it does not exist create it and go on  or show an error message
			// Auth::login($laravelUser);
		});
	}
}
