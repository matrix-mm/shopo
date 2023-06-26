<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify\V2;

use Twilio\Options;
use Twilio\Values;

abstract class TemplateOptions {
    /**
     * @param string $friendlyName Filter templates using friendly name
     * @return ReadTemplateOptions Options builder
     */
    public static function read(string $friendlyName = Values::NONE): ReadTemplateOptions {
        return new ReadTemplateOptions($friendlyName);
    }
}

class ReadTemplateOptions extends Options {
    /**
     * @param string $friendlyName Filter templates using friendly name
     */
    public function __construct(string $friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * String filter used to query templates with a given friendly name
     *
     * @param string $friendlyName Filter templates using friendly name
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Verify.V2.ReadTemplateOptions ' . $options . ']';
    }
}