<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Oauth\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class DeviceCodeList extends ListResource {
    /**
     * Construct the DeviceCodeList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [];

        $this->uri = '/device/code';
    }

    /**
     * Create the DeviceCodeInstance
     *
     * @param string $clientSid A string that uniquely identifies this oauth app
     * @param string[] $scopes An Array of scopes
     * @param array|Options $options Optional Arguments
     * @return DeviceCodeInstance Created DeviceCodeInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $clientSid, array $scopes, array $options = []): DeviceCodeInstance {
        $options = new Values($options);

        $data = Values::of([
            'ClientSid' => $clientSid,
            'Scopes' => Serialize::map($scopes, function($e) { return $e; }),
            'Audiences' => Serialize::map($options['audiences'], function($e) { return $e; }),
        ]);

        $payload = $this->version->create('POST', $this->uri, [], $data);

        return new DeviceCodeInstance($this->version, $payload);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Oauth.V1.DeviceCodeList]';
    }
}