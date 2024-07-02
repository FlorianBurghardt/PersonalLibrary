<?php
#region usings
namespace de\PersonalLibrary\HTML\DTO;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/07/26
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
class JavaScriptBodyEventDTO
{
	public string $onafterprint		/** @property Script-to-be-run-after-the-document-is-printed */;
	public string $onbeforeprint	/** @property Script-to-be-run-before-the-document-is-printed */;
	public string $onbeforeunload	/** @property Script-to-be-run-when-the-document-is-about-to-be-unloaded */;
	public string $onhashchange		/** @property Script-to-be-run-when-there-has-been-changes-to-the-anchor-part-of-the-a-URL */;
	public string $onload			/** @property Fires-after-the-page-is-finished-loading */;
	public string $onmessage		/** @property Script-to-be-run-when-the-message-is-triggered */;
	public string $onoffline		/** @property Script-to-be-run-when-the-browser-starts-to-work-offline */;
	public string $ononline			/** @property Script-to-be-run-when-the-browser-starts-to-work-online */;
	public string $onpagehide		/** @property Script-to-be-run-when-a-user-navigates-away-from-a-page */;
	public string $onpageshow		/** @property Script-to-be-run-when-a-user-navigates-to-a-page */;
	public string $onpopstate		/** @property Script-to-be-run-when-the-window's-history-changes */;
	public string $onresize			/** @property Fires-when-the-browser-window-is-resized */;
	public string $onstorage		/** @property Script-to-be-run-when-a-Web-Storage-area-is-updated */;
	public string $onunload			/** @property Fires-once-a-page-has-unloaded-(or-the-browser-window-has-been-closed) */;

	public function mapBodyEvents(array|null $events = null): void
	{
		// Body
		if (isset($events['onafterprint'])) { $this->onafterprint = $events['onafterprint']; }
		if (isset($events['onbeforeprint'])) { $this->onbeforeprint = $events['onbeforeprint']; }
		if (isset($events['onbeforeunload'])) { $this->onbeforeunload = $events['onbeforeunload']; }
		if (isset($events['onhashchange'])) { $this->onhashchange = $events['onhashchange']; }
		if (isset($events['onload'])) { $this->onload = $events['onload']; }
		if (isset($events['onmessage'])) { $this->onmessage = $events['onmessage']; }
		if (isset($events['onoffline'])) { $this->onoffline = $events['onoffline']; }
		if (isset($events['ononline'])) { $this->ononline = $events['ononline']; }
		if (isset($events['onpagehide'])) { $this->onpagehide = $events['onpagehide']; }
		if (isset($events['onpageshow'])) { $this->onpageshow = $events['onpageshow']; }
		if (isset($events['onpopstate'])) { $this->onpopstate = $events['onpopstate']; }
		if (isset($events['onresize'])) { $this->onresize = $events['onresize']; }
		if (isset($events['onstorage'])) { $this->onstorage = $events['onstorage']; }
		if (isset($events['onunload'])) { $this->onunload = $events['onunload']; }
	}
}
?>