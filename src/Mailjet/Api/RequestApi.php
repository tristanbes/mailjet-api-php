<?php

namespace Mailjet\Api;

final class RequestApi
{
    /**
     * @link http://dev.mailjet.com/email-api/v3/apikey/
     */
    const API_KEY = 'apikey';

    /**
     * @link http://dev.mailjet.com/email-api/v3/apikeyaccess/
     */
    const API_KEY_ACCESS = 'apikeyaccess';

    /**
     * @link http://dev.mailjet.com/email-api/v3/apikeytotals/
     */
    const API_KEY_TOTALS = 'apikeytotals';

    /**
     * @link http://dev.mailjet.com/email-api/v3/apitoken/
     */
    const API_TOKEN = 'apitoken';

    /**
     * @link http://dev.mailjet.com/email-api/v3/metadata/
     */
    const META_DATA = 'metadata';

    /**
     * @link http://dev.mailjet.com/email-api/v3/metasender/
     */
    const META_SENDER = 'metasender';

    /**
     * @link http://dev.mailjet.com/email-api/v3/myprofile/
     */
    const MY_PROFILE = 'myprofile';

    /**
     * @link http://dev.mailjet.com/email-api/v3/sender/
     */
    const SENDER = 'sender';

    /**
     * @link http://dev.mailjet.com/email-api/v3/user/
     */
    const USER = 'user';


    private function __construct() {}
}
