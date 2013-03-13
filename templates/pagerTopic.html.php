<?php
$idCat = $_GET['idCat'];
$numPaginas = ceil($numTopics / $limit);
?>
<? for ($i = 1; $i <= $numPaginas; $i++): ?>
    <a href="topicPerCategory.php?idCat=<?php echo $idCat ?>&page=<?php echo $i ?>" >&nbsp;<?php echo $i ?>&nbsp;</a>
<? endfor; ?>
