<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<h3>Create Announcement</h3>

<form method="post">
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Content</label>
    <textarea name="content" class="form-control" rows="5" required></textarea>
  </div>
  <button class="btn btn-primary" type="submit">Save</button>
  <a class="btn btn-secondary" href="<?= base_url('admin/announcements') ?>">Cancel</a>
  </form>

<?= $this->endSection() ?>


