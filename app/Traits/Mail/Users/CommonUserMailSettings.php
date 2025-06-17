<?php

namespace App\Traits\Mail\Users;

trait CommonUserMailSettings
{
    /** String that tells which blade view to render as email body */
    public string $viewToRender;

    /** Flag that controls if header has to be shown in the email? */
    public bool $showHeader = true;

    /** Flag that controls if footer has to be shown in the email? */
    public bool $showFooter = true;
}
