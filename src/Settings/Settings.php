<?php

namespace Spatie\Ray\Settings;

class Settings
{
    /** @var array */
    protected $settings = [];

    /** @var array */
    protected $defaultSettings = [
        'enable' => true,
        'host' => 'localhost',
        'port' => 23517,
        'remote_path' => null,
        'local_path' => null,
        'always_send_raw_values' => false,
    ];

    public function __construct(array $settings)
    {
        $this->settings = array_merge($this->defaultSettings, $settings);
    }

    public function setDefaultSettings(array $defaults): self
    {
        $this->settings = array_merge($this->settings, $defaults);

        return $this;
    }

    public function equals(array $settings): bool
    {
        return (
            count($this->settings) === count($settings)
            && array_diff($this->settings, $settings) === array_diff($settings, $this->settings)
        );
    }

    public function __set(string $name, $value)
    {
        $this->settings[$name] = $value;
    }

    public function __get(string $name)
    {
        return $this->settings[$name] ?? null;
    }
}
