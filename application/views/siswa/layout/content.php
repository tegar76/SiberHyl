<main>
	
<?php
	if ($content) {
		$this->load->view($content);
	} else {
		show_404();
	}

?>
