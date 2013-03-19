<?php
class Jameen_Alerts_Internal
{
    public $controller;
    public $module;
    public $action;
    public $type;   // info, error, success
    public $message;

    public function __construct($message, $type, $controller, $action, $module) {
        $this->controller = $controller;
        $this->action = $action;
        $this->message = $message;
        $this->type = $type;
        $this->module = $module;

        $session = new Zend_Session_Namespace($module);
        $session->messages[] = clone $this;
    }

    public static function getMessages($request)  {
        $found = array();
        $session = new Zend_Session_Namespace($request->getModuleName());

        if (is_array($session->messages)) {
            $i = 0;
            foreach ($session->messages as $message) {
                if ($message->controller == $request->getControllerName()
                    && $message->action == $request->getActionName()
                    && $message->module == $request->getModuleName()
                )
                {
                    $found[] = $message;
                    unset($session->messages[$i]);
                }

                $i++;
            }
        }

        if (count($found) > 0) {
            return $found;
        }
        else return false;
    }
}
