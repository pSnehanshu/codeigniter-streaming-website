<?php if (!isset($fn)) $fn = 'jsonpCallback'; ?>
/**/ <?=htmlentities($fn)?>(<?=json_encode(array('markup' => $data))?>);