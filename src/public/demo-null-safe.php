<?php

//demo null safe operator
// null safe operator
// The null safe operator (->?) is a feature introduced in PHP 8.0 that allows you to safely access properties and methods of an object without having to check if the object is null.
// If the object is null, the expression will return null instead of throwing an error.


class User
{
    public ?Profile $profile = null;

}

class Profile
{
    public int $id;

    public function __construct()
    {
        $this->id = rand();
    }
}

$user = new User();
// $user->profile = new Profile();
$user->profile?->id;
// $user->profile->id; // This will throw an error if profile is null
// $user->profile?->id; // This will return null if profile is null

$user->profile = new Profile();
echo $user->profile?->id;

