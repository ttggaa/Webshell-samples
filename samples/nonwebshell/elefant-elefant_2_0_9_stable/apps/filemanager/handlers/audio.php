<?php

/**
 * Embeds an audio player.
 *
 * Used by the file manager in the WYSIWYG editor when it recognizes an MP3
 * audio file being embedded.
 *
 * In PHP code, call it like this:
 *
 *     echo $this->run ('filemanager/audio', array ('file' => 'my-song.mp3'));
 *
 * In a template, call it like this:
 *
 *     {! filemanager/audio?file=my-song.mp3 !}
 *
 * Parameters:
 *
 * - `file` - The MP3 file to play
 *
 * Also available in the dynamic objects menu as "Audio Player (MP3)".
 */

if (! isset (self::$called['filemanager/mediaelement'])) {
	echo $this->run ('filemanager/mediaelement');
}

$data['div'] = preg_replace ('/[^a-zA-Z0-9-]+/', '-', trim ($data['file'], '/'));

// rewrite if proxy is set
if ($appconf['General']['proxy_handler']) {
	$data['file'] = str_replace ('/files/', '/filemanager/proxy/', $data['file']);
}

echo $tpl->render ('filemanager/audio', $data);
