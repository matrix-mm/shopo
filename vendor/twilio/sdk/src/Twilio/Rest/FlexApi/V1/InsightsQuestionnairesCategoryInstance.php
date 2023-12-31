<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $accountSid
 * @property string $categoryId
 * @property string $name
 * @property string $url
 */
class InsightsQuestionnairesCategoryInstance extends InstanceResource {
    /**
     * Initialize the InsightsQuestionnairesCategoryInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $categoryId Category ID to update
     */
    public function __construct(Version $version, array $payload, string $categoryId = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'categoryId' => Values::array_get($payload, 'category_id'),
            'name' => Values::array_get($payload, 'name'),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = ['categoryId' => $categoryId ?: $this->properties['categoryId'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return InsightsQuestionnairesCategoryContext Context for this
     *                                               InsightsQuestionnairesCategoryInstance
     */
    protected function proxy(): InsightsQuestionnairesCategoryContext {
        if (!$this->context) {
            $this->context = new InsightsQuestionnairesCategoryContext(
                $this->version,
                $this->solution['categoryId']
            );
        }

        return $this->context;
    }

    /**
     * Update the InsightsQuestionnairesCategoryInstance
     *
     * @param string $name The category name.
     * @param array|Options $options Optional Arguments
     * @return InsightsQuestionnairesCategoryInstance Updated
     *                                                InsightsQuestionnairesCategoryInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $name, array $options = []): InsightsQuestionnairesCategoryInstance {
        return $this->proxy()->update($name, $options);
    }

    /**
     * Delete the InsightsQuestionnairesCategoryInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []): bool {
        return $this->proxy()->delete($options);
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
        return '[Twilio.FlexApi.V1.InsightsQuestionnairesCategoryInstance ' . \implode(' ', $context) . ']';
    }
}