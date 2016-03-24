<?php
namespace MyFramework;

class Core
{
	static protected $_routing = [];
	static protected $url_params = [];
	static private $_render;
	private function routing()

	{
		$explo = explode("/",$_SERVER['REQUEST_URI']);
		$nbr = 0;
		foreach ($explo as $key => $value)
		{
			if ("/".$value === dirname($_SERVER["PHP_SELF"]))
			{
				$nbr = $key;
			}
		}
		if(class_exists(__NAMESPACE__ . '\\' .ucfirst($explo[$nbr + 1])."Controller"))
		{
			self::$_routing = [
			'controller' => $explo[$nbr + 1],
			'action' => $explo[$nbr + 2],
			];
			if (isset($explo[$nbr + 3]))
			{
				$this->param($nbr + 3, count($explo) - 1, $explo);
			}
		}
		else
		{
			self::$_routing = [
			'controller' => 'default',
			'action' => 'default',
			];
		}
	}

	public function param($nbr, $count, $array)
	{
		for ($i = $nbr; $i <= $count; $i++)
		{ 
			array_push(self::$url_params, $array[$i]);
		}
	}

	protected function render($params = [])
	{
		$f = implode(DIRECTORY_SEPARATOR, [(__DIR__), 'views',
		self::$_routing['controller'], self::$_routing['action']]) . '.html';
		if (file_exists($f))
		{
			$c = file_get_contents($f);
			foreach ($params as $k => $v) 
			{
				$c = preg_replace("/\{\{\s*$k\s*\}\}/", $v, $c);
			}
			self::$_render = $c;
		}
		else 
		{
			self::$_render = "Impossible de trouver la vue" . PHP_EOL;
		}

	}

	public function run()
	{
		$this->routing();
		$c = __NAMESPACE__ . '\\' . ucfirst(self::$_routing['controller']) .
		'Controller';
		$o = new $c();
		if (method_exists($o, $a = self::$_routing['action'] . 'Action'))
		{
			$o->$a();
		}
		else
		{
			self::$_render = "Impossible de trouver la methode" . PHP_EOL;
		}
		echo self::$_render;
	}
}
?>