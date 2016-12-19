## Constructor: account\_passwordInputSettings  

### Attributes:

| Name     |    Type       | Required |
|----------|:-------------:|---------:|
|new\_salt|[bytes](../types/bytes.md) | Optional|
|new\_password\_hash|[bytes](../types/bytes.md) | Optional|
|hint|[string](../types/string.md) | Optional|
|email|[string](../types/string.md) | Optional|


### Type: [account\_PasswordInputSettings](../types/account\_PasswordInputSettings.md)

### Example:


```
$account_passwordInputSettings = ['new_salt' => bytes, 'new_password_hash' => bytes, 'hint' => string, 'email' => string, ];
```