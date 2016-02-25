<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Usage;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string apiVersion
 * @property string callbackMethod
 * @property string callbackUrl
 * @property string currentValue
 * @property \DateTime dateCreated
 * @property \DateTime dateFired
 * @property \DateTime dateUpdated
 * @property string friendlyName
 * @property string recurring
 * @property string sid
 * @property string triggerBy
 * @property string triggerValue
 * @property string uri
 * @property string usageCategory
 * @property string usageRecordUri
 */
class TriggerInstance extends InstanceResource {
    /**
     * Initialize the TriggerInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @param string $sid Fetch by unique usage-trigger Sid
     * @return \Twilio\Rest\Api\V2010\Account\Usage\TriggerInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'apiVersion' => $payload['api_version'],
            'callbackMethod' => $payload['callback_method'],
            'callbackUrl' => $payload['callback_url'],
            'currentValue' => $payload['current_value'],
            'dateCreated' => Deserialize::iso8601DateTime($payload['date_created']),
            'dateFired' => Deserialize::iso8601DateTime($payload['date_fired']),
            'dateUpdated' => Deserialize::iso8601DateTime($payload['date_updated']),
            'friendlyName' => $payload['friendly_name'],
            'recurring' => $payload['recurring'],
            'sid' => $payload['sid'],
            'triggerBy' => $payload['trigger_by'],
            'triggerValue' => $payload['trigger_value'],
            'uri' => $payload['uri'],
            'usageCategory' => $payload['usage_category'],
            'usageRecordUri' => $payload['usage_record_uri'],
        );
        
        $this->solution = array(
            'accountSid' => $accountSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Usage\TriggerContext Context for this
     *                                                             TriggerInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new TriggerContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a TriggerInstance
     * 
     * @return TriggerInstance Fetched TriggerInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the TriggerInstance
     * 
     * @param array $options Optional Arguments
     * @return TriggerInstance Updated TriggerInstance
     */
    public function update(array $options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Deletes the TriggerInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        
        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.TriggerInstance ' . implode(' ', $context) . ']';
    }
}