<?php
require_once 'auth.php';

// Handle Delete
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    $pdo->prepare("DELETE FROM stats_counter WHERE id = ?")->execute([$id]);
    header("Location: stats.php");
    exit;
}

// Handle Add / Edit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_stat'])) {
    $title = $_POST['title'];
    $value = $_POST['value'];
    $sort_order = (int)$_POST['sort_order'];
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    
    if ($id > 0) {
        $stmt = $pdo->prepare("UPDATE stats_counter SET title = ?, value = ?, sort_order = ? WHERE id = ?");
        $stmt->execute([$title, $value, $sort_order, $id]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO stats_counter (title, value, sort_order) VALUES (?, ?, ?)");
        $stmt->execute([$title, $value, $sort_order]);
    }
    header("Location: stats.php");
    exit;
}

$stats = $pdo->query("SELECT * FROM stats_counter ORDER BY sort_order ASC, id ASC")->fetchAll();

require_once 'header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Statistics Counter</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#statModal" onclick="document.getElementById('stat_id').value=''; document.getElementById('statForm').reset();" style="background-color: #0b2c4d; border-color: #0b2c4d;">+ Add New Stat</button>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title (e.g., Courses)</th>
                    <th>Value (e.g., 51)</th>
                    <th>Sort Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stats as $stat): ?>
                <tr>
                    <td><?php echo htmlspecialchars($stat['title']); ?></td>
                    <td><h4 class="mb-0 text-primary"><b><?php echo htmlspecialchars($stat['value']); ?></b></h4></td>
                    <td><?php echo $stat['sort_order']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-info text-white" onclick="editStat(<?php echo htmlspecialchars(json_encode($stat)); ?>)"><i class="fas fa-edit"></i></button>
                        <a href="stats.php?delete_id=<?php echo $stat['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this stat?');"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="statModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" id="statForm">
      <input type="hidden" name="id" id="stat_id" value="">
      <div class="modal-header">
        <h5 class="modal-title">Statistic Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Title (Label below number)</label>
            <input type="text" name="title" id="stat_title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Value (The Number, e.g., 3,000+)</label>
            <input type="text" name="value" id="stat_value" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Sort Order</label>
            <input type="number" name="sort_order" id="stat_sort_order" class="form-control" value="0">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="save_stat" class="btn btn-primary" style="background-color: #0b2c4d;">Save Stat</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
function editStat(data) {
    document.getElementById('stat_id').value = data.id;
    document.getElementById('stat_title').value = data.title;
    document.getElementById('stat_value').value = data.value;
    document.getElementById('stat_sort_order').value = data.sort_order;
    
    var myModal = new bootstrap.Modal(document.getElementById('statModal'));
    myModal.show();
}
</script>

<?php require_once 'footer.php'; ?>
