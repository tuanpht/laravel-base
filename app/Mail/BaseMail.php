<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;

class BaseMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data = [];

    protected $viewName;

    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $viewPath = $this->getLayoutPath($this->viewName);

        $view = View::make($viewPath, $this->data)->renderSections();
        $subject = trim($view['subject']);
        $html = (!isset($view['html']) || trim($view['html']) == false) ? null : new HtmlString($view['html']);
        $text = (!isset($view['text']) || trim($view['text']) == false) ? null : new HtmlString($view['text']);
        $raw = (!isset($view['raw']) || trim($view['raw']) == false) ? null : $view['raw'];

        return $this->subject($subject)->view(compact('html', 'text', 'raw'));
    }

    private function getLayoutPath($layout)
    {
        return 'emails.' . config('app.locale') . '.' . $layout;
    }
}
