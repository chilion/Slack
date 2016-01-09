# Slack
A Laravel package for sending Messages to Slack

# Usage
## composer
Require it:

- "CJSDevelopment/slack" : "dev-master"

## app.php
Add the following data:
### ServiceProvider
- 'CJSDevelopment\SlackServiceProvider'

### Facade
- 'Slack' => 'CJSDevelopment\Slack',

## Deploy / Update
Execute the following commands in your console:
- sudo composer selfupdate
- sudo composer update
- sudo php artisan vendor:publish

# Config
After executing the vendor:publish command you will find a config file in the Laravel config folder. Fill the Mandatory fields, check the optional.
Don't forget!! Create a webhook URL http://your-domain.slack.com/services/


# Usage in your code:
Slack::sendMessage("Message!", "#channel");

## Options
|Parameter Position   	|Description   	|Option(s)   	|Default |
|---	|---	|---	|
|1   	|Message to send   	| None   	| None|
|2   	|Channel or Username to send   	|@username of #channel   	|#general|
|3   	|Username of the Bot   	|Any name you want to give the BOT   	|CJSDevelopment Slack Bot|
|4   	|Icon   	|The icon you want to use for your BOT as avatar   	|:ghost:|
