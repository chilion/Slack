<?php

namespace CJSDevelopment;

use GuzzleHttp\Client;

/**
 * Class Slack
 * @package CJSDevelopment
 */
class Slack
{

    /**
     * @author Chilion Snoek <c.snoek@texemus.com>
     *
     * @param $message
     * @param null $channel
     * @param null $username
     * @param null $icon
     * @return bool
     *
     */
    public static function sendMessage($message, $channel = null, $username = null, $icon = null)
    {
        $data = self::getPayload($message, $channel, $username, $icon);

        $dataClient = new Client();

        $dT = $dataClient->post(config('slack.url'), ['body' => json_encode($data)]);

        if ($dT->getStatusCode() != 200) {
            return false;
        }

        return true;
    }

    /**
     * @author Chilion Snoek <c.snoek@texemus.com>
     *
     * @param $message
     * @param null $channel
     * @param null $username
     * @param null $icon
     * @return mixed
     *
     */
    private static function getPayload($message, $channel = null, $username = null, $icon = null)
    {
        $object['channel'] = is_null($channel) ? config('slack.channel') : $channel;
        $object['username'] = is_null($username) ? config('slack.username') : $username;
        $object['icon_emoji'] = is_null($icon) ? config('slack.icon') : $icon;
        $object['text'] = $message;

        return $object;
    }
}
