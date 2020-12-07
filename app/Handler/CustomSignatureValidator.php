<?php

namespace App\Handler;

use Illuminate\Http\Request;
use Spatie\WebhookClient\Exceptions\WebhookFailed;
use Spatie\WebhookClient\WebhookConfig;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;

class CustomSignatureValidator implements SignatureValidator{

    public function isValid(Request $request, WebhookConfig $config): bool
    {
        file_put_contents(storage_path('custom_signature.txt'), 'Signature');

        $signature = $request->header($config->signatureHeaderName);

        if (! $signature) {
            return false;
        }

        $signingSecret = $config->signingSecret;

        if (empty($signingSecret)) {
            // file_put_contents(storage_path('custom_empty.txt'), 'Signature is empty');
            throw WebhookFailed::signingSecretNotSet();
        }

        // file_put_contents(storage_path('custom_camethru.txt'), 'Signature is came thru');
        $computedSignature = hash_hmac('sha512', $request->getContent(), $signingSecret);
        return hash_equals($signature, $computedSignature);
   }

}
