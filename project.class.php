<?php
define('DEFAULT_PROJECT_NAME', 'demo');
define('PROJECT_FILE', '\project.manifest');
define('KEY_PROJECT_NAME', 'name');
define('KEY_PROJECT_CASES', 'cases');
define('KEY_PROJECT_DEFAULTSETTINGS', 'defaultSettings');

class Console {
    public static function show($text) {
        //todo: 显示text的内容
    }
}
class Project {
    private $path = '';
    public $name = DEFAULT_PROJECT_NAME;
    public $defaultSettings = array();
    private $cases = array();
    private $console = null;
    private function readProject() {
        return array();//todo: 从路径中读取project描述文件
    }

    private function readCase($caseFile) {
        return array();//todo: 从路径中读取project描述文件
    }

    public function load($path) {
        $this->path = $path;
        $prj = $this->readProject();
        isset($prj[KEY_PROJECT_NAME]) ? $this->name = $prj[KEY_PROJECT_NAME] : $this->name = DEFAULT_PROJECT_NAME;
        $this->defultSettings = $prj[KEY_PROJECT_DEFAULTSETTINGS];
        $this->name = $prj[KEY_PROJECT_NAME];
        $this->cases = array();
        if (!empty($prj[KEY_PROJECT_CASES])) foreach ($prj[KEY_PROJECT_CASES] as $caseFile) {
            $this->cases[] = $this->readCase($caseFile);
        }
        $this->defaultSettings = $prj[KEY_PROJECT_DEFAULTSETTINGS];
    }
    public function run() {
        Console::show('开始运行测试项目"'.$this->name.'"');
        $pass = 0;
        $error = 0;
        foreach($this->cases as $testCase) {
            $this->runCase($testCase) ? $pass ++ : $error ++;
        }
        Console::show('"' . $this->name . '"测试结束(total:' . count($this->cases) . '\t pass:' . $pass . '\t error:' . $error);
    }
}
class TestCase {
/*
 *  public $def = array();
    public function start(){
        $obj = new api();
        $obj.load($this, json)
    $obj.run();
    };
    */
}
/*
class api
{
    public function load(parent, json){
        $this->parent = parent;
        this->host = this->parent->host

    $this->type = json.type;
    $this->name = json.name;
    $this->params = json.params;
    $this->command = json.command;
    $this->assert = json.assert;
    $this->result = null;

  }
    public function run(){
        $_name = "$****->";
        if (_name == "this")
        else
            this->parent.def[_name]

    $_right = $this->{"params['id']"};
    $_right =  ${$this->assert[0][1]};
    if( == ${$this->assert[0][2]}) {
        case.show(assert[0][3])
    }

  }
}
*/