<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1\Assistant\FieldType;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class FieldValueOptions {
    /**
     * @param string $language The ISO language-country tag that identifies the
     *                         language of the value
     * @return ReadFieldValueOptions Options builder
     */
    public static function read(string $language = Values::NONE): ReadFieldValueOptions {
        return new ReadFieldValueOptions($language);
    }

    /**
     * @param string $synonymOf The string value that indicates which word the
     *                          field value is a synonym of
     * @return CreateFieldValueOptions Options builder
     */
    public static function create(string $synonymOf = Values::NONE): CreateFieldValueOptions {
        return new CreateFieldValueOptions($synonymOf);
    }
}

class ReadFieldValueOptions extends Options {
    /**
     * @param string $language The ISO language-country tag that identifies the
     *                         language of the value
     */
    public function __construct(string $language = Values::NONE) {
        $this->options['language'] = $language;
    }

    /**
     * The [ISO language-country](https://docs.oracle.com/cd/E13214_01/wli/docs92/xref/xqisocodes.html) tag that specifies the language of the value. Currently supported tags: `en-US`
     *
     * @param string $language The ISO language-country tag that identifies the
     *                         language of the value
     * @return $this Fluent Builder
     */
    public function setLanguage(string $language): self {
        $this->options['language'] = $language;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Autopilot.V1.ReadFieldValueOptions ' . $options . ']';
    }
}

class CreateFieldValueOptions extends Options {
    /**
     * @param string $synonymOf The string value that indicates which word the
     *                          field value is a synonym of
     */
    public function __construct(string $synonymOf = Values::NONE) {
        $this->options['synonymOf'] = $synonymOf;
    }

    /**
     * The string value that indicates which word the field value is a synonym of.
     *
     * @param string $synonymOf The string value that indicates which word the
     *                          field value is a synonym of
     * @return $this Fluent Builder
     */
    public function setSynonymOf(string $synonymOf): self {
        $this->options['synonymOf'] = $synonymOf;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Autopilot.V1.CreateFieldValueOptions ' . $options . ']';
    }
}