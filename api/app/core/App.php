<?php

class App
{

	protected $uri;

	protected $method;

	protected $controller;

	protected $params = [];

	function __construct()
	{
		$this->method = $this->getMethod($_SERVER['REQUEST_METHOD']);
		
		$this->url = $this->parseUrl();

		$this->controller = $this->getController();

		$this->params = $this->getParams();

		call_user_func([$this->controller, $this->method], $this->params);
	}

	public function parseUrl()
    {
        	parse_str($_SERVER['QUERY_STRING'], $array);
        	return $array;
    }

	public function getController()
	{
		if(file_exists('../app/Controllers/' . $this->url['url'] . '.php'))
		{
			$this->controller = $this->url['url'];
			unset($this->url['url']);
			require_once('../app/Controllers/' . $this->controller . '.php');
			$this->controller = new $this->controller;
			return $this->controller;
		}

	}

	public function getMethod($request)
	{
		switch ($request)
		{
			case 'GET':
				$this->method = 'index';
				break;
			case 'POST':
				$this->method = 'create';
				break;
			case 'PUT':
				$this->method = 'update';
				break;
			case 'DELTE':
				$this->method = 'delete';
				break;
			default:
				echo 'Error';
		}

		return $this->method;
	}	

	public function getParams()
	{
		$this->params = $this->url;
		return $this->params;
	}

}