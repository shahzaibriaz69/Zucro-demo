<?php
// admin_dashboard.php
session_start();
require_once 'db_config.php';

// Route Guard Check
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

// Handling Status Modification Request
if (isset($_GET['action']) && $_GET['action'] === 'update' && isset($_GET['id']) && isset($_GET['status'])) {
    $lead_id = (int) $_GET['id'];
    $new_status = strip_tags($_GET['status']);

    $stmt = $pdo->prepare("UPDATE agency_leads SET status = :status WHERE id = :id");
    $stmt->execute(['status' => $new_status, 'id' => $lead_id]);
    header("Location: admin_dashboard.php");
    exit;
}

// Fetching Current System Leads
$stmt = $pdo->query("SELECT * FROM agency_leads ORDER BY id DESC");
$leads = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zucro Core Panel</title>
    <!-- 🛠️ Main Site Stylesheet Connected -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="dashboard-body" style="margin:0; padding:0;">

    <header class="panel-header">
        <div style="display: flex; align-items: center; gap: 12px;">
            <div class="pulse-indicator"></div>
            <h1 style="font-size: 15px; font-weight: 800; color:#fff; margin: 0; letter-spacing: 0.05em;">ZUCRO EXPERTS
                LEAD CONTROL PANEL</h1>
        </div>
        <div style="display: flex; align-items: center; gap: 16px;">
            <span style="font-size: 12px; color: #94a3b8; font-family: monospace;"><i class="fas fa-user-shield"
                    style="color: #22d3ee; margin-right: 4px;"></i> Operator:
                <?php echo htmlspecialchars($_SESSION['admin_user']); ?>
            </span>
            <a href="admin_logout.php"
                style="background-color: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #f87171; font-size: 11px; font-weight: 700; padding: 6px 12px; border-radius: 8px; text-decoration: none;"><i
                    class="fas fa-power-off" style="margin-right: 4px;"></i> Kill Session</a>
        </div>
    </header>

    <main class="dashboard-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h2 style="font-size: 20px; font-weight: 700; color:#fff; margin: 0;">Acquired Growth Inquiries Matrix</h2>
            <span
                style="font-size: 12px; color: #22d3ee; font-family: monospace; background-color: rgba(34, 211, 238, 0.1); padding: 4px 12px; border-radius: 9999px;">Total
                Leads:
                <?php echo count($leads); ?>
            </span>
        </div>

        <div class="table-wrapper">
            <table class="matrix-table">
                <thead>
                    <tr>
                        <th style="width: 8%;">ID</th>
                        <th style="width: 25%;">Client Parameters</th>
                        <th style="width: 22%;">Target Core System</th>
                        <th style="width: 25%;">Requirements Matrix</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%; text-align: center;">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($leads)): ?>
                        <tr>
                            <td colspan="6"
                                style="padding: 2rem; text-align: center; color: #94a3b8; font-family: monospace; font-size: 12px;">
                                No client leads routing detected in pipeline grid.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($leads as $lead): ?>
                            <tr>
                                <td style="font-family: monospace; color: #22d3ee; font-weight: 700; font-size: 12px;">#
                                    <?php echo $lead['id']; ?>
                                </td>
                                <td>
                                    <div style="font-weight: 700; color: #fff;">
                                        <?php echo htmlspecialchars($lead['name']); ?>
                                    </div>
                                    <div style="font-size: 12px; color: #94a3b8; margin-top: 4px;"><i class="fas fa-envelope"
                                            style="margin-right: 4px; color: #475569;"></i>
                                        <?php echo htmlspecialchars($lead['email']); ?>
                                    </div>
                                </td>
                                <td>
                                    <span
                                        style="font-size: 11px; background-color: rgba(255, 106, 0, 0.1); color: #FF6A00; padding: 4px 10px; border-radius: 6px; border: 1px solid rgba(255, 106, 0, 0.15); font-weight: 500; display: inline-block; max-width: 180px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        <?php echo htmlspecialchars($lead['service']); ?>
                                    </span>
                                </td>
                                <td>
                                    <div
                                        style="font-size: 12px; color: #cbd5e1; background-color: rgba(2, 6, 17, 0.4); padding: 8px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.05); max-height: 80px; overflow-y: auto; white-space: pre-line; line-height: 1.4;">
                                        <?php echo htmlspecialchars($lead['message']); ?>
                                    </div>
                                    <span
                                        style="font-size: 10px; color: #64748b; display: block; margin-top: 6px; font-family: monospace;"><i
                                            class="fas fa-clock" style="margin-right: 4px;"></i>
                                        <?php echo $lead['created_at']; ?>
                                    </span>
                                </td>
                                <td>
                                    <?php
                                    $status = htmlspecialchars($lead['status']);
                                    $class = "badge-pending";
                                    if ($status === 'Contacted')
                                        $class = "badge-contacted";
                                    if ($status === 'Closed')
                                        $class = "badge-closed";
                                    ?>
                                    <span class="badge-status <?php echo $class; ?>">
                                        <?php echo $status; ?>
                                    </span>
                                </td>
                                <td style="text-align: center;">
                                    <div style="display: flex; flex-direction: column; gap: 6px; align-items: center;">
                                        <a href="admin_dashboard.php?action=update&id=<?php echo $lead['id']; ?>&status=Contacted"
                                            class="op-btn btn-contacted">Contacted</a>
                                        <a href="admin_dashboard.php?action=update&id=<?php echo $lead['id']; ?>&status=Closed"
                                            class="op-btn btn-close">Close Lead</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>