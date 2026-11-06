<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Monster $monster */
/** @var string $heading */

$biomes = ['Forest', 'Crypt', 'Caves', 'Mountains', 'Swamp'];
$action = $monster->id === null
    ? $link->url('monster.add')
    : $link->url('monster.edit', ['id' => $monster->id]);
?>
<p class="breadcrumb"><a href="<?= $link->url('monster.index') ?>">My worlds</a> / Elmoria</p>

<div class="page-head">
    <h1><?= e($heading) ?></h1>
</div>

<form class="entity-form" method="post" action="<?= $action ?>">
    <div class="field">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" maxlength="100" required value="<?= e($monster->name ?? '') ?>">
    </div>
    <div class="field">
        <label for="biome">Biome</label>
        <select id="biome" name="biome" required>
            <?php foreach ($biomes as $biome) { ?>
                <option value="<?= $biome ?>"<?= $monster->biome === $biome ? ' selected' : '' ?>><?= $biome ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="field">
        <label for="danger">Danger (1-10)</label>
        <input id="danger" name="danger" type="number" min="1" max="10" required value="<?= e((string)($monster->danger ?? '')) ?>">
    </div>
    <div class="field">
        <label for="hp">HP</label>
        <input id="hp" name="hp" type="number" min="1" required value="<?= e((string)($monster->hp ?? '')) ?>">
    </div>
    <div class="form-actions">
        <button class="btn" type="submit">Save</button>
        <a class="btn btn-outline" href="<?= $link->url('monster.index') ?>">Cancel</a>
    </div>
</form>
