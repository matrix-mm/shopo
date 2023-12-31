<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class InsightsQuestionnairesContext extends InstanceContext {
    /**
     * Initialize the InsightsQuestionnairesContext
     *
     * @param Version $version Version that contains the resource
     * @param string $id Unique Questionnaire ID
     */
    public function __construct(Version $version, $id) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['id' => $id, ];

        $this->uri = '/Insights/QM/Questionnaires/' . \rawurlencode($id) . '';
    }

    /**
     * Update the InsightsQuestionnairesInstance
     *
     * @param bool $active Is questionnaire enabled ?
     * @param array|Options $options Optional Arguments
     * @return InsightsQuestionnairesInstance Updated InsightsQuestionnairesInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(bool $active, array $options = []): InsightsQuestionnairesInstance {
        $options = new Values($options);

        $data = Values::of([
            'Active' => Serialize::booleanToString($active),
            'Name' => $options['name'],
            'Description' => $options['description'],
            'QuestionIds' => Serialize::map($options['questionIds'], function($e) { return $e; }),
        ]);
        $headers = Values::of(['Token' => $options['token'], ]);

        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);

        return new InsightsQuestionnairesInstance($this->version, $payload, $this->solution['id']);
    }

    /**
     * Delete the InsightsQuestionnairesInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []): bool {
        $options = new Values($options);

        $headers = Values::of(['Token' => $options['token'], ]);

        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
    }

    /**
     * Fetch the InsightsQuestionnairesInstance
     *
     * @param array|Options $options Optional Arguments
     * @return InsightsQuestionnairesInstance Fetched InsightsQuestionnairesInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []): InsightsQuestionnairesInstance {
        $options = new Values($options);

        $headers = Values::of(['Token' => $options['token'], ]);

        $payload = $this->version->fetch('GET', $this->uri, [], [], $headers);

        return new InsightsQuestionnairesInstance($this->version, $payload, $this->solution['id']);
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
        return '[Twilio.FlexApi.V1.InsightsQuestionnairesContext ' . \implode(' ', $context) . ']';
    }
}