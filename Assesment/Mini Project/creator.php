<?php

	class Creator
	{
		public $name;
		public $bio;
		public $category;

		public function __construct($name, $bio, $category)
		{
			$this->name = $name;
			$this->bio = $bio;
			$this->category = $category;
		}

		public function renderProfile()
		{
			echo "<h2>Creator Dashboard</h2>";
			echo "<p><strong>Name:</strong> {$this->name}</p>";
			echo "<p><strong>Bio:</strong> {$this->bio}</p>";
			echo "<p><strong>Category:</strong> {$this->category}</p>";
		}
	}

?>