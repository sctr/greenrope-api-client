# greenrope-api-client

Add bundle to bundles.php
```$php
<?php

return [
    Sctr\Greenrope\Api\GreenropeApiClientBundle::class => ['all' => true],
];

```

Add configuration to "greenrope_api_client.yaml"
```$yaml
greenrope_api_client:
    api_url: https://api.stgi.net/api-xml
    email: email@greenrope.com
    password: password
    account_id: account id

```
