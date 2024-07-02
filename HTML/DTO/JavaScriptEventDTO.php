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
class JavaScriptEventDTO
{
	// Form
	public string $onblur			/** @property Fires-the-moment-that-the-element-loses-focus */;
	public string $onchange			/** @property Fires-the-moment-when-the-value-of-the-element-is-changed */;
	public string $oncontextmenu	/** @property Script-to-be-run-when-a-context-menu-is-triggered */;
	public string $onfocus			/** @property Fires-the-moment-when-the-element-gets-focus */;
	public string $oninput			/** @property Script-to-be-run-when-an-element-gets-user-input */;
	public string $oninvalid		/** @property Script-to-be-run-when-an-element-is-invalid */;
	public string $onreset			/** @property Fires-when-the-Reset-button-in-a-form-is-clicked */;
	public string $onsearch			/** @property Fires-when-the-user-writes-something-in-a-search-field-(for-<input="search">) */;
	public string $onselect			/** @property Fires-after-some-text-has-been-selected-in-an-element */;
	public string $onsubmit			/** @property Fires-when-a-form-is-submitted */;
	// Keyboard
	public string $onkeydown		/** @property Fires-when-a-user-is-pressing-a-key */;
	public string $onkeypress		/** @property Fires-when-a-user-presses-a-key */;
	public string $onkeyup			/** @property Fires-when-a-user-releases-a-key */;
	// Mouse
	public string $onclick			/** @property Fires-on-a-mouse-click-on-the-element */;
	public string $ondblclick		/** @property Fires-on-a-mouse-double-click-on-the-element */;
	public string $onmousedown		/** @property Fires-when-a-mouse-button-is-pressed-down-on-an-element */;
	public string $onmousemove		/** @property Fires-when-the-mouse-pointer-is-moving-while-it-is-over-an-element */;
	public string $onmouseout		/** @property Fires-when-the-mouse-pointer-moves-out-of-an-element */;
	public string $onmouseover		/** @property Fires-when-the-mouse-pointer-moves-over-an-element */;
	public string $onmouseup		/** @property Fires-when-a-mouse-button-is-released-over-an-element */;
	public string $onmousewheel		/** @property Deprecated.-Use-the-onwheel-attribute-instead */;
	public string $onwheel			/** @property Fires-when-the-mouse-wheel-rolls-up-or-down-over-an-element */;
	// Drag
	public string $ondrag			/** @property Script-to-be-run-when-an-element-is-dragged */;
	public string $ondragend		/** @property Script-to-be-run-at-the-end-of-a-drag-operation */;
	public string $ondragenter		/** @property Script-to-be-run-when-an-element-has-been-dragged-to-a-valid-drop-target */;
	public string $ondragleave		/** @property Script-to-be-run-when-an-element-leaves-a-valid-drop-target */;
	public string $ondragover		/** @property Script-to-be-run-when-an-element-is-being-dragged-over-a-valid-drop-target */;
	public string $ondragstart		/** @property Script-to-be-run-at-the-start-of-a-drag-operation */;
	public string $ondrop			/** @property Script-to-be-run-when-dragged-element-is-being-dropped */;
	public string $onscroll			/** @property Script-to-be-run-when-an-element's-scrollbar-is-being-scrolled */;
	// Clipboard
	public string $oncopy			/** @property Fires-when-the-user-copies-the-content-of-an-element */;
	public string $oncut			/** @property Fires-when-the-user-cuts-the-content-of-an-element */;
	public string $onpaste			/** @property Fires-when-the-user-pastes-some-content-in-an-element */;
	// Media
	public string $onabort			/** @property Script-to-be-run-on-abort */;
	public string $oncanplay		/** @property Script-to-be-run-when-a-file-is-ready-to-start-playing-(when-it-has-buffered-enough-to-begin) */;
	public string $oncanplaythrough	/** @property Script-to-be-run-when-a-file-can-be-played-all-the-way-to-the-end-without-pausing-for-buffering */;
	public string $oncuechange		/** @property Script-to-be-run-when-the-cue-changes-in-a-<track>-element */;
	public string $ondurationchange	/** @property Script-to-be-run-when-the-length-of-the-media-changes */;
	public string $onemptied		/** @property Script-to-be-run-when-something-bad-happens-and-the-file-is-suddenly-unavailable-(like-unexpectedly-disconnects) */;
	public string $onended			/** @property Script-to-be-run-when-the-media-has-reach-the-end-(a-useful-event-for-messages-like-"thanks-for-listening") */;
	public string $onerror			/** @property Script-to-be-run-when-an-error-occurs-when-the-file-is-being-loaded */;
	public string $onloadeddata		/** @property Script-to-be-run-when-media-data-is-loaded */;
	public string $onloadedmetadata	/** @property Script-to-be-run-when-meta-data-(like-dimensions-and-duration)-are-loaded */;
	public string $onloadstart		/** @property Script-to-be-run-just-as-the-file-begins-to-load-before-anything-is-actually-loaded */;
	public string $onpause			/** @property Script-to-be-run-when-the-media-is-paused-either-by-the-user-or-programmatically */;
	public string $onplay			/** @property Script-to-be-run-when-the-media-is-ready-to-start-playing */;
	public string $onplaying		/** @property Script-to-be-run-when-the-media-actually-has-started-playing */;
	public string $onprogress		/** @property Script-to-be-run-when-the-browser-is-in-the-process-of-getting-the-media-data */;
	public string $onratechange		/** @property Script-to-be-run-each-time-the-playback-rate-changes-(like-when-a-user-switches-to-a-slow-motion-or-fast-forward-mode) */;
	public string $onseeked			/** @property Script-to-be-run-when-the-seeking-attribute-is-set-to-false-indicating-that-seeking-has-ended */;
	public string $onseeking		/** @property Script-to-be-run-when-the-seeking-attribute-is-set-to-true-indicating-that-seeking-is-active */;
	public string $onstalled		/** @property Script-to-be-run-when-the-browser-is-unable-to-fetch-the-media-data-for-whatever-reason */;
	public string $onsuspend		/** @property Script-to-be-run-when-fetching-the-media-data-is-stopped-before-it-is-completely-loaded-for-whatever-reason */;
	public string $ontimeupdate		/** @property Script-to-be-run-when-the-playing-position-has-changed-(like-when-the-user-fast-forwards-to-a-different-point-in-the-media) */;
	public string $onvolumechange	/** @property Script-to-be-run-each-time-the-volume-is-changed-which-(includes-setting-the-volume-to-"mute") */;
	public string $onwaiting		/** @property Script-to-be-run-when-the-media-has-paused-but-is-expected-to-resume-(like-when-the-media-pauses-to-buffer-more-data) */;
	// Misc
	public string $ontoggle			/** @property Fires-when-the-user-opens-or-closes-the-<details>-element */;

	public function mapEvents(array|null $events = null): void
	{
		// Form
		if (isset($events['onblur'])) { $this->onblur = $events['onblur']; }
		if (isset($events['onchange'])) { $this->onchange = $events['onchange']; }
		if (isset($events['oncontextmenu'])) { $this->oncontextmenu = $events['oncontextmenu']; }
		if (isset($events['onfocus'])) { $this->onfocus = $events['onfocus']; }
		if (isset($events['oninput'])) { $this->oninput = $events['oninput']; }
		if (isset($events['oninvalid'])) { $this->oninvalid = $events['oninvalid']; }
		if (isset($events['onreset'])) { $this->onreset = $events['onreset']; }
		if (isset($events['onsearch'])) { $this->onsearch = $events['onsearch']; }
		if (isset($events['onselect'])) { $this->onselect = $events['onselect']; }
		if (isset($events['onsubmit'])) { $this->onsubmit = $events['onsubmit']; }
		// Keyboard
		if (isset($events['onkeydown'])) { $this->onkeydown = $events['onkeydown']; }
		if (isset($events['onkeypress'])) { $this->onkeypress = $events['onkeypress']; }
		if (isset($events['onkeyup'])) { $this->onkeyup = $events['onkeyup']; }
		// Mouse
		if (isset($events['onclick'])) { $this->onclick = $events['onclick']; }
		if (isset($events['ondblclick'])) { $this->ondblclick = $events['ondblclick']; }
		if (isset($events['onmousedown'])) { $this->onmousedown = $events['onmousedown']; }
		if (isset($events['onmousemove'])) { $this->onmousemove = $events['onmousemove']; }
		if (isset($events['onmouseout'])) { $this->onmouseout = $events['onmouseout']; }
		if (isset($events['onmouseover'])) { $this->onmouseover = $events['onmouseover']; }
		if (isset($events['onmouseup'])) { $this->onmouseup = $events['onmouseup']; }
		if (isset($events['onmousewheel'])) { $this->onmousewheel = $events['onmousewheel']; }
		if (isset($events['onwheel'])) { $this->onwheel = $events['onwheel']; }
		// Drag
		if (isset($events['ondrag'])) { $this->ondrag = $events['ondrag']; }
		if (isset($events['ondragend'])) { $this->ondragend = $events['ondragend']; }
		if (isset($events['ondragenter'])) { $this->ondragenter = $events['ondragenter']; }
		if (isset($events['ondragleave'])) { $this->ondragleave = $events['ondragleave']; }
		if (isset($events['ondragover'])) { $this->ondragover = $events['ondragover']; }
		if (isset($events['ondragstart'])) { $this->ondragstart = $events['ondragstart']; }
		if (isset($events['ondrop'])) { $this->ondrop = $events['ondrop']; }
		if (isset($events['onscroll'])) { $this->onscroll = $events['onscroll']; }
		// Clipboard
		if (isset($events['oncopy'])) { $this->oncopy = $events['oncopy']; }
		if (isset($events['oncut'])) { $this->oncut = $events['oncut']; }
		if (isset($events['onpaste'])) { $this->onpaste = $events['onpaste']; }
		// Media
		if (isset($events['onabort'])) { $this->onabort = $events['onabort']; }
		if (isset($events['oncanplay'])) { $this->oncanplay = $events['oncanplay']; }
		if (isset($events['oncanplaythrough'])) { $this->oncanplaythrough = $events['oncanplaythrough']; }
		if (isset($events['oncuechange'])) { $this->oncuechange = $events['oncuechange']; }
		if (isset($events['ondurationchange'])) { $this->ondurationchange = $events['ondurationchange']; }
		if (isset($events['onemptied'])) { $this->onemptied = $events['onemptied']; }
		if (isset($events['onended'])) { $this->onended = $events['onended']; }
		if (isset($events['onerror'])) { $this->onerror = $events['onerror']; }
		if (isset($events['onloadeddata'])) { $this->onloadeddata = $events['onloadeddata']; }
		if (isset($events['onloadedmetadata'])) { $this->onloadedmetadata = $events['onloadedmetadata']; }
		if (isset($events['onloadstart'])) { $this->onloadstart = $events['onloadstart']; }
		if (isset($events['onpause'])) { $this->onpause = $events['onpause']; }
		if (isset($events['onplay'])) { $this->onplay = $events['onplay']; }
		if (isset($events['onplaying'])) { $this->onplaying = $events['onplaying']; }
		if (isset($events['onprogress'])) { $this->onprogress = $events['onprogress']; }
		if (isset($events['onratechange'])) { $this->onratechange = $events['onratechange']; }
		if (isset($events['onseeked'])) { $this->onseeked = $events['onseeked']; }
		if (isset($events['onseeking'])) { $this->onseeking = $events['onseeking']; }
		if (isset($events['onstalled'])) { $this->onstalled = $events['onstalled']; }
		if (isset($events['onsuspend'])) { $this->onsuspend = $events['onsuspend']; }
		if (isset($events['ontimeupdate'])) { $this->ontimeupdate = $events['ontimeupdate']; }
		if (isset($events['onvolumechange'])) { $this->onvolumechange = $events['onvolumechange']; }
		if (isset($events['onwaiting'])) { $this->onwaiting = $events['onwaiting']; }
		// Misc
		if (isset($events['ontoggle'])) { $this->ontoggle = $events['ontoggle']; }
	}
}
?>