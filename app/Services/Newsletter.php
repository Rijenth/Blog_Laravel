<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;

class Newsletter
{

    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us10'
        ]);
    }

    public function subscribe(string $email, string $list = null)
    {
        // Si $list=NULL alors prend cette valeur
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($list,[
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }


}
