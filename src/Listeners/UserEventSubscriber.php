<?php

namespace Viviniko\Permission\Listeners;

use Carbon\Carbon;
use Viviniko\Permission\Contracts\UserService;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class UserEventSubscriber
{
	/**
	 * @var \Viviniko\Permission\Contracts\UserService
	 */
	private $userService;

	public function __construct(UserService $userService)
    {
		$this->userService = $userService;
	}

    public function onRegistered(Registered $event)
    {
        // todo
    }

	public function onLogin(Login $event)
    {
	    $this->userService->update($event->user->id, [
            'log_num' => DB::raw('log_num + 1'),
            'log_ip' => Request::ip(),
            'log_date' => Carbon::now(),
        ]);
	}

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  \Illuminate\Events\Dispatcher  $events
	 */
	public function subscribe($events)
    {
		$events->listen(Login::class, 'Viviniko\Permission\Listeners\UserEventSubscriber@onLogin');
        $events->listen(Registered::class, 'Viviniko\Permission\Listeners\UserEventSubscriber@onRegistered');
	}
}
