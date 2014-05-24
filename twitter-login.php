<?php

/**
 * Template file for TwitterLogin module.
 *
 * This should be copied to the /site/templates/ folder if installation script cannot do it.
 *
 */

$twitterLogin = $this->modules->get("TwitterLogin");
if ( ! $twitterLogin) throw new Wire404Exception('TwitterLogin module is not installed');
echo $twitterLogin->execute();