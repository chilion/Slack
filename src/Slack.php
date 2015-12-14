<?php

namespace CJSDevelopment;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Slack
{
    public static function sendMessage($message) {
        $data = self::_getPayload($message);

        $dataClient = new Client();

        $dT = $dataClient->post(config("slack.url"), ["json" =>[json_encode($data)]]);

        if ($dT->getStatusCode() != 200) {
            return false;
        }
        return true;
    }

    private static function _getPayload($message) {
        $object["username"] = config("slack.username");
        $object["icon_emoji"] = config("slack.icon");
        $object["channel"] = config("slack.channel");
        $object["text"] = $message;

        return $object;

    }


}
