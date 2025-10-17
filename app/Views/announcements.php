<!DOCTYPE html>
<html>
<head>
    <title>Announcements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4 text-center">Announcements</h2>

    <?php if (!empty($announcements)): ?>
        <?php foreach ($announcements as $a): ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h4><?= esc($a['title']) ?></h4>
                    <p><?= esc($a['content']) ?></p>
                    <small class="text-muted">Posted on <?= esc($a['created_at']) ?></small>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">No announcements available.</p>
    <?php endif; ?>
</div>
</body>
</html>
