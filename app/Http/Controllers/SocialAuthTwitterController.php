<?php

// SocialAuthTwitterController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialAuthTwitterController extends Controller
{
  /**
   * Create a redirect method to twitter api.
   *
   * @return void
   */
    public function redirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Return a callback method from twitter api.
     *
     * @return callback URL from twitter
     */
    public function callback()
    {
       
    }
}