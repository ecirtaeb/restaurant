<?php
class SessionFilter implements InterceptingFilter {

	function run(Http $http, array $queryFields, array $formFields) {

		$session = new Session();
		$session->start();
		echo("staaaaaaaart !!!");

	}

}