<?php

namespace Scuba\helper;

trait FlashMessageTrait
{
    public function addSuccessMessage(string $message): void
    {
        $_SESSION['success_message'] = $message;
    }

    public function addErrorMessage(string $message): void
    {
        $_SESSION['error_message'] = $message;
    }

    public function addErrorMessageName(string $message): void
    {
        $_SESSION['error_message_name'] = $message;
    }

    public function addErrorMessageEmail(string $message): void
    {
        $_SESSION['error_message_email'] = $message;
    }

    public function addErrorMessagePassword(string $message): void
    {
        $_SESSION['error_message_password'] = $message;
    }
}