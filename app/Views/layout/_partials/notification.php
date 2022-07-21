<!-- Primary -->
<?php if (!empty(session()->getFlashdata('primary'))) : ?>
<div class="alert alert-primary alert-dismissible" role="alert">
    This is a primary dismissible alert — check it out!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<!-- Secondary -->
<?php if (!empty(session()->getFlashdata('secondary'))) : ?>
<div class="alert alert-secondary alert-dismissible" role="alert">
    This is a secondary dismissible alert — check it out!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<!-- Success -->
<?php if (!empty(session()->getFlashdata('success'))) : ?>
<div class="alert alert-success alert-dismissible" role="alert">
    This is a success dismissible alert — check it out!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<!-- Danger -->
<?php if (!empty(session()->getFlashdata('danger'))) : ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    This is a danger dismissible alert — check it out!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<!-- Warning -->
<?php if (!empty(session()->getFlashdata('warning'))) : ?>
<div class="alert alert-warning alert-dismissible" role="alert">
    This is a warning dismissible alert — check it out!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<!-- Info -->
<?php if (!empty(session()->getFlashdata('info'))) : ?>
<div class="alert alert-info alert-dismissible" role="alert">
    This is an info dismissible alert — check it out!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<!-- Dark -->
<?php if (!empty(session()->getFlashdata('dark'))) : ?>
<div class="alert alert-dark alert-dismissible mb-0" role="alert">
    This is a dark dismissible alert — check it out!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>