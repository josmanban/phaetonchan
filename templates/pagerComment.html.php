<?php
$id = $_GET['id'];
$numPaginas = ceil($numComments / $limit);
?>
<? for ($i = 1; $i <= $numPaginas; $i++): ?>
    <a href="topic.php?id=<?php echo $id ?>&page=<?php echo $i ?>" >&nbsp;<?php echo $i ?>&nbsp;</a>
<? endfor; ?>

