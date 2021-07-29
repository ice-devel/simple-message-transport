<?php

namespace icedev\SimpleMessageTransport\Message;

class Message
{
    private string $data;
    private ?string $type;
    private ?string $route;
    private ?string $method;

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(?string $route): self
    {
        $this->route = $route;

        return $this;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(?string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function toArray() {
        return json_decode($this->getData());
    }
}
