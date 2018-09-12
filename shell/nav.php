<aside>
	<nav>
		<ul>
			<?php
			$parts = json_decode(file_get_contents(sct_blueprints . 'nav.json'));

			foreach ($parts as $part) {
				echo '<li><a href="?part=' . $part->file . '">' . $part->title . '</a>';
			}
			?>
		</ul>
	</nav>
</aside>