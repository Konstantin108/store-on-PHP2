<?php
/** @var \app\models\Good $good */
/** @var \app\models\Good[] $goods */
?>
<form method="post" class="del_block" action="?c=good&a=getDelGood">
    <a href="?c=good&a=one&id=<?= $good->id ?>" class="back">
        <i class="fas fa-arrow-left"></i>
        <p class="back_text">назад</p>
    </a>
    <input name="idForDel" value="<?= $good->id ?>" type="hidden">
    <p class="del_text">Удалить товар?</p>
    <p class="alarm_text">Восстановить данные будет невозможно</p>
    <div class="btn_block">
        <input type="submit" value="удаление" class="del_group_btn">
        <a href="?c=good&a=one&id=<?= $good->id ?>" class="cancel_group_btn">отмена</a>
    </div>
</form>