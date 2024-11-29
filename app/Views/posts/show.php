<!DOCTYPE html>
<html>
<head>
    <title><?= esc($post['title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="mb-4">
            <a href="/posts" class="btn btn-secondary">목록으로</a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h1 class="card-title"><?= esc($post['title']) ?></h1>
                <p class="text-muted">
                    작성자: <?= esc($post['username']) ?> | 
                    작성일: <?= date('Y-m-d H:i', strtotime($post['created_at'])) ?>
                </p>
                <div class="card-text">
                    <?= nl2br(esc($post['content'])) ?>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">댓글</h5>
                
                <form action="/comments/create" method="post" class="mb-4">
                    <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                    <div class="mb-3">
                        <textarea class="form-control" name="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">댓글 작성</button>
                </form>

                <?php foreach ($comments as $comment): ?>
                    <div class="border-bottom mb-3 pb-3">
                        <p class="mb-1"><?= nl2br(esc($comment['content'])) ?></p>
                        <small class="text-muted">
                            <?= esc($comment['username']) ?> | 
                            <?= date('Y-m-d H:i', strtotime($comment['created_at'])) ?>
                        </small>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html> 