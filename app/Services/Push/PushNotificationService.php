<?php
/**
 * Created by PhpStorm.
 * User: rat
 * Date: 7/22/17
 * Time: 2:46 PM
 */

namespace App\Services\Push;


use App\BaseSettings\Settings;
use App\Models\PendingVerification;
use App\Models\PushNotification;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class PushNotificationService
{
    protected $optionBuiler;
    protected $notificationBuilder;
    protected $dataBuilder;

    /**
     * PushNotificationService constructor.
     */
    public function __construct()
    {
        $this->optionBuiler = new OptionsBuilder();
        $this->notificationBuilder;
        $this->dataBuilder = new PayloadDataBuilder();
    }

    public function sendPushNotificationToUser($title,$body,$id)
    {

        $tokens = PushNotification::all()->pluck('token')->toArray();

        if(count($tokens)){
            $this->optionBuiler->setTimeToLive(60*20);
            $this->notificationBuilder = new PayloadNotificationBuilder($title);
            $this->notificationBuilder->setBody($body)->setClickAction("FCM_PLUGIN_ACTIVITY")->setSound('default');
            $this->dataBuilder->addData(['result' => $id]);

            $option = $this->optionBuiler->build();
            $notification = $this->notificationBuilder->build();
            $data = $this->dataBuilder->build();
            $downstreamResponse = FCM::sendTo($tokens, $option, $notification,$data);

        }

    }

    public function newVoteAddedNotification($id)
    {
        $tokens_en = PushNotification::where('lang','!=','de')->pluck('token')->toArray();
        $tokens_de = PushNotification::where('lang','de')->pluck('token')->toArray();

        if(count($tokens_en)){
            $this->optionBuiler->setTimeToLive(60*20);
            $this->notificationBuilder = new PayloadNotificationBuilder(Settings::$new_vote_added_notification_title);
            $this->notificationBuilder->setBody(Settings::$new_vote_added_notification_message)->setClickAction("FCM_PLUGIN_ACTIVITY")->setSound('default');
            $this->dataBuilder->addData(['result' => $id]);

            $option = $this->optionBuiler->build();
            $notification = $this->notificationBuilder->build();
            $data = $this->dataBuilder->build();
            $downstreamResponse = FCM::sendTo($tokens_en, $option, $notification,$data);

        }

        if(count($tokens_de)){
            $this->optionBuiler->setTimeToLive(60*20);
            $this->notificationBuilder = new PayloadNotificationBuilder(Settings::$new_vote_added_notification_title_de);
            $this->notificationBuilder->setBody(Settings::$new_vote_added_notification_message_de)->setClickAction("FCM_PLUGIN_ACTIVITY")->setSound('default');
            $this->dataBuilder->addData(['result' => $id]);

            $option = $this->optionBuiler->build();
            $notification = $this->notificationBuilder->build();
            $data = $this->dataBuilder->build();
            $downstreamResponse = FCM::sendTo($tokens_de, $option, $notification,$data);

        }
    }

    public function voteResultUpdatedNotification($id)
    {
        $tokens_en = PushNotification::where('lang','!=','de')->pluck('token')->toArray();
        $tokens_de = PushNotification::where('lang','de')->pluck('token')->toArray();

        if(count($tokens_en)){
            $this->optionBuiler->setTimeToLive(60*20);
            $this->notificationBuilder = new PayloadNotificationBuilder(Settings::$result_updated_notification_title);
            $this->notificationBuilder->setBody(Settings::$result_updated_notification_message)->setClickAction("FCM_PLUGIN_ACTIVITY")->setSound('default');
            $this->dataBuilder->addData(['result' => $id]);

            $option = $this->optionBuiler->build();
            $notification = $this->notificationBuilder->build();
            $data = $this->dataBuilder->build();
            $downstreamResponse = FCM::sendTo($tokens_en, $option, $notification,$data);

        }

        if(count($tokens_de)){
            $this->optionBuiler->setTimeToLive(60*20);
            $this->notificationBuilder = new PayloadNotificationBuilder(Settings::$result_updated_notification_title_de);
            $this->notificationBuilder->setBody(Settings::$result_updated_notification_message_de)->setClickAction("FCM_PLUGIN_ACTIVITY")->setSound('default');
            $this->dataBuilder->addData(['result' => $id]);

            $option = $this->optionBuiler->build();
            $notification = $this->notificationBuilder->build();
            $data = $this->dataBuilder->build();
            $downstreamResponse = FCM::sendTo($tokens_de, $option, $notification,$data);

        }
    }

    public function sendVerificationMessageToUser($title,$body,$id)
    {

        $tokens = PendingVerification::find($id)->pluck('token')->toArray();

        if(count($tokens)){
            $this->optionBuiler->setTimeToLive(60*20);
            $this->notificationBuilder = new PayloadNotificationBuilder($title);
            $this->notificationBuilder->setBody($body)->setClickAction("FCM_PLUGIN_ACTIVITY")->setSound('default');
            $this->dataBuilder->addData(['result' => $id]);

            $option = $this->optionBuiler->build();
            $notification = $this->notificationBuilder->build();
            $data = $this->dataBuilder->build();
            $downstreamResponse = FCM::sendTo($tokens, $option, $notification,$data);

        }
    }
}