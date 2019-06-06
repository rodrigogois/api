<?php namespace App;

/**
 * Eloquent class to describe the oauth_clients table
 *
 * automatically generated by ModelGenerator.php
 */
class OauthClients extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'oauth_clients';

    protected $fillable = array('user_id', 'name', 'secret', 'redirect', 'personal_access_client', 'password_client',
        'revoked');


}
