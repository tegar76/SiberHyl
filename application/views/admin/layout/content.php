<?php
if ($content) {
	$this->load->view($content);
} elseif ($content == null) {
	show_404();
}
