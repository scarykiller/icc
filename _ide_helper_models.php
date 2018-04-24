<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Email
 *
 */
	class Email extends \Eloquent {}
}

namespace App{
/**
 * App\post
 *
 * @property-read \App\User $user
 */
	class post extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\post[] $posts
 * @property-write mixed $password
 */
	class User extends \Eloquent {}
}

