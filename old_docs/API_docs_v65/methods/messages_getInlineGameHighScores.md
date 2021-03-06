---
title: messages.getInlineGameHighScores
description: messages.getInlineGameHighScores parameters, return type and example
---
## Method: messages.getInlineGameHighScores  
[Back to methods index](index.md)


### Parameters:

| Name     |    Type       | Required |
|----------|:-------------:|---------:|
|id|[InputBotInlineMessageID](../types/InputBotInlineMessageID.md) | Yes|
|user\_id|[InputUser](../types/InputUser.md) | Yes|


### Return type: [messages\_HighScores](../types/messages_HighScores.md)

### Example:


```
$MadelineProto = new \danog\MadelineProto\API();
if (isset($token)) { // Login as a bot
    $this->bot_login($token);
}
if (isset($number)) { // Login as a user
    $sentCode = $MadelineProto->phone_login($number);
    echo 'Enter the code you received: ';
    $code = '';
    for ($x = 0; $x < $sentCode['type']['length']; $x++) {
        $code .= fgetc(STDIN);
    }
    $MadelineProto->complete_phone_login($code);
}

$messages_HighScores = $MadelineProto->messages->getInlineGameHighScores(['id' => InputBotInlineMessageID, 'user_id' => InputUser, ]);
```

Or, if you're into Lua:

```
messages_HighScores = messages.getInlineGameHighScores({id=InputBotInlineMessageID, user_id=InputUser, })
```

