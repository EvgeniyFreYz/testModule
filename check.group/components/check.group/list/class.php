<?php
use \Bitrix\Main\Loader;
use \Bitrix\Main\Application;
use Bitrix\Main\LoaderException;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class CheckGroupList extends CBitrixComponent
{
    public function executeComponent() {

        $this->arResult['GROUPS'] = $this->getGroupUsers();

        $this->includeComponentTemplate();

    }

    private function getGroupUsers() {
        $data = [];
        $result = \Bitrix\Main\UserGroupTable::getList(
            [
                'filter' => ['GROUP.ACTIVE' => 'Y','USER.ACTIVE' => 'Y'],
                'select' => ['GROUP_ID','GROUP.NAME','USER.ID'],
                'order' => ['GROUP.C_SORT' => 'ASC'],
            ]
        );
        while ($arGroup = $result->fetch()) {
            $data[$arGroup['GROUP_ID']]['USERS'][] = $arGroup['MAIN_USER_GROUP_USER_ID'];
            $data[$arGroup['GROUP_ID']]['COUNT_USERS']++;

            if(empty($data[$arGroup['GROUP_ID']]['GROUP_NAME'])) {
                $data[$arGroup['GROUP_ID']]['GROUP_NAME'] = $arGroup['MAIN_USER_GROUP_GROUP_NAME'];
            }
        }
        return $data;
    }

}