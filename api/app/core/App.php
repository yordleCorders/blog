<?php


class App
{

	protected $uri;

	protected $method;

	protected $controller;

	protected $params = [];

	function __construct()
	{
		$this->url = $this->parseUrl();

		$this->controller = $this->getController();

		$this->method = $this->getMethod($_SERVER['REQUEST_METHOD']);

		$this->params = $this->getParams();

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseUrl()
    {
        if(isset($_GET['url']))
        {
            return $this->url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

	public function getController()
	{
		if(file_exists('../app/Controllers/' . $this->url[0] . '.php'))
		{
			$this->controller = $this->url[0];
			unset($this->url[0]);
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
		$this->params = $this->url ? array_values($this->url) :[];
		return $this->params;
	}

}