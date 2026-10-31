<?php

/** @var \Framework\Support\LinkGenerator $link */
?>
<p class="breadcrumb"><a href="<?= $link->url('monster.index') ?>">My worlds</a> / Elmoria</p>

<div class="page-head">
    <h1>Elmoria &middot; monsters</h1>
    <a class="btn" href="#">+ Add monster</a>
</div>

<form class="toolbar" action="#" onsubmit="return false">
    <div class="field">
        <label for="biome">Biome</label>
        <select id="biome" name="biome">
            <option>All biomes</option>
            <option>Forest</option>
            <option>Crypt</option>
            <option>Caves</option>
            <option>Mountains</option>
        </select>
    </div>
    <div class="field">
        <label for="search">Search by name</label>
        <input id="search" name="search" type="search" placeholder="e.g. dragon">
    </div>
    <p class="result-count">Found: 5</p>
</form>

<section aria-label="Monster list">
    <table>
        <thead>
            <tr><th class="col-image">Image</th><th>Name</th><th>Biome</th><th>Danger</th><th>HP</th><th>Actions</th></tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-image" data-label="Image"><span class="thumb"></span></td>
                <td data-label="Name">Goblin Scout</td>
                <td data-label="Biome">Forest</td>
                <td data-label="Danger" class="danger-low">1 / 10</td>
                <td data-label="HP">7</td>
                <td data-label="Actions"><div class="actions"><a class="btn btn-outline btn-small" href="#">Edit</a><button class="btn btn-danger btn-small" type="button">Delete</button></div></td>
            </tr>
            <tr>
                <td class="col-image" data-label="Image"><span class="thumb"></span></td>
                <td data-label="Name">Skeleton Archer</td>
                <td data-label="Biome">Crypt</td>
                <td data-label="Danger" class="danger-low">2 / 10</td>
                <td data-label="HP">13</td>
                <td data-label="Actions"><div class="actions"><a class="btn btn-outline btn-small" href="#">Edit</a><button class="btn btn-danger btn-small" type="button">Delete</button></div></td>
            </tr>
            <tr>
                <td class="col-image" data-label="Image"><span class="thumb"></span></td>
                <td data-label="Name">Dire Wolf</td>
                <td data-label="Biome">Forest</td>
                <td data-label="Danger" class="danger-low">3 / 10</td>
                <td data-label="HP">37</td>
                <td data-label="Actions"><div class="actions"><a class="btn btn-outline btn-small" href="#">Edit</a><button class="btn btn-danger btn-small" type="button">Delete</button></div></td>
            </tr>
            <tr>
                <td class="col-image" data-label="Image"><span class="thumb"></span></td>
                <td data-label="Name">Cave Troll</td>
                <td data-label="Biome">Caves</td>
                <td data-label="Danger" class="danger-mid">6 / 10</td>
                <td data-label="HP">84</td>
                <td data-label="Actions"><div class="actions"><a class="btn btn-outline btn-small" href="#">Edit</a><button class="btn btn-danger btn-small" type="button">Delete</button></div></td>
            </tr>
            <tr>
                <td class="col-image" data-label="Image"><span class="thumb"></span></td>
                <td data-label="Name">Red Dragon</td>
                <td data-label="Biome">Mountains</td>
                <td data-label="Danger" class="danger-high">9 / 10</td>
                <td data-label="HP">200</td>
                <td data-label="Actions"><div class="actions"><a class="btn btn-outline btn-small" href="#">Edit</a><button class="btn btn-danger btn-small" type="button">Delete</button></div></td>
            </tr>
        </tbody>
    </table>
</section>

<nav class="pagination" aria-label="Pagination">
    <a href="#">&lsaquo;</a>
    <a href="#" aria-current="page">1</a>
    <a href="#">2</a>
    <a href="#">&rsaquo;</a>
</nav>
