<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Announcements</h3>
  <a class="btn btn-primary" href="<?= base_url('admin/announcements/create') ?>">New Announcement</a>
  </div>

<?php if (!empty($announcements)): ?>
  <div class="list-group">
  <?php foreach ($announcements as $a): ?>
    <div class="list-group-item">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h5 class="mb-1"><?= esc($a['title']) ?></h5>
          <small class="text-muted"><?= esc($a['created_at']) ?></small>
        </div>
        <div>
          <a class="btn btn-sm btn-outline-secondary" href="<?= base_url('admin/announcements/edit/' . $a['id']) ?>">Edit</a>
          <form method="post" action="<?= base_url('admin/announcements/delete/' . $a['id']) ?>" class="d-inline" onsubmit="return confirm('Delete this announcement?')">
            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
          </form>
        </div>
      </div>
      <p class="mb-0 mt-2"><?= esc($a['content']) ?></p>
    </div>
  <?php endforeach; ?>
  </div>
<?php else: ?>
  <p>No announcements yet.</p>
<?php endif; ?>

<?= $this->endSection() ?>


