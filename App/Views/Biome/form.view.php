<?php

/** @var \Framework\Support\LinkGenerator $link */
/** @var \App\Models\Biome $biome */
/** @var string $heading */

$action = $biome->id === null
    ? $link->url('biome.add')
    : $link->url('biome.edit', ['id' => $biome->id]);
?>
<p class="breadcrumb"><a href="<?= $link->url('biome.index') ?>">Biomes</a> / Elmoria</p>

<div class="page-head">
    <h1><?= e($heading) ?></h1>
</div>

<form class="entity-form" method="post" action="<?= $action ?>">
    <div class="field">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" maxlength="100" required value="<?= e($biome->name ?? '') ?>">
    </div>
    <div class="field">
        <label for="climate">Climate</label>
        <input id="climate" name="climate" type="text" maxlength="50" required value="<?= e($biome->climate ?? '') ?>">
    </div>
    <div class="field">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" required><?= e($biome->description ?? '') ?></textarea>
    </div>
    <div class="form-actions">
        <button class="btn" type="submit">Save</button>
        <a class="btn btn-outline" href="<?= $link->url('biome.index') ?>">Cancel</a>
    </div>
</form>
