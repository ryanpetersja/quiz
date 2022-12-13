<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DrewM\MailChimp\MailChimp;
use Spatie\Newsletter\Newsletter;
use Spatie\Newsletter\NewsletterListCollection;


class MailChimpController extends Controller
{
    public function addSubscriber($email, $fields)
    {
        $mailchimp = new MailChimp(env('MAILCHIMP_APIKEY'));
        $configuredLists = NewsletterListCollection::createFromConfig(config('newsletter'));
        $chimp = new Newsletter($mailchimp, $configuredLists);
        // dd($fields);
        try {
            $chimp->subscribe($email, $fields);
        } catch (Exception $e) {
            // dd($e);
        }
    }
}
