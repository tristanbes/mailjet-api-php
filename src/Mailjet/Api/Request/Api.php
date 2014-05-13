<?php

namespace Mailjet\Api\Request;

use Mailjet\Api\MailjetClientInterface;
use Mailjet\Api\RequestApi;

/**
 * Higher-level OOP wrapper over Mailjet Client for Api related requests
 *
 * @link http://www.mailjet.com/docs/api/api
 *
 * Based on https://github.com/dguyon/Mailjet
 */
class Api
{
    private $client;

    public function __construct(MailjetClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @link http://dev.mailjet.com/email-api/v3/apikey/
     */
    public function createKey($name, $isActive = null, $isMaster = null, $customStatus = null, $secretKey = null, $trackHost = null)
    {
        $options = array(
            'Name' => $name,
        );

        if (null !== $isActive) {
            $options['IsActive'] = $isActive;
        }

        if (null !== $isMaster) {
            $options['IsMaster'] = $isMaster;
        }

        if (null !== $customStatus) {
            $options['CustomStatus'] = $customStatus;
        }

        if (null !== $secretKey) {
            $options['SecretKey'] = $secretKey;
        }

        if (null !== $trackHost) {
            $options['TrackHost'] = $trackHost;
        }

        return $this->client->post(RequestApi::API_KEY, $options);
    }

    /**
     * @link http://dev.mailjet.com/email-api/v3/apikey/
     */
    public function deleteKey($id)
    {
        return $this->client->delete(RequestApi::API_KEY, $id);
    }

    /**
     * @link http://www.mailjet.com/docs/api/api/keyupdate
     */
    public function updateKey($key, $name = '', $status = '')
    {
        return $this->client->post(RequestApi::API_KEY_UPDATE, array(
            'apiKey'        => $key,
            'name'          => $name,
            'custom_status' => $status
        ));
    }

    /**
     * @link http://www.mailjet.com/docs/api/api/keyauthenticate
     */
    public function authenticateKey($key, array $allowedPages, $defaultPage = '', $lang = '', $timezone = '', $type = null)
    {
        $options = array(
            'apikey'         => $key,
            'allowed_access' => $allowedPages,
            'default_page'   => $defaultPage,
            'lang'           => $lang,
            'timezone'       => $timezone,
        );

        if (null !== $type) {
            $options['type'] = $type;
        }

        return $this->client->post(RequestApi::API_KEY_AUTH, $options);
    }

    /**
     * @link http://www.mailjet.com/docs/api/api/keylist
     */
    public function getKeys($key = '', $status = '', $name = '', $type = null, $isActive = null)
    {
        $options = array(
            'APIKey'       => $key,
            'CustomStatus' => $status,
            'Name'         => $name,
        );

        if (null !== $type) {
            $options['KeyType'] = $type;
        }

        if (null !== $isActive) {
            $options['IsActive'] = $isActive;
        }

        return $this->client->get(RequestApi::API_KEY_LIST, $options);
    }


    /**
     * @link http://dev.mailjet.com/email-api/v3/metasender/
     */
    public function getDomains()
    {
        return $this->client->get(RequestApi::META_SENDER);
    }

    /**
     * @link http://dev.mailjet.com/email-api/v3/metasender/
     */
    public function validateDomain($email, $description = null)
    {
        $options = array(
            'Email' => $email
        );

        if (null !== $description) {
            $options['Description'] = $description;
        }

        return $this->client->post(RequestApi::META_SENDER, $options);
    }
}