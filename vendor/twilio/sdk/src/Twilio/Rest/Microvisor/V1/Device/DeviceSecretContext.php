<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Microvisor\V1\Device;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class DeviceSecretContext extends InstanceContext {
    /**
     * Initialize the DeviceSecretContext
     *
     * @param Version $version Version that contains the resource
     * @param string $deviceSid A string that uniquely identifies the Device.
     * @param string $key The secret key.
     */
    public function __construct(Version $version, $deviceSid, $key) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['deviceSid' => $deviceSid, 'key' => $key, ];

        $this->uri = '/Devices/' . \rawurlencode($deviceSid) . '/Secrets/' . \rawurlencode($key) . '';
    }

    /**
     * Fetch the DeviceSecretInstance
     *
     * @return DeviceSecretInstance Fetched DeviceSecretInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): DeviceSecretInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new DeviceSecretInstance(
            $this->version,
            $payload,
            $this->solution['deviceSid'],
            $this->solution['key']
        );
    }

    /**
     * Update the DeviceSecretInstance
     *
     * @param string $value The secret value.
     * @return DeviceSecretInstance Updated DeviceSecretInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $value): DeviceSecretInstance {
        $data = Values::of(['Value' => $value, ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new DeviceSecretInstance(
            $this->version,
            $payload,
            $this->solution['deviceSid'],
            $this->solution['key']
        );
    }

    /**
     * Delete the DeviceSecretInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('DELETE', $this->uri);
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
        return '[Twilio.Microvisor.V1.DeviceSecretContext ' . \implode(' ', $context) . ']';
    }
}