<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Biome[] $biomes */
?>
<p class="breadcrumb"><a href="<?= $link->url('monster.index') ?>">My worlds</a> / Elmoria</p>

<div class="page-head">
    <h1>Elmoria &middot; biomes</h1>
    <a class="btn" href="<?= $link->url('biome.add') ?>">+ Add biome</a>
</div>

<p class="result-count">Found: <?= count($biomes) ?></p>

<section aria-label="Biome list">
    <?php if (count($biomes) === 0) { ?>
        <p>There are no biomes yet.</p>
    <?php } else { ?>
        <table>
            <thead>
                <tr><th>Name</th><th>Climate</th><th>Description</th><th>Monsters</th><th>Actions</th></tr>
            </thead>
            <tbody>
                <?php foreach ($biomes as $biome) { ?>
                    <?php $monsterCount = count($biome->getMonsters()); ?>
                    <tr>
                        <td data-label="Name"><?= e($biome->name) ?></td>
                        <td data-label="Climate"><?= e($biome->climate) ?></td>
                        <td data-label="Description"><?= e($biome->description) ?></td>
                        <td data-label="Monsters"><?= $monsterCount ?></td>
                        <td data-label="Actions">
                            <div class="actions">
                                <a class="btn btn-outline btn-small" href="<?= $link->url('biome.edit', ['id' => $biome->id]) ?>">Edit</a>
                                <?php if ($monsterCount === 0) { ?>
                                    <form method="post" action="<?= $link->url('biome.delete') ?>">
                                        <input type="hidden" name="id" value="<?= (int)$biome->id ?>">
                                        <button class="btn btn-danger btn-small" type="submit">Delete</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</section>
