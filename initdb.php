<?php
    if ($db = new SQLite3(:memory:)) {

        $query = @$db->query('CREATE TABLE IF NOT EXISTS roomlist (
			id int PRIMARY KEY, 
			room text)');

        $query = @$db->query('CREATE TABLE IF NOT EXISTS hostlist (
			id int PRIMARY KEY, 
			ip text UNIQUE NOT NULL, 
			hostname text, 
			room text, 
			state text CHECK(state IN ("on", "off")), 
			os text CHECK(os IN ("win", "lin")))');
    }
?>
