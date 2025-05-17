<?php

namespace App\Traits;

trait WithNotify
{
    public function successNotify($message, $style = 'success')
    {
        $this->dispatch('notify', message: $message, style: $style);
    }

    public function errorNotify($message, $style = 'error')
    {
        $this->dispatch('notify', message: $message, style: $style);
    }

    public function infoNotify($message, $style = 'info')
    {
        $this->dispatch('notify', message: $message, style: $style);
    }

    public function warningNotify($message, $style = 'warning')
    {
        $this->dispatch('notify', message: $message, style: $style);
    }
}
