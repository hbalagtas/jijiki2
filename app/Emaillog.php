<?php

namespace Jijiki;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Events\MessageSending;

class EmailLog extends Model
{
	protected $fillable = ['date', 'from', 'to', 'cc', 'bcc', 'subject', 'body', 'headers', 'attachments'];
	public $timestamps = false;

    /**
     * Handle the event.
     *
     * @param MessageSending $event
     */
    public function handle(MessageSending $event)
    {        
        $message = $event->message;
        $this->create([
        	'date' => date('Y-m-d H:i:s'), 
        	'subject' => $message->getSubject(), 
        	'body' => $message->getBody(),
        	'from' => $this->formatAddressField($message, 'From'),
        	'to' => $this->formatAddressField($message, 'To'),
        ]);
        /*DB::table('email_log')->insert([
            'date' => date('Y-m-d H:i:s'),
            'from' => $this->formatAddressField($message, 'From'),
            'to' => $this->formatAddressField($message, 'To'),
            'cc' => $this->formatAddressField($message, 'Cc'),
            'bcc' => $this->formatAddressField($message, 'Bcc'),
            'subject' => $message->getSubject(),
            'body' => $message->getBody(),
            'headers' => (string)$message->getHeaders(),
            'attachments' => $message->getChildren() ? implode("\n\n", $message->getChildren()) : null,
        ]);*/
    }

    /**
     * Format address strings for sender, to, cc, bcc.
     *
     * @param $message
     * @param $field
     * @return null|string
     */
    function formatAddressField($message, $field)
    {
        $headers = $message->getHeaders();
        if (!$headers->has($field)) {
            return null;
        }
        $mailboxes = $headers->get($field)->getFieldBodyModel();
        $strings = [];
        foreach ($mailboxes as $email => $name) {
            $mailboxStr = $email;
            if (null !== $name) {
                $mailboxStr = $name . ' <' . $mailboxStr . '>';
            }
            $strings[] = $mailboxStr;
        }
        return implode(', ', $strings);
    }
}
