<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Content\V1\Content;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $sid
 * @property string $accountSid
 * @property array $whatsapp
 * @property string $url
 */
class ApprovalFetchInstance extends InstanceResource {
    /**
     * Initialize the ApprovalFetchInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The unique string that identifies the Content resource
     */
    public function __construct(Version $version, array $payload, string $sid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'whatsapp' => Values::array_get($payload, 'whatsapp'),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = ['sid' => $sid, ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ApprovalFetchContext Context for this ApprovalFetchInstance
     */
    protected function proxy(): ApprovalFetchContext {
        if (!$this->context) {
            $this->context = new ApprovalFetchContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch the ApprovalFetchInstance
     *
     * @return ApprovalFetchInstance Fetched ApprovalFetchInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ApprovalFetchInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Content.V1.ApprovalFetchInstance ' . \implode(' ', $context) . ']';
    }
}