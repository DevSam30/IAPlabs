<?php
interface Crud{

	public function save();
	public function readAll();
	public function readUnique();
	public function search();
	public function update();
	public function removeOne();
	public function removeAll();

	//methods added - lab 2

	public function validateForm();
	public function createFormErrorSessions();
}
?>