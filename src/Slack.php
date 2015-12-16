<?php

namespace CJSDevelopment;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Slack
{
    public static function sendMessage($message, $channel = null, $username = null, $icon = null) {
        $data = self::getPayload($message, $channel, $username, $icon);

        $dataClient = new Client();

        $dT = $dataClient->post(config("slack.url"), ["body" => json_encode($data)]);

        if ($dT->getStatusCode() != 200) {
            return false;
        }
        return true;
    }

    private static function getPayload($message, $channel = null, $username = null, $icon = null) {
        $object["channel"]      = is_null(config("slack.channel")) ? $channel : config("slack.channel");
        $object["username"]     = is_null(config("slack.username")) ? $username : config("slack.username");
        $object["icon_emoji"]   = is_null(config("slack.icon")) ? $icon : config("slack.icon");
        $object["text"]         = $message;

        return $object;

    }


}
