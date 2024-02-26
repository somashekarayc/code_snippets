<?php
class TempMailApi {
    private static $commonHeaders = [
        'accept: application/json, text/plain, */*',
        'application-name: web',
        'application-version: 2.2.29',
        'content-type: application/json;charset=UTF-8',
        'origin: https://temp-mail.io',
        'referer: https://temp-mail.io/'
    ];

    public $email;
    private $token;

    public function __construct($email = null) {
        if (empty($email)) {
            $url = 'https://api.internal.temp-mail.io/api/v3/email/new';

            $data = [
                'min_name_length' => 10,
                'max_name_length' => 10
            ];

            $response = self::api($url, self::$commonHeaders, json_encode($data));
            $decodedResponse = json_decode($response, true);

            if ($decodedResponse && isset($decodedResponse['token']) && isset($decodedResponse['email'])) {
                $this->token = $decodedResponse['token'];
                $this->email = $decodedResponse['email'];
            } else {
                throw new Exception('Failed to create a new email');
            }
        } else {
            $this->email = $email;
        }
    }
    
    public function get() {
        $url = 'https://api.internal.temp-mail.io/api/v3/email/' . $this->email . '/messages';

        $headers = array_merge(self::$commonHeaders, [
            'access-control-request-headers: application-name,application-version',
            'access-control-request-method: GET'
        ]);

        $response = self::api($url, $headers);
        
        $response = json_decode($response, true);
        
        $messages = [];
        if (isset($response[0])) {
            foreach ($response as $message) {
                $subject = $message['subject'];
                $from = $message['from'];
                $id = $message['id'];
                preg_match('/^(.*?)\s*</', $from, $nameMatches);
                $name = str_replace('"', '', $nameMatches[1]);

                preg_match('/<([^>]+)>/', $from, $emailMatches);
                $from = $emailMatches[1];

                $body = str_replace("\n", '<br>', $message['body_text']);
                
                $messages[] = [
                    'id' => $id,
                    'subject' => $subject,
                    'body' => $body,
                    'name' => $name,
                    'from' => $from
                ];
            }
        } else {
            $array = isset($response["code"]) ? $response["message"] : 'No messages found';
        }

        $responseData = json_encode([
            'email' => $this->email,
            'messages' => $array ?: $messages
        ]);

        return $responseData;
    }

    private static function api($url, $headers, $postData = null) {
        $ch = curl_init();
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => 'gzip, deflate, br'
        ];

        if ($postData) {
            $options[CURLOPT_POSTFIELDS] = $postData;
            $options[CURLOPT_POST] = true;
        }

        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);

        if ($response === false) {
            throw new Exception('API request failed: ' . curl_error($ch));
        }

        curl_close($ch);

        return $response;
    }
}


$tempMail = new TempMailApi('yc11cvnkbe@zlorkun.com');
$tempMailData = json_decode($tempMail->get());
echo 'Email <h4> '.$tempMailData->email . '</h4>';
echo 'Messages <br>'.$tempMailData->messages;