# Google Cloud Messaging

Push Notification to Android device by using PHP.

## How to use?

* To push a message to many devices :

```php
<?php
	include_once 'GoogleCloudMessaging.php';
	$registerationIds = array(
		'APA91bH-lf7YXuGvkD1-iCtcgSr4vrWbqkxIz1idD_VGzcLiUSqJd...',
		'APA91bFUvwEtgOMQcqXVn06jheApvsZAQ2KSsZrPQSdRzO5eadU4E...',
		'APA91bGZT_5uyha9nRnWZnUf6OcL_c971Pd4ckAceQPfJ3b57NhhC...',
		//...
	);
	$data = array(
		'id' => 1000,
		'message' => "Hello Android! You've got a message from me ^_^",
		'url' => 'http://www.google.com',
		//...
	);
	$gcm = new GoogleCloudMessaging('GCM_API_KEY');
	$gcm->pushMessageToManyDevices($registerationIds, $data);
?>
```

* To push a message to a device :

```php
<?php
	include_once 'GoogleCloudMessaging.php';
	$registerationId = 'APA91bH-lf7YXuGvkD1-iCtcgSr4vrWbqkxIz1idD_VGzcLiUSqJd...';
	$data = array(
		'id' => 1000,
		'message' => "Hello Android! You've got a message from me ^_^",
		'url' => 'http://www.google.com',
		//...
	);
	$gcm = new GoogleCloudMessaging('GCM_API_KEY');
	$gcm->pushMessageToOneDevice($registerationId, $data);
?>
```
	
## How to get API Key?

[http://developer.android.com/google/gcm/gs.html]
	
[http://developer.android.com/google/gcm/gs.html]:http://developer.android.com/google/gcm/gs.html#access-key

DONE!
