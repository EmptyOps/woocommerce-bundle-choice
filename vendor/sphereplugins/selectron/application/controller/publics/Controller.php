<?php
namespace sp\selectron\controller\publics;

defined( 'ABSPATH' ) || exit;

abstract class Controller {
	abstract public function hook_render();
	abstract public function js_render($selector,$delay);
}
