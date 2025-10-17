<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="text-center">
  <h1 class="text-success">Welcome, <?= session()->get('username') ?>!</h1>
  <p>You are logged in as <b><?= session()->get('role') ?></b></p>
  <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
</div>

<?php $role = session()->get('role'); ?>

<?php if ($role === 'admin'): ?>
  <div class="mt-4">
    <h3>Admin Panel</h3>
    <p class="text-muted">Quick links</p>
    <a class="btn btn-primary" href="<?= base_url('admin/announcements') ?>">Manage Announcements</a>
  </div>
<?php elseif ($role === 'teacher'): ?>
  <div class="mt-4">
    <h3>Teacher Dashboard</h3>
    <div class="alert alert-info">No teacher-specific features yet.</div>
  </div>
<?php else: ?>
  <div class="mt-4">
    <h3>Student Dashboard</h3>
    <h5 class="mt-3">Announcements</h5>
    <?php if (!empty($announcements)): ?>
      <?php foreach ($announcements as $a): ?>
        <div class="card mb-3">
          <div class="card-body">
            <h6 class="card-title mb-1"><?= esc($a['title']) ?></h6>
            <small class="text-muted d-block mb-2"><?= esc($a['created_at']) ?></small>
            <p class="card-text mb-0"><?= esc($a['content']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-muted">No announcements available.</p>
    <?php endif; ?>
  </div>
<?php endif; ?>

<?= $this->endSection() ?>
