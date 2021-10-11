<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
* @var CMain $APPLICATION
* @var CUser $USER
* @var CheckGroupList $arResult
 */

?>


<table class="table">
    <thead>
        <tr>
            <th>Группа</th>
            <th>Активных пользователей</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($arResult['GROUPS'] as $index => $item) { ?>
            <tr>
                <td><?=$item['GROUP_NAME']?></td>
                <td><?=$item['COUNT_USERS']?></td>
            </tr>
        <? } ?>
    </tbody>
</table>
