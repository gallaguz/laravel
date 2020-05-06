@include('menu')

<?php foreach ($news as $item): ?>
    <a href="<?= route('NewsOne', $item['id']) ?>"><?= $item['title'] ?></a><br>
<?php endforeach; ?>

