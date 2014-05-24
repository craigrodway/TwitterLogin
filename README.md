#TwitterLogin#

TwitterLogin provides a means of logging in or registering via a Twitter account.

- - -

This module makes the following changes:

* Creates a template *twitter-login*.
* Creates a field *twitter_id* and adds to the *user* system template.
* Creates a page at */twitter-login/* using the template. This can be changed later.
* Creates a role called *twitter-login* which is added to users.

## Documentation ##

### Installation ###

1. Install the module.
2. Copy `twitter-login.php` to your `/site/templates/` folder.
3. Create a new app at the [Twitter Developers site](https://apps.twitter.com/).
4. Edit the module and add your Twitter OAuth information.
5. Start logging in by visiting your site's _/twitter-login/_ page.

### Hook ###

The module's `updateUser()` method is hookable, which makes it possible to access the Twitter user data.
This method is called as part of the user creation and update process on successful Twitter logins.

In the example below, the method is hooked in the `twitter-login.php` template file itself.
It sets the ProcessWire user `title` and `avatar` (custom) fields to the Twitter user's *name* and *profile image URL* values.

```php
function myUpdateUser($event) {

	$u = $event->arguments('u');
	$twitterInfo = $event->arguments('twitterInfo');

	$u->title = $twitterInfo->name;
	$u->avatar = $twitterInfo->profile_image_url;
	$u->save();

}

$twitterLogin = $this->modules->get("TwitterLogin");
$twitterLogin->addHookAfter('updateUser', null, 'myUpdateUser');
```

For more details on what is provided in `$twitterInfo`, please see the Twitter [account/verify_credentials](https://dev.twitter.com/docs/api/1/get/account/verify_credentials) documentation.

## Changelog ##

1.0.0
* Initial release