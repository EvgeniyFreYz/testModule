<?

IncludeModuleLangFile(__FILE__);
use \Bitrix\Main\ModuleManager;

if (class_exists('check_group')) return;

Class check_group extends CModule
{

    var $MODULE_ID = "check.group";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $errors;

    function __construct()
    {
        //$arModuleVersion = array();
        $this->MODULE_VERSION = "1.0.0";
        $this->MODULE_VERSION_DATE = "11.10.2021";
        $this->MODULE_NAME = "Кол-во активных пользователей группы";
        $this->MODULE_DESCRIPTION = "Список групп пользователей, в которой есть хотя бы 1 активный пользователь.";
    }

    function DoInstall()
    {
        $this->InstallFiles();
        \Bitrix\Main\ModuleManager::RegisterModule($this->MODULE_ID);
        return true;
    }

    function DoUninstall()
    {
        $this->UnInstallFiles();
        \Bitrix\Main\ModuleManager::UnRegisterModule($this->MODULE_ID);
        return true;
    }

    function InstallDB()
    {
        return true;
    }

    function UnInstallDB()
    {
        return true;
    }

    function InstallEvents()
    {
        return true;
    }

    function UnInstallEvents()
    {
        return true;
    }

    function InstallFiles()
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/local/modules/".$this->MODULE_ID."/components/", $_SERVER["DOCUMENT_ROOT"] . '/local/components/', true, true);
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx("/local/components/" . $this->MODULE_ID);
        return true;
    }
}