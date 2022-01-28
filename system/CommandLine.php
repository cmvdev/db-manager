<?php

namespace system;

/**
 * Created Marvin Vounkeng
 * Date: 28.09.21
 * Time: 13:05
 */
class CommandLine
{

    /**
     * Command interpreter
     * @param $argv : Command input argument
     */
    public static function run($argv)
    {
        
        (new self)->outputMessage('Error', 'Command argument' . $argv[1] . 'not fund');

        if ($argv[1] == 'create') {
            if ($argv[2] == 'module') {
                (new self)->createModule($argv[3]);
            } else
                (new self)->createComponent($argv[2], $argv[3]);
        } else {
            (new self)->outputMessage('Error', 'Command argument' . $argv[1] . 'not fund');
        }
        
    }

    /**
     * Create a new component like (controller, model or view)
     * @param $componentType : Type of the component
     * @param $componentName : Name of the component
     * @return bool
     */
    private function createComponent($componentType, $componentName)
    {
        $className = ucfirst($componentName) . ucfirst($componentType);
        $filename = $className;
        $result = false;
        $txt = '';
        $directory = null;

        switch ($componentType) {
            case 'controller' :
                $directory = 'controllers';
                $txt = "<?php\nclass " . $className . " extends " . addslashes("\\system\\") . ucfirst($componentType) . " \n{";
                $txt .= "\n\tpublic function index()\n\t{\n\t\t//\$this->view->title = '" . $componentName . "';\n\t\t//\$this->view->render('views/index.php');\n\t}";
                $txt .= "\n}\n?>";
                $filename = $className;
                $result = true;
                break;
            case 'model' :
                $directory = 'models';
                $txt = "<?php\nclass " . $className . " extends " . addslashes("\\system\\") . ucfirst($componentType) . " \n{";
                $txt .=
                    "\tpublic  function __construct()\n\t{\n\t\tparent::__construct(); \n\t}";
                $txt .= "\n}\n?>";
                $filename = $className;
                $result = true;
                break;
            case 'view' :
                $directory = 'views/' . $componentName;
                $filename = 'index';
                $txt = "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n\t<meta charset=\"UTF-8\">\n\t<title><?=\$this->title?></title>\n</head>\n<body>\n\n</body>\n</html>";
                $result = true;
                break;
            default:
                $this->outputMessage('Error', $componentType . ' ' . $componentName . ' cant not be create');
        }

        if ($this->addFile($filename . '.php', $txt, $directory)) {
            $this->outputMessage('Success', $componentType . ' ' . $componentName . ' was created');
        }


        return $result;

    }

    /**
     * Create a new module
     * @param string $moduleName : name of the module
     */
    private function createModule($moduleName)
    {
        $this->outputMessage(PHP_EOL . '-' . 'Start', 'create Module ' . $moduleName);

        if ($this->createComponent('controller', $moduleName)) {
            if ($this->createComponent('model', $moduleName)) {
                if ($this->createComponent('view', $moduleName)) {
                    $this->outputMessage('-Success', 'create Module ' . $moduleName . PHP_EOL);
                }
            }
        }

    }

    /**
     * @param $context : message context
     * @param string $message : message
     */
    private function outputMessage($context, $message)
    {
        print_r($context . ' : ' . $message . PHP_EOL);
    }

    /**
     * Check if file exist im project
     * @param string $fileName
     * @param bool $caseSensitive
     * @return bool
     */
    private function fileExists($fileName, $caseSensitive = true)
    {
        if (file_exists($fileName)) {
            return $fileName;
        }
        if ($caseSensitive) return false;

        // Handle case insensitive requests
        $directoryName = dirname($fileName);
        $fileArray = glob($directoryName . '/*', GLOB_NOSORT);
        $fileNameLowerCase = strtolower($fileName);
        foreach ($fileArray as $file) {
            if (strtolower($file) == $fileNameLowerCase) {
                return $file;
            }
        }
        return false;
    }

    /**
     * Add new file ans directory
     * @param string $fileName : file name
     * @param string $content : file content as text
     * @param string $directory : file directory
     * @return bool
     */
    private function addFile($fileName, $content, $directory = null)
    {
        if (!$this->fileExists($directory . '/' . $fileName)) {
            try {
                if (!empty($directory) && $directory !== '/') {
                    if (!$this->fileExists($directory)) {
                        if (!mkdir($directory)) {
                            die('Folder ' . $directory . ' cant not be create');
                        }
                    }
                    $fileName = $directory . '/' . $fileName;

                }
                $file = fopen($fileName, "w") or die("Unable to open file!");
                $data = stripslashes($content);
                fwrite($file, $data);
                fclose($file);
                return true;

            } catch (Exception $e) {
                $this->outputMessage('Error', 'create Module' . $e->getMessage() . PHP_EOL);
                return false;

            }
        } else {
            $this->outputMessage('Warning', 'File ' . $fileName . ' allready exsit in ' . $directory . PHP_EOL);
            return false;
        }


    }


}

