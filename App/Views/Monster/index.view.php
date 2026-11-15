<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Monster[] $monsters */
?>
<p class="breadcrumb"><a href="<?= $link->url('monster.index') ?>">My worlds</a> / Elmoria</p>

<div class="page-head">
    <h1>Elmoria &middot; monsters</h1>
    <a class="btn" href="<?= $link->url('monster.add') ?>">+ Add monster</a>
</div>

<p class="result-count">Found: <?= count($monsters) ?></p>

<section aria-label="Monster list">
    <?php if (count($monsters) === 0) { ?>
        <p>There are no monsters yet.</p>
    <?php } else { ?>
        <table>
            <thead>
                <tr><th>Name</th><th>Biome</th><th>Danger</th><th>HP</th><th>Actions</th></tr>
            </thead>
            <tbody>
                <?php foreach ($monsters as $monster) { ?>
                    <?php $dangerClass = $monster->danger >= 7 ? 'danger-high' : ($monster->danger >= 4 ? 'danger-mid' : 'danger-low'); ?>
                    <tr>
                        <td data-label="Name"><?= e($monster->name) ?></td>
                        <td data-label="Biome"><?php $biome = $monster->getBiome(); ?><?= $biome !== null ? e($biome->name) : '-' ?></td>
                        <td data-label="Danger" class="<?= $dangerClass ?>"><?= (int)$monster->danger ?> / 10</td>
                        <td data-label="HP"><?= (int)$monster->hp ?></td>
                        <td data-label="Actions">
                            <div class="actions">
                                <a class="btn btn-outline btn-small" href="<?= $link->url('monster.edit', ['id' => $monster->id]) ?>">Edit</a>
                                <form method="post" action="<?= $link->url('monster.delete') ?>">
                                    <input type="hidden" name="id" value="<?= (int)$monster->id ?>">
                                    <button class="btn btn-danger btn-small" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</section>
